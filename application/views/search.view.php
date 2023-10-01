<div class="jumbo-hero" style="background-image:url(<?= BASE_PATH ?>/public/images/bg.jpg)">
    <div class="container">
        <div class="jumbo-hero__inner">
            <h1 class="header">Search Result for "<?php echo $data['newquery']; ?>"</h1>
        </div>
    </div>
</div>

<section class="mopie-fade">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?= URL_WEBSITE ?>/search/movies?s=<?= $_GET['s']; ?>" class="section-title" title="Movie Result">Movie Result <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <?php $movies = unserialize($data['searchDataMovie']); ?>
        <?php if ($movies) : ?>
            <div class="row">
                <?php foreach ((array)$movies['result'] as $row) : ?>
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
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center pagenate">
                    <ul class="pagination" role="navigation">
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&lsaquo; Prev</span>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="<?= URL_WEBSITE ?>/search/movies/2?s=<?= $_GET['s']; ?>" rel="next">Next &rsaquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2><i class="fa fa-exclamation"></i> No Movie Found for this search</h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="#" class="section-title" title="Tv Result">Tv Result <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <?php $tv = unserialize($data['searchDataTv']); ?>
        <?php if ($tv) : ?>
            <div class="row">
                <?php foreach ((array)array_slice($tv['result'], 0, 20) as $row) : ?>
                    <article id="<?= $row['id']; ?>" class="item col-6 col-md-3">
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
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center pagenate">
                    <ul class="pagination" role="navigation">
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&lsaquo; Prev</span>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="<?= URL_WEBSITE ?>/search/tv/2?s=<?= $_GET['s']; ?>" rel="next">Next &rsaquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2><i class="fa fa-exclamation"></i> No Series Found for this search</h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>