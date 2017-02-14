<section id="content">
    <div class="container_12">
        <div class="grid_12">
            <div class="box-shadow">
                <div class="wrap block-2">
                    <div class="col-3">
                        <h2><span class="color-1">Find</span> us</h2>
                        <div class="map img-border">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4700.578574465341!2d27.520764366472754!3d53.908835116980754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xda97311536089fd3!2z0KHQntCe0J4gwqvQntCx0YDQsNC30L7QstCw0YLQtdC70YzQvdGL0Lkg0YbQtdC90YLRgCDQn9Cw0YDQutCwINCy0YvRgdC-0LrQuNGFINGC0LXRhdC90L7Qu9C-0LPQuNC5wrs!5e0!3m2!1sen!2sby!4v1483995744044" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <dl>
                            <dt class="color-1"><strong>Minsk, vulica Skryhanava 14</strong></dt>
                            <dd><span>Telephone:</span>8 029 857-27-03</dd>
                            <dd><span>E-mail:</span><a href="#" class="link">mail@gmail.com</a></dd>
                        </dl>
                    </div>
                    <div class="col-4">
                        <h2><span class="color-1">Registration</span> </h2>
                        <?php
                        if (isset($_POST['submit']) && is_array($errors)){?>
                            <div class="errors">
                                <?php
                                foreach ($errors as $key => $err){
                                    echo "<p>- ".$err."</p>";
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <form id="form" method="post" action="#">
                            <fieldset>
                                <label><input type="text" name="name" placeholder="Name" value="<?=$name?>" required></label>
                                <label><input type="text" name="surname" placeholder="Surname" value="<?=$surname?>" required></label>
                                <label><input type="text" name="email" placeholder="Email" value="<?=$email?>" required></label>
                                <label><input type="password" name="password" placeholder="Password" required></label>
                                <label><input type="password" name="password_repeat" placeholder="Repeat password" required></label>
                                <button type="submit" name="submit" class="search_button">Sign In</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>








