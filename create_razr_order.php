<?php
require('razorpay-php/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

// Replace with your Razorpay Key ID and Secret
// $key_id = 'rzp_test_n5oTuMseyDclhS';
// $key_secret = 'eR0Agm0HEGChnUp5Oi1mqUWc';

$key_id = 'rzp_live_SwPxj3HuCi6h9s';
$key_secret = 'aZ191qW7c3au4Q6cjs9EON5t';


$api = new Api($key_id, $key_secret);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount']; // Amount in paise

    try {
        $orderData = [
            'receipt'         => uniqid(),
            'amount'          => $amount, // Amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // Auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        echo json_encode(['order_id' => $razorpayOrder['id']]);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
