<?php
        Header("Content-type: image/png");
        $file = file_get_contents('quotes.txt', true);
        $arr = explode(";", $file);
        $images = glob('img' . '/*.png');
        
        if (isset($_GET['quote']) && isset($_GET['bg']))
        {
            $imagepath = $_GET['bg'];
            $i = $_GET['quote'];
        }
        elseif (isset($_GET['quote']))
        {
            $i = $_GET['quote'];
            $imagepath = array_rand($images);
        }
        elseif (isset($_GET['bg'])) 
        {
            $i = array_rand($arr);
            $imagepath = $_GET['bg'];
        }
        else
        {
            $imagepath = array_rand($images);
            $i = array_rand($arr);
        }

        # ░░░█░░█░░█░░░
        # ░░░▓░░▓░░▓░░░
        # █░░▒▒▒▓▒▒▒░░█
        # ▓░░░░░▓░░░░░▓
        # ▒▒▒▒▓▓▓▓▓▒▒▒▒
        # ░░░░░░▓░░░░░░
        # ░░█▓▒▒▓▒▒▓█░░
        # ░░░░░▓░▓░░░░░
        # ░░░░▓░░░▓░░░░
        # ░░░░░▓▓▓░░░░░

        $image = imagecreatefrompng($images[$imagepath]);
        $size = getimagesize($images[$imagepath]);
        $strsize = strlen($arr[$i]);
        $bgcolor = ImageColorAllocate($image, 16, 16, 16);
        imagefilledrectangle($image, $size[0]/12-20, $size[0]/4-30, $size[0]-($size[0]/12+20), $size[1]/2+30, $bgcolor);
        $color = ImageColorAllocate($image, 255, 255, 255);
        imagestring($image, 4, ($size[0]/2)-$strsize*4, $size[1]/2-25, $arr[$i], $color);
        $namesize = strlen("-Max0r");
        imagefilledrectangle($image, $size[0]-(20+$namesize*10), $size[1]-45, $size[0]-20, $size[1]-15, $bgcolor);
        imagestring($image, 4, $size[0]-(20+$namesize*9), $size[1]-40, "-Max0r", $color);
        imagepng($image);
        imagedestroy($image);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generator cytatów</title>
</head>
<body>
</body>
</html>