<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
        }

        .square {
            width: 250px;
            height: 250px;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <?
        $colorsArr = ["blue", "black", "green", "yellow", "aqua", "darkcyan"];
        $i = 0;
        while ($i != 4) {
            $i++;
            $index = rand(0, count($colorsArr) - 1);
            $color = $colorsArr[$index];
            array_splice($colorsArr, $index, 1);
            echo "<div class='square' style='background-color:$color;'></div>";
        }
        ?>
    </div>
</body>

</html>