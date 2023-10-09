<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mathayog | Register</title>
</head>
<body>
    This is the register page
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div>
            <label for="firstname">First Name</label><br>
            <input type="text" name="firstname" id="firstname"><br><br>
        </div>

        <div>
            <label for="lastname">Last Name</label><br>
            <input type="text" name="lastname" id="lastname"><br><br>
        </div>

        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>
        </div>

        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label><br>
            <input type="password" name="password_confirmation" id="emapassword_confirmationil"><br><br>
        </div>

        <div>
            <button type="submit" name="registerBtn" id="registerBtn">Register</button>
        </div>
    </form>
</body>
</html>