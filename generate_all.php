<?php
// Use this script to generate a cache of all the fusions. For security reasons this can only be done through the command line.
// If you want to regenerate a fusion already in the cache, delete it from the cache first. This script will not generate a fusion that's already cached.
// There is a small pause between each fusion in order to not overload the server. Depending on the number of ponies, this may take a while to run.

if(php_sapi_name() !== 'cli')
{
    exit('You cannot run this script in your browser.');
}

require("ponies.php");
require("fusion.php");

$totalPonies = 0;

foreach($ponies as $id => $properties)
{
    if(strpos($id, "break") === FALSE)
        $totalPonies++;
}

$totalFusions = $totalPonies * $totalPonies;

$i = 0;
foreach($ponies as $id => $properties)
{
    if(strpos($id, "break") === FALSE)
    {
        foreach($ponies as $idSecond => $propertiesSecond)
        {
            if(strpos($idSecond, "break") === FALSE)
            {
                $i++;
                $percentage = sprintf("%3d", floor(($i / $totalFusions) * 100));
                echo "($percentage%) [$i/$totalFusions] $id + $idSecond\n";
                makeFusion($id, $idSecond, TRUE);
                sleep(1);
            }
        }
    }
}
?>