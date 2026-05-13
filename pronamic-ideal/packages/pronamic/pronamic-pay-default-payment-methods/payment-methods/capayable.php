<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::CAPAYABLE );

$payment_method->images = [];

return $payment_method;
