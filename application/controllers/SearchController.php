<?php

use application\controllers\MainController;

class SearchController extends MainController
{
    function __construct()
    {
        $this->api('tmdb');
    }

    public function index()
    {
        if (!empty($_GET['s'])) {

            $newquery = get_search_query($_GET['s']);
            $limit_word = limit_word($newquery, 3);
            $hack_title = 'Search Results for ' . $newquery;

            $this->template('search', array(
                'newquery' => $newquery,
                'searchDataMovie' => $this->tmdb->getDataSearchMovie($limit_word),
                'searchDataTv' => $this->tmdb->getDataSearchTv($limit_word),
                'hack_title' => $hack_title,
            ));
        } else {
            return $this->redirect('home');
        }
    }

    function movies($page = 1)
    {
        if (!empty($_GET['s'])) {
            $newquery = get_search_query($_GET['s']);
            $limit_word = limit_word($newquery, 3);
            $hack_title = 'Search Results for ' . $newquery;
            $pages = ($page != 1) ? ' Pages ' . $page : '';

            $this->template('search/movies', array(
                'newquery' => $newquery,
                'searchDataMovie' => $this->tmdb->getDataSearchMovie($limit_word, $page),
                'hack_title' => $hack_title,
                'page' => $page,
                'pages' => $pages,
            ));
        } else {
            return $this->redirect('home');
        }
    }

    function tv($page = 1)
    {
        if (!empty($_GET['s'])) {
            $newquery = get_search_query($_GET['s']);
            $limit_word = limit_word($newquery, 3);
            $hack_title = 'Search Results for ' . $newquery;
            $pages = ($page != 1) ? ' Pages ' . $page : '';

            $this->template('search/tv', array(
                'newquery' => $newquery,
                'searchDataTv' => $this->tmdb->getDataSearchTv($limit_word, $page),
                'hack_title' => $hack_title,
                'page' => $page,
                'pages' => $pages,
            ));
        } else {
            return $this->redirect('home');
        }
    }
}
