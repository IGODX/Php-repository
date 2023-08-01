<?
function connect_to_db($host, $username, $passwrd, $dbname, $port)
{
    $link = mysqli_connect($host, $username, $passwrd, $dbname, $port)
        or die("Could not establish connection with server");
    mysqli_query($link, "set names 'utf8'");
    return $link;
}

function check_password($password, $confirmPassword)
{
    return $password == $confirmPassword ? true : false;
}


function connect_pdo($host = "localhost:3306", $user = "root", $password = "", $dbname = "agencydb"): PDO
{
    $cs = "mysql:host=$host;dbname=$dbname;charset=utf8;";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
    );
    try {
        $pdo = new PDO($cs, $user, $password, $options);
        return $pdo;
    } catch (PDOException $excep) {
        echo $excep->getMessage();
        return false;
    }
}
