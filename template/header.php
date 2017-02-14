<div class="main">
    <div class="bg-img"></div>

<header>
        <h1><a href="/">Fitness <strong>Club.</strong></a></h1>
    <!--menu-->
    <nav>
        <div class="social-icons">
            <a href="http:\\facebook.com" class="icon-2"></a>
            <a href="http:\\twitter.com" class="icon-1"></a>

        </div>



        <ul class="menu">
            <li><a href="/news/">NEWS</a></li>
            <li><a href="/photos/">GALLERY</a></li>
            <li><a href="/form/">FEEDBACK</a></li>


<?php
if ($_SESSION){?>
    <li><a href="/user/logout">LOG OUT</a></li>
    <li><a href="#">MY FITNESS CLUB</a></li>


    <?php
}else{?>

        <li><a href="/user/login/">LOG IN</a></li>
        <li><a href="/user/register/">SIGN UP</a></li>
            <?php }
?>
            <li><a href="/rss.xml"><img src="/style/images/rss.png" alt=""></a></li>
    </ul>
    </nav>

</div>
</header>


