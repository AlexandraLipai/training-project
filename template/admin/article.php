<div class="row"><div class="col-md-2"></div><div class="col-md-6">
        <h1>Редактировать новость</h1>
        <?php
        if (isset($_POST['submit']) && is_array($result)){?>
            <div class="errors">
                <?php
                foreach ($result as $key => $err){
                    echo "<p>- ".$err."</p>";
                }
                ?>
            </div>
            <?php
        }
        ?>

            <form action="/admin/articles/edit/<?=$articleItem['id_news']?>" method="post">
               <input name="title" type="text" value="<?=$articleItem['name_of_news']?>"><br><br>
               <textarea name="content" class="form-control" rows="10" cols="15"><?=$articleItem['news']?></textarea><br>
                <span class="h3">Автор: <?=$articleItem['name']?></span><br><hr>

               <a href="/admin/articles"><img src="/style/admin/prev-1.gif"></a>
                <button type="submit" name="submit" class="btn btn-default">Редактировать</button>
            </form>
    </div>
        </div>

</div>