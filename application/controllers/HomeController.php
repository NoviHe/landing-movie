<?php

use application\controllers\MainController;

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
            $hack_title = ucwords($dirName) . ' Movies | ' . SITE_NAME;
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
        $hack_title = 'DMCA Notice | ' . SITE_NAME;
        $hack_description = "If you believe that your copyrighted work has been copied in a way that constitutes copyright infringement and is accessible on this site.";

        $this->template('page/dmca_notice', array(
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
        ));
    }

    public function privacy_policy()
    {
        $hack_title = 'Privacy Policy | ' . SITE_NAME;
        $hack_description = "If you require any more information or have any questions about our privacy policy, please feel free to contact us by email at info@" . SITES_URL . '.';

        $this->template('page/privacy_policy', array(
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
        ));
    }

    public function contact_us()
    {
        $hack_title = 'Contact Us | ' . SITE_NAME;
        $hack_description = "Please feel free to contact us using the form below.";

        $this->template('page/contact_us', array(
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
        ));
    }
    
    public function loading()
    {
        $sub_id = !empty($_GET['sub_id']) ? $_GET['sub_id'] : '';
        $view = $this->view('register');
        $view->bind('sub_id', $sub_id);
    }
}
