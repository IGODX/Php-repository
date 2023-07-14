<?

if (!isset($_COOKIE["counter"])) {
    setcookie("counter", "0", time() + 60 * 60 * 10, "/", "", 0, 0);
}
$currentDateTime = date('Y-m-d H:i:s');
setcookie("curDate", "$currentDateTime", time() + 60 * 60 * 10, "/", "", 0, 0);

// $_COOKIE["counter"] = $_COOKIE["counter"] + 1;

setcookie("counter", $_COOKIE["counter"] + 1, time() + 60 * 60 * 10, "/", "", 0, 0);


echo "<div>" . $_COOKIE["counter"] . " times you visited cite!</div>";
echo "<div>" . $_COOKIE["curDate"] . " time of last visit</div>";
// deleteCookies();


function deleteCookies()
{
    setcookie("counter", 0, -1, "/", "", 0, 0);
    setcookie("curDate", 0, -1, "/", "", 0, 0);
}
