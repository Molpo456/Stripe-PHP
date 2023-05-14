<?php

require "vendor/autoload.php";
header("Content-Type", "application/json");
header("Access-Control-Allow-Origin: http://localhost:5500");

$stripe = new Stripe\StripeClient("sk_test_51MdG6EFY7D2eJXuuiyglYBZ1LiqmewSLnXdQ3hnpY2b6VebjA5HMAXqHyAZpXmn20XrmPdGn4unKE3dzqg6WmYUf00FKhX6dB8");
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