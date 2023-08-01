<h2>Regestration form</h2>
<?
session_start();
include_once("functions.php");
if (!isset($_POST["userlogin"])) {
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
            <div class="mb-3">
                <label for="confirmPasswrd"><b>Confirm password:</b></label>
                <input class="form-control" type="password" id="confirmPasswrd" name="confirmpasswrd" required>
            </div>
            <div class="mb-3">
                <label for="email"><b>Email address:</b></label>
                <input class="form-control" type="text" id="email" name="useremail">
            </div>
            <input class="btn btn-primary" type="submit" value="Register">
        </form>
    </div>
<?
} else {
    $login = $_POST['userlogin'];
    $password = $_POST['userpasswrd'];
    $confirmPass = $_POST['confirmpasswrd'];
    $email = $_POST['useremail'];
    if (!check_password($password, $confirmPass)) {
        echo "<h2 style='color:red;'>Password doesn't match!</h2>";
        return;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $link = connect_to_db("localhost", "root", "", "agencydb", 3306);
    $query = "INSERT INTO `Users`(`Login`, `Email`, `Passwrd`, `Discount`, `RoleId`) VALUES ('$login', '$email', '$hashedPassword', 1, 1)";
    mysqli_query($link, $query);
    $err = mysqli_errno($link);
    if ($err) {
        echo "<div class='alert alert-danger' role='alert'>Db error $err. Change login</div>";
        return;
    }
    $_SESSION['login'] = $login;
    $_SESSION['role'] =  1;
    $_SESSION["userId"] = mysqli_insert_id($link);
    echo "<script>
                location = index.php;
            </script>";
}

?>