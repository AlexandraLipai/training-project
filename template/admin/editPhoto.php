<div class="row"><div class="col-md-2"></div><div class="col-md-6">
        <h1>Редактировать фото</h1>
            <img src="/style/images/photos/<?=$photoById['link']?>" class="thumbnail">

                <form action="/admin/photos/edit/<?=$photoById['id_img']?>" method="POST">

                    <input type="text" name="description" value="<?=$photoById['description']?>" placeholder="description"><br><hr>


                    <a href="/admin/photos"><img src="/style/admin/prev-1.gif"></a>
                    <button type="submit" name="edit" class="btn btn-default">Редактировать</button>


                </form>
            </div>
        </div>

</div>