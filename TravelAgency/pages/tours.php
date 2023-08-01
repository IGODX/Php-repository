<?
include_once("functions.php");
$link = connect_to_db("localhost", "root", "", "agencydb", 3306);
?>
<div class="container">
    <h2>Tours</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?
        $q1 = "SELECT H.Id, H.HotelName, Ci.City, Co.Country, H.Price, H.Stars FROM Hotels H LEFT JOIN 
                    Cities Ci ON H.CityId = Ci.Id
                    LEFT JOIN Countries Co ON Ci.CountryId = Co.Id";
        $res = mysqli_query($link, $q1);
        $err = mysqli_errno($link);
        if ($err) {
            echo "<div class='alert alert-warning'>$err</div>";
        } else
            while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
                $q2 = "SELECT I.ImagePath from Hotels H LEFT JOIN Images I ON H.Id = I.HotelId WHERE H.Id = $row[0] LIMIT 1 ";
                $res2 = mysqli_query($link, $q2);
                $imageRow = mysqli_fetch_array($res2, MYSQLI_NUM);
                $imagePath = $imageRow[0];
        ?>
            <div class="card mb-3">
                <?
                echo "<img src='" . $imagePath . "' class='card-img-top' alt='" . $imagePath . "'>"
                ?>
                <div class="card-body">
                    <h5 class="card-title"><? echo $row[1]; ?></h5>
                    <p class="card-text"><? echo $row[2]; ?></p>
                    <p class="card-text"><small class="text-body-secondary"><? echo $row[3] . ", Price : " . $row[4] . ", Stars : " . $row[5]; ?></small></p>
                    <p class="card-text"><a href="?page=2&hotelId=<?= $row[0] ?>">Click to see comments</a></p>
                </div>
            <?
            }
            ?>
            </div>
    </div>
</div>