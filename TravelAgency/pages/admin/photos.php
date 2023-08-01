        <h3>Photos</h3>
        <form method="post" id="photosform" enctype="multipart/form-data">
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="photoscountry" onchange="getCities(event)">
                    <option value=" 0" selected>Chose country</option>
                    <?
                    $q5 = "SELECT * FROM Countries";
                    $res = mysqli_query($link, $q5);
                    while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
                        echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
                    }
                    mysqli_free_result($res);
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="photoscityid" name="photoscities" onchange="getHotels(event)">
                    <option value="0">Chose city...</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="photoshotel" name="photoshotel">
                    <option value="0">Chose hotel...</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" id="hotelimages" name="hotelimages[]" multiple>
            </div>
            <button type="submit" class="btn btn-sm btn-success" name="addphotos">Add</button>
            <button type="submit" class="btn btn-sm btn-warning" name="delhotel">Delete</button>
        </form>
        <?
        if (isset($_POST["addphotos"])) {
            $photosHotelId = $_POST["photoshotel"];
            foreach ($_FILES["hotelimages"]["name"] as $k => $v) {
                if ($_FILES["hotelimages"]["error"][$k] != 0) {
                    echo "<script>
                alert('Upload file error!: " . $v .
                        "');
                                </script>";
                    continue;
                }

                if (move_uploaded_file($_FILES["hotelimages"]["tmp_name"][$k], "images/" . $v)) {
                    $path = "images/" . $v;
                    $q11 = "INSERT Images(HotelId, ImagePath) VALUES
                (" . $photosHotelId . ", '" . $path . "')";
                    $res = mysqli_query($link, $q11);
                    $err = mysqli_errno($link);
                    if ($err)
                        $_SESSION["cityadderr"] = "Error when adding city!";
                    else {
                        unset($_SESSION["cityadderr"]);
                        echo "<script>
                location = document.URL;
                </script>";
                    }
                }
            }
            mysqli_free_result($res);
        }
        // if (isset($_POST["delhotel"])) {
        //     if (isset($_POST["delhotels"])) {
        //         $delcities = $_POST["delhotels"];
        //         $count2 = count($delcities);
        //         // var_dump($delcountries);
        //         foreach ($delcities as $hotelId) {
        //             $q7 = "DELETE FROM Hotels WHERE id=$hotelId";
        //             mysqli_query($link, $q7);
        //         }
        //         echo "<script>
        //         alert('" . $count2 . " countries was deleted!');
        //         location = document.URL;
        //         </script>";
        //     }
        // }
        ?>