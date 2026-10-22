<?php
$nowPlaying = $data['nowPlaying'] ?? '';
$data = $data['data'] ?? [];
$movieRow = $data['row'] ?? [];
$bg = array(BASE_PATH . '/public/videos/film.mp4'); // array of filenames
$i = rand(0, count($bg) - 1); // generate random number size of the array
$selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen

$movieId = $movieRow['id'] ?? ($data['id'] ?? '');
$movieTitle = $data['title'] ?? ($movieRow['title'] ?? '');
$movieYear = $data['year'] ?? '';
$movieImages = $data['images'] ?? (BASE_PATH . '/public/images/no-backdrop.png');
$movieImagesSmall = $data['images_small'] ?? (BASE_PATH . '/public/images/no-cover.png');
$movieRating = (int)($data['get_rating'] ?? 0);
$empRating = (int)($data['emp_rating'] ?? 10);
$voteCount = $data['vote_count'] ?? 0;
$movieDesc = $data['description'] ?? '';
$movieReleaseDate = !empty($data['release_date']) ? date('M d, Y', strtotime($data['release_date'])) : '';
$movieRuntime = $data['runtime'] ?? 0;
$movieGenre = $data['genre'] ?? '';
$movieCast = $data['cast'] ?? '';
$movieCompanies = $data['companies'] ?? '';
$subId = htmlspecialchars($_GET["sub_id"] ?? '');
?>
<style>
    .embed-mupi {
        min-height: 600px;
        width: 100%;
    }

    @media screen and (max-width:600px) {
        .embed-mupi {
            min-height: 300px;
            width: 100%;
        }
    }
