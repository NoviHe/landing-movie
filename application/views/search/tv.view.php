<?php
$searchQuery = htmlspecialchars($_GET['s'] ?? '');
?>
<div class="jumbo-hero" style="background-image:url(<?= BASE_PATH ?>/public/images/bg.jpg)">
    <div class="container">
        <div class="jumbo-hero__inner">
            <h1 class="header">Search Result for "<?php echo htmlspecialchars($data['newquery'] ?? ''); ?>"<?php echo htmlspecialchars($data['pages'] ?? ''); ?></h1>
        </div>
    </div>
</div>

<section class="mopie-fade">
    <div class="container">
        <?php $tv = !empty($data['searchDataTv']) ? @unserialize($data['searchDataTv']) : false; ?>
        <?php if (is_array($tv) && !empty($tv['result']) && is_array($tv['result'])) : ?>
            <div class="row">
                <?php foreach ((array)array_slice($tv['result'], 0, 20) as $row) : 
                    $year = !empty($row['release_date']) ? date('Y', strtotime($row['release_date'])) : '';
                ?>
                    <article id="<?= $row['id']; ?>" class="item col-6 col-md-3">
                        <div class="thumb mb-4">
                            <a href="<?= url_tv($row['id'], $row['title']) ?>" rel="bookmark" title="<?= htmlspecialchars($row['title']); ?> (<?= $year; ?>)">
                                <div class="_img_holder">
                                    <img class="img-fluid rounded" src="<?= $row['poster_path']; ?>?resize=300,450" alt="Image <?= htmlspecialchars($row['title']); ?>" title="Image <?= htmlspecialchars($row['title']); ?> (<?= $year; ?>)">
                                    <div class="_overlay_link">
                                        <button class="play-button play-button--small" type="button"></button>
                                        <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?= $row['vote_average']; ?>/10</span></div>
                                    </div>
                                </div>
                            </a>
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?= url_tv($row['id'], $row['title']) ?>" class="_title" rel="bookmark" title="<?= htmlspecialchars($row['title']); ?> (<?= $year; ?>)"><?= htmlspecialchars($row['title']); ?> (<?= $year; ?>)</a>
                                </h2>
                            </header>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center pagenate">
                    <ul class="pagination" role="navigation">
                        <?php if (($data['page'] ?? 1) == 1) : ?>
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">&lsaquo; Prev</span>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= URL_WEBSITE ?>/search/tv/<?= ($data['page'] - 1); ?>?s=<?= $searchQuery; ?>" rel="next">&lsaquo; Prev</a>
                            </li>
                        <?php endif; ?>

                        <li class="page-item">
                            <a class="page-link" href="<?= URL_WEBSITE ?>/search/tv/<?= (($data['page'] ?? 1) + 1); ?>?s=<?= $searchQuery; ?>" rel="next">Next &rsaquo;</a>
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
