<?
include_once("functions.php");
$link = connect_to_db("localhost", "root", "", "agencydb", 3306);
if (isset($_GET["id"])) {
    $countryId = $_GET["id"];
    $q1 = "SELECT Id, City from Cities WHERE CountryId = $countryId";
    $str = "<option value='0' selected>Chose city...</option>";
    $res = mysqli_query($link, $q1);
    while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
        $str .= "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
    }
    echo $str;
    mysqli_free_result($res);
}
