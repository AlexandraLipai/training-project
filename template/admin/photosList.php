<div class="row">
    <?php
            foreach ($allPhotos as $key => $value){?><div class="col-xs-6 col-md-3">
                <a href="/admin/photos/edit/<?=$value['id_img']?>"class="thumbnail">
                    <img src="/style/images/photos/<?=$value['link']?>">
                    <div class="thumbnail">Description: <?=strtoupper($value['description'])?></div>
                </a> </div>
            <?php } ?>
</div>

<ul class="pagination">
        <?php
        foreach ($paginator as $number => $value){
            if ($value == $id){
            echo "<li><a href='#'>$value</a></li>";
            }else{?>
        <li> <a href="<?="/admin/photos/page/".$value?>"><?=$value?></a></li>
                <?php } ?>
        <?php }?>
    </ul>



</div>
</div>