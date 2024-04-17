<div class="jumbo-hero" style="background-image:url(<?= BASE_PATH ?>/public/images/bg.jpg)">
    <div class="container">
        <div class="jumbo-hero__inner">
            <h1 class="header"><?= SITE_NAME ?></h1>
            <h3 class="text-large"><?= SITE_DESCRIPTION ?></h3>
            <a href="/loading" class="btn btn-outline-theme btn-lg mt-2 omh-goTo">Subscribe to Watch</a>
        </div>
    </div>
</div>

<section class="mopie-fade">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= URL_WEBSITE ?>/movie/popular" class="section-title" title="Popular">Popular <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php
            $movies = unserialize($data['popularMovies']);
            if (is_array($movies['result'])) :
                foreach ((array)array_slice($movies['result'], 0, 20) as $row) : ?>
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
            <?php endforeach;
            endif; ?>
        </div>
        <div class="row my-2">
            <div class="col d-flex justify-content-center">
                <div class="d-sm-none">
                    <script>
                        var y = "";
                        var x = [60, 115, 99, 114, 105, 112, 116, 32, 116, 121, 112, 101, 61, 34, 116, 101, 120, 116, 47, 106, 97, 118, 97, 115, 99, 114, 105, 112, 116, 34, 62, 10, 9, 97, 116, 79, 112, 116, 105, 111, 110, 115, 32, 61, 32, 123, 10, 9, 9, 39, 107, 101, 121, 39, 32, 58, 32, 39, 101, 55, 56, 53, 102, 98, 54, 50, 49, 99, 98, 51, 57, 97, 99, 50, 97, 55, 48, 49, 102, 50, 101, 57, 52, 56, 50, 98, 53, 56, 53, 98, 39, 44, 10, 9, 9, 39, 102, 111, 114, 109, 97, 116, 39, 32, 58, 32, 39, 105, 102, 114, 97, 109, 101, 39, 44, 10, 9, 9, 39, 104, 101, 105, 103, 104, 116, 39, 32, 58, 32, 57, 48, 44, 10, 9, 9, 39, 119, 105, 100, 116, 104, 39, 32, 58, 32, 55, 50, 56, 44, 10, 9, 9, 39, 112, 97, 114, 97, 109, 115, 39, 32, 58, 32, 123, 125, 10, 9, 125, 59, 10, 60, 47, 115, 99, 114, 105, 112, 116, 62, 10, 60, 115, 99, 114, 105, 112, 116, 32, 116, 121, 112, 101, 61, 34, 116, 101, 120, 116, 47, 106, 97, 118, 97, 115, 99, 114, 105, 112, 116, 34, 32, 115, 114, 99, 61, 34, 47, 47, 119, 119, 119, 46, 116, 111, 112, 99, 114, 101, 97, 116, 105, 118, 101, 102, 111, 114, 109, 97, 116, 46, 99, 111, 109, 47, 101, 55, 56, 53, 102, 98, 54, 50, 49, 99, 98, 51, 57, 97, 99, 50, 97, 55, 48, 49, 102, 50, 101, 57, 52, 56, 50, 98, 53, 56, 53, 98, 47, 105, 110, 118, 111, 107, 101, 46, 106, 115, 34, 62, 60, 47, 115, 99, 114, 105, 112, 116, 62];
                        x.forEach(char => {
                            y += String.fromCharCode(char)
                        });
                        document.write(y);
                    </script>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= URL_WEBSITE ?>/movie/now_playing" class="section-title" title="Now Playing">Now Playing <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php
            $movies = unserialize($data['nowPlaying']);
            if (is_array($movies['result'])) :
                foreach ((array)array_slice($movies['result'], 0, 20) as $row) : ?>
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
            <?php endforeach;
            endif; ?>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= URL_WEBSITE ?>/movie/up_coming" class="section-title" title="Coming Soon">Coming Soon <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php
            $movies = unserialize($data['upComing']);
            if (is_array($movies['result'])) :
                foreach ((array)array_slice($movies['result'], 0, 20) as $row) : ?>
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
            <?php endforeach;
            endif; ?>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= URL_WEBSITE ?>/movie/top_rated" class="section-title" title="Top Rated">Top Rated <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php
            $movies = unserialize($data['topRated']);
            if (is_array($movies['result'])) :
                foreach ((array)array_slice($movies['result'], 0, 20) as $row) : ?>
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
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= BASE_PATH ?>/tv/popular" class="section-title" title="Tv Popular">Tv Popular <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php
            $tv = unserialize($data['popularTv']);
            if (is_array($tv['result'])) :
                foreach ((array)array_slice($tv['result'], 0, 20) as $row) : ?>
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
            <?php endforeach;
            endif; ?>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= BASE_PATH ?>/tv/airing_today" class="section-title" title="Airing Today">Airing Today <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php
            $tv = unserialize($data['airingToday']);
            if (is_array($tv['result'])) :
                foreach ((array)array_slice($tv['result'], 0, 20) as $row) : ?>
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
            <?php endforeach;
            endif; ?>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= BASE_PATH ?>/tv/on_the_air" class="section-title" title="On The Air">On The Air <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php
            $tv = unserialize($data['onTheAir']);
            if (is_array($tv['result'])) :
                foreach ((array)array_slice($tv['result'], 0, 20) as $row) : ?>
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
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>