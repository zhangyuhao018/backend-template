<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Canceled</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Payment Canceled</h1>
        <p>Your payment was canceled. If this was a mistake, you can try again.</p>
        <a href="{{ url('/checkout') }}" class="btn btn-warning">Retry Checkout</a>
        <a href="{{ url('/') }}" class="btn btn-primary">Go back to Home</a>
    </div>
</body>
</html>
