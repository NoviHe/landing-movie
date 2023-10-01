<?php
require_once(ROOT . '/application/functions/functions_html.php');
class TMDB
{
    const _API_URL_ = "https://api.themoviedb.org/3/";
    private $_apikey;
    private $_lang;
    private $_debug;

    public function __construct($apikey, $lang = 'en', $debug = false)
    {
        // Sets the API key
        $this->setApikey($apikey);

        // Setting Language
        $this->setLang($lang);

        // Set the debug mode
        $this->_debug = '';
    }

    function _get($url)
    {
        $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";

        if (function_exists('curl_exec')) {
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => $url,
                    CURLOPT_HEADER => 0,
                    CURLOPT_ENCODING => 'gzip,deflate',
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_CONNECTTIMEOUT => 5,
                    CURLOPT_REFERER => "https://www.facebook.com",
                    CURLOPT_AUTOREFERER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTPHEADER => $header,
                    CURLOPT_USERAGENT => "Mozilla/" . rand(3, 5) . "." . rand(0, 3) . " (Windows NT " . rand(3, 5) . "." . rand(0, 2) . "; rv:2.0.1) Gecko/20100101 Firefox/" . rand(3, 5) . ".0.1"
                ),
            );

            $url_get_contents_data = curl_exec($curl);
            curl_close($curl);
            if ($url_get_contents_data == false) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => false,
                    CURLOPT_HEADER => 0,
                    CURLOPT_URL => $url,
                ));
                $url_get_contents_data = curl_exec($curl);
                curl_close($curl);
            }
        } elseif (function_exists('file_get_contents')) {
            $url_get_contents_data = @file_get_contents($url);
        } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
            $handle = fopen($url, "r");
            $url_get_contents_data = stream_get_contents($handle);
        } else {
            $url_get_contents_data = false;
        }
        return $url_get_contents_data;
    }

    public function setApikey($apikey): void
    {
        $this->_apikey = (string) $apikey;
    }

    private function getApikey(): string
    {
        return $this->_apikey;
    }

    public function setLang($lang = 'en'): void
    {
        $this->_lang = $lang;
    }

    public function getLang(): string
    {
        return $this->_lang;
    }

    private function _call($action, $appendToResponse, $lang = '&language=en'): array
    {
        $url = self::_API_URL_ . $action . '?api_key=' . $this->getApikey() . '&' . $appendToResponse;

        $contents = $this->_get($url);
        $results = mb_convert_encoding($contents, "HTML-ENTITIES", "UTF-8");
        if ($this->_debug == 'debug') {
            echo '<pre>';
            print_r($url);
            echo '</pre>';
        }

        return json_decode(($results), true);
    }

    public function getPopularMovies($page = 1): array
    {
        return $this->_call('movie/popular', 'page=' . $page);
    }

    public function getNowPlayingMovies($page = 1): array
    {
        return $this->_call('movie/now_playing', 'page=' . $page);
    }

    public function getTopRatedMovies($page = 1): array
    {
        return $this->_call('movie/top_rated', 'page=' . $page);
    }
    public function getUpcomingMovies($page = 1): array
    {
        return $this->_call('movie/upcoming', 'page=' . $page);
    }
    public function getGenreMovies($id, $page = 1)
    {
        return $this->_call('genre/' . $id . '/movies', 'page=' . $page);
    }


    public function getLatestTVShow($page = 1): array
    {
        return $this->_call('tv/latest', 'page=' . $page);
    }
    public function getTopRatedTVShows($page = 1): array
    {
        return $this->_call('tv/top_rated', 'page=' . $page);
    }
    public function getPopularTVShows($page = 1): array
    {
        return $this->_call('tv/popular', 'page=' . $page);
    }
    public function getOnTheAirTVShows($page = 1): array
    {
        return $this->_call('tv/on_the_air', 'page=' . $page);
    }
    public function getAiringTodayTVShows($page = 1): array
    {
        return $this->_call('tv/airing_today', 'page=' . $page);
    }


    public function getMovie($idMovie, $appendToResponse = 'append_to_response=trailers,images,credits,translations,similar_movies,alternative_titles,keywords'): array
    {
        return $this->_call('movie/' . $idMovie, $appendToResponse);
    }

    public function getTVShow($idTVShow, $appendToResponse = 'append_to_response=trailers,images,credits,translations,alternative_titles,keywords'): array
    {
        return $this->_call('tv/' . $idTVShow, $appendToResponse);
    }
    public function getTVSeason($idTVShow, $season = '', $appendToResponse = 'append_to_response=trailers,images,credits,translations,alternative_titles,keywords'): array
    {
        return $this->_call('tv/' . $idTVShow . $season, $appendToResponse);
    }


    public function searchMovie($movieTitle, $page = 1): array
    {
        return $this->_call('search/movie', 'query=' . urlencode($movieTitle) . '&page=' . $page, $this->getLang());
    }

    public function searchTv($tvTitle, $page = 1): array
    {
        return $this->_call('search/tv', 'query=' . urlencode($tvTitle) . '&page=' . $page, $this->getLang());
    }
}
