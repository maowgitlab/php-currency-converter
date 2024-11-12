<?php 
    function convertCurrency($amount, $from_currency, $to_currency) {
        $exchange_rates = [
            'USD_IDR' => 15000,
            'EUR_IDR' => 17000,
            'IDR_USD' => 0.00006,
            'IDR_EUR' => 0.00007
        ];

        $currency_pair = $from_currency . '_' . $to_currency;
        if (!isset($exchange_rates[$currency_pair])) {
            return "Invalid currency pair";
        }

        $rate = $exchange_rates[$currency_pair];
        $converted_amount = $amount * $rate;

        return $converted_amount;
    }

    $amount = 1; // currency amount
    $from_currency = 'USD';
    $to_currency = 'IDR';

    echo convertCurrency($amount, $from_currency, $to_currency) . "\n";