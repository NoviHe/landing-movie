<?php
define('DEVELOPMENT_ENVIRONMENT', false);

// define('BASE_PATH', 'http://localhost/landing-novi2');
// define('URL_WEBSITE', 'http://landing-novi2.test');
// define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

define('BASE_PATH', 'https://nvireview.com');
define('URL_WEBSITE', 'https://nvireview.com');
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/public');

define('DEFAULT_CONTROLLER', 'home');
define('SITES_URL', $_SERVER['HTTP_HOST']);

define('DB_NAME', 'db_novi'); // Data base Name
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

define('TIMEZONE', 'Asia/Jakarta');

//================================================================================================
define('FAVICON', 'favicon.png');
//================================================================================================
define('SITE_LOGO', 'NviReview Stream Free Movies & TV Shows');
define('SITE_NAME', 'NviReview');
define('SITE_DESCRIPTION', 'Browse and Watch all your favorite online movies &amp; series for free!');
define('SITE_KEYWORDS', 'full movie, full episode, full hd movie, free download');
define('OFFER_LINK1', 'https://www.a2adjk.com/cmp/KJB3MG1/27W1G/?sub1=');
define('OFFER_LINK2', 'https://www.a2adjk.com/cmp/KJB3MG1/27W1G/?sub1=');
define('HISTATS_ID', '4802318');
//================================================================================================
define('TVDB_SEARCH', 'true');
define('CACHE', true);
define('_SEO', 'true');
define('_STT', 'true');
define('PROTECT_CONTENT', 'true'); // disable klik kanan, block text, copy paste pada halaman LP
define('SEARCH_URL', 'true');
define('URL_END', '.html');

$alt_country2 = array(
    /*
    |--------------------------------------------------------------------------
    | Contoh Penulisan Country Code
    |--------------------------------------------------------------------------
    | 'US', 'GB', 'UK'
    | Contoh Dibawah Menandakan Negara ID (Indonesia) dan MY (Malaysia) 
    | Offer Link nya akan di redirect ke Offer Kedua
    |
    */

    'ID', 'MY', 'MX', 'RU'
);
