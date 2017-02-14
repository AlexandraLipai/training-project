<div class="row">
    <div class="col-md-2"></div><div class="col-md-6">
        <h1>Список пользователей</h1>

        <h2>Всего пользователей: <?=$countUsers?></h2>
            <table class="table table-hover">
                <tr>
                    <th>ID</th><th>EMAIL</th><th>NAME</th><th>SURNAME</th><th>STATUS</th></tr>



                <?php
                foreach ($listUsers as $key => $value ) {?>
                <tr>
                    <td><?=$value['id_client']?></td>
                    <td><?=$value['email']?></td>
        <td><?=$value['name']?></td>
    <?php
                        if ($value['surname'] === null){
                            echo "<td><span> - </span></td>";
                        }else{
                            echo "<td>".$value['surname']."</td>";
                        }
                        ?>

                    <td><?=$value['status_client']?></td>
                </tr >
                    <?php } ?>
            </table>
        </div>
    </div>
</div>