<?php

namespace App\Http\Livewire\Pages\Orders;

use Livewire\Component;

class Orders extends Component
{
    public $data;
    public function render()
    {
        return view('livewire.pages.orders.orders', ['data' => $this->data]);
    }

    public function mount()
    {
        define('CLIENT_SECRET', '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');
        function verify_webhook($data, $hmac_header)
        {
            $calculated_hmac = base64_encode(hash_hmac('sha256', $data, CLIENT_SECRET, true));
            return hash_equals($calculated_hmac, $hmac_header);
        }

        $hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
        $data = file_get_contents('php://input');
        $verified = verify_webhook($data, $hmac_header);
        error_log('Webhook verified: '.var_export($verified, true)); // Check error.log to see the result
        if ($verified) {
            $this->data = $data;
        } else {
            http_response_code(401);
        }
    }
}