<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?= $page->title()->html() ?> &middot; <?= $site->title()->html() ?></title>
    <meta name="description" content="<?= $site->description()->html() ?>">
    <?php snippet('metaimage') ?>
    <?php snippet('metaicons') ?>

    <link rel="stylesheet" property="stylesheet" href="https://fonts.googleapis.com/css?family=<?= $site->fontheadings() ?>:300,400,700,900">
    <link rel="stylesheet" property="stylesheet" href="https://fonts.googleapis.com/css?family=<?= $site->fontbody() ?>:300,400,700,900">

    <?php snippet('scss'); ?>
    <?php // echo css('assets/css/default.css') ?>
    <?php foreach($page->files()->filterBy('extension', 'css') as $css): ?>
    <?= css($css->url()) ?>
    <?php endforeach ?>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?php // echo js('assets/scripts/animsition.min.js') ?>
    <?php // echo js('assets/scripts/glidejs.min.js') ?>
    <?php // echo js('assets/scripts/jquery.fitvids.js') ?>
    <?php // echo js('assets/scripts/prism.js') ?>
    <?php // echo js('assets/scripts/featherlight.min.js') ?>
    <?php // echo js('assets/scripts/featherlight.gallery.min.js') ?>
    <?= js('assets/scripts/libraries.min.js') ?>
</head>
<body class="demo-2 navstandard bg-init <?= $page->pagemask(); $page->intendedTemplate(); ?>">

    <div class="animsition-overlay-slide"></div>

    <div id="canvas">

        <header class="header cf" role="banner">
            <div class="wrap-fl">

                <?php if( $logo = $site->images()->find($site->logo()) ): ?>
                    <a href="<?= url() ?>" class="logo al" rel="home"
                        data-animsition-in-class="overlay-slide-in-top"
                        data-animsition-in-duration="500"
                        data-animsition-out-class="overlay-slide-out-top"
                        data-animsition-out-duration="500">
                        <img src="<?= $logo->url() ?>" alt="<?= $site->title()->html() ?>" />
                    </a>
                <?php else: ?>
                    <a href="<?= url() ?>" class="logo al" rel="home"><?= $site->title()->html() ?></a>
                <?php endif; ?>

                <?php snippet('menu') ?>

                <div class="hamburger-container">
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>

            </div>
        </header>

        <div id="container">
