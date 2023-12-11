<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = auth()->user();
        $query = Order::with(['user','discount']); 

        if($user->is_admin == 0){
            $query = $query->where('user_id', $user->id);
        }
        
        $orders = $query->get();

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

            $data       = json_decode($webhookPayload,true);
            $order_no   = $data['order_number'];
            $code       = $data['discount_codes'][0]['code'];
            $created_at = $data['created_at'];
            $created_at = Carbon::parse($created_at)->format('Y-m-d H:i:s');
            $discount   = Discount::where('name', $code)->first();   

            if($discount){
                $order = Order::where('order_no', $order_no)
                    ->where('discount_id', $discount->id)
                    ->where('user_id', $discount->user_id)
                ->first();
                $user       = User::where('id', $discount->user_id)->first();
                $commission = ($discount->user->commission / 100) * $data['total_line_items_price'];
                if($order){
                    $order->update([
                        'commission'=> $commission + $order->commission
                    ]);
                }
                else{
                    Order::create([
                        'order_no'         => $order_no,
                        'discount_id'      => $discount->id,
                        'user_id'          => $discount->user_id,
                        'user_commission'  => $user->commission,
                        'commission'       => $commission,
                        'order_created_at' => $created_at,
                    ]);
                }
    
                $current_balance = $user->current_balance + $commission;
                $total_earning   = $user->total_earning + $commission;
    
                $user->update([
                    'total_earning'   => $total_earning,
                    'current_balance' => $current_balance
                ]);

                $details = [
                    'name'       => $user->name,
                    'commission' => $commission,
                    'order_no'   => $order_no,
                    'created_at' => $created_at
                ];

                Mail::to($user->email)->send(new OrderMail($details));
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
        $user  = auth()->user();

        $query = Order::whereBetween('order_created_at', [$start, $end])
            ->selectRaw('DAYOFWEEK(order_created_at) as created_day, COUNT(*) as count')
            ->groupBy('created_day');
    
        if($user->is_admin == 0){
            $query = $query->where('user_id', $user->id);
        }
        
        $orders = $query->get();

        $days = [
            1 => __('messages.sunday'),
            2 => __('messages.monday'),
            3 => __('messages.tuesday'),
            4 => __('messages.wednesday'),
            5 => __('messages.thursday'),
            6 => __('messages.friday'),
            7 => __('messages.saturday'),
        ];

        $data = $orders->mapWithKeys(function ($order) use ($days) {
            return [
                $days[$order->created_day] => $order->count
            ];
        })->toArray();
        
        return response()->json(['status' => true, 'data' => $data]);
    }
}
