<div class="row"><div class="col-md-2"></div><div class="col-md-6">
        <h1>Добавить фото</h1>
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
            <form action="/admin/photos/add" method="post" enctype="multipart/form-data">

                    <input type="file" name="photo"><br>
                   <input type="text" name="description" placeholder="description"><br><hr>

                <button type="submit" name="add"  class="btn btn-default">Добавить</button><br><br>
            </form>

        </div>
    </div>
</div>