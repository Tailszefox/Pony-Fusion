<?php
/*
Pony Fusion - Make a pony the colour of another pony!
Copyright (C) 2014 Tailszefox

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see [http://www.gnu.org/licenses/].

Contact:
    E-mail: pony@tailszefox.net
*/

header('X-UA-Compatible: IE=edge,chrome=1');
include_once("ponies.php");

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
?>
<!DOCTYPE html>
<head>
    <title>Pony Fusion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/style-small.css" rel="stylesheet" media="screen and (max-width: 800px)">
</head>
<body>
    <div id="faqWrapper">
        <div id="faq" class="well">
            <div id="faqClose">
                <span id="faqCloseButton">&times;</span>
            </div>
        <?php
        $faqIncluded = TRUE;
        include("faq.php");
        ?>
        </div>
    </div>

    <div id="container">

    <div id="header">
        <p>Pony Fusion</p>
    </div>

    <div id="content">
    <div id="audio">
        <audio controls loop>
          <source src="merp/merp.ogg" type="audio/ogg">
          <source src="merp/merp.mp3" type="audio/mpeg">
        </audio>
    </div>

    <form method="GET" id="formFusion">
        <p>
        <select name="from" id="from" class="fusionChoice">
            <?php
            if($from == "vinyl2" || $to == "vinyl2")
            {
                $ponies["vinyl2"]["hidden"] = FALSE;
                $ponies["vinyl"]["hidden"] = TRUE;
            }

            if($from == "starlight2" || $to == "starlight2")
            {
                $ponies["starlight2"]["hidden"] = FALSE;
                $ponies["starlight"]["hidden"] = TRUE;
            }

            foreach($ponies as $id => $properties)
            {
                if(strpos($id, "break") !== FALSE)
                {
                    ?><optgroup label="<?php echo $properties ?>"></optgroup><?php
                }
                else if(isset($properties["hidden"]) === FALSE)
                {
                    ?><option value="<?php echo $id ?>" <?php if($from == $id) { ?>selected="selected"<?php } ?>><?php echo $properties["first"] . $properties["second"] ?></option><?php
                }
            }
            ?>
        </select>
        
        <button class="btn btn-info" id="buttonSwap">Swap</button>

        <select name="to" id="to" class="fusionChoice">
            <?php
            foreach($ponies as $id => $properties)
            {
                if(strpos($id, "break") !== FALSE)
                {
                    ?><optgroup label="<?php echo $properties ?>"></optgroup><?php
                }
                else if(isset($properties["hidden"]) === FALSE)
                {
                    ?><option value="<?php echo $id ?>" <?php if($to == $id) { ?>selected="selected"<?php } ?>><?php echo $properties["first"] . $properties["second"] ?></option><?php
                }
            }
            ?>
        </select>
        </p>
        <p><button type="submit" class="btn btn-info buttonsRandomize" id="buttonRandomizeFrom">Randomize <span class="leftAndRight">this one</span><span class="topAndBottom">top one</span></button> <button type="submit" class="btn btn-info buttonsRandomize" id="buttonRandomize">Randomize both</button> <button type="submit" class="btn btn-info buttonsRandomize" id="buttonRandomizeTo">Randomize <span class="leftAndRight">that one</span><span class="topAndBottom">bottom one</span></button></p>
        <noscript><p><button type="submit" class="btn btn-primary">Fusion</button></p></noscript>
        </form>

        <div id="resultDivContent">
        <?php
        if(!empty($from) && !empty($to))
        {
            $fusionInclude = TRUE;
            include("fusion_ajax.php");
        }
        ?>
        </div>

    </div>
    <div id="legal" class="well">
        <p>
            This application is released under <a rel="license" href="http://www.gnu.org/licenses/gpl.html"><img title="GPL v3 License" src="gpl_v3.png" width="80" height="15" /></a> - See the source link for each vector's license
            - <a href="http://www.mattyhex.net/CMR/">Celestia Redux font source</a> - <a href="faq.php" id="faqLink">FAQ</a> - <a href="mailto:&#112;&#111;&#110;&#121;&#064;&#116;&#097;&#105;&#108;&#115;&#122;&#101;&#102;&#111;&#120;&#046;&#110;&#101;&#116;?subject=Pony%20Fusion">Contact</a> - <a href="https://www.ponyar.net/">Be sure to also check out PonyAR!</a>
        </p>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/konami.js"></script>
    <script src="js/base.js"></script>
</body>
</html>