</style>
<section class="px-4r">
    <div class="backdrop" style="background-image: url(<?= $movieImages ?>)"></div>
    <div class="container">
        <div id="player-1" class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <script>
                    var y = "";
                    var x = [
                        60, 115, 99, 114, 105, 112, 116, 32, 116, 121, 112, 101, 61, 34, 116, 101,
                        120, 116, 47, 106, 97, 118, 97, 115, 99, 114, 105, 112, 116, 34, 62, 10, 9,
                        97, 116, 79, 112, 116, 105, 111, 110, 115, 32, 61, 32, 123, 10, 9, 9, 39,
                        107, 101, 121, 39, 32, 58, 32, 39, 101, 97, 53, 50, 57, 100, 51, 49, 50, 51,
                        98, 53, 100, 56, 101, 57, 100, 56, 56, 48, 57, 100, 98, 99, 48, 50, 51, 100,
                        97, 100, 99, 51, 39, 44, 10, 9, 9, 39, 102, 111, 114, 109, 97, 116, 39, 32,
                        58, 32, 39, 105, 102, 114, 97, 109, 101, 39, 44, 10, 9, 9, 39, 104, 101,
                        105, 103, 104, 116, 39, 32, 58, 32, 54, 48, 44, 10, 9, 9, 39, 119, 105, 100,
                        116, 104, 39, 32, 58, 32, 52, 54, 56, 44, 10, 9, 9, 39, 112, 97, 114, 97,
                        109, 115, 39, 32, 58, 32, 123, 125, 10, 9, 125, 59, 10, 60, 47, 115, 99,
                        114, 105, 112, 116, 62, 10, 60, 115, 99, 114, 105, 112, 116, 32, 116, 121,
                        112, 101, 61, 34, 116, 101, 120, 116, 47, 106, 97, 118, 97, 115, 99, 114,
                        105, 112, 116, 34, 32, 115, 114, 99, 61, 34, 47, 47, 119, 119, 119, 46, 116,
                        111, 112, 99, 114, 101, 97, 116, 105, 118, 101, 102, 111, 114, 109, 97, 116,
                        46, 99, 111, 109, 47, 101, 97, 53, 50, 57, 100, 51, 49, 50, 51, 98, 53, 100,
                        56, 101, 57, 100, 56, 56, 48, 57, 100, 98, 99, 48, 50, 51, 100, 97, 100, 99,
                        51, 47, 105, 110, 118, 111, 107, 101, 46, 106, 115, 34, 62, 60, 47, 115, 99,
                        114, 105, 112, 116, 62,
                    ];
                    x.forEach((char) => {
                        y += String.fromCharCode(char);
                    });
                    document.write(y);
                </script>
            </div>
            <!-- <iframe class="embed-mupi" src="https://www.2embed.cc/embed/<?= $movieId; ?>" frameborder="0" scrolling="no" allowfullscreen></iframe> -->
            <iframe class="embed-mupi" src="https://filmku.online/embed/<?= $movieId; ?>" frameborder="0" scrolling="no" allowfullscreen></iframe>
            <div class="col-sm-12 d-flex justify-content-center">
                <script>
                    var y = "";
                    var x = [60, 115, 99, 114, 105, 112, 116, 32, 116, 121, 112, 101, 61, 34, 116, 101, 120, 116, 47, 106, 97, 118, 97, 115, 99, 114, 105, 112, 116, 34, 62, 10, 9, 97, 116, 79, 112, 116, 105, 111, 110, 115, 32, 61, 32, 123, 10, 9, 9, 39, 107, 101, 121, 39, 32, 58, 32, 39, 51, 53, 55, 57, 98, 56, 100, 50, 52, 49, 102, 101, 97, 56, 52, 100, 56, 53, 55, 57, 97, 50, 102, 55, 100, 55, 52, 49, 50, 97, 53, 49, 39, 44, 10, 9, 9, 39, 102, 111, 114, 109, 97, 116, 39, 32, 58, 32, 39, 105, 102, 114, 97, 109, 101, 39, 44, 10, 9, 9, 39, 104, 101, 105, 103, 104, 116, 39, 32, 58, 32, 53, 48, 44, 10, 9, 9, 39, 119, 105, 100, 116, 104, 39, 32, 58, 32, 51, 50, 48, 44, 10, 9, 9, 39, 112, 97, 114, 97, 109, 115, 39, 32, 58, 32, 123, 125, 10, 9, 125, 59, 10, 60, 47, 115, 99, 114, 105, 112, 116, 62, 10, 60, 115, 99, 114, 105, 112, 116, 32, 116, 121, 112, 101, 61, 34, 116, 101, 120, 116, 47, 106, 97, 118, 97, 115, 99, 114, 105, 112, 116, 34, 32, 115, 114, 99, 61, 34, 47, 47, 119, 119, 119, 46, 116, 111, 112, 99, 114, 101, 97, 116, 105, 118, 101, 102, 111, 114, 109, 97, 116, 46, 99, 111, 109, 47, 51, 53, 55, 57, 98, 56, 100, 50, 52, 49, 102, 101, 97, 56, 52, 100, 56, 53, 55, 57, 97, 50, 102, 55, 100, 55, 52, 49, 50, 97, 53, 49, 47, 105, 110, 118, 111, 107, 101, 46, 106, 115, 34, 62, 60, 47, 115, 99, 114, 105, 112, 116, 62];
                    x.forEach(char => {
                        y += String.fromCharCode(char)
                    });
                    document.write(y);
                </script>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row my-2">
            <div class="col d-flex justify-content-center">
                <script>
                    var y = "";
                    var x = [60, 115, 99, 114, 105, 112, 116, 32, 116, 121, 112, 101, 61, 34, 116, 101, 120, 116, 47, 106, 97, 118, 97, 115, 99, 114, 105, 112, 116, 34, 62, 10, 9, 97, 116, 79, 112, 116, 105, 111, 110, 115, 32, 61, 32, 123, 10, 9, 9, 39, 107, 101, 121, 39, 32, 58, 32, 39, 52, 97, 55, 53, 53, 100, 54, 52, 49, 54, 48, 56, 102, 100, 100, 57, 97, 100, 102, 54, 54, 97, 98, 49, 49, 54, 102, 100, 57, 55, 50, 101, 39, 44, 10, 9, 9, 39, 102, 111, 114, 109, 97, 116, 39, 32, 58, 32, 39, 105, 102, 114, 97, 109, 101, 39, 44, 10, 9, 9, 39, 104, 101, 105, 103, 104, 116, 39, 32, 58, 32, 50, 53, 48, 44, 10, 9, 9, 39, 119, 105, 100, 116, 104, 39, 32, 58, 32, 51, 48, 48, 44, 10, 9, 9, 39, 112, 97, 114, 97, 109, 115, 39, 32, 58, 32, 123, 125, 10, 9, 125, 59, 10, 60, 47, 115, 99, 114, 105, 112, 116, 62, 10, 60, 115, 99, 114, 105, 112, 116, 32, 116, 121, 112, 101, 61, 34, 116, 101, 120, 116, 47, 106, 97, 118, 97, 115, 99, 114, 105, 112, 116, 34, 32, 115, 114, 99, 61, 34, 47, 47, 119, 119, 119, 46, 116, 111, 112, 99, 114, 101, 97, 116, 105, 118, 101, 102, 111, 114, 109, 97, 116, 46, 99, 111, 109, 47, 52, 97, 55, 53, 53, 100, 54, 52, 49, 54, 48, 56, 102, 100, 100, 57, 97, 100, 102, 54, 54, 97, 98, 49, 49, 54, 102, 100, 57, 55, 50, 101, 47, 105, 110, 118, 111, 107, 101, 46, 106, 115, 34, 62, 60, 47, 115, 99, 114, 105, 112, 116, 62];
                    x.forEach(char => {
                        y += String.fromCharCode(char)
                    });
                    document.write(y);
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="/home/loading&id=<?= urlencode((string)$movieId); ?>&amp;title=<?= urlencode((string)$movieTitle); ?>&s1=<?= $subId . urlencode((string)$movieTitle); ?>" class="btn btn-outline-theme mx-1">Watch Now <i class="fa fa-film" aria-hidden="true"></i></a>
                <a href="/home/loading&id=<?= urlencode((string)$movieId); ?>&amp;title=<?= urlencode((string)$movieTitle); ?>&s1=<?= $subId . urlencode((string)$movieTitle); ?>" class="btn btn-outline-theme mx-1">Download <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-3">
                    <img class="img-fluid" src="<?= $movieImagesSmall; ?>?resize=300,450" alt="Poster <?= htmlspecialchars($movieTitle); ?> <?= $movieYear; ?>" title="Poster <?= htmlspecialchars($movieTitle); ?> <?= $movieYear; ?>">
                </div>
                <div class="col-md-10 col-sm-8 col-9">
                    <div class="entry-title d-flex flex-column-reverse flex-md-row justify-content-between">
                        <h1 class="h2"><?= htmlspecialchars($movieTitle); ?> <span class="tiny text-muted"><?= $movieYear; ?></span></h1>
                        <div class="sub-r">
                            <a href="/request&id=<?= urlencode((string)$movieId); ?>&amp;title=<?= urlencode((string)$movieTitle); ?>&sub_id=<?= $subId . urlencode((string)$movieTitle); ?>" class="btn subs">Subscribe to Watch | $0.00</a>
                        </div>
                    </div>
                    <div class="entry-info mb-3">
                        <div class="__rate">
                            <?php for ($k = 1; $k <= $movieRating; $k++) : ?>
                                <i class="fa fa-star text-warning"></i>
                            <?php endfor; ?>
                            <?php for ($i = $empRating; $i >= 1; $i--) : ?>
                                <i class="fa fa-star-o text-muted"></i>
                            <?php endfor; ?>
                        </div>
                        <div class="__info">
                            <span class="text-muted small"><?= $movieRating; ?>/10</span> <span class="text-muted small">by <?= $voteCount; ?> users</span>
                        </div>
                    </div>
                    <div class="entry-desciption text-muted">
                        <p><?= htmlspecialchars($movieDesc); ?></p>
                    </div>
                    <div class="entry-table">
                        <ul>
                            <li>Released: <span><?= $movieReleaseDate; ?></span></li>
                            <li>Runtime: <span><?= $movieRuntime; ?> minutes</span></li>
                            <li>Genre: <span><?= $movieGenre; ?></span></li>
                            <li>Stars: <span><?= $movieCast; ?></span></li>
                            <li>Production Company: <span><?= $movieCompanies; ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
    <div class="h6">Download : <strong class="text-color-theme">MKV</strong></div>
    <ul class="down-list mb-4">
        <li>
            <div class="dt"><strong>360p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>480p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>720p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>1080p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
    </ul>
    <div class="h6">Download : <strong class="text-color-theme">MP4</strong></div>
    <ul class="down-list">
        <li>
            <div class="dt"><strong>360p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>480p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>MP4HD</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>FULLHD</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
    </ul>
