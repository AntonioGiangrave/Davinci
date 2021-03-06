<?php

function generateVoucher(
    string $prefix = '',
    int $quantity,
    int $code_length = 4,
    int $prefix_len = 2
) {
    $alphabet =
        '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    $vouchers = [];

    // todo: check infinite loop
    while (count($vouchers) < $quantity) {
        // prefix
        $voucher = substr($prefix, 0, $prefix_len);

        // generate random code
        $voucher .= substr(str_shuffle($alphabet), 0, $code_length);

        // prevent duplicate
        if (!in_array($voucher, $vouchers)) {
            $vouchers[] = $voucher;
        }
    }

    return $vouchers;
}
