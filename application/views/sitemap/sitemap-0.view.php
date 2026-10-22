<?php
if (!headers_sent()) { header("Content-Type: text/xml;charset=utf-8"); }
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>https://<?= SITES_URL ?>/sitemap.xml</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <?php
    if (!empty($recent_post) && is_iterable($recent_post)) :
        $date = date('Y-m-d');
        foreach ($recent_post as $sitemap) :
            $title = is_array($sitemap) ? ($sitemap['title'] ?? '') : (string)$sitemap;
            $link = url_search($title);
            echo '<url>
                    <loc>' . htmlspecialchars($link) . '</loc>
                    <lastmod>' . $date . '</lastmod>
                    <changefreq>weekly</changefreq>
                    <priority>0.8</priority>
                </url>';
        endforeach;
    endif;
    ?>

</urlset>
