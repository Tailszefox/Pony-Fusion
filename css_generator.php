<?php
// This file creates the CSS code for animating the pony
// when the Konami code is entered. It's not used by the program
// in any way, I just wrote it and ran it once to save me from
// actually writing it by hand.

$iter = 0;
$step = (100/60);

for($i = 0; $i < (100 + $step); $i += $step)
{
    $iter += 1;
    $css = "";
    if($iter % 2 == 0)
    {
        $css .= "top: 10px; ";

        if($iter < 15)
        {
            $css .= "transform: scaleX(1);";
        }
        else if($iter < 30)
        {
            $css .= "transform: rotate(90deg) ";
            $css .= " scaleY(1);";
        }
        else if($iter < 45)
        {
            $css .= "transform: rotate(180deg) ";
            $css .= " scaleY(1);";   
        }
        else
        {
            $css .= "transform: rotate(270deg) ";
            $css .= " scaleY(1);";
        }
    }
    elseif($iter % 2 == 1)
    {
        $css .= "top: -10px; ";
        
        if($iter < 15)
        {
            $css .= "transform: scaleX(-1);";
        }
        else if($iter < 30)
        {
            $css .= "transform: rotate(90deg) ";
            $css .= " scaleY(-1);";
        }
        else if($iter < 45)
        {
            $css .= "transform: rotate(180deg) ";
            $css .= " scaleY(-1);";   
        }
        else
        {
            $css .= "transform: rotate(270deg) ";
            $css .= " scaleY(-1);";
        }
    }

    echo round($i, 2) . "% {". $css . "}<br />";
}
?>