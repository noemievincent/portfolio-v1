<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Noémie Vincent">
    <meta name="keywords" content="Portfolio, Web Designer, Web Developer, Web">
    <meta name="description" content="Portfolio de Noémie Vincent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= wp_title('·', false, 'right') . 'Noémie Vincent'; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= prt_mix('css/style.css'); ?>"/>
    <script type="text/javascript" src="<?= prt_mix('js/script.js'); ?>"></script>
	<?php wp_head(); ?>
</head>
<body class="<?= is_home() ? 'home' : 'main' ?>">
<header class="header">
    <input id="toggle" type="checkbox">
    <div class="info">
        <h1 class="header__title hidden" id="header" aria-level="1"><?= get_bloginfo('name'); ?></h1>
        <p class="header__tagline hidden"><?= get_bloginfo('description'); ?></p>
        <div class="homepage">
            <a href="<?= home_url() ?>" class="homepage__link full__link"><?= __('Accueil', 'prt'); ?></a>
            <span class="homepage__logo"></span>
        </div>
        <div class="burgermenu">
            <label for="toggle" class="hamburger">
                <span class="top-bun"></span>
                <span class="meat"></span>
                <span class="bottom-bun"></span>
            </label>
        </div>
    </div>
    <div class="navigation">
        <nav class="header__nav nav" aria-labelledby="nav">
            <h2 class="nav__title hidden" id="nav" aria-level="2"><?= __('Navigation principale', 'prt'); ?></h2>
            <?php wp_nav_menu([
                'menu'       => 'primary',
                'container'  => false,
                'menu_class' => 'nav__container',
                'menu_id'    => 'navigation',
                'walker'     => new PrimaryMenuWalker(),
            ]); ?>
        </nav>
        <div class="languages">
            <?php foreach (pll_the_languages(['raw' => true]) as $code => $locale) : ?>
                <a href="<?= $locale['url']; ?>" lang="<?= $locale['locale']; ?>" hreflang="<?= $locale['locale']; ?>"
                   class="languages__locale <?= $locale['current_lang'] ? ' languages__locale--current' : '' ?>"
                   title="<?= $locale['name']; ?>"><?= $code; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</header>