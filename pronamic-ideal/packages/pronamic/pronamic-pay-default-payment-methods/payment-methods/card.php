<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::CARD );

$payment_method->descriptions = [
	'default' => \__( 'The most popular payment method in the world. Offers customers a safe and trusted way to pay online. Customers can pay for their order quickly and easily with their card, without having to worry about their security. It is possible to charge a payment surcharge for card costs.', 'pronamic-ideal' ),
];

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/credit-card/method-credit-card-wc-51x32.svg' ),
];

return $payment_method;
