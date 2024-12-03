<footer class="site-footer">
    <?php
    $footerQuery = "SELECT texto, enlaces FROM footer LIMIT 1";
    $footerResult = $db->query($footerQuery)->fetch(PDO::FETCH_ASSOC);
    if ($footerResult) {
        echo '<p>' . escape($footerResult['texto']) . '</p>';
        if ($footerResult['enlaces']) {
            $links = json_decode($footerResult['enlaces'], true);
            foreach ($links as $name => $url) {
                echo '<a href="' . escape($url) . '">' . escape($name) . '</a>';
            }
        }
    }
    ?>
</footer>
