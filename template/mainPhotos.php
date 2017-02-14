<section id="content">
    <div class="container_12">
        <div class="grid_12">
        </div>

        <div class="grid_12 top-1">
            <div class="block-3 box-shadow">
                <h2 class="p4"><span class="color-1">Photo</span> gallery</h2>
                <div class="pag">
                    <div class="img-pags">
                        <ul>
                            <?php
                                foreach ($allPhotos as $key => $value){?>
                            <li>   <a href="/photos/<?=$value['id_img']?>" class="photo">
                                    <img src="/style/images/photos/<?=$value['link']?>"></a></li>
                            <?php } ?>
                        </ul>
                    </div>

            </div>

        <div class="clear"></div>

    <div class="block-3 box-shadow">
        <?php
        foreach ($paginator as $number => $value){
        if ($value == $numberPage){
            echo "<span class='color-1'>$value</span>";
        }else{?>
            <a href="<?="/photos/page/".$value?>"><?=$value?></a>
            <?php } ?>
        <?php }?>
    </div></div>
</div>
</section>