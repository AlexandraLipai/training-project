<div class="grid_12 top-1">
    <div class="block-1 box-shadow">
        <p class="font-3">Read reviews of our fitness club <span class="color-1"><a href="#">here</a></span></p>
    </div>
</div>
<div class="grid_12 top-1">
    <div class="box-shadow">
        <div class="wrap block-2">

            <div class="col-1">
                <h2 class="p3"><span class="color-1">Latest</span> news</h2>


                    <?php
                    foreach ($newsList as $key => $value){?> <div class="wrap block-2">
                    <a href="/news/news/<?=$value['id_news']?>">
                    <img src="/style/images/articles/preview/<?=$value['picture']?>" alt="" class="img-border img-indent">
                    <div class="extra-wrap">
                        <p class="p2"><strong><?=$value['name_of_news']?></strong> </p>
                        <p><?=substr($value['news'],0,200).'...'?></p></div> </a><br><br></div><?php }
                    ?>

                <a href="/news/">All</span> news</a>

               <h5><a href="/xmli/">Read more news of sport in the world</a></h5>
                </div>

            <div class="col-2">
                <h2 class="p3"><span class="color-1">Programs</span></h2>
                <ul class="list-1">
                    <li><a href="#">Pilates</a></li>
                    <li><a href="#">Stretching</a></li>
                    <li><a href="#">Zumba</a></li>
                </ul>
                <div class="form-search">
                    <h2><span class="color-1">Search</span></h2>
                    <form action="/search" id="form-search" method="post">
                        <input type="search" name="query" value="<?=@$_POST['query']?>">
                        <button type="submit" class="search_button" name="searchQuery">Search</button>
                    </form> </div>



                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
</div>
</section>
