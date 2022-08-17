<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Dear <span>{{$details['name']}}</span></h2>
    <h3>You have requested for reset your password. </h3>
    <br><br>
    <p>We can not simply send you your old password. A unique link to reset your new password has been
        generated for you.
        If you want to change your password click the following link.</p>
    <a href="http://localhost:8000/auth/forgot-password/{{$details['token']}}/{{$details['hashEmail']}}">Reset Password</a>

    <br><br><br>
    <p>Thank you</p>

</body>
</html>
