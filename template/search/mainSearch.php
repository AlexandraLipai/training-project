<section id="content">
    <div class="container_12">
        <div class="grid_12">
            <div class="grid_12 top-1">
                <div class="block-1 box-shadow">
                    <p class="font-3">

    <div>
        <?php if (is_array($errors)):?>
            <div class="errors">
                <?php foreach ($errors as $key => $err):
                    echo "<p>- ".$err."</p>";
                endforeach; ?>
            </div>
            <?php die();
            endif ?>
        <div class="wrap block-2"><p class="p1">По вашему запросу найдено <?=$countFeatures[0]?> статей.</p></div>
        <?php foreach ($features as $number => $array):?>
            <a href="<?="/news/news/".$array['id_news']?>">
                <img src="/style/images/articles/preview/<?=$array['picture']?>" alt="" class="img-border img-indent">
                <div class="extra-wrap">
                    <div>
                    <p class="p2"><strong><?=$array['name_of_news']?></strong> </p>
                   <p><?=substr($array['news'],0,800).'...'?></p><br><br><br><br><br><br>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
            </div>
                </p>
    </div>
    </div>
            <div class="clear"></div>
        </div>
</section>