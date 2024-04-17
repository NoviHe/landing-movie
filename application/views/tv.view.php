<?php
$idSeries = $data['idSeries'];
$airingToday = $data['airingToday'];
$data = $data['data'];
$row = $data['row'];
$row2 = $data['row2'];
$bg = array(BASE_PATH . '/public/videos/film.mp4'); // array of filenames
$i = rand(0, count($bg) - 1); // generate random number size of the array
$selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen

$idSeries = explode('-', $idSeries);

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
    <div class="backdrop" style="background-image: url(<?= $data['images'] ?>)"></div>
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
            <!-- https://filmku.online/embed/series?imdb=tt12637874&sea=&epi=1 -->
            <iframe class="embed-mupi embed-responsive embed-responsive-16by9" src="https://filmku.online/embed/series?tmdb=<?= $row['id']; ?>&sea=<?= $idSeries[1] ?>&epi=<?= $idSeries[2] ?>" frameborder="0" scrolling="no" allowfullscreen></iframe>

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
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <video id="play-video" class="video-js vjs-16-9 vjs-big-play-centered" controls="" preload="none" width="600" height="315" poster="<?= $data['images'] ?>" data-setup="" webkit-playsinline="true" playsinline="true">
                    <source src="<?= $selectedBg; ?>" type="video/mp4" label="SD">
                    <source src="<?= $selectedBg; ?>" type="video/mp4" label="HD">
                    <track kind="subtitles" src="" srclang="en" label="English">
                    <track kind="subtitles" src="" srclang="fr" label="French">
                    <track kind="subtitles" src="" srclang="de" label="Germany">
                    <track kind="subtitles" src="" srclang="nl" label="Netherland">
                    <track kind="subtitles" src="" srclang="it" label="Italy">
                </video>
            </div> -->
        </div>
        <!-- <script>
            var playDuration = 129 * 60;
        </script> -->
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
                <a href="/home/loading&id=<?php echo $row['id']; ?>&amp;title=<?php echo $data['title']; ?>" class="btn btn-outline-theme mx-1">Watch Now <i class="fa fa-film" aria-hidden="true"></i></a>
                <a href="/home/loading&id=<?php echo $row['id']; ?>&amp;title=<?php echo $data['title']; ?>&sub_id=<?php echo '' . htmlspecialchars(isset($_GET["sub_id"]) ? $_GET['sub_id'] : '') . ''; ?>" class="btn btn-outline-theme mx-1">Download <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-3">
                    <img class="img-fluid" src="<?php echo $data['images_small']; ?>?resize=300,450" alt="Poster <?php echo $data['title']; ?> <?php echo $data['year']; ?>" title="Poster <?php echo $data['title']; ?> <?php echo $data['year']; ?>">
                </div>
                <div class="col-md-10 col-sm-8 col-9">
                    <div class="entry-title d-flex flex-column-reverse flex-md-row justify-content-between">
                        <h1 class="h2"><?php echo $data['title']; ?> <span class="tiny text-muted"><?php echo $data['year']; ?></span></h1>
                        <div class="sub-r">
                            <a href="/home/loading&id=<?php echo $row['id']; ?>&amp;title=<?php echo $data['title']; ?>" class="btn subs">Subscribe to Watch | $0.00</a>
                        </div>
                    </div>
                    <div class="entry-info mb-3">
                        <div class="__rate">
                            <?php for ($k = 1; $k <= $data['get_rating']; $k++) : ?>
                                <i class="fa fa-star text-warning"></i>
                            <?php endfor; ?>
                            <?php for ($i = $data['emp_rating']; $i >= 1; $i--) : ?>
                                <i class="fa fa-star-o text-muted"></i>
                            <?php $k++;
                            endfor; ?>
                        </div>
                        <div class="__info">
                            <span class="text-muted small"><?php echo $data['get_rating']; ?>/10</span> <span class="text-muted small">by <?php echo $data['vote_count']; ?> users</span>
                        </div>
                    </div>
                    <div class="entry-desciption text-muted">
                        <p><?php echo $data['description']; ?></p>
                    </div>
                    <div class="entry-table">
                        <ul>
                            <li>Released: <span><?php echo date('M d, Y', strtotime($data['release_date'])); ?></span></li>
                            <li>Runtime: <span><?php echo $data['runtime']; ?> minutes</span></li>
                            <li>Genre: <span><?php echo $data['genre']; ?></span></li>
                            <li>Stars: <span><?php echo $data['cast']; ?></span></li>
                            <li>Network: <span><?php echo $data['networks']; ?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="episodes">
                        <div>
                            <ul class="nav nav-tabs" id="episodesTab" role="tablist">
                                <?php if (is_array($row['seasons'])) :
                                    foreach ((array)$row['seasons'] as $for) :
                                        if (empty($for['air_date'])) {
                                            continue;
                                        }
                                        if ($for['poster_path']) {
                                            $poster_path = 'https://image.tmdb.org/t/p/original' . $for['poster_path'];
                                        } else {
                                            $poster_path = BASE_PATH . '/public/images/no-cover.png';
                                        } ?>
                                        <li class="nav-item">
                                            <a href="<?php echo url_tv($row['id'] . '-' . $for['season_number'], $row['name']); ?>" class="nav-link" id="season-<?php echo $for['season_number']; ?>-tab">
                                                <?php echo $for['name']; ?>
                                            </a>
                                        </li>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php if (!empty($row2)) : ?>
                        <?php if (is_array($row2['episodes'])) : ?>
                            <div class="tab-content episodes_list" id="episodesTabContent">
                                <div class="tab-pane fade show active" id="season-<?php echo $row2['season_number']; ?>" role="tabpanel" aria-labelledby="season-<?php echo $row2['season_number']; ?>-tab">
                                    <ul>
                                        <?php foreach ((array)$row2['episodes'] as $eps) : ?>
                                            <?php if ($eps['still_path']) {
                                                $still_path = 'https://image.tmdb.org/t/p/original' . $eps['still_path'];
                                            } else {
                                                $still_path = BASE_PATH . '/public/images/no-backdrop.png';
                                            } ?>
                                            <li>
                                                <div class="episodes_list_item">
                                                    <div>
                                                        <a class="episodes_list_episode" href="<?php echo url_tv($row['id'] . '-' . $eps['season_number'] . '-' . $eps['episode_number'], $row['name']); ?>" title="<?php echo $eps['name']; ?>">Se-<?php echo $eps['season_number']; ?> Ep-<?php echo $eps['episode_number']; ?>. <?php echo $eps['name']; ?></a>
                                                        <span class="episodes_list_release"><?php echo date('Y-m-d', strtotime($eps['air_date'])); ?></span>
                                                    </div>
                                                    <div>
                                                        <a class="episodes_list_watch" href="<?php echo url_tv($row['id'] . '-' . $eps['season_number'] . '-' . $eps['episode_number'], $row['name']); ?>"><i class="fa fa-lg fa-play-circle"></i> <span>Watch</span></a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
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
            <h3 class="h4">Series Recommendations</h3>
        </div>
    </div>
    <div class="owl-carousel owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1440px;">
                <?php
                $tvRecomend = unserialize($airingToday);
                if (is_array($tvRecomend['result'])) :
                    foreach ((array)array_slice($tvRecomend['result'], 0, 20) as $row) : ?>
                        <div class="owl-item active" style="width: 150px; margin-right: 30px;">
                            <article id="<?= $row['id']; ?>" class="item ">
                                <div class="thumb mb-4">
                                    <a href="<?= url_tv($row['id'], $row['title']) ?>" rel="bookmark" title="<?= $row['title']; ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                                        <div class="_img_holder">
                                            <img class="img-fluid rounded" src="<?= $row['poster_path']; ?>?resize=300,450" alt="Image <?= $row['title']; ?>" title="Image <?= $row['title']; ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                                            <div class="_overlay_link">
                                                <button class="play-button play-button--small" type="button"></button>
                                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?= $row['vote_average']; ?>/10</span></div>
                                            </div>
                                        </div>
                                    </a>
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?= url_tv($row['id'], $row['title']) ?>" class="_title" rel="bookmark" title="<?= $row['title']; ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?= $row['title']; ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
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
            <div class="modal-body mopie-modal-content p-0 border" style="background-image: url('<?php echo $images; ?>')">
                <div class="align-items-center d-flex flex-column justify-content-center position-relative p-3 pt-5 text-center">
                    <div class="ex-icon">
                        <i class="fa fa-exclamation fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="h3 font-bold mt-3">Activate your FREE Account!</div>
                    <p>You must create an account to continue watching</p>
                    <a href="/loading?id=<?php echo $row['id']; ?>&amp;title=<?php echo $title; ?>" class="btn btn-lg bg-theme bg-hover-theme mb-4">Continue to watch for FREE ➞</a>
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