<?php
$nowPlaying = $data['nowPlaying'];
$data = $data['data'];
$row = $data['row'];
$bg = array(BASE_PATH . '/public/videos/film.mp4'); // array of filenames
$i = rand(0, count($bg) - 1); // generate random number size of the array
$selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<section class="px-4r">
    <div class="backdrop" style="background-image: url(<?= $data['images'] ?>)"></div>
    <div class="container">
        <div id="player-1" class="row">
            <div class="embed-responsive embed-responsive-16by9">
                <video id="play-video" class="video-js vjs-16-9 vjs-big-play-centered" controls="" preload="none" width="600" height="315" poster="<?= $data['images'] ?>" data-setup="" webkit-playsinline="true" playsinline="true">
                    <source src="<?= $selectedBg; ?>" type="video/mp4" label="SD">
                    <source src="<?= $selectedBg; ?>" type="video/mp4" label="HD">
                    <track kind="subtitles" src="" srclang="en" label="English">
                    <track kind="subtitles" src="" srclang="fr" label="French">
                    <track kind="subtitles" src="" srclang="de" label="Germany">
                    <track kind="subtitles" src="" srclang="nl" label="Netherland">
                    <track kind="subtitles" src="" srclang="it" label="Italy">
                </video>
            </div>
        </div>
        <script>
            var playDuration = 129 * 60;
        </script>
    </div>
    <div class="container py-4">
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
                                <?php $k++; ?>
                            <?php endfor; ?>
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
                            <li>Production Company: <span><?php echo $data['companies']; ?></span></li>
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
                $movies = unserialize($nowPlaying);
                if (is_array($movies['result'])) :
                    foreach ((array)array_slice($movies['result'], 0, 20) as $row) : ?>
                        <div class="owl-item active" style="width: 150px; margin-right: 30px;">
                            <article id="<?= $row['id']; ?>" class="item ">
                                <div class="thumb mb-4">
                                    <a href="<?= url_movie($row['id'], $row['title']) ?>" rel="bookmark" title="<?= $row['title']; ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
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
                                            <a href="<?= url_movie($row['id'], $row['title']) ?>" class="_title" rel="bookmark" title="<?= $row['title']; ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?= $row['title']; ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
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
            <div class="modal-body mopie-modal-content p-0 border" style="background-image: url('<?php echo $data['images']; ?>')">
                <div class="align-items-center d-flex flex-column justify-content-center position-relative p-3 pt-5 text-center">
                    <div class="ex-icon">
                        <i class="fa fa-exclamation fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="h3 font-bold mt-3">Activate your FREE Account!</div>
                    <p>You must create an account to continue watching</p>
                    <a href="/loading&id=<?php echo $row['id']; ?>&amp;title=<?php echo $data['title']; ?>" class="btn btn-lg bg-theme bg-hover-theme mb-4">Continue to watch for FREE ➞</a>
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