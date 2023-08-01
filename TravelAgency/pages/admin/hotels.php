            <table class="table table-striped mb-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Hotel name</th>
                        <th>City name</th>
                        <th>Country name</th>
                        <th>Price</th>
                        <th>Stars</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $q8 = "SELECT H.Id, H.HotelName, Ci.City, Co.Country, H.Price, H.Stars FROM Hotels H LEFT JOIN 
                    Cities Ci ON H.CityId = Ci.Id
                    LEFT JOIN Countries Co ON Ci.CountryId = Co.Id";
                    $res = mysqli_query($link, $q8);
                    $err = mysqli_errno($link);
                    if ($err) {
                        echo "<div class='alert alert-warning'>$err</div>";
                    } else
                        while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
                            echo "<tr>";
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td><input type='checkbox' class='form-check-input'
                         name='delhotels[]' value='" . $row[0] . "' form='hotelform'></input></td>";
                            echo "</tr>";
                        }
                    mysqli_free_result($res);
                    ?>
                </tbody>
            </table>
            <form method="post" id="hotelform">
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="countryid" onchange="getCities(event)">
                        <option value=" 0" selected>Choose country</option>
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
                    <select class="form-select" aria-label="Default select example" id="hotelcities" name="hotelcities">
                        <option value="0">Chose city...</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hotelname" class="form-label">Hotel name</label>
                    <input type="text" class="form-control" id="hotelname" placeholder="Add new hotel..." name="hotelname">
                </div>
                <div class="mb-3">
                    <label for="hoteldescription" class="form-label">Hotel description</label>
                    <textarea class="form-control" rows="4" name="hoteldescription" id="hoteldescription"></textarea>
                </div>
                <div class="mb-3">
                    <label for="hotelprice" class="form-label">Hotel price</label>
                    <input type="number" name="hotelprice" placeholder="Hotel price..." id="hotelprice">
                </div>
                <div class="mb-3">
                    <label for="hotelstars" class="form-label">Hotel stars</label>
                    <select class="form-select" aria-label="Default select example" name="hotelstars" id="hotelstars">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-success" name="addhotel">Add</button>
                <button type="submit" class="btn btn-sm btn-warning" name="delhotel">Delete</button>
            </form>
            <?
            if (isset($_POST["addhotel"])) {
                $hotelName = $_POST["hotelname"];
                $cityId = $_POST["hotelcities"];
                $hotelDesc = $_POST["hoteldescription"];
                $price = $_POST["hotelprice"];
                $hotelStars = $_POST["hotelstars"];
                $q9 = "INSERT Hotels(HotelName, Description, CityId, Price, Stars) VALUES
                ('" . $hotelName . "', '" . $hotelDesc . "', '" . $cityId . "', '" . $price . "', '" . $hotelStars . "')";
                $res = mysqli_query($link, $q9);
                $err = mysqli_errno($link);
                if ($err)
                    $_SESSION["cityadderr"] = "Error when adding city!";
                else {
                    unset($_SESSION["cityadderr"]);
                    echo "<script>
                location = document.URL;
                </script>";
                }
                mysqli_free_result($res);
            }
            if (isset($_POST["delhotel"])) {
                if (isset($_POST["delhotels"])) {
                    $delcities = $_POST["delhotels"];
                    $count2 = count($delcities);
                    // var_dump($delcountries);
                    foreach ($delcities as $hotelId) {
                        $q7 = "DELETE FROM Hotels WHERE id=$hotelId";
                        mysqli_query($link, $q7);
                    }
                    echo "<script>
                alert('" . $count2 . " countries was deleted!');
                location = document.URL;
                </script>";
                }
            }
            ?>