<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Success</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Thank you for your purchase!</h1>
        <p>Your transaction was successful.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Go back to Home</a>
    </div>
</body>
</html>
