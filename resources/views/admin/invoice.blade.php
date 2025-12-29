<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border: 1px solid #eee;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-header h2 {
            margin: 0;
        }

        .info p {
            margin: 4px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #f0f0f0;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="invoice-box">

    <!-- Header -->
    <div class="invoice-header">
        <div>
            <h2>INVOICE</h2>
            <p>Date: {{ date('d-m-Y') }}</p>
        </div>
        <div>
            <strong>Mobile Phone</strong><br>
            Phnom Penh, Cambodia<br>
            Phone: 012 345 678
        </div>
    </div>

    <!-- Customer Info -->
    <div class="info">
        <p><strong>Customer Name:</strong> {{ $data->user->name }}</p>
        <p><strong>Address:</strong> {{ $data->receiver_address }}</p>
        <p><strong>Phone:</strong> {{ $data->receiver_phone }}</p>
    </div>

    <!-- Product Table -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $data->product->product_name }}</td>
                <td>{{ number_format($data->product->product_price, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Total -->
    <div class="total">
        <strong>Total: ${{ number_format($data->product->product_price, 2) }}</strong>
    </div>

    <!-- Footer -->
    <div class="footer">
        Thank you for your purchase ❤️ <br>
        Please keep this invoice for your records.
    </div>

</div>

</body>
</html>
