<?php

use application\controllers\MainController;

class MovieController extends MainController
{
    function __construct()
    {
        $this->api('tmdb');
    }

    public function index()
    {
        return $this->redirect('home');
    }

    public function watch($id = null)
    {
        if (!empty($id)) {
            $data = $this->tmdb->getDataMovie($id);
            $this->template('movie', array(
                'data' => $data,
                'hack_title' => $data['hack_title'],
                'hack_description' => $data['hack_description'],
                'nowPlaying' => $this->tmdb->getDataMovies('getNowPlayingMovies', 'now_playing_m_'),
            ));
        } else {
            return $this->redirect('home');
        }
    }

    public function popular($page = 1)
    {
        $hack_title = 'Most Popular Movies | ' . SITE_NAME;
        $hack_description = 'See a full list of Popular Movies on ' . SITES_URL;
        $pages = ($page != 1) ? ' Pages ' . $page : '';

        $this->template('movies/popular', array(
            'data' => $this->tmdb->getDataMovies('getPopularMovies', 'popular_m_', $page),
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
            'page' => $page,
            'pages' => $pages,
        ));
    }

    public function now_playing($page = 1)
    {
        $hack_title = 'Now Playing Movies | ' . SITE_NAME;
        $hack_description = 'See a full list of Now Playing Movies at Theater on ' . SITES_URL;
        $pages = ($page != 1) ? ' Pages ' . $page : '';

        $this->template('movies/now_playing', array(
            'data' => $this->tmdb->getDataMovies('getNowPlayingMovies', 'now_playing_m_', $page),
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
            'page' => $page,
            'pages' => $pages,
        ));
    }

    public function top_rated($page = 1)
    {
        $hack_title = 'Top Rated Movies | ' . SITE_NAME;
        $hack_description = 'Highest-rated movies based on votes by ' . SITES_URL;
        $pages = ($page != 1) ? ' Pages ' . $page : '';

        $this->template('movies/top_rated', array(
            'data' => $this->tmdb->getDataMovies('getTopRatedMovies', 'top_rated_m_', $page),
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
            'page' => $page,
            'pages' => $pages,
        ));
    }

    public function up_coming($page = 1)
    {
        $hack_title = 'New Movies Coming Soon | ' . SITE_NAME;
        $hack_description = 'Check out the latest new movies coming soon to theaters';
        $pages = ($page != 1) ? ' Pages ' . $page : '';

        $this->template('movies/up_coming', array(
            'data' => $this->tmdb->getDataMovies('getUpcomingMovies', 'up_coming_m_', $page),
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
            'page' => $page,
            'pages' => $pages,
        ));
    }
}
