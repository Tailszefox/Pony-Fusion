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
                $('<span id="sourceLinkTwilicaneSpan"> - </span><a href="http://fav.me/d6vlrbm" id="sourceLinkTwilicane">http://fav.me/d6vlrbm</a>').insertAfter(".sourceLink");
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

        //$("#to")[0].options[fromSelected].disabled = true;

        //$("#from")[0].options[toSelected].disabled = true;

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
    });
    
    $("#faq").click(function(e) {
        e.stopPropagation();
        return true;
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
                    $("#to option[value='vinyl']").val("vinyl2");
                }
                else
                {
                    $("#from option[value='vinyl2']").val("vinyl");
                    $("#to option[value='vinyl2']").val("vinyl");
                }

                getNewFusion();
                event.preventDefault();
            }
        }

        if(current == "starlight" || current == "starlight2")
        {
            var posX = event.pageX - $(this).offset().left
            var posY = event.pageY - $(this).offset().top;

            if(posX >= 190 && posX <= 230 && posY >= 380 && posY <= 460)
            {
                if(current == "starlight")
                {
                    $("#from option[value='starlight']").val("starlight2");
                    $("#to option[value='starlight']").val("starlight2");
                }
                else
                {
                    $("#from option[value='starlight2']").val("starlight");
                    $("#to option[value='starlight2']").val("starlight");
                }

                getNewFusion();
                event.preventDefault();
            }
        }
    });

    var urlQuery = new URLSearchParams(window.location.search);
    if(urlQuery.get("from") == null || urlQuery.get("to") == null)
        randomizePonies(0);

    // Switch to dark/light mode
    function switchMode()
    {
        var darkSwitch = $("#darkSwitch")[0];

        // Switch to dark mode
        if(darkSwitch.dataset["mode"] == "light")
        {
            $("#darkSheet")[0].media = "screen";
            darkSwitch.dataset["mode"] = "dark";
            darkSwitch.src = "mode_dark.png";
            darkSwitch.title = "Switch to Light Mode";
        }
        // Switch to light mode
        else
        {
            $("#darkSheet")[0].media = "not all";
            darkSwitch.dataset["mode"] = "light";
            darkSwitch.src = "mode_light.png";
            darkSwitch.title = "Switch to Dark Mode";
        }
    }

    // If dark mode is the default, change the switch button
    var darkDefault = window.matchMedia("screen and (prefers-color-scheme: dark)").matches;

    if(darkDefault)
    {
        switchMode();
    }

    // Handle clicking on mode switch
    $("#darkSwitch").click(function (e) {
        switchMode();
    });
});
