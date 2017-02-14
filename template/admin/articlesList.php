<div class="row"><div class="col-md-2"></div><div class="col-md-8">
        <?php foreach ($cutAllNewsList as $number => $array):?>

            <table>
                <tr>
                    <td><span class="h3"><?=$array['name_of_news']?></span><br><?=substr($array['news'],0,200).'...'?></td>
                    <td><img src="/style/images/articles/preview/<?=$array['picture']?>"></td>
                </tr>
            </table>
            <form method="POST" action="/admin/articles/page/<?=$id?>">
                    <input name="id" type="hidden" value="<?=$array['id_news']?>">
                    <input name="pathPhoto" type="hidden" value="<?=$array['picture']?>">
                <a class="btn btn-primary btn-lg active" role="button" href="<?="/admin/articles/edit/".$array['id_news']?>" >     Edit  news   </a>
                <button class="btn btn-primary btn-lg active" name="delete">Delete</button>
            </form>

<hr><br>
        <?php endforeach; ?>

        <div class="row">
        <ul class="pagination">
            <?php foreach ($paginator as $number => $value):?>
            <li><a href="<?="/admin/articles/page/".$value?>"><?=$value?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
    </div></div>