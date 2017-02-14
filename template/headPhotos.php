<!DOCTYPE html>
<head>
<title>Gallery</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="/style/css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="/style/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="/style/css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="/style/css/demo.css">
<script src="/style/js/jquery-1.7.min.js"></script>
<script src="/style/js/jquery.easing.1.3.js"></script>
<script src="/style/js/uCarousel.js"></script>
<script src="/style/js/tms-0.4.1.js"></script>
<script src="/style/js/cufon-yui.js"></script>
<script src="/style/js/Asap_400.font.js"></script>
<script src="/style/js/Coolvetica_400.font.js"></script>
<script src="/style/js/Kozuka_M_500.font.js"></script>
<script src="/style/js/cufon-replace.js"></script>
<script src="/style/js/FF-cash.js"></script>

<script>
    $(document).ready(function(){
        $('.gallery')._TMS({
            show:0,
            pauseOnHover:true,
            prevBu:'.prev',
            nextBu:'.next',
            playBu:'.play',
            duration:700,
            preset:'fade',
            pagination:$('.img-pags').uCarousel({show:4,shift:0}),
            pagNums:false,
            slideshow:7000,
            numStatus:true,
            banners:false,
            waitBannerAnimation:false,
            progressBar:false
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
</head>
<body>
<div class="main">
    <div class="bg-img"></div>