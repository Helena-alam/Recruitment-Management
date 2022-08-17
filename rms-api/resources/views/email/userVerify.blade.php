<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body>
    <h2>Dear <span>{{$details['name']}}</span></h2>
    <p>We are requesting you to verify your email address. Please click the link below to verify your account</p>
    <a href="http://localhost:8000/auth/verify/{{$details['token']}}/{{$details['hashEmail']}}">Verify Here</a>

    <br><br><br>
    <p>Thank you</p>

</body>
</html>
