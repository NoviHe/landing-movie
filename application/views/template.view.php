<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $hack_title ?></title>
    <link rel="shortcut icon" href="<?= BASE_PATH . '/public/img/' . FAVICON ?>">
    <meta name="description" content="<?= $hack_description; ?>">
    <meta name="keywords" content="<?= $hack_keywords; ?>" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="author" content="NviReview">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php
    require_once ROOT . "/application/functions/functions_html.php";
    ?>

    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?= $hack_title; ?>" />
    <meta property="og:description" content="<?= $hack_description; ?>">
    <meta property="og:type" content="website" />
    <meta property="og:author" content="NviReview">
    <meta property="og:site_name" content="<?= SITE_NAME ?>">
    <meta property="og:url" content="<?= curent_url() ?>" />
    <?php if (!is_null($hack_images)) : ?>
        <meta property="og:image" content="<?php echo $hack_images ?>" />
    <?php endif; ?>
    <meta content='100262439001789' property='fb:admins' />
    <meta content='3664215543855179' property='fb:app_id' />

    <script src="https://use.fontawesome.com/3db27005e3.js"></script>
    <link href="https://use.fontawesome.com/3db27005e3.css" media="all" rel="stylesheet">
    <?php
    load_css('css/v1.css');
    load_script('js/js.js');
    load_script('js/script-no-click.js');
    ?>
</head>

<body>
    <div class="sign-in-overlay"></div>
    <div class="signin js-signin-form">
        <div class="signin_close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="signin_holder">

            <form id="signinfrom">
                <div class="h3">Sign In</div>
                <div class="form-group">
                    <label for="signInEmail">Email</label>
                    <input type="email" class="form-control bg-dark border-dark text-secondary" id="signInEmail" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We&#039;ll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="signPassword">Password</label>
                    <input type="password" class="form-control bg-dark border-dark text-secondary" id="signPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label id="forgotpass" class="form-check-label small text-muted cursor text-hover-theme" for="exampleCheck1">Forgot Password?</label>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-light loading_signIn text-center mb-3 d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="text-danger sign-in-form-alert mb-3" role="alert"></div>

                <button type="submit" class="btn btn-outline-theme btn-block sign-in-submit">Sign In</button>
                <div class="divider divider--small"></div>
                <div class="text-center">
                    <p class="text-small mb-3">Or</p>
                    <a href="/request" class="btn btn-theme btn-block" type="button">Create Free Account</a>
                </div>
            </form>

            <form id="resetpassform">
                <div class="h3">Reset Password</div>
                <p class="text-muted">Enter your email address and we&#039;ll send you a link to reset your password.</p>
                <div class="form-group">
                    <label for="resetEmail">Email</label>
                    <input type="email" class="form-control bg-dark border-dark text-secondary" id="resetEmail" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-light loading_signIn text-center mb-3 d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="text-danger sign-in-form-alert mb-3" role="alert"></div>

                <button type="submit" class="btn btn-outline-theme btn-block mb-3">Reset Password</button>
                <div id="backToSignIn" class="text-center cursor">Back to Sign In</div>
            </form>

        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-mopie fixed-top">
        <a class="navbar-brand" href="/">
            <img width="30" src="<?= BASE_PATH ?>/public/images/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movies <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu mop" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-12">
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/movie/now_playing">Now Playing</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/movie/popular">Popular</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/movie/top_rated">Top Rated</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/movie/up_coming">Coming Soon</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TV Shows <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu mop" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-12">
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/tv/airing_today">Airing</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/tv/popular">Popular</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/tv/on_the_air">On The Air</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genres <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu px-3" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-6 px-0">
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/28/action" title="Action">Action</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/12/adventure" title="Adventure">Adventure</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/16/animation" title="Animation">Animation</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/35/comedy" title="Comedy">Comedy</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/80/crime" title="Crime">Crime</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/99/documentary" title="Documentary">Documentary</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/18/drama" title="Drama">Drama</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/10751/family" title="Family">Family</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/14/fantasy" title="Fantasy">Fantasy</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/36/history" title="History">History</a>
                            </div>
                            <div class="col-6 px-0">
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/27/horror" title="Horror">Horror</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/10402/music" title="Music">Music</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/9648/mystery" title="Mystery">Mystery</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/10749/romance" title="Romance">Romance</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/878/science-fiction" title="Science Fiction">Science Fiction</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/10770/tv-movie" title="TV Movie">TV Movie</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/53/thriller" title="Thriller">Thriller</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/10752/war" title="War">War</a>
                                <a class="dropdown-item" href="<?= URL_WEBSITE ?>/home/genre/37/western" title="Western">Western</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <form class="input-group my-2 my-md-0 mr-md-3 bg-faded" action="<?= URL_WEBSITE ?>/search" method="GET">
                    <input type="text" class="form-control" name="s" placeholder="Search..." aria-label="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-search focus-no-sh" id="search-btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
                <li class="nav-item">
                    <div class="nav-link cursor mb-3 mb-md-0" data-toggle="modal" data-target="#modalLang"><i class="fa fa-globe" aria-hidden="true"></i></div>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-theme ml-md-3 mb-3 mb-md-0 sign-in">Sign In</button>
                </li>
                <li class="nav-item">
                    <a href="/loading" class="btn btn-theme ml-md-3">Register</i></a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    $view = new View($viewName);
    $view->bind('data', $data);

    $view->render();
    ?>

    <footer class="footer">
        <div class="container">
            <div class="footer_wrapper d-flex flex-column flex-md-row">
                <div class="copyright">Copyright © <?php echo date('Y') ?> <span class="text-capitalize"><?= $_SERVER['HTTP_HOST'] ?></span> | All rights
                    reserved</div>
                <div class="footer_links">
                    <a href="/home/dmca_notice">DMCA</a>
                    <a href="/home/privacy_policy">Privacy Policy</a>
                    <a href="/home/contact_us">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- <?php echo histats_code() ?> -->
    <!-- <script>document.write(atob("PHNjcmlwdCB0eXBlPSd0ZXh0L2phdmFzY3JpcHQnIHNyYz0nLy9wbDIwNjA2NDA0LmhpZ2hjcG1yZXZlbnVlZ2F0ZS5jb20vYzUvZTQvOTMvYzVlNDkzY2JlMTlmN2QyYzQ2MWI2NmQ1MWE1MWIxODUuanMnPjwvc2NyaXB0Pg=="));</script> -->
</body>

</html>