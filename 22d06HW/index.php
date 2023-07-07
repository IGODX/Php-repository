<?
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .image-holder {
            display: flex;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyProject</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <?
                if (isset($_SESSION['email'])) {
                    echo "<p style='margin-top: 15px; margin-right:12px'>" . $_SESSION['email'] . "</p>";
                    echo "<form method='post'>
                    <input type='submit' value='Log out' class='btn btn-outline-primary'>
                    </form>";
                } else {
                    echo "<div style='margin-right: 12px;'>
                    <a href='login.php' class='btn btn-outline-primary'>Login</a>
                    </div>";
                    echo "<a href='register.php' class='btn btn-outline-primary'>Register</a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <section>
        <?
        if (isset($_SESSION['email'])) {
        ?>
            <div class="mb-3">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Load Photo</label>
                        <input class="form-control" type="file" id="formFile" name="photo">
                    </div>
                    <input type="submit" class="btn btn-success" value="Add photo">
                </form>
            </div>
        <?
        }
        if (isset($_POST['photo'])) {
            if ($_FILES && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
                $filename = $_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $filename);
                echo "<div style='color: greed'>File $filename upload successfully!</div>";
            } else
                echo "<div style='color: red'>Error while upload file!</div>";
        }
        ?>
        <?
        $directory = 'D:\\ospanel\\domains\\22d06HW\\images';
        if (is_dir($directory)) {
            $files = scandir($directory);
            $i = 0;
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    if ($i == 0)
                        echo "<div class='image-holder'>";
                    $fName = ltrim($file, '.');
                    echo "<img src='images/$fName' style ='width: 450px; height: 450px; margin-right: 12px; margin-bottom: 10px' alt='$fName'>";
                    $i++;
                    if ($i == 4) {
                        echo "</div>";
                        $i = 0;
                    }
                }
            }
        }

        ?>

    </section>
</body>

</html>