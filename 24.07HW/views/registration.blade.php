<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action=" {{ route('showuser.form') }}" method="POST">
        @csrf
        <div>
            <label for="login">Login:</label>
        </div>
        <input id="login" name="login" type="text">
        <div>
            <label for="">Email:</label>
        </div>
        <input id="email" name="email" type="text">
        <div>
            <label for="age">Age:</label>
        </div>
        <input id="age" name="age" type="number">
        <div>
            <label for="password">Password:</label>
        </div>
        <input id="password" name="password" type="password">
        <div>
            <label for="passwordagain">Password again:</label>
        </div>
        <input id="passwordagain" name="passwordagain" type="password">
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
</body>

</html>
