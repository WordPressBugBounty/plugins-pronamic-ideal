<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::KBC );

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/kbc/method-kbc-wc-51x32.svg' ),
];

return $payment_method;
