<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .converter-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .converter-container h2 {
            margin: 0 0 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group input {
            width: 93%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="converter-container">
        <h2>Currency Converter</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <label for="from_currency">From:</label>
                <select id="from_currency" name="from_currency">
                    <option selected disabled>Select Currency</option>
                    <option value="USD">USD</option>
                    <option value="IDR">IDR</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="to_currency">To:</label>
                <select id="to_currency" name="to_currency">
                    <option selected disabled>Select Currency</option>
                    <option value="USD">USD</option>
                    <option value="IDR">IDR</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Convert</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = $_POST['amount'];
            $from_currency = $_POST['from_currency'];
            $to_currency = $_POST['to_currency'];

            function convertCurrency($amount, $from_currency, $to_currency)
            {
                $exchange_rates = array(
                    'USD_IDR' => 15000,
                    'EUR_IDR' => 17000,
                    'IDR_USD' => 0.00006,
                    'IDR_EUR' => 0.00007,
                    'USD_EUR' => 1.2,
                    'EUR_USD' => 0.8,
                );

                $currency_pair = $from_currency . '_' . $to_currency;

                if (!isset($exchange_rates[$currency_pair])) {
                    return "Invalid currency pair";
                }

                $rate = $exchange_rates[$currency_pair];
                $converted_amount = $amount * $rate;

                return $converted_amount;
            }

            $converted_amount = convertCurrency($amount, $from_currency, $to_currency);

            echo "<div class='result'>Converted Amount: " . number_format($converted_amount, 2) . " {$to_currency}</div>";
        }
        ?>

    </div>

</body>

</html>