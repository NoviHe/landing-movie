<?php
header("Content-Type: text/xml;charset=utf-8");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance" xmlns:image="https://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9 https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>https://<?= SITES_URL ?>/</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://<?= SITES_URL ?>/movie/popular</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://<?= SITES_URL ?>/movie/now_playing</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://<?= SITES_URL ?>/movie/top_rated</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://<?= SITES_URL ?>/movie/up_coming</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://<?= SITES_URL ?>/tv/airing_today</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>


    <url>
        <loc>https://<?= SITES_URL ?>/tv/popular</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>


    <url>
        <loc>https://<?= SITES_URL ?>/tv/on_the_air</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://<?= SITES_URL ?>/dmca-notice.html</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>https://<?= SITES_URL ?>/privacy-policy.html</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>https://<?= SITES_URL ?>/contact-us.html</loc>
        <lastmod><?= date('Y-m-d', strtotime(date("r"))); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <?php
    $hostname = SITES_URL;
    if ($handle = opendir(dirname(__DIR__, 1) . '/sitemap/')) :
        while (false !== ($entry = readdir($handle))) :
            if ($entry != "." && $entry != ".." && $entry != "movie" && $entry != "tv" && $entry != "index.view.php" && $entry != "error_log" && $entry != "index.php") :
                $sitemap = str_replace('view.php', 'xml', $entry);
                $hold[] = $sitemap;
            endif;
        endwhile;

        natsort($hold);
        if (is_array($hold)) :
            foreach ($hold as $key => $val) {
                echo '<url>
                        <loc>https://' . $hostname . '/' . $val . '</loc>
                        <lastmod>' . date('Y-m-d', strtotime(date("r"))) . '</lastmod>
                        <changefreq>daily</changefreq>
                        <priority>0.8</priority>
                    </url>';
            }
        endif;
    endif;
    ?>

</urlset>