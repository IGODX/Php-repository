<?
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!file_exists('users.txt')) {
        fopen('users.txt', 'w');
    }
    $lines = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $str = explode(':', $line);
        if ($str[0] == $email && $str[1] == $password) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo "<script>
        location = 'index.php';
    </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sign-in.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <main class="form-signin w-100 m-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <label for="floatingInput">Email address</label>
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required <?
                                                                                                                                if (isset($_SESSION['email']))
                                                                                                                                    echo "value='" . $_SESSION['email'] . "'" ?>>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required <?
                                                                                                                                    if (isset($_SESSION['password']))
                                                                                                                                        echo "value='" . $_SESSION['password'] . "'" ?>>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>