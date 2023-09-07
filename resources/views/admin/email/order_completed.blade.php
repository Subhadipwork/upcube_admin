<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4a90e2, #8e44ad);
            color: #333;
        }

        .container {
            background-color: #fff;
            max-width: 600px;
            width: 100%;
            padding: 40px 40px;
            border-radius: 20px;
            box-shadow: 0px 10px 35px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            font-size: 2.2em;
            font-weight: bold;
            color: #2c3e50;
        }

        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
        }

        th, td {
            padding: 18px 25px;
            text-align: left;
            border-bottom: 2px solid #f1f1f1;
        }

        th {
            background-color: #f7f7f7;
            font-weight: 500;
            color: #7f8c8d;
        }

        td {
            font-weight: 400;
            color: #34495e;
        }

        p {
            margin-top: 25px;
            font-size: 1.1em;
            line-height: 1.6em;
            color: #7f8c8d;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #2980b9;
        }

        .footer {
            margin-top: 35px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Order Completed</h2>
        <p>Hello {{ $maildata['order']->name }},</p>

        <table>
            <tr>
                <th>Invoice Number</th>
                <td>{{ $maildata['order']->invoice_no }}</td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td>{{ $maildata['order']->order_date }}</td>
            </tr>
            <tr>
                <th>Grand Total</th>
                <td>{{ $maildata['order']->grandtotal }}</td>
            </tr>
            
        </table>
        <!-- Order Products Table -->
<h3 style="margin-top: 30px; margin-bottom: 20px; font-size: 1.5em; color: #2c3e50;">Order Products</h3>
<table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
    <thead>
        <tr>
            <th style="padding: 15px 20px; text-align: left; border-bottom: 2px solid #f1f1f1; background-color: #f7f7f7; font-weight: 500;">Product Name</th>
            <th style="padding: 15px 20px; text-align: left; border-bottom: 2px solid #f1f1f1; background-color: #f7f7f7; font-weight: 500;">Quantity</th>
            <th style="padding: 15px 20px; text-align: left; border-bottom: 2px solid #f1f1f1; background-color: #f7f7f7; font-weight: 500;">Total Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($maildata['order']->orderproduct as $product)
        <tr>
            <td style="padding: 18px 25px; text-align: left; border-bottom: 2px solid #f1f1f1; font-weight: 400; color: #34495e;">{{ $product->product_name }}</td>
            <td style="padding: 18px 25px; text-align: left; border-bottom: 2px solid #f1f1f1; font-weight: 400; color: #34495e;">{{ $product->quantity }}</td>
            <td style="padding: 18px 25px; text-align: left; border-bottom: 2px solid #f1f1f1; font-weight: 400; color: #34495e;">{{ $product->total_price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


        <p>If you have any questions, please contact us.</p>

        <div class="footer" style="margin-top: 40px; text-align: center;">
            <img src="https://png.pngtree.com/png-clipart/20190604/original/pngtree-business-logo-design-png-image_915991.jpg" alt="CHaA Logo" style="width: 100px; margin-bottom: 20px;">
            <p>Thank you for shopping with us!</p>
            <p><a href="https://yourwebsite.com" target="_blank" style="color: #3498db; text-decoration: none;">Visit our website</a></p>
            <p>CHaA</p>
            <p>© 2021. All Rights Reserved</p>
        </div>
        
    </div>

</body>

</html>
