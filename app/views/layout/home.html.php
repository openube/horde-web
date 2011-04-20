<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $this->page_title?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['host_base'] ?>/css/horde.css" media="screen">
<link rel="SHORTCUT ICON" type="image/x-icon" href="<?php echo $GLOBALS['host_base'] ?>/images/favicon.ico" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/slides.min.jquery.js"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-22320801-1']);
_gaq.push(['_trackPageview']);

if (document.location.host.indexOf('horde.org') != -1) {
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
}
</script>
<script type="text/javascript">
$(function(){
    $('#slides').slides({
        preload: true,
        play: 5000,
        pause: 2500,
        hoverPause: true,
        effect: 'fade'
    });
});
</script>
</head>
<body>
    <div class="area">
        <div class="inside">
            <?php echo $this->render('banner'); ?>
            <?php echo $this->contentForLayout ?>
            <?php echo $this->render('footer', array('locals' => array('quote' => $this->quote)));?>
        </div>
    </div>
</body>
<!-- Don't include yet, it's based on prototypejs -->:q

<!--<script src="js/informer.js"></script>-->
</html>