<?php
class TmdbApi extends TMDB
{
    public function __construct()
    {
        $apikey = $this->tmdbApi();
        parent::__construct($apikey, 'en', true);
    }

    function tmdbApi(): string
    {
        $arrayTmdb = explode(",", API_KEY);
        return $arrayTmdb[array_rand($arrayTmdb)];
    }

    public function getDataMovies($getFromClass = 'getPopularMovies', $nama = 'home_m_', $page = 1)
    {
        $path = BASE_PATH . '/cache/home/';
        $name = $nama . $page . '.json';
        // if (file_exists($path.$name) && ) {
        //     # code...
        // }
        $movie = $this->$getFromClass($page);
        if ($movie['results']) {
            $results = array();
            foreach ((array)$movie['results'] as $row) {
                $item = [
                    'id' => $row['id'],
                    'title' => $row['title'] ? $row['title'] : $row['original_title'],
                    'poster_path' => $row['poster_path'] ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => $row['backdrop_path'] ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'],
                    'release_date' => $row['release_date'],
                    'popularity' => $row['popularity'],
                    'vote_average' => $row['vote_average'],
                    'vote_count' => $row['vote_count'],
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $movie['total_results'];
            if (CACHE) :
                file_put_contents($path . $name, serialize($results));
            endif;
            return serialize($results);
        }
        return false;
    }

    public function getDataTv($getFromClass = 'getPopularTVShows', $nama = 'home_tv_', $page = 1)
    {
        $path = BASE_PATH . '/cache/home/';
        $name = $nama . $page . '.json';
        // if (file_exists($path.$name) && ) {
        //     # code...
        // }
        $tv = $this->$getFromClass($page);
        if ($tv['results']) {
            $results = array();
            foreach ((array)$tv['results'] as $row) {
                $item = [
                    'id' => $row['id'],
                    'title' => $row['name'] ? $row['name'] : $row['original_name'],
                    'poster_path' => $row['poster_path'] ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => $row['backdrop_path'] ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'],
                    'release_date' => isset($row['first_air_date']) ? $row['first_air_date'] : '',
                    'popularity' => $row['popularity'],
                    'vote_average' => $row['vote_average'],
                    'vote_count' => $row['vote_count'],
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $tv['total_results'];
            if (CACHE) :
                file_put_contents($path . $name, serialize($results));
            endif;
            return serialize($results);
        }
        return false;
    }

    public function getDataMovie($id)
    {
        $path = BASE_PATH . '/cache/movie/';
        $name = $id . '.json';

        $row = $this->getMovie($id);

        $title = $row['title'];
        $cm = [
            'id' => $id,
            'title' => $title,
            'slug' => url_movie($id, $title),
            'pubdate' => $row['release_date'],
        ];

        $randone        = MOVIE_TITLE_AWAL[mt_rand(0, count(MOVIE_TITLE_AWAL) - 1)];
        $randtwo        = MOVIE_TITLE_AKHIR[mt_rand(0, count(MOVIE_TITLE_AKHIR) - 1)];
        $release_date   = $row['release_date'];
        $year           = date('Y', strtotime($release_date));
        $hack_title     = $randone . $row['title'] . ' (' . $year . ') ' . $randtwo;
        $title_after    = ' | ' . SITE_NAME;
        $description    = $randone . $row['title'] . ' (' . $year . ') : ' . $randtwo . ' ' . $row['overview'];
        $runtime        = $row['runtime'];
        $vote_count     = $row['vote_count'];

        if ($row['images']['backdrops'] != null) {
            shuffle($row['images']['backdrops']);
            foreach ($row['images']['backdrops'] as $result) {
                $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
            }
        } elseif ($row['images']['posters'] != null) {
            shuffle($row['images']['posters']);
            foreach ($row['images']['posters'] as $result) {
                $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
            }
        } else {
            $images = ROOT . '/public/images/no-backdrop.png';
            $w780 = ROOT . '/public/images/no-backdrop.png';
        }

        if ($row['poster_path'] != null) {
            $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
            $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['poster_path'] . '?resize=300,450';
        } elseif ($row['backdrop_path'] != null) {
            $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
            $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['backdrop_path'] . '?resize=300,450';
        } else {
            $images_small = ROOT . '/public/images/no-cover.png';
            $hack_images = BASE_PATH . '/public/images/no-cover.png';
        }

        if (is_array($row['genres'])) {
            $genres  = array();
            foreach ($row['genres'] as $result) : $genres[] = '<span itemprop="genre"><a itemprop="url" href="' . url_cat($result['id'], permalink($result['name'])) . '">' . $result['name'] . '</a></span>';
            endforeach;
            $genre = implode(", ", $genres);
        }
        if (is_array($row['genres'])) {
            foreach ($row['genres'] as $result) : $category = $result['name'];
                $categoryid = $result['id'];
            endforeach;
        }
        if (is_array($row['credits']['cast'])) {
            $ic = 0;
            $casts = array();
            foreach ($row['credits']['cast'] as $result) : $casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person"><span itemprop="name">' . $result['name'] . '</span></span>';
                if ($ic++ == 10) break;
            endforeach;
            $cast = implode(", ", $casts);
        }
        if ($row['vote_average'] > 0) {
            $get_rating =  $row['vote_average'];
            $emp_rating =  11 - $get_rating;
        } else {
            $emp_rating = 10;
        }
        if (is_array($row['keywords']['keywords'])) {
            $keyword = array();
            $key = array();
            foreach ($row['keywords']['keywords'] as $result) :
                $keyword[] = '<span class="itemprop" itemprop="keywords">' . $result['name'] . '</span>';
                $key[] = $result['name'];
            endforeach;
            $keywords = implode(", ", $keyword);
            $key = implode(", ", $key);
        }
        if (is_array($row['production_countries'])) {
            $countrys = array();
            foreach ($row['production_countries'] as $result) : $countrys[] = $result['name'];
            endforeach;
            $country = implode(", ", $countrys);
        }
        if (is_array($row['production_companies'])) {
            $production = array();
            foreach ($row['production_companies'] as $result) : $production[] = '<span itemprop="creator" itemscope itemtype="https://schema.org/Organization"><span itemprop="name">' . $result['name'] . '</span></span>';
            endforeach;
            $companies = implode(", ", $production);
        }

        $return = [
            'row' => $row,
            'images' => $images,
            'title' => $title,
            'images_small' => $images_small,
            'year' => $year,
            'emp_rating' => $emp_rating,
            'get_rating' => $get_rating,
            'vote_count' => $vote_count,
            'description' => $description,
            'release_date' => $release_date,
            'runtime' => $runtime,
            'genre' => $genre,
            'cast' => $cast,
            'companies' => $companies,
            'hack_title' => $hack_title . $title_after,
            'hack_description' => $description,
            'hack_keywords' => $key,
            'hack_images' => $hack_images,
        ];

        return $return;
    }

    public function getDataTvShow($idTv)
    {
        // $path = BASE_PATH . '/cache/tv/';
        // $name = $idTv . '.json';
        $row = array();
        $row2 = array();
        $row3 = array();

        $randone = TV_TITLE_AWAL[mt_rand(0, count(TV_TITLE_AWAL) - 1)];
        $randtwo = TV_TITLE_AKHIR[mt_rand(0, count(TV_TITLE_AKHIR) - 1)];
        $title_after = ' | ' . SITE_NAME;

        $str = explode("-", $idTv);
        $TMDBID = $str[0];

        // var_dump(isset($str[2]));
        // die;
        $row = $this->getTVShow($TMDBID);

        if (isset($str[2])) :
            $row2 = $this->getTVSeason($TMDBID, '/season/' . $str[1]);
            $row3 = $this->getTVSeason($TMDBID, '/season/' . $str[1] . '/episode/' . $str[2]);
            $epi_name = $row3['name'] == '' ? '' : ' : ' . $row3['name'];
            $title = $row['name'] . ' - Season ' . $str[1] . ' Episode ' . $str[2] . $epi_name;
            $hack_title = $randone . $row['name'] . ' - ' . $row2['name'] . ' Episode ' . $str[2] . $epi_name . ' ' . $randtwo;
            $description = empty($row3['overview']) ? $row['overview'] : $row3['overview'];
        elseif (isset($str[1])) :
            $row2 = $this->getTVSeason($TMDBID, '/season/' . $str[1]);
            $title = $row['name'] . ' - ' . $row2['name'];
            $hack_title = $randone . $row['name'] . ' - ' . $row2['name'] . ' ' . $randtwo;
            $description = $row['overview'];
        else :
            $title = $row['name'];
            $hack_title = $randone . $row['name'] . ' ' . $randtwo;
            $description = $row['overview'];
        endif;


        if ($row['name'] != '') :
            $id = $row['id'];
            $first_air_date = $row['first_air_date'];
            $last_air_date = $row['last_air_date'];
            $year = date('Y', strtotime($last_air_date));
            $run_time0 = isset($row['episode_run_time'][0]) ? $row['episode_run_time'][0] : '26';
            $run_time1 = isset($row['episode_run_time'][1]) ? $row['episode_run_time'][1] : '14';
            //$run_time2 = isset($row['episode_run_time'][2]) ? $row['episode_run_time'][2] : '20';
            $runtime = '00:' . $run_time0 . ':' . $run_time1;
            $vote_count = $row['vote_count'];
            $number_of_episodes = $row['number_of_episodes'];
            $number_of_seasons = $row['number_of_seasons'];
            $status = $row['status'];

            if ($row['images']['backdrops'] != null) {
                shuffle($row['images']['backdrops']);
                foreach ($row['images']['backdrops'] as $result) {
                    $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                    $w600 = 'https://image.tmdb.org/t/p/w600' . $result['file_path'];
                }
            } elseif ($row['backdrop_path'] != null) {
                $images = 'https://image.tmdb.org/t/p/original' . $row['backdrop_path'];
                $w600 = 'https://image.tmdb.org/t/p/w600' . $row['backdrop_path'];
            } else {
                $images = BASE_PATH . '/public/images/no-backdrop.png';
                $w780 = BASE_PATH . '/public/images/no-backdrop.png';
            }

            if ($row['poster_path'] != null) {
                $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
                $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['poster_path'] . '?resize=300,450';
            } elseif ($row['backdrop_path'] != null) {
                $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
                $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['backdrop_path'] . '?resize=300,450';
            } else {
                $images_small = BASE_PATH . '/public/images/no-cover.png';
                $hack_images = BASE_PATH . '/public/images/no-cover.png';
            }

            if (is_array($row['genres'])) {
                $genres  = array();
                foreach ($row['genres'] as $result) : $genres[] = $result['name'];
                endforeach;
                $genre = implode(", ", $genres);
            }

            if (is_array($row['genres'])) {
                foreach ($row['genres'] as $result) : $category = $result['name'];
                    $categoryid = $result['id'];
                endforeach;
            }

            if (is_array($row['credits']['cast'])) {
                $ic = 0;
                $casts = array();
                foreach ($row['credits']['cast'] as $result) : $casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person">' . $result['name'] . '</span>';
                    if ($ic++ == 10) break;
                endforeach;
                $cast = implode(", ", $casts);
            }

            if ($row['vote_average'] > 0) {
                $get_rating =  $row['vote_average'];
                $emp_rating =  11 - $get_rating;
            } else {
                $emp_rating = 10;
            }

            if (is_array($row['keywords']['results'])) {
                $keyword = array();
                $key = array();
                foreach ($row['keywords']['results'] as $result) :
                    $keyword[] = '<span class="itemprop" itemprop="keywords">' . $result['name'] . '</span>';
                    $key[] = $result['name'];

                endforeach;
                $keywords = implode(", ", $keyword);
                $key = implode(", ", $key);
            }

            if (is_array($row['alternative_titles']['results'])) {
                $alternative = array();
                foreach ($row['alternative_titles']['results'] as $result) : $alternative[] = $result['title'];
                endforeach;
                $alternative_titles = implode(", ", $alternative);
            }

            if (is_array($row['networks'])) {
                $countrys = array();
                foreach ($row['networks'] as $result) : $countrys[] = $result['name'];
                endforeach;
                $networks = implode(", ", $countrys);
            }

        endif;

        $return = [
            'row' => $row,
            'row2' => $row2,
            'images' => $images,
            'title' => $title,
            'images_small' => $images_small,
            'year' => $year,
            'emp_rating' => $emp_rating,
            'get_rating' => $get_rating,
            'vote_count' => $vote_count,
            'description' => $description,
            'release_date' => $first_air_date,
            'runtime' => $runtime,
            'genre' => $genre,
            'cast' => $cast,
            'networks' => $networks,
            // 'companies' => $companies,
            'hack_title' => $hack_title . $title_after,
            'hack_description' => $description,
            'hack_keywords' => $key,
            'hack_images' => $hack_images,
        ];

        return $return;
    }

    public function getDataSearchMovie($movieTitle, $page = 1)
    {
        $movie = $this->searchMovie($movieTitle, $page);
        if ($movie['results']) {
            $results = array();
            foreach ((array)$movie['results'] as $row) {
                $item = [
                    'id' => $row['id'],
                    'title' => $row['title'] ? $row['title'] : $row['original_title'],
                    'poster_path' => $row['poster_path'] ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => $row['backdrop_path'] ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'],
                    'release_date' => $row['release_date'],
                    'popularity' => $row['popularity'],
                    'vote_average' => $row['vote_average'],
                    'vote_count' => $row['vote_count'],
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $movie['total_results'];
            return serialize($results);
        }
        return false;
    }

    public function getDataSearchTv($tvTitle, $page = 1)
    {
        $tv = $this->searchTv($tvTitle, $page);

        if ($tv['results']) {

            $results = array();
            foreach ((array)$tv['results'] as $row) {
                $item = [
                    'id' => $row['id'],
                    'title' => $row['name'] ? $row['name'] : $row['original_name'],
                    'poster_path' => $row['poster_path'] ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => $row['backdrop_path'] ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'],
                    'release_date' => isset($row['first_air_date']) ? $row['first_air_date'] : '',
                    'popularity' => $row['popularity'],
                    'vote_average' => $row['vote_average'],
                    'vote_count' => $row['vote_count'],
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $tv['total_results'];

            return serialize($results);
        }
        return false;
    }

    public function getDataGenre($id, $getFromClass, $nama = 'home_genre', $page = 1)
    {
        $path = BASE_PATH . '/cache/genre/';
        $name = $nama . $page . '.json';
        // if (file_exists($path.$name) && ) {
        //     # code...
        // }
        $genre = $this->$getFromClass($id, $page);
        if ($genre['results']) {
            $results = array();
            foreach ((array)$genre['results'] as $row) {
                $item = [
                    'id' => $row['id'],
                    'title' => $row['title'] ? $row['title'] : $row['original_title'],
                    'poster_path' => $row['poster_path'] ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => $row['backdrop_path'] ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'],
                    'release_date' => $row['release_date'],
                    'popularity' => $row['popularity'],
                    'vote_average' => $row['vote_average'],
                    'vote_count' => $row['vote_count'],
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $genre['total_results'];
            if (CACHE) :
                file_put_contents($path . $name, serialize($results));
            endif;
            return serialize($results);
        }
        return false;
    }
}
