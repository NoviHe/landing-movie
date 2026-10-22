<?php

use application\controllers\MainController;

#[\AllowDynamicProperties]
class HomeController extends MainController
{
    function __construct()
    {
        $this->api('tmdb');
    }

    public function index()
    {
        $this->template('index', array(
            'popularMovies' => $this->tmdb->getDataMovies('getPopularMovies', 'popular_m_'),
            'nowPlaying' => $this->tmdb->getDataMovies('getNowPlayingMovies', 'now_playing_m_'),
            'upComing' => $this->tmdb->getDataMovies('getUpcomingMovies', 'up_coming_m_'),
            'topRated' => $this->tmdb->getDataMovies('getTopRatedMovies', 'top_rated_m_'),
            'popularTv' => $this->tmdb->getDataTv('getPopularTVShows', 'popular_tv_'),
            'airingToday' => $this->tmdb->getDataTv('getAiringTodayTVShows', 'airing_today_tv_'),
            'onTheAir' => $this->tmdb->getDataTv('getOnTheAirTVShows', 'on_the_air_tv_'),
        ));
    }

    function genre($id, $dirName = 'genre', $page = 1)
    {
        if (!empty($id)) {
            $data = $this->tmdb->getDataGenre($id, 'getGenreMovies', 'genre_' . $id . '_', $page);
            $hack_title = ucwords((string)$dirName) . ' Movies | ' . SITE_NAME;
            $pages = ($page != 1) ? ' Pages ' . $page : '';
            $this->template('category', array(
                'genres' => $data,
                'hack_title' => $hack_title,
                'nameGenre' => $dirName,
                'idGenre' => $id,
                'page' => $page,
                'pages' => $pages,
            ));
        } else {
            return $this->redirect('home');
        }
    }

    public function error($kode = '404')
    {
        $hack_title = 'Nothing Found ' . $kode;

        return $this->template($kode, array(
            'hack_title' => $hack_title,
        ));
    }

    public function dmca_notice()
    {
        $this->template('page/dmca_notice', array(
            'hack_title' => 'DMCA Notice | ' . SITE_NAME,
        ));
    }

    public function privacy_policy()
    {
        $this->template('page/privacy_policy', array(
            'hack_title' => 'Privacy Policy | ' . SITE_NAME,
        ));
    }

    public function contact_us()
    {
        $this->template('page/contact_us', array(
            'hack_title' => 'Contact Us | ' . SITE_NAME,
        ));
    }
}
