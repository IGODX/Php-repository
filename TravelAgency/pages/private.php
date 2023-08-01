<?
include_once("functions.php");
$link = connect_to_db("localhost", "root", "", "agencydb", 3306);
$sel = 'select * from Users where RoleId=1 order by login';
$res = mysqli_query($link, $sel);
echo '<table class="table table-striped">';
while ($row = mysqli_fetch_array($res)) {
    echo '<tr>';
    echo '<td>' . $row[0] . '</td>';
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[3] . '</td>';
    if (isset($row[4])) {
        $img = base64_encode($row[4]);
        echo '<td><img height="100px"
src="data:image/jpeg; base64,' . $img . '"/></td>';
    }
}
mysqli_free_result($res);
echo '</table>';
