<?php

use application\controllers\MainController;

class TvController extends MainController
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
            $data = $this->tmdb->getDataTvShow($id);
            $this->template('tv', array(
                'data' => $data,
                'hack_title' => $data['hack_title'],
                'hack_description' => $data['hack_description'],
                'airingToday' => $this->tmdb->getDataTv('getAiringTodayTVShows', 'airing_today_tv_'),
            ));
        } else {
            return $this->redirect('home');
        }
    }

    public function popular($page = 1)
    {
        $hack_title = 'Airing (TV series) | ' . SITE_NAME;
        $hack_description = 'The easiest way to keep track of your favorite TV shows air dates. on ' . SITES_URL;
        $pages = ($page != 1) ? ' Pages ' . $page : '';

        $this->template('tv/popular', array(
            'data' => $this->tmdb->getDataTv('getPopularTVShows', 'popular_tv_', $page),
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
            'page' => $page,
            'pages' => $pages,
        ));
    }

    public function on_the_air($page = 1)
    {
        $hack_title = 'On the Air (TV series) | ' . SITE_NAME;
        $hack_description = 'The easiest way to keep track of your favorite TV shows air dates. on ' . SITES_URL;
        $pages = ($page != 1) ? ' Pages ' . $page : '';

        $this->template('tv/on_the_air', array(
            'data' => $this->tmdb->getDataTv('getAiringTodayTVShows', 'airing_today_tv_', $page),
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
            'page' => $page,
            'pages' => $pages,
        ));
    }

    public function airing_today($page = 1)
    {
        $hack_title = 'Most Popular TV Series | ' . SITE_NAME;
        $hack_description = 'Browse Most Popular TV Shows on ' . SITES_URL;
        $pages = ($page != 1) ? ' Pages ' . $page : '';

        $this->template('tv/airing_today', array(
            'data' => $this->tmdb->getDataTv('getOnTheAirTVShows', 'on_the_air_tv_', $page),
            'hack_title' => $hack_title,
            'hack_description' => $hack_description,
            'page' => $page,
            'pages' => $pages,
        ));
    }
}
