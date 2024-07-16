<!DOCTYPE html>
<html>
<head>
    <title>Welcome to our site</title>
</head>
<body>
    <h1>Welcome, {{$data['name']}}!</h1>
    <p>Thank you for registering on our site.</p>
    <p>Your password fro profile ({{$data['email']}}) is : {{$data['password']}}</p>
</body>
</html>