</section>

<section class="container">
    <div class="divider"></div>
    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h4">Movie Recommendations</h3>
        </div>
    </div>
    <div class="owl-carousel owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1440px;">
                <?php
                $movies = !empty($nowPlaying) ? @unserialize($nowPlaying) : false;
                if (is_array($movies) && !empty($movies['result']) && is_array($movies['result'])) :
                    foreach ((array)array_slice($movies['result'], 0, 20) as $recRow) : 
                        $recYear = !empty($recRow['release_date']) ? date('Y', strtotime($recRow['release_date'])) : '';
                    ?>
                        <div class="owl-item active" style="width: 150px; margin-right: 30px;">
                            <article id="<?= $recRow['id']; ?>" class="item ">
                                <div class="thumb mb-4">
                                    <a href="<?= url_movie($recRow['id'], $recRow['title']) ?>" rel="bookmark" title="<?= htmlspecialchars($recRow['title']); ?> (<?= $recYear; ?>)">
                                        <div class="_img_holder">
                                            <img class="img-fluid rounded" src="<?= $recRow['poster_path']; ?>?resize=300,450" alt="Image <?= htmlspecialchars($recRow['title']); ?>" title="Image <?= htmlspecialchars($recRow['title']); ?> (<?= $recYear; ?>)">
                                            <div class="_overlay_link">
                                                <button class="play-button play-button--small" type="button"></button>
                                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?= $recRow['vote_average']; ?>/10</span></div>
                                            </div>
                                        </div>
                                    </a>
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?= url_movie($recRow['id'], $recRow['title']) ?>" class="_title" rel="bookmark" title="<?= htmlspecialchars($recRow['title']); ?> (<?= $recYear; ?>)"><?= htmlspecialchars($recRow['title']); ?> (<?= $recYear; ?>)</a>
                                        </h2>
                                    </header>
                                </div>
                            </article>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
        <div class="owl-dots disabled"></div>
    </div>
</section>

<div id="modal-watch" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mopie-modal-content p-0 border" style="background-image: url('<?= $movieImages; ?>')">
                <div class="align-items-center d-flex flex-column justify-content-center position-relative p-3 pt-5 text-center">
                    <div class="ex-icon">
                        <i class="fa fa-exclamation fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="h3 font-bold mt-3">Activate your FREE Account!</div>
                    <p>You must create an account to continue watching</p>
                    <a href="/loading&id=<?= urlencode((string)$movieId); ?>&amp;title=<?= urlencode((string)$movieTitle); ?>" class="btn btn-lg bg-theme bg-hover-theme mb-4">Continue to watch for FREE ➞</a>
                </div>
            </div>
            <div class="modal-footer align-items-center d-flex flex-column justify-content-center text-center text-dark">
                <p class="text-large mb-1"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i><span class="text-large font-bold" style="font-weight: 700">Quick Sign Up!</span></p>
                <p class="small">It takes less then 1 minute to Sign Up, then you can enjoy Unlimited Movies &amp; TV titles.</p>
            </div>
        </div>
    </div>
</div>

<?php load_script('js/s.js'); ?>
<?php load_script('js/iklan.js'); ?>
