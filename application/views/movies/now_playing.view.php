<div class="jumbo-hero" style="background-image:url(<?= BASE_PATH ?>/public/images/bg.jpg)">
    <div class="container">
        <div class="jumbo-hero__inner">
            <h1 class="header">Now Playing Movies <?php echo $data['pages']; ?></h1>
        </div>
    </div>
</div>

<section class="mopie-fade">
    <div class="container">
        <div class="row">
            <?php
            $movies = unserialize($data['data']);
            if (is_array($movies['result'])) :
                foreach ((array)$movies['result'] as $row) : ?>
                    <article id="<?= $row['id']; ?>" class="item col-6 col-md-3">
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
        <div class="row">
            <div class="col-12 text-center pagenate">
                <ul class="pagination" role="navigation">
                    <?php if ($data['page'] == 1) : ?>
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&lsaquo; Prev</span>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= URL_WEBSITE ?>/movie/now_playing/<?= $data['page'] - 1; ?>" rel="next">&lsaquo; Prev</a>
                        </li>
                    <?php endif; ?>


                    <li class="page-item">
                        <a class="page-link" href="<?= URL_WEBSITE ?>/movie/now_playing/<?= $data['page'] + 1; ?>" rel="next">Next &rsaquo;</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>