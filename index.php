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
    E-mail: tails@tailszefox.no-ip.com
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
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
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
            if($from == "vinyl2")
            {
                $ponies["vinyl2"]["hidden"] = FALSE;
                $ponies["vinyl"]["hidden"] = TRUE;
            }

            foreach($ponies as $id => $properties)
            {
                if(strpos($id, "break") !== FALSE)
                {
                    ?><optgroup label="<?php echo $properties ?>"></optgroup><?php
                }
                else if(!$properties["hidden"])
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
                else if(!$properties["hidden"])
                {
                    ?><option value="<?php echo $id ?>" <?php if($to == $id) { ?>selected="selected"<?php } ?>><?php echo $properties["first"] . $properties["second"] ?></option><?php
                }
            }
            ?>
        </select>
        </p>
        <p><button type="submit" class="btn btn-info" id="buttonRandomizeFrom">Randomize this one</button> <button type="submit" class="btn btn-info" id="buttonRandomize">Randomize both</button> <button type="submit" class="btn btn-info" id="buttonRandomizeTo">Randomize that one</button></p>
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
            This application is released under <a rel="license" href="http://www.gnu.org/licenses/gpl.html"><img title="GPL v3 License" src="http://becomingaglider.files.wordpress.com/2011/02/gpl-v3-80x15-1.png" width="80" height="15" /></a> - See the source link for each vector's license
            - <a href="http://www.mattyhex.net/CMR/">Celestia Redux font source</a> - <a href="faq.php" id="faqLink">FAQ</a> - <a href="mailto:&#116;&#097;&#105;&#108;&#115;&#064;&#116;&#097;&#105;&#108;&#115;&#122;&#101;&#102;&#111;&#120;&#046;&#110;&#111;&#045;&#105;&#112;&#046;&#099;&#111;&#109;?subject=Pony%20Fusion">Contact</a>
        </p>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/konami.js"></script>
    <script>
    $(function ()
    {
        var merpRunning = false;

        var merp = new Konami(function(){
            if(!merpRunning)
            {
                $("#audio audio")[0].play();
                $("#resultImage").addClass("animateImage");    
                merpRunning = true;
            }
            else
            {
                $("#audio audio")[0].pause();
                $("#audio audio")[0].currentTime = 0;
                $("#resultImage").removeClass("animateImage");    
                merpRunning = false;
            }
        });

        var twilicane = new Konami(function(){
            var current = $("#from").val();

            if(current == "twilight_p")
            {
                if($("#twilicane").length == 0)
                {
                    var twilicaneDiv = $('<div id="twilicane"><img src="twilicane.png" /></div>');
                    $("#resultDiv").prepend(twilicaneDiv);
                    $('<span id="sourceLinkTwilicaneSpan"> - </span><a href="http://fav.me/d6vlrbm" id="sourceLinkTwilicane">http://fav.me/d6vlrbm</a>').insertAfter("#sourceLink");
                }
                else
                {
                    $("#twilicane").remove();
                    $("#sourceLinkTwilicane").remove();
                    $("#sourceLinkTwilicaneSpan").remove();
                }
            }

        }, "848773767367657869");

        function getNewFusion()
        {
            $("#to").find("option").removeAttr("disabled");
            $("#from").find("option").removeAttr("disabled");

            var from = $("#from").val();
            var to = $("#to").val();
            var fromSelected = $("#from")[0].selectedIndex;
            var toSelected = $("#to")[0].selectedIndex;

            $("#to")[0].options[fromSelected].disabled = true;

            $("#from")[0].options[toSelected].disabled = true;

            jQuery.get('fusion_ajax.php', {from: from, to: to}, function(data, textStatus, xhr) {
              $("#resultDivContent").html(data);
            });
            
        }

        function randomizePonies(which)
        {
            $("#to").find("option").removeAttr("disabled");
            $("#from").find("option").removeAttr("disabled");
            
            var nbPonies = $("#from option").size();

            if(which == 0)
            {
                $("#from")[0].selectedIndex = Math.floor(Math.random() * nbPonies);
                $("#to")[0].selectedIndex = Math.floor(Math.random() * nbPonies);

                if($("#from")[0].selectedIndex == $("#to")[0].selectedIndex)
                {
                    if($("#from")[0].selectedIndex == nbPonies - 1)
                        $("#to")[0].selectedIndex = $("#from")[0].selectedIndex - 1
                    else
                        $("#to")[0].selectedIndex = $("#from")[0].selectedIndex + 1
                }
            }
            else if(which == 1)
            {
                $("#from")[0].selectedIndex = Math.floor(Math.random() * nbPonies);

                if($("#from")[0].selectedIndex == $("#to")[0].selectedIndex)
                {
                    if($("#to")[0].selectedIndex == nbPonies - 1)
                        $("#from")[0].selectedIndex = $("#to")[0].selectedIndex - 1
                    else
                        $("#from")[0].selectedIndex = $("#to")[0].selectedIndex + 1
                }
            }
            else if(which == 2)
            {
                $("#to")[0].selectedIndex = Math.floor(Math.random() * nbPonies);

                if($("#from")[0].selectedIndex == $("#to")[0].selectedIndex)
                {
                    if($("#from")[0].selectedIndex == nbPonies - 1)
                        $("#to")[0].selectedIndex = $("#from")[0].selectedIndex - 1
                    else
                        $("#to")[0].selectedIndex = $("#from")[0].selectedIndex + 1
                }
            }

            getNewFusion();
        }

        $("select.fusionChoice").change(function (e) {
            getNewFusion();
        });

        $("#buttonSwap").click(function (e) {
            $("#to").find("option").removeAttr("disabled");
            $("#from").find("option").removeAttr("disabled");

            var from = $("#from").val();
            var to = $("#to").val();

            $("#from").val(to);
            $("#to").val(from);

            getNewFusion();

            e.preventDefault();
        });

        $("#buttonRandomize").click(function (e) {
            randomizePonies(0);

            e.preventDefault();
        });

        $("#buttonRandomizeFrom").click(function (e) {
            randomizePonies(1);

            e.preventDefault();
        });

        $("#buttonRandomizeTo").click(function (e) {
            randomizePonies(2);

            e.preventDefault();
        });

        $("#faqClose").click(function (e) {
            $("#faqWrapper").hide();
        });

        $("#faqWrapper").click(function (e) {
            $("#faqWrapper").hide();
        })
        
        $("#faqWrapper").children().click(function(e) {
            return false;
        });
        
        $("#faqLink").click(function (e) {
            $("#faqWrapper").show();

            e.preventDefault();
        });

        $(document).on('click', "#resultImage", function(event) {
            var current = $("#from").val();

            if(current == "vinyl" || current == "vinyl2")
            {
                var posX = event.pageX - $(this).offset().left
                var posY = event.pageY - $(this).offset().top;

                if(posX >= 85 && posX <= 310 && posY >= 150 && posY <= 310)
                {
                    if(current == "vinyl")
                    {
                        $("#from option[value='vinyl']").val("vinyl2");
                    }
                    else
                    {
                        $("#from option[value='vinyl2']").val("vinyl");   
                    }

                    getNewFusion();
                    event.preventDefault();
                }
            }
        });

        <?php 
        if(empty($from) && empty($to))
        {
            ?>randomizePonies(0);<?php
        }
        ?>
    });
    </script>
</body>
</html>