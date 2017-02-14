<section id="content">
    <div class="container_12">
        <div class="grid_12">
            <div class="grid_12 top-1">

                <div class="box-shadow">
                    <div class="wrap block-2">


                            <h2 class="p3"><span class="color-1">Read</span> more news of sport</h2>

                            <?php
                            //$xml = simplexml_load_file('rss.xml');
                            $xml = simplexml_load_file('http://news.tut.by/rss/sport.rss');
                            foreach ($xml->channel->item as $item)
                            {
                                foreach ($item->children() as $a=>$child)
                                {
                                    echo $a."=".$child."<br>";
                                }
                                echo "<br>";
                            }
                            ?>


                        </div>

                        </div>


                        </div>
                    </div>

                </div>

</section>