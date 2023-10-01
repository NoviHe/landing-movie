<?php
/*
    |--------------------------------------------------------------------------
    | Page View URL = Default is 'view'
    |--------------------------------------------------------------------------
    | example = https://domain.com/view/contact/
    | if you want change this, please rename folder "view" on folder /oc-content/themes/themes-name/view
    */
define('URL_PAGE', 'p');
/*
    |--------------------------------------------------------------------------
    | Movie URL = Default is 'movie'
    |--------------------------------------------------------------------------
    | example = https://domain.com/movie/294254/maze-runner-the-scorch-trials.html
    */
define('URL_MOVIE', 'movie');
/*
    |--------------------------------------------------------------------------
    | TV Show URL = Default is 'tv'
    |--------------------------------------------------------------------------
    | example = https://domain.com/tv/1418/the-big-bang-theory.html
    */
define('URL_TV', 'tv');
/*
    |--------------------------------------------------------------------------
    | TV Show URL (TVDB API)
    |--------------------------------------------------------------------------
    | example = https://domain.com/tv/watching/1418
    */
define('URL_TVDB', 'series');
/*
|--------------------------------------------------------------------------
| Sport Landing Page URL
|--------------------------------------------------------------------------
| example = https://domain.com/live-sports
*/
define('URL_SPORT', 'live');
/*
|--------------------------------------------------------------------------
| thetvdb.com Api
|--------------------------------------------------------------------------
| example :
| define('API_KEY', "api1,api2,api3,api4,api5");
*/
define('API_KEY', "f8326d48ac9c189a451234ec0f4d9a88");
/*
|--------------------------------------------------------------------------
| thetvdb.com Api
|--------------------------------------------------------------------------
| example = "api1,api2,api3,api4,api5"
*/
define('TVDB_API', '227B7DD4A0CCF2F1');
/*
|--------------------------------------------------------------------------
| DMCA URL LINK
|--------------------------------------------------------------------------
| Example = "https://domain.com/xxxx.html
https://domain.com/xxxx.html
https://domain.com/xxxx.html"
| 
| Separate by new line/Pisahkan dengan baris baru seperti diatas
|
*/
define('DMCA', "https://next-episode.tv-seriesonline.com/series/321827");


define('MOVIE_TITLE_AWAL', array(
    'Watch ',
    'Watching ',
));

define('MOVIE_TITLE_AKHIR', array(
    'Full Movie Online Free',
    'Full HD Blueray',
    'Blueray'
));

define('TV_TITLE_AWAL', array(
    'Watch ',
    'Watching ',
));

define('TV_TITLE_AKHIR', array(
    'HD free TV Show',
));
