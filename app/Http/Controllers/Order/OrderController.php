<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        //
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
        //
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
        $receivedHmac = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256']; // Replace this with the actual header name received

        // Calculate the HMAC signature locally
        $computedHmac = base64_encode(hash_hmac('sha256', $webhookPayload, $secretKey, true));

        // Compare the computed HMAC with the received HMAC
        if (hash_equals($receivedHmac, $computedHmac)) {
            // Webhook request is verified
            // Proceed with handling the payload
            // Example: Log the payload or perform necessary actions
            logger($webhookPayload);

            $new_file = public_path("storage/webhook/webhook_logs.txt");
            file_put_contents($new_file, $webhookPayload . PHP_EOL, FILE_APPEND);

            // Respond with a success status (optional)
            http_response_code(200);
            echo "Webhook received and verified.";
        } else {
            // Invalid webhook request
            // Respond with an error status (optional)
            http_response_code(401);
            echo "Invalid webhook request. Authentication failed.";
        }
    }
}
