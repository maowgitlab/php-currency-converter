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

    $amount = 15000; // currency amount
    $from_currency = 'IDR';
    $to_currency = 'USD';

    echo convertCurrency($amount, $from_currency, $to_currency) . " {$to_currency}" . "\n";