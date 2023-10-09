<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mathayog | Login</title>
</head>
<body>
    This is the login page
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
        </div>
        <div>
            <button type="submit" name="loginBtn" id="loginBtn">Login</button>
        </div>
    </form>
</body>
</html>