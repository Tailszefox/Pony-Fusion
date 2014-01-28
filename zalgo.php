<?php
// Script adapted from Javascript, used for an easter egg.

//============================================================
// ZALGO text script by tchouky
//============================================================

// data set of leet unicode chars
//---------------------------------------------------

//those go UP
$zalgo_up = array(
    '\u030d', /*     ̍     */       '\u030e', /*     ̎     */       '\u0304', /*     ̄     */       '\u0305', /*     ̅     */
    '\u033f', /*     ̿     */       '\u0311', /*     ̑     */       '\u0306', /*     ̆     */       '\u0310', /*     ̐     */
    '\u0352', /*     ͒     */       '\u0357', /*     ͗     */       '\u0351', /*     ͑     */       '\u0307', /*     ̇     */
    '\u0308', /*     ̈     */       '\u030a', /*     ̊     */       '\u0342', /*     ͂     */       '\u0343', /*     ̓     */
    '\u0344', /*     ̈́     */       '\u034a', /*     ͊     */       '\u034b', /*     ͋     */       '\u034c', /*     ͌     */
    '\u0303', /*     ̃     */       '\u0302', /*     ̂     */       '\u030c', /*     ̌     */       '\u0350', /*     ͐     */
    '\u0300', /*     ̀     */       '\u0301', /*     ́     */       '\u030b', /*     ̋     */       '\u030f', /*     ̏     */
    '\u0312', /*     ̒     */       '\u0313', /*     ̓     */       '\u0314', /*     ̔     */       '\u033d', /*     ̽     */
    '\u0309', /*     ̉     */       '\u0363', /*     ͣ     */       '\u0364', /*     ͤ     */       '\u0365', /*     ͥ     */
    '\u0366', /*     ͦ     */       '\u0367', /*     ͧ     */       '\u0368', /*     ͨ     */       '\u0369', /*     ͩ     */
    '\u036a', /*     ͪ     */       '\u036b', /*     ͫ     */       '\u036c', /*     ͬ     */       '\u036d', /*     ͭ     */
    '\u036e', /*     ͮ     */       '\u036f', /*     ͯ     */       '\u033e', /*     ̾     */       '\u035b', /*     ͛     */
    '\u0346', /*     ͆     */       '\u031a' /*     ̚     */
);

//those go DOWN
$zalgo_down = array(
    '\u0316', /*     ̖     */       '\u0317', /*     ̗     */       '\u0318', /*     ̘     */       '\u0319', /*     ̙     */
    '\u031c', /*     ̜     */       '\u031d', /*     ̝     */       '\u031e', /*     ̞     */       '\u031f', /*     ̟     */
    '\u0320', /*     ̠     */       '\u0324', /*     ̤     */       '\u0325', /*     ̥     */       '\u0326', /*     ̦     */
    '\u0329', /*     ̩     */       '\u032a', /*     ̪     */       '\u032b', /*     ̫     */       '\u032c', /*     ̬     */
    '\u032d', /*     ̭     */       '\u032e', /*     ̮     */       '\u032f', /*     ̯     */       '\u0330', /*     ̰     */
    '\u0331', /*     ̱     */       '\u0332', /*     ̲     */       '\u0333', /*     ̳     */       '\u0339', /*     ̹     */
    '\u033a', /*     ̺     */       '\u033b', /*     ̻     */       '\u033c', /*     ̼     */       '\u0345', /*     ͅ     */
    '\u0347', /*     ͇     */       '\u0348', /*     ͈     */       '\u0349', /*     ͉     */       '\u034d', /*     ͍     */
    '\u034e', /*     ͎     */       '\u0353', /*     ͓     */       '\u0354', /*     ͔     */       '\u0355', /*     ͕     */
    '\u0356', /*     ͖     */       '\u0359', /*     ͙     */       '\u035a', /*     ͚     */       '\u0323' /*     ̣     */
);

//those always stay in the middle
$zalgo_mid = array(
    '\u0315', /*     ̕     */       '\u031b', /*     ̛     */       '\u0340', /*     ̀     */       '\u0341', /*     ́     */
    '\u0358', /*     ͘     */       '\u0321', /*     ̡     */       '\u0322', /*     ̢     */       '\u0327', /*     ̧     */
    '\u0328', /*     ̨     */       '\u0334', /*     ̴     */       '\u0335', /*     ̵     */       '\u0336', /*     ̶     */
    '\u034f', /*     ͏     */       '\u035c', /*     ͜     */       '\u035d', /*     ͝     */       '\u035e', /*     ͞     */
    '\u035f', /*     ͟     */       '\u0360', /*     ͠     */       '\u0362', /*     ͢     */       '\u0338', /*     ̸     */
    '\u0337', /*     ̷     */       '\u0361', /*     ͡     */       '\u0489' /*     ҉_     */       
);

function rand_zalgo($array)
{
    $ind = rand(0, count($array) - 1);
    $unicodeChar = $array[$ind];
    return json_decode('"'.$unicodeChar.'"');
}

function is_zalgo_char($c)
{
    global $zalgo_up;
    global $zalgo_down;
    global $zalgo_mid;

    for($i=0; $i < count($zalgo_up); $i++)
    {
        if($c == json_decode('"'.$zalgo_up[$i].'"'))
            return true;
    }
    for($i=0; $i < count($zalgo_down); $i++)
    {
        if($c == json_decode('"'.$zalgo_down[$i].'"'))
            return true;
    }
    for($i=0; $i < count($zalgo_mid); $i++)
    {
        if($c == json_decode('"'.$zalgo_mid[$i].'"'))
            return true;
    }
    return false;
}

function zalgo($txt)
{
    global $zalgo_up;
    global $zalgo_down;
    global $zalgo_mid;

    $newtxt = '';
        
    for($i = 0; $i < strlen($txt); $i++)
    {
        if(is_zalgo_char(substr($txt, $i, 1)))
        {
            continue;
        }

        //add the normal character
        $newtxt .= substr($txt, $i, 1);

        $num_up = rand(0, 16) / 2 + 1;
        $num_mid = rand(0, 6) / 2;
        $num_down = rand(0, 16) / 2 + 1;
        
        for($j = 0; $j < $num_up; $j++)
        {
            $add = rand_zalgo($zalgo_up);
            $newtxt .= $add;
        }
        for($j = 0; $j < $num_mid; $j++)
        {
            $add = rand_zalgo($zalgo_mid);
            $newtxt .= $add;
        }
        for($j = 0; $j < $num_down; $j++)
        {
            $add = rand_zalgo($zalgo_down);
            $newtxt .= $add;
        }
    }

    return $newtxt;
}

?>