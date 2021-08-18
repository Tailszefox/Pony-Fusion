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
    <dd>It applies the color scheme of one pony to another pony. With the list on the left, you pick which pony you want to recolor. With the list on the right, you pick which pony's color scheme you want to use. Voilà! You'll get a brand new pony with some weird colors.</dd>

    <dt>So it takes the colors from one pony, and then dyes another pony with it?</dt>
    <dd>Basically.</dd>

    <dt>This looks a lot like <a href="http://pokemon.alexonsager.net/">Pokémon Fusion</a>. Except with ponies.</dt>
    <dd>Pony Fusion is heavily inspired by Pokémon Fusion. The idea and part of the layout were used as a base to create this ponified version. All of the code is original, though: nothing was actually taken from Pokémon Fusion, apart from the idea.</dd>

    <dt>Unlike Pokémon Fusion, the ponies don't swap their faces or their cutie marks or something else!</dt>
    <dd>It would be a bit harder to do something like that, and I'm not really sure how the faces could be swapped. The cutie marks, now that sounds more doable, but I can't really think of an easy and efficient way to do that. Sorry, you'll have to stick to just seeing ponies with weird colors I'm afraid!</dd>

    <dt>Can I use the result of one of the fusions somewhere else?</dt>
    <dd>You can share a link to this page anywhere you want, of course. As for the image itself, I don't hold any right to what the application creates. Just make sure to click the source link to check what the creator of the original vector allows you to do with it.</dd>

    <dt>One of the vectors you used is mine, and I'd like you to remove it.</dt>
    <dd>No issue! I made sure that I could use all the vectors I put here, and I take care to put a link back to the original, but if I made a mistake or if the conditions changed, don't hesitate to contact me using the <em>Contact</em> link at the bottom of the page. Once we've cleared everything, I'll remove your vector and use another one.</dd>

    <dt>You're missing <em>[some pony from the show]</em>. Could you add them?</dt>
    <dd>Unfortunately nowadays my interest in MLP isn't at all what it used to be. As such I haven't watched the more recent episodes, or even the movie, and I don't really plan on keeping up with the IP at this point. So there's a lot of characters I don't know anything about, and I don't really have any motivation to add them. The current version pretty much already has all the ponies I care about, I don't really plan on adding any more at this point.</dd>

    <dt>But I really want <em>[some pony in particular]</em>! Or, can you add <em>[my really great OC]</em> or <em>[that pony from some fanfic]</em>?</dt>
    <dd>I'm sorry to say, but at this point, if you want to add more ponies, you'll have to host your own instance and add them yourself. Check out the <em>Technical stuff</em> section below if you want more info on how to do that. Keep in mind you'll need to have a server to host your own instance on - if you don't have that there isn't much you can do.</dd>

    <dt>Shouldn't the CMC have their cutie mark?</dt>
    <dd>When I first added them, they didn't have their cutie mark yet. Now I'm too lazy to redo their vector. They will forever be blank flanks here!</dd>

    <dt>Some combinations look really weird.</dt>
    <dd>Since a lot of the process is automatic, some combinations may end up just looking extremely silly. I like to think it's part of the charm. Also, keep in mind that we're so used to how some ponies look that seeing them with a wildly different color scheme is just going to look weird. Using Rainbow Dash's scheme on anyone usually results in something quite...unusual.</dd>

    <dt>One combination in particular looks <strong>really</strong> weird. I think there's something wrong, even.</dt>
    <dd>If it looks that weird, then it may be from an error in how the program works, or how I created the image. Send me an email with the combination you used or a link to it, and what the issue seems to be, and I'll see what I can do.<br>
    <em>(And in case you're wondering, what happens when you select the same character twice isn't a bug, it's intended!)</em></dd>
</dl>

<em>Technical stuff</em>
<dl>
    <dt>Where can I get the source code?</dt>
    <dd>You can get the full source code at <a href="https://github.com/Tailszefox/Pony-Fusion">https://github.com/Tailszefox/Pony-Fusion</a>. It's a git repository, so you're free to do whatever you want that you usually do with git repositories!</dd>

    <dt>Can I fork that repository and make my own version? Can I host my own instance somewhere else?</dt>
    <dd>Feel free! That's what the GPL is for. If you're hosting your own instance on your own server, I'd appreciate a link to the original version. Not mandatory, but nice! Maybe also change the "Contact" link on the main page so people don't try to email me if there's an issue with your instance.</dd>

    <dt>Do you accept pull requests?</dt>
    <dd>As I consider this project done and do not plan to make any more changes besides small bug fixes, I'm afraid I don't. Unless it's a fix to a security flaw (which I hope this project doesn't have, that would be quite a feat to have a security flaw in something so simple).</dd>

    <dt>Where's that little GPL icon from?</dt>
    <dd><a href="http://becomingaglider.wordpress.com/2010/08/25/a-change-of-copyright-plus-free-gpl-banner/">http://becomingaglider.wordpress.com/2010/08/25/a-change-of-copyright-plus-free-gpl-banner/</a>. This icon is under the <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.</dd>

    <dt>So did you do each individual combination yourself?</dt>
    <dd>Fortunately, no. With the number of ponies, that would amount to...well, quite a lot. The process of swapping the colors is automated. The only thing that is done manually is creating a palette for each pony. See the answer below for more details.</dd>

    <dt>So how does the recoloring works?</dt>
    <dd>Basically: I reduce all the vectors to a limited set of colors, <em>aka</em> a palette. Each pony has its own palette. I make sure that each palette contains the same number of colors, and that each color at a particular place in the palette always represents the color of the same thing. For example, color 0 in the palette is always the coat's color, color 5 is the eyes' colors, etc. Each pony ends up with a total of 15 colors in their palette, though some ponies have slightly less colors. In this case, and to keep things consistent, the colors are just duplicated.<br />What the application does is load the image of the pony you want, then load the image of the pony whose color scheme you want to use. It then extracts the palette from the second image, and swaps it with the palette of the first one. Since all the colors correspond to the same element, each one gets the appropriate color even when swapped. Thus, the colors of the coat are swapped, as well as the colors of the cutie mark (or lack of), etc. The process itself is pretty simple in the end, but it requires a bit of tinkering with the original image to make sure it can be reduced to the appropriate number of colors, and to make sure the palette is ordered correctly.</dd>

    <dt>What about the names of the fusions?</dt>
    <dd>Those are also mostly automatic. Each pony's name is separated into two parts. The applications takes the first part of the name for the pony selected on the left, and appends to it the second part of the name of the pony selected on the right. Which often ends up with something completely silly. This is also why combinations taking Applejack and Apple Bloom as a base have the same name: the first part of their name is the same, "Apple". I wonder why. Probably something to do with how they like pears.</dd>

    <dt>So I made my own instance and would like to create new images or add new ponies to the list. How do I do that?</dt>
    <dd>Have a look at <a href="https://github.com/Tailszefox/Pony-Fusion/blob/master/tutorial/tutorial.md">this tutorial</a>! Keep it mind adding a new image can be pretty time consuming, especially at first. If you've got any issue even after following the tutorial, send me an email and I'll see if I can help.</dd>
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