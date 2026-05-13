<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::DIRECT_DEBIT_IDEAL );

$payment_method->descriptions = [
	/* translators: %s: payment method name */
	'customer' => \sprintf( \__( 'By using this payment method you authorize us via %s to debit payments from your bank account.', 'pronamic-ideal' ), $payment_method->name ),
];

$payment_method->images = [
	'640x360'     => $image_service->get_path( 'other/ideal-wero/ideal-wero-640x360.svg' ),
	'woocommerce' => $image_service->get_path( 'other/ideal-wero/method-ideal-wero-wc-51x32.svg' ),
];

return $payment_method;
