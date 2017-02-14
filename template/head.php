<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fitness-club</title>
    <link rel="stylesheet" type="text/css" media="screen" href="/style/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/style/css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/style/css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/style/css/slider.css">

    <script src="/style/js/jquery-1.7.min.js"></script>
    <script src="/style/js/jquery.easing.1.3.js"></script>
    <script src="/style/js/tms-0.3.js"></script>
    <script src="/style/js/tms_presets.js"></script>
    <script src="/style/js/cufon-yui.js"></script>
    <script src="/style/js/Asap_400.font.js"></script>
    <script src="/style/js/Coolvetica_400.font.js"></script>
    <script src="/style/js/Kozuka_M_500.font.js"></script>
    <script src="/style/js/cufon-replace.js"></script>
    <script src="/style/js/FF-cash.js"></script>
    <script>
        $(window).load(function(){
            $('.slider')._TMS({
                prevBu:'.prev',
                nextBu:'.next',
                pauseOnHover:true,
                pagNums:false,
                duration:600,
                easing:'easeOutQuad',
                preset:'Fade',
                slideshow:2000,
                pagination:'.pagination',
                waitBannerAnimation:false,
                banners:'fade'
            })
        })
    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/style/js/html5.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="/style/css/ie.css">
    <![endif]-->

    <link rel="alternate" type="application/rss+xml" title="RSS" href="rss.xml" />
</head>