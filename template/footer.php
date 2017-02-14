<footer>
        <?php
        if ($_SESSION && $_SESSION['user']['status_client'] == 'admin'){?>
                <div class="wrap block-2"><a href="/admin/" class="button">ADMIN PANEL</a></div>
        <?php } ?>
        <p> <a href="#">UP</a></p>
        <p>© <?=date('Y'); ?> Fitness Club</p>

</footer>
</div>
<script>
    Cufon.now();
</script>
</body>
</html>