<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Discount;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = auth()->user();
        $orders = '';
        if($user->is_admin == 1){
            $orders = Order::all();
        }else{
            $orders = Order::where('user_id', $user->id)->get();
        }

        return view("admin.order.list", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("admin.order.show", compact("order"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function shopifyOrder(Request $request){
        // Retrieve the webhook payload sent by Shopify
        $webhookPayload = file_get_contents('php://input');

        // Shopify app's secret key
        $secretKey = env('SHOPIFY_APP_SECRET_KEY'); // Replace this with your actual secret key

        // Get the HMAC signature sent by Shopify
        $receivedHmac = $request->header('X-Shopify-Hmac-Sha256'); // Replace with the actual header name received

        // Calculate the HMAC signature locally
        $computedHmac = base64_encode(hash_hmac('sha256', $webhookPayload, $secretKey, true));

        // Compare the computed HMAC with the received HMAC
        if (hash_equals($receivedHmac, $computedHmac)) {

            $data     = json_decode($webhookPayload,true);
            $order_no = $data['order_number'];
            $code     = $data['discount_codes'][0]['code'];
            $discount = Discount::where('name', $code)->first();   

            if($discount){
                $order = Order::where('order_no', $order_no)
                    ->where('discount_id', $discount->id)
                    ->where('user_id', $discount->user_id)
                ->first();
                
                $commission = ($discount->user->commission / 100) * $data['total_line_items_price'];
                if($order){
                    $order->update([
                        'commission'=> $commission + $order->commission
                    ]);
                }
                else{
                    Order::create([
                        'order_no'    => $order_no,
                        'discount_id' => $discount->id,
                        'user_id'     => $discount->user_id,
                        'commission'  => $commission
                    ]);
                }
    
                $user            = User::where('id',$discount->user_id)->first();
                $current_balance = $user->current_balance + $commission;
                $total_earning   = $user->total_earning + $commission;
    
                $user->update([
                    'total_earning'   => $total_earning,
                    'current_balance' => $current_balance
                ]);
            }

            // Respond with a success status (optional)
            return response()->json(['message' => 'Order created successfully.'], 200);
        } else {
            // Invalid webhook request
            // Respond with an error status (optional)
            return response()->json(['error' => 'Invalid webhook request. Authentication failed.'], 401);
        }
    }

    public function ordersChart(Request $request){
        
        $start = $request->start . ' 00:00:00'; 
        $end   = $request->end   . ' 23:59:59'; 

        $orders = Order::whereBetween('created_at', [$start, $end])
            ->selectRaw('DAYOFWEEK(created_at) as created_day, COUNT(*) as count')
            ->groupBy('created_day')
        ->get();

        $days = [
            1 => 'Sunday',
            2 => 'Monday',
            3 => 'Tuesday',
            4 => 'Wednesday',
            5 => 'Thursday',
            6 => 'Friday',
            7 => 'Saturday',
        ];

        $data = $orders->mapWithKeys(function ($order) use ($days) {
            return [
                $days[$order->created_day] => $order->count
            ];
        })->toArray();
        
        return response()->json(['status' => true, 'data' => $data]);
    }
}
