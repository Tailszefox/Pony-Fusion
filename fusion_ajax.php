<?php

if(!isset($fusionInclude))
{
    include("ponies.php");

    if(isset($_GET["from"]))
    {
        $from = $_GET["from"];
        if(!isset($ponies[$from]))
            die("Invalid combination");
    }
    else
        $from = "";

    if(isset($_GET["to"]))
    {
        $to = $_GET["to"];
        if(!isset($ponies[$to]))
            die("Invalid combination");   
    }
    else
        $to = "";
}

if(!empty($from) && !empty($to))
{
    $imgUrl = 'fusion.php/fusion.png?from=' . $from .'&amp;to=' . $to;
    $linkUrl = '?from=' . $from .'&amp;to=' . $to;

    ?>
    <div id="resultDiv" class="well">
    <p id="name"><?php echo ucfirst($ponies[$from]["first"]) ?><?php echo $ponies[$to]["second"] ?></p>

    <p><a href="<?php echo $imgUrl ?>"><img id="resultImage" src="<?php echo $imgUrl ?>" /></a></p>

    <p> Source: <a href="<?php echo $ponies[$from]["source"] ?>" id="sourceLink"><?php echo $ponies[$from]["source"] ?></a><br />
        <a href="<?php echo $linkUrl ?>">Permalink to this fusion</a></p>

    </div>
    <?php
}
?>