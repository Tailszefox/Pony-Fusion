<?php
$debug = FALSE;

include("ponies.php");

$getFrom = $_GET["from"];
$getTo = $_GET["to"];

if(!isset($ponies[$getFrom]) || !isset($ponies[$getTo]))
    die("Invalid combination");

$from = imagecreatefrompng("./ponies/" . $ponies[$getFrom]["filename"]);
$to = imagecreatefrompng("./ponies/" . $ponies[$getTo]["filename"]);

for($i = 0; $i < imagecolorstotal($from); $i++)
{
    if($i < imagecolorstotal($to) && $i <= 16)
    {
        $colorFrom = imagecolorsforindex($to, $i);
        if($debug)
        {
            $colorTo = imagecolorsforindex($from, $i);
            echo "$i\n";
            print_r($colorFrom);
            print_r($colorTo);
            echo "\n";
        }

        if($getFrom == $getTo)
        {
            imagecolorset($from, $i, 255 - $colorFrom["red"], 255 - $colorFrom["green"], 255 - $colorFrom["blue"], $colorFrom["alpha"]);
        }
        else
        {
            imagecolorset($from, $i, $colorFrom["red"], $colorFrom["green"], $colorFrom["blue"], $colorFrom["alpha"]);
        }
    }
}

if(!$debug)
{
    header('Content-Type: image/png');
    imagepng($from);
}

imagedestroy($to);
?>