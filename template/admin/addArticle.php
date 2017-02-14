<div class="row"><div class="col-md-2"></div><div class="col-md-6">
        <h1>Добавить новость</h1>
        <?php
        if (isset($_POST['add']) && is_array($result)){?>
            <div>
                <?php
                foreach ($result as $key => $err){
                    echo "<p>- ".$err."</p>";
                }
                ?>
            </div>
            <?php
        }
        ?>

            <form action="#" method="post" enctype="multipart/form-data">

                    <input name="title" type="text" placeholder="title" value="<?=@$_POST['title']?>"><br><br>

                <input type="file" name="image"><br>

                    <textarea name="content" class="form-control" rows="10" cols="10" placeholder="content"><?=@$_POST['content']?></textarea>
                <span class="h3">Автор: <?=$_SESSION['user']['name']?></span><br><hr>

                <button type="submit" name="add"  class="btn btn-default">Добавить</button>
            </form>
        </div>
    </div>
</div>