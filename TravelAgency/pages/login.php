<?
session_start();
include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Log in form</h2>
    <?
    if (!isset($_POST["userlogin"]) && !isset($_POST["userpasswrd"])) {
    ?>
        <div class="container">
            <form method="POST">
                <div class="mb-3">
                    <label for="login"><b>Login:</b></label>
                    <input class="form-control" type="text" id="login" name="userlogin" required>
                </div>
                <div class="mb-3">
                    <label for="passwrd"><b>Password:</b></label>
                    <input class="form-control" type="password" id="passwrd" name="userpasswrd" required>
                </div>
                <input class="btn btn-outline-primary" type="submit" value="Log in">
            </form>
        </div>
    <?
    } else {
        $login = $_POST["userlogin"];
        $password = $_POST["userpasswrd"];
        $link = connect_to_db("localhost", "root", "", "agencydb", 3306);
        $query = "SELECT * from Users WHERE Login = '$login'";
        try {
            $res = mysqli_query($link, $query);
        } catch (Exception $e) {
            echo "<h2 style='color: red;'>User doesn't exist1!</h2>";
            return;
        }
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $userPassword = $row["Passwrd"];
        if (password_verify($password, $userPassword)) {
            $_SESSION["login"] = $login;
            $_SESSION["role"] = $row["RoleId"];
            $_SESSION["userId"] = $row["Id"];
            echo "<h2 style='color: green;'>You successfuly log in!</h2>";
            header("Location: index.php");
        } else {
            echo "<h2 style='color: red;'>User hasn't been found!</h2>";
        }
    }
    ?>
</body>

</html>