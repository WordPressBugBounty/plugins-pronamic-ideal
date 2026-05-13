<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::DIRECT_DEBIT_SOFORT );

$payment_method->descriptions = [
	/* translators: %s: payment method name */
	'customer' => \sprintf( \__( 'By using this payment method you authorize us via %s to debit payments from your bank account.', 'pronamic-ideal' ), $payment_method->name ),
];

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/direct-debit-sofort/method-direct-debit-sofort-wc-107x32.svg' ),
];

return $payment_method;
