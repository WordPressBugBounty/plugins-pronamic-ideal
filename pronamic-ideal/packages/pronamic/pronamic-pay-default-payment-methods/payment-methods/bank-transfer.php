<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::BANK_TRANSFER );

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/bank-transfer/method-bank-transfer-wc-51x32.svg' ),
];

return $payment_method;
