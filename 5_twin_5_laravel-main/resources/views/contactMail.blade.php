<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>

<body>
    <h1>Message from {{ $details['name'] }}</h1>
    <p>Email: {{ $details['email'] }} </p><br><br>
    <p>{{ $details['message'] }}</p>
</body>

</html>
