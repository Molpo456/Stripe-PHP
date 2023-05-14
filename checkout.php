<?php

require "vendor/autoload.php";
header("Content-Type", "application/json");
header("Access-Control-Allow-Origin: http://localhost:5500");

$stripe = new Stripe\StripeClient("Secret Key Here");
$session = $stripe->checkout->sessions->create([
    "success_url" => "http://localhost:5500/success.html",
    "cancel_url" => "http://localhost:5500/cancel.html",
    "payment_method_types" => ["card", "alipay"],
    "mode" => "payment",
    "line_items" => [
        [
            "price_data" => [
                "currency" => "gbp",
                "product_data" => [
                    "name" => "Mobile",
                    "description" => "Latest mobile 2021"
                ],
                "unit_amount" => 5000
            ],
            "quantity" => 1
        ],

        [
            "price_data" => [
                "currency" => "gbp",
                "product_data" => [
                    "name" => "Shirt",
                    "description" => "Light summer shirt"
                ],
                "unit_amount" => 2000
            ],
            "quantity" => 2
        ]
    ]
]);

echo json_encode($session);

?>
