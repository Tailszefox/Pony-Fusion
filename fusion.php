<?php
function makeFusion($getFrom, $getTo, $fromCli)
{
    $debug = FALSE;

    include("ponies.php");

    if(!isset($ponies[$getFrom]) || !isset($ponies[$getTo]))
        die("Invalid combination");

    $cacheFilename = "./cache/" . $getFrom . "_" . $getTo . ".png";
    $cacheUrl = "/cache/" . $getFrom . "_" . $getTo . ".png";
    $useCache = TRUE;

    // If this fusion was already cached, just redirect to it.
    if($useCache && file_exists($cacheFilename))
    {
        if($fromCli === FALSE)
        {
            header("Location: " . $cacheUrl);
        }

        return;
    }

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

    // Retain transparency
    imagealphablending($from, false);
    imagesavealpha($from, true);
    imagefill($from, 0, 0, imagecolorallocatealpha($from, 255, 255, 255, 127));

    // Crop 1px from bottom to avoid showing swatch
    $from = imagecrop($from, ['x' => 0, 'y' => 0, 'width' => imagesx($from), 'height' => imagesy($from) - 1]);

    if(!$debug && !$fromCli)
    {
        header('Content-Type: image/png');
        imagepng($from);
    }

    // Save fusion to cache
    imagepng($from, $cacheFilename);

    imagedestroy($to);
}

// Don't run the function if we're running from the command line
if (php_sapi_name() !== 'cli')
{
    $getFrom = $_GET["from"];
    $getTo = $_GET["to"];
    makeFusion($getFrom, $getTo, FALSE);
}

?>