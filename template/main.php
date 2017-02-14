<section id="content">
    <div class="container_12">
        <div class="grid_12">
            <div class="grid_12 top-1">

                    <div class="box-shadow">
                        <div class="wrap block-2">

    <div class="col-1">
            <h2 class="p3"><span class="color-1">Our</span> news</h2>

        <?php foreach ($cutAllNewsList as $number => $array):?><div class="wrap block-2">
        <a href="<?="/news/news/".strtolower($array['id_news'])?>" >
            <img src="/style/images/articles/preview/<?=$array['picture']?>" alt="" class="img-border img-indent">
            <div class="extra-wrap">
                    <p class="p2"><strong><?=$array['name_of_news']?></strong></p>
                <p><?=substr(htmlspecialchars_decode($array['news']),0,200).'...'?></p>
            </div>
        </a><br><br>
            </div><?php endforeach; ?>
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
        <div class="pagination">
            <?php foreach ($paginator as $number => $value):
            if ($value == $pageNumber):?>
           <span class="color-1"><?=$value?></span>
            <?php else:?>
            <a href="<?="/news/".$value?>"><?=$value?></a>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
            </div>
    </div>
</section>