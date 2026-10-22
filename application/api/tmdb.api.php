<?php

#[\AllowDynamicProperties]
class TmdbApi extends TMDB
{
    public function __construct()
    {
        $apikey = $this->tmdbApi();
        parent::__construct($apikey, 'en', false);
    }

    function tmdbApi(): string
    {
        $arrayTmdb = explode(",", API_KEY);
        return trim($arrayTmdb[array_rand($arrayTmdb)]);
    }

    public function getDataMovies($getFromClass = 'getPopularMovies', $nama = 'home_m_', $page = 1)
    {
        $path = DOCUMENT_ROOT . '/cache/home/';
        $name = $nama . $page . '.json';

        if (file_exists($path . $name) && !cache_expire($path . $name)) {
            return file_get_contents($path . $name);
        }
        $movie = method_exists($this, $getFromClass) ? $this->$getFromClass($page) : [];
        if (!empty($movie['results']) && is_array($movie['results'])) {
            $results = array();
            foreach ($movie['results'] as $row) {
                $item = [
                    'id' => $row['id'] ?? '',
                    'title' => !empty($row['title']) ? $row['title'] : ($row['original_title'] ?? ''),
                    'poster_path' => !empty($row['poster_path']) ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => !empty($row['backdrop_path']) ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'] ?? '',
                    'release_date' => $row['release_date'] ?? '',
                    'popularity' => $row['popularity'] ?? 0,
                    'vote_average' => $row['vote_average'] ?? 0,
                    'vote_count' => $row['vote_count'] ?? 0,
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $movie['total_results'] ?? count($results['result']);

            if (CACHE) {
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                file_put_contents($path . $name, serialize($results));
            }
            return serialize($results);
        }
        return false;
    }

    public function getDataTv($getFromClass = 'getPopularTVShows', $nama = 'home_tv_', $page = 1)
    {
        $path = DOCUMENT_ROOT . '/cache/home/';
        $name = $nama . $page . '.json';
        if (file_exists($path . $name) && !cache_expire($path . $name)) {
            return file_get_contents($path . $name);
        }
        $tv = method_exists($this, $getFromClass) ? $this->$getFromClass($page) : [];
        if (!empty($tv['results']) && is_array($tv['results'])) {
            $results = array();
            foreach ($tv['results'] as $row) {
                $item = [
                    'id' => $row['id'] ?? '',
                    'title' => !empty($row['name']) ? $row['name'] : ($row['original_name'] ?? ''),
                    'poster_path' => !empty($row['poster_path']) ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => !empty($row['backdrop_path']) ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'] ?? '',
                    'release_date' => $row['first_air_date'] ?? '',
                    'popularity' => $row['popularity'] ?? 0,
                    'vote_average' => $row['vote_average'] ?? 0,
                    'vote_count' => $row['vote_count'] ?? 0,
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $tv['total_results'] ?? count($results['result']);
            if (CACHE) {
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                file_put_contents($path . $name, serialize($results));
            }
            return serialize($results);
        }
        return false;
    }

    public function getDataMovie($id)
    {
        $path = DOCUMENT_ROOT . '/cache/movie/';
        $name = $id . '.json';
        if (file_exists($path . $name) && !cache_expire($path . $name)) {
            $data = file_get_contents($path . $name);
            $row = @unserialize($data);
            if (!is_array($row)) {
                $row = $this->getMovie($id);
            }
        } else {
            $row = $this->getMovie($id);
        }

        if (!is_array($row)) {
            $row = [];
        }

        $title = $row['title'] ?? ($row['original_title'] ?? '');
        $release_date = $row['release_date'] ?? '';

        $cm = [
            'id' => $id,
            'title' => $title,
            'slug' => url_movie($id, $title),
            'pubdate' => $release_date,
        ];

        $randone = !empty(MOVIE_TITLE_AWAL) ? MOVIE_TITLE_AWAL[array_rand(MOVIE_TITLE_AWAL)] : '';
        $randtwo = !empty(MOVIE_TITLE_AKHIR) ? MOVIE_TITLE_AKHIR[array_rand(MOVIE_TITLE_AKHIR)] : '';
        $year = !empty($release_date) ? date('Y', strtotime($release_date)) : date('Y');
        $hack_title = $randone . $title . ' (' . $year . ') ' . $randtwo;
        $title_after = ' | ' . SITE_NAME;
        $overview = $row['overview'] ?? '';
        $description = $randone . $title . ' (' . $year . ') : ' . $randtwo . ' ' . $overview;
        $runtime = $row['runtime'] ?? 0;
        $vote_count = $row['vote_count'] ?? 0;

        $images = BASE_PATH . '/public/images/no-backdrop.png';
        $w780 = BASE_PATH . '/public/images/no-backdrop.png';
        if (!empty($row['images']['backdrops']) && is_array($row['images']['backdrops'])) {
            $backdrops = $row['images']['backdrops'];
            shuffle($backdrops);
            foreach ($backdrops as $result) {
                if (!empty($result['file_path'])) {
                    $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                    $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
                }
            }
        } elseif (!empty($row['images']['posters']) && is_array($row['images']['posters'])) {
            $posters = $row['images']['posters'];
            shuffle($posters);
            foreach ($posters as $result) {
                if (!empty($result['file_path'])) {
                    $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                    $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
                }
            }
        }

        if (!empty($row['poster_path'])) {
            $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
            $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['poster_path'] . '?resize=300,450';
        } elseif (!empty($row['backdrop_path'])) {
            $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
            $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['backdrop_path'] . '?resize=300,450';
        } else {
            $images_small = BASE_PATH . '/public/images/no-cover.png';
            $hack_images = BASE_PATH . '/public/images/no-cover.png';
        }

        $genre = '';
        $category = '';
        $categoryid = '';
        if (!empty($row['genres']) && is_array($row['genres'])) {
            $genres = array();
            foreach ($row['genres'] as $result) {
                $gName = $result['name'] ?? '';
                $gId = $result['id'] ?? '';
                $genres[] = '<span itemprop="genre"><a itemprop="url" href="' . url_cat($gId, permalink($gName)) . '">' . htmlspecialchars($gName) . '</a></span>';
                $category = $gName;
                $categoryid = $gId;
            }
            $genre = implode(", ", $genres);
        }

        $cast = '';
        if (!empty($row['credits']['cast']) && is_array($row['credits']['cast'])) {
            $ic = 0;
            $casts = array();
            foreach ($row['credits']['cast'] as $result) {
                $cName = $result['name'] ?? '';
                $casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person"><span itemprop="name">' . htmlspecialchars($cName) . '</span></span>';
                if ($ic++ == 10) break;
            }
            $cast = implode(", ", $casts);
        }

        $vote_avg = $row['vote_average'] ?? 0;
        if ($vote_avg > 0) {
            $get_rating = $vote_avg;
            $emp_rating = max(0, 11 - (int)$get_rating);
        } else {
            $get_rating = 0;
            $emp_rating = 10;
        }

        $keywords = '';
        $key = '';
        if (!empty($row['keywords']['keywords']) && is_array($row['keywords']['keywords'])) {
            $keyword = array();
            $keys = array();
            foreach ($row['keywords']['keywords'] as $result) {
                $kName = $result['name'] ?? '';
                $keyword[] = '<span class="itemprop" itemprop="keywords">' . htmlspecialchars($kName) . '</span>';
                $keys[] = $kName;
            }
            $keywords = implode(", ", $keyword);
            $key = implode(", ", $keys);
        }

        $country = '';
        if (!empty($row['production_countries']) && is_array($row['production_countries'])) {
            $countrys = array();
            foreach ($row['production_countries'] as $result) {
                $countrys[] = $result['name'] ?? '';
            }
            $country = implode(", ", $countrys);
        }

        $companies = '';
        if (!empty($row['production_companies']) && is_array($row['production_companies'])) {
            $production = array();
            foreach ($row['production_companies'] as $result) {
                $pName = $result['name'] ?? '';
                $production[] = '<span itemprop="creator" itemscope itemtype="https://schema.org/Organization"><span itemprop="name">' . htmlspecialchars($pName) . '</span></span>';
            }
            $companies = implode(", ", $production);
        }

        if (CACHE) {
            if (!file_exists(DOCUMENT_ROOT . '/cache/single/')) {
                mkdir(DOCUMENT_ROOT . '/cache/single/', 0755, true);
            }
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            file_put_contents($path . $name, serialize($row));
            file_put_contents(DOCUMENT_ROOT . '/cache/single/' . $name, serialize($cm));
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
        $path = DOCUMENT_ROOT . '/cache/tv/';
        $name = $idTv . '.json';

        $randone = !empty(TV_TITLE_AWAL) ? TV_TITLE_AWAL[array_rand(TV_TITLE_AWAL)] : '';
        $randtwo = !empty(TV_TITLE_AKHIR) ? TV_TITLE_AKHIR[array_rand(TV_TITLE_AKHIR)] : '';
        $title_after = ' | ' . SITE_NAME;

        $str = explode("-", (string)$idTv);
        $TMDBID = $str[0];

        $row = $this->getTVShow($TMDBID);
        if (!is_array($row)) {
            $row = [];
        }

        $row2 = array();
        $row3 = array();

        if (isset($str[2])) {
            $row2 = $this->getTVSeason($TMDBID, '/season/' . $str[1]);
            $row3 = $this->getTVSeason($TMDBID, '/season/' . $str[1] . '/episode/' . $str[2]);
            $row3_name = $row3['name'] ?? '';
            $row2_name = $row2['name'] ?? '';
            $row_name = $row['name'] ?? ($row['original_name'] ?? '');
            $epi_name = empty($row3_name) ? '' : ' : ' . $row3_name;
            $title = $row_name . ' - Season ' . $str[1] . ' Episode ' . $str[2] . $epi_name;
            $hack_title = $randone . $row_name . ' - ' . $row2_name . ' Episode ' . $str[2] . $epi_name . ' ' . $randtwo;
            $description = !empty($row3['overview']) ? $row3['overview'] : ($row['overview'] ?? '');
        } elseif (isset($str[1])) {
            $row2 = $this->getTVSeason($TMDBID, '/season/' . $str[1]);
            $row2_name = $row2['name'] ?? '';
            $row_name = $row['name'] ?? ($row['original_name'] ?? '');
            $title = $row_name . ' - ' . $row2_name;
            $hack_title = $randone . $row_name . ' - ' . $row2_name . ' ' . $randtwo;
            $description = $row['overview'] ?? '';
        } else {
            $row_name = $row['name'] ?? ($row['original_name'] ?? '');
            $title = $row_name;
            $hack_title = $randone . $row_name . ' ' . $randtwo;
            $description = $row['overview'] ?? '';
        }

        $id = $row['id'] ?? '';
        $first_air_date = $row['first_air_date'] ?? '';
        $last_air_date = $row['last_air_date'] ?? '';
        $year = !empty($last_air_date) ? date('Y', strtotime($last_air_date)) : (!empty($first_air_date) ? date('Y', strtotime($first_air_date)) : date('Y'));
        $run_time0 = isset($row['episode_run_time'][0]) ? $row['episode_run_time'][0] : '26';
        $run_time1 = isset($row['episode_run_time'][1]) ? $row['episode_run_time'][1] : '14';
        $runtime = '00:' . $run_time0 . ':' . $run_time1;
        $vote_count = $row['vote_count'] ?? 0;
        $number_of_episodes = $row['number_of_episodes'] ?? 0;
        $number_of_seasons = $row['number_of_seasons'] ?? 0;
        $status = $row['status'] ?? '';

        $images = BASE_PATH . '/public/images/no-backdrop.png';
        $w600 = BASE_PATH . '/public/images/no-backdrop.png';
        $w780 = BASE_PATH . '/public/images/no-backdrop.png';

        if (!empty($row['images']['backdrops']) && is_array($row['images']['backdrops'])) {
            $backdrops = $row['images']['backdrops'];
            shuffle($backdrops);
            foreach ($backdrops as $result) {
                if (!empty($result['file_path'])) {
                    $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                    $w600 = 'https://image.tmdb.org/t/p/w600' . $result['file_path'];
                }
            }
        } elseif (!empty($row['backdrop_path'])) {
            $images = 'https://image.tmdb.org/t/p/original' . $row['backdrop_path'];
            $w600 = 'https://image.tmdb.org/t/p/w600' . $row['backdrop_path'];
        }

        if (!empty($row['poster_path'])) {
            $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
            $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['poster_path'] . '?resize=300,450';
        } elseif (!empty($row['backdrop_path'])) {
            $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
            $hack_images = 'https://image.tmdb.org/t/p/w200' . $row['backdrop_path'] . '?resize=300,450';
        } else {
            $images_small = BASE_PATH . '/public/images/no-cover.png';
            $hack_images = BASE_PATH . '/public/images/no-cover.png';
        }

        $genre = '';
        $category = '';
        $categoryid = '';
        if (!empty($row['genres']) && is_array($row['genres'])) {
            $genres = array();
            foreach ($row['genres'] as $result) {
                $genres[] = $result['name'] ?? '';
                $category = $result['name'] ?? '';
                $categoryid = $result['id'] ?? '';
            }
            $genre = implode(", ", $genres);
        }

        $cast = '';
        if (!empty($row['credits']['cast']) && is_array($row['credits']['cast'])) {
            $ic = 0;
            $casts = array();
            foreach ($row['credits']['cast'] as $result) {
                $cName = $result['name'] ?? '';
                $casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person">' . htmlspecialchars($cName) . '</span>';
                if ($ic++ == 10) break;
            }
            $cast = implode(", ", $casts);
        }

        $vote_avg = $row['vote_average'] ?? 0;
        if ($vote_avg > 0) {
            $get_rating = $vote_avg;
            $emp_rating = max(0, 11 - (int)$get_rating);
        } else {
            $get_rating = 0;
            $emp_rating = 10;
        }

        $keywords = '';
        $key = '';
        if (!empty($row['keywords']['results']) && is_array($row['keywords']['results'])) {
            $keyword = array();
            $keys = array();
            foreach ($row['keywords']['results'] as $result) {
                $kName = $result['name'] ?? '';
                $keyword[] = '<span class="itemprop" itemprop="keywords">' . htmlspecialchars($kName) . '</span>';
                $keys[] = $kName;
            }
            $keywords = implode(", ", $keyword);
            $key = implode(", ", $keys);
        }

        $alternative_titles = '';
        if (!empty($row['alternative_titles']['results']) && is_array($row['alternative_titles']['results'])) {
            $alternative = array();
            foreach ($row['alternative_titles']['results'] as $result) {
                $alternative[] = $result['title'] ?? '';
            }
            $alternative_titles = implode(", ", $alternative);
        }

        $networks = '';
        if (!empty($row['networks']) && is_array($row['networks'])) {
            $countrys = array();
            foreach ($row['networks'] as $result) {
                $countrys[] = $result['name'] ?? '';
            }
            $networks = implode(", ", $countrys);
        }

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
        if (!empty($movie['results']) && is_array($movie['results'])) {
            $results = array();
            foreach ($movie['results'] as $row) {
                $item = [
                    'id' => $row['id'] ?? '',
                    'title' => !empty($row['title']) ? $row['title'] : ($row['original_title'] ?? ''),
                    'poster_path' => !empty($row['poster_path']) ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => !empty($row['backdrop_path']) ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'] ?? '',
                    'release_date' => $row['release_date'] ?? '',
                    'popularity' => $row['popularity'] ?? 0,
                    'vote_average' => $row['vote_average'] ?? 0,
                    'vote_count' => $row['vote_count'] ?? 0,
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $movie['total_results'] ?? count($results['result']);
            return serialize($results);
        }
        return false;
    }

    public function getDataSearchTv($tvTitle, $page = 1)
    {
        $tv = $this->searchTv($tvTitle, $page);

        if (!empty($tv['results']) && is_array($tv['results'])) {
            $results = array();
            foreach ($tv['results'] as $row) {
                $item = [
                    'id' => $row['id'] ?? '',
                    'title' => !empty($row['name']) ? $row['name'] : ($row['original_name'] ?? ''),
                    'poster_path' => !empty($row['poster_path']) ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => !empty($row['backdrop_path']) ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'] ?? '',
                    'release_date' => $row['first_air_date'] ?? '',
                    'popularity' => $row['popularity'] ?? 0,
                    'vote_average' => $row['vote_average'] ?? 0,
                    'vote_count' => $row['vote_count'] ?? 0,
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $tv['total_results'] ?? count($results['result']);

            return serialize($results);
        }
        return false;
    }

    public function getDataGenre($id, $getFromClass, $nama = 'home_genre', $page = 1)
    {
        $path = DOCUMENT_ROOT . '/cache/genre/';
        $name = $nama . $page . '.json';
        if (file_exists($path . $name) && !cache_expire($path . $name)) {
            return file_get_contents($path . $name);
        }
        $genre = method_exists($this, $getFromClass) ? $this->$getFromClass($id, $page) : [];
        if (!empty($genre['results']) && is_array($genre['results'])) {
            $results = array();
            foreach ($genre['results'] as $row) {
                $item = [
                    'id' => $row['id'] ?? '',
                    'title' => !empty($row['title']) ? $row['title'] : ($row['original_title'] ?? ''),
                    'poster_path' => !empty($row['poster_path']) ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] : BASE_PATH . "/public/images/no-cover.png",
                    'backdrop_path' => !empty($row['backdrop_path']) ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] : BASE_PATH . "/public/images/no-backdrop.png",
                    'overview' => $row['overview'] ?? '',
                    'release_date' => $row['release_date'] ?? '',
                    'popularity' => $row['popularity'] ?? 0,
                    'vote_average' => $row['vote_average'] ?? 0,
                    'vote_count' => $row['vote_count'] ?? 0,
                ];
                $results['result'][] = $item;
            }
            $results['total_results'][] = $genre['total_results'] ?? count($results['result']);
            if (CACHE) {
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                file_put_contents($path . $name, serialize($results));
            }
            return serialize($results);
        }
        return false;
    }
}
