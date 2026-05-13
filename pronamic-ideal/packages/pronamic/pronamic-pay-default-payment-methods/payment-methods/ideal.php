<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::IDEAL );

$payment_method->descriptions = [
	'customer' => \__( 'With iDEAL you can easily pay online in the secure environment of your own bank.', 'pronamic-ideal' ),
];

$payment_method->name = \__( 'iDEAL | Wero', 'pronamic-ideal' );

$payment_method->images = [
	'640x360'     => $image_service->get_path( 'other/ideal-wero/ideal-wero-640x360.svg' ),
	'woocommerce' => $image_service->get_path( 'other/ideal-wero/method-ideal-wero-wc-51x32.svg' ),
];

return $payment_method;
