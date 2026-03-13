<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail</title>
</head>
<body>
    <a href="{{route('reset_password',['token'=>$token,'email'=>$email])}}">click heare for reser password</a>
</body>
</html>