<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta property="fb:admins" content="509248955">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Boogie Woogie">
<meta name="description" property="og:description" content="Victory Boogie Woogie .com by Alexander Christiaan Jacob, 2013. Audience Award winner of the Elegant Algorithms contest by SETUP.">
<meta property="og:image" content="http://victoryboogiewoogie.com/apple-touch-icon-precomposed.png">
<meta property="og:title" content="Victory Boogie Woogie .com">
<meta property="og:type" content="website">
<meta property="og:url" content="http://victoryboogiewoogie.com/">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Victory Boogie Woogie .com</title>
<link rel="author" href="http://alexanderchristiaanjacob.com/" title="Alexander Christiaan Jacob">
<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
<link rel="canonical" href="http://victoryboogiewoogie.com/">
<link rel="fluid-icon" href="http://victoryboogiewoogie.com/fluid-icon.png">
<style>
*{border:0;border-radius:none;list-style:none;margin:0;outline:0;padding:0;text-decoration:none}

figure,main{display:block}
figure{background:#fff;box-shadow:2px 2px 8px rgba(0,0,0,.75);overflow:hidden;width:100%}
html{color:#666;font:normal 100%/1.5 'Times New Roman',Times,serif}
img{height:512px;vertical-align:bottom;width:100%}
main{background:#eeebe4;border:12px solid #fcf3ea;box-shadow:inset 2px 2px 12px rgba(0,0,0,.5),12px 12px 24px -2px rgba(0,0,0,.5),-12px -12px 48px -2px rgba(255,255,255,1);margin:3em auto;padding:64px;width:512px}
p{left:2em;position:absolute;text-shadow:0 .0625em .0625em rgba(0,0,0,.125);top:1.5em;z-index:999}

html:not(:hover) p{display:none}

main{
    -moz-transform:scale(.75) rotate(45deg);
    -o-transform:scale(.75) rotate(45deg);
    -webkit-transform:scale(.75) rotate(45deg);
    transform:scale(.75) rotate(45deg)
}

img{
    -moz-transform:scale(1.4142135) rotate(-45deg);
    -o-transform:scale(1.4142135) rotate(-45deg);
    -webkit-transform:scale(1.4142135) rotate(-45deg);
    transform:scale(1.4142135) rotate(-45deg)
}

html{
    background:rgb(253,246,238) no-repeat fixed;
    background-image: -moz-radial-gradient(center, ellipse cover,  rgba(253,246,238,1) 0%, rgba(158,150,129,1) 100%);
    background-image: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(253,246,238,1)), color-stop(100%,rgba(158,150,129,1)));
    background-image: -webkit-radial-gradient(center, ellipse cover,  rgba(253,246,238,1) 0%,rgba(158,150,129,1) 100%);
    background-image: -o-radial-gradient(center, ellipse cover,  rgba(253,246,238,1) 0%,rgba(158,150,129,1) 100%);
    background-image: -ms-radial-gradient(center, ellipse cover,  rgba(253,246,238,1) 0%,rgba(158,150,129,1) 100%);
    background-image: radial-gradient(ellipse at center,  rgba(253,246,238,1) 0%,rgba(158,150,129,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#fdf6ee\', endColorstr=\'#9e9681\',GradientType=1 )
}

@media(max-width:40em){
img{height:256px}
main{box-shadow:inset 1px 1px 6px rgba(0,0,0,.5),6px 6px 12px -1px rgba(0,0,0,.5),-6px -6px 24px -1px rgba(255,255,255,1);border-width:6px;padding:32px;width:256px}
}

@media projection{
html{background:#000}
}

</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36569769-9', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<p>Klik op het canvas voor een nieuwe compositie&hellip;</p>
<main>
<figure><img alt="" id="victory" src="index.svg.php"></figure></main>
<script>

var v = document.getElementById('victory');
v.onclick = function(){
    v.src = 'index.svg.php?' + Math.random();
}

</script>
</body>
</html>
