<?
include_once("functions.php");
$link = connect_to_db("localhost", "root", "", "agencydb", 3306);
?>
<div class="container">
    <h2>Admin panel</h2>
    <div class="row row-cols-2">
        <div class="col">
            <?
            include_once("admin/countries.php");
            ?>
        </div>
        <div class="col">
            <?
            include_once("admin/cities.php");
            ?>
        </div>
    </div>
    <!-- <div class="row row-cols-2"> -->
    <div class="col">
        <?
        include_once("admin/hotels.php");
        ?>
    </div>
    <div class="col">
        <?
        include_once("admin/photos.php");
        ?>
    </div>
    <!-- </div> -->
</div>