<?php
if(!isset($faqIncluded))
{
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pony Fusion - FAQ</title>
    <meta charset="utf-8">
</head>
<body>
<?php
}
?>
<p><em>Note: in this FAQ, the term </em>ponies<em> also refers to zebras, dragons, cats, and other various animals. We do not discriminate here at PonyAR.</em></p>

<dl>
    <dt>What does this thing even do?</dt>
    <dd>It applies the colour scheme of one pony to another pony. With the list on the left, you pick which pony you want to recolour. With the list on the right, you pick which pony's colour scheme you want to use. Voilà! You'll get a brand new pony with some weird colours.</dd>

    <dt>So it takes the colours from one pony, and then dyes another pony with it?</dt>
    <dd>Basically.</dd>

    <dt>This looks a lot like <a href="http://pokemon.alexonsager.net/">Pokémon Fusion</a>. Except with ponies.</dt>
    <dd>Pony Fusion is heavily inspired by Pokémon Fusion. The idea and part of the layout were used as a base to create this ponified version. All of the code is original, though: nothing was actually taken from Pokémon Fusion, apart from the idea.</dd>

    <dt>Unlike Pokémon Fusion, the ponies don't swap their faces or their cutie marks or something else!</dt>
    <dd>It would be a bit harder to do something like that, and I'm not really sure how the faces could be swapped. The cutie marks, now that sounds more doable, but I can't really think of an easy and efficient way to do that. Sorry, you'll have to stick to colours for now!</dd>

    <dt>Can I use the result of one of the fusions somewhere else?</dt>
    <dd>You can share a link to this page anywhere you want, of course. As for the image itself, I don't hold any right to what the application creates. Just make sure to click the source link to check what the creator of the original vector allows you to do with it.</dd>

    <dt>One of the vectors you used is mine, and I'd like you to remove it.</dt>
    <dd>No issue! I made sure that I could use all the vectors I put here, and I take care to put a link back to the original, but if I made a mistake or if the conditions changed, don't hesitate to contact me using the <em>Contact</em> link at the bottom of the page. Once we've cleared everything, I'll remove your vector and use another one.</dd>

    <dt>You're missing <em>[some pony from the show]</em>!</dt>
    <dd>I have to admit, I <em>kinda</em> stopped working on this. It's pretty much feature complete, so the only thing I can really add to it now is more ponies, and that aspect isn't the most interesting part of the project. That doesn't mean I won't ever update it again, as I may add one or two ponies from time to time, but don't expect some grand update with tons of ponies added at any point.</dd>

    <dt>But! You're missing <em>[some pony from the show you feel is super important]</em>! What's the point of all this if you don't even have <em>[the aforementioned pony]</em>?</dt>
    <dd>If I get a request for a pony in particular, I may have more motivation to add them. Feel free to send me an email with what pony you'd like to be added. Keep in mind that pony has to be <strong>from the show</strong>! Oh, and if you can add a link to a few vectors of the pony you want, so I don't have to hunt them down myself, that'd be swell.</dd>

    <dt>Oh! Can you add <em>[my really great OC]</em> or <em>[that pony from some fanfic]</em>?</dt>
    <dd>Sorry, no can do. If I start adding everyone's OC, or all the fan-created ponies from fanfics, videos and drawings, the list would be endless...Okay, Fausticorn is technically an OC who never appeared on the show, but I think you get a free pass when you're the <em>creator</em> of the whole show.</dd>

    <dt>Shouldn't the CMC have their cutie mark?</dt>
    <dd>When I first added them, they didn't have their cutie mark yet. Now I'm too lazy to redo their vector. They will forever be blank flanks here!</dd>

    <dt>Some combinations look really weird.</dt>
    <dd>Since a lot of the process is automatic, some combinations may end up just looking extremely silly. I like to think it's part of the charm. Also, keep in mind that we're so used to how some ponies look that seeing them with a wildly different colour scheme is just going to look weird. Using Rainbow Dash's scheme on anyone usually results in something quite...unusual.</dd>

    <dt>One combination in particular looks <strong>really</strong> weird. I think there's something wrong, even.</dt>
    <dd>If it looks that weird, then it may be from an error in how the program works, or how I created the image. Send me an email with the combination you used or a link to it, and what the issue seems to be, and I'll see what I can do.<br>
    <em>(And in case you're wondering, what happens when you select the same character twice isn't a bug, it's intended!)</em></dd>
</dl>

<em>Technical stuff</em>
<dl>
    <dt>You say the application is under the GPL, but I don't see any way to get the whole code anywhere.</dt>
    <dd>You can get the full source code at <a href="https://github.com/Tailszefox/Pony-Fusion">https://github.com/Tailszefox/Pony-Fusion</a>. It's a git repository, so you're free to do whatever you want that you usually do with git repositories!</dd>

    <dt>Can I fork that repository and make my own version?</dt>
    <dd>Feel free! That's what the GPL is for.</dd>

    <dt>Do you accept pull requests?</dt>
    <dd>I can if the change made is really important or corrects a critical flaw. Otherwise, I prefer not to: if you see a small thing that you would like changed, don't hesitate to contact me instead and I'll see if the change in question can be done.</dd>

    <dt>Where's that little GPL icon from?</dt>
    <dd><a href="http://becomingaglider.wordpress.com/2010/08/25/a-change-of-copyright-plus-free-gpl-banner/">http://becomingaglider.wordpress.com/2010/08/25/a-change-of-copyright-plus-free-gpl-banner/</a>. This icon is under the <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.</dd>

    <dt>So did you do each individual combination yourself?</dt>
    <dd>Fortunately, no. With the number of ponies, that would amount to...well, quite a lot. The process of swapping the colours is automated. The only thing that is done manually is creating a palette for each pony. See the answer below for more details.</dd>

    <dt>So how does the recolouring works?</dt>
    <dd>Basically: I reduce all the vectors to a limited set of colours. <em>aka</em> a palette. Each pony has its own palette. I make sure that each palette contains the same number of colours, and that each colour at a particular place in the palette always represents the colour of the same thing. For example, colour 0 in the palette is always the coat's colour, colour 5 is the eyes' colours, etc. Each pony ends up with a total of 15 colours in their palette, though some ponies have slightly less colours. In this case, and to keep things consistent, the colours are just duplicated.<br />What the application does is load the image of the pony you want, then load the image of the pony whose colour scheme you want to use. It then extracts the palette from the second image, and swaps it with the palette of the first one. Since all the colours correspond to the same element, each one gets the appropriate colour even when swapped. Thus, the colours of the coat are swapped, as well as the colours of the cutie mark (or lack of), etc. The process itself is pretty simple in the end, but it requires a bit of tinkering with the original image to make sure it can be reduced to the appropriate number of colours, and to make sure the palette is ordered correctly.</dd>

    <dt>What about the names of the fusions?</dt>
    <dd>Those are also mostly automatic. Each pony's name is separated into two parts. The applications takes the first part of the name for the pony selected on the left, and appends to it the second part of the name of the pony selected on the right. Which often ends up with something completely silly. This is also why combinations taking Applejack and Apple Bloom as a base have the same name: the first part of their name is the same, "Apple". I wonder why. Probably something to do with how they like pears.</dd>
</dl>

<em>And just in case...</em>
<dl>
    <dt>I have another question that's not covered in the FAQ.</dt>
    <dd>I'll be happy to answer it directly: just use the <em>Contact</em> link at the bottom and we'll see how it goes.</dd>
</dl>
<?php
if(!isset($faqIncluded))
{
?>
<p><a href="index.php">Back</a></p>

</body>
</html>
<?php
}
?>