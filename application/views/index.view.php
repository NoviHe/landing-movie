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