<!DOCTYPE html>
<html <?php language_attributes(); ?> class="js-disabled">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Noémie Vincent">
    <meta name="keywords" content="Portfolio, Web Designer, Web Developer, Web">
    <meta name="description" content="Portfolio de Noémie Vincent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:title" content="Noémie Vincent">
    <meta property="og:description" content="Découvrez le portfolio de Noémie Vincent">
    <meta property="og:image" content="https://noemie-vincent.be/wp-content/themes/portfolio/img/share.png">
    <meta property="og:site_name" content="Noémie Vincent - Web Developper">
    <title><?= wp_title('·', false, 'right') . 'Noémie Vincent'; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= prt_mix('css/style.css'); ?>"/>
    <?php wp_head(); ?>
</head>

<body class="<?= is_home() ? 'home' : 'main' ?>">
<?php get_template_part('school-project-banner'); ?>
<header class="header">
    <input id="toggle" class="toggle" type="checkbox">
    <div class="info">
        <h1 class="header__title hidden" id="header" aria-level="1"><?= get_bloginfo('name'); ?></h1>
        <p class="header__tagline hidden"><?= get_bloginfo('description'); ?></p>
        <div class="homepage">
            <a href="<?= home_url() ?>" class="homepage__link full__link"><?= __('Accueil', 'prt'); ?></a>
            <span class="homepage__logo">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                         x="0px" y="0px" viewBox="0 0 60 53.5" xml:space="preserve" fill="#3D3329">
                        <g>
                            <path d="M59.1,0.9v51.6h-1.2L27.2,0.9h2.9l24.1,39.6l1.8,2.9V0.9H59.1 M60,0h-5v40.1L30.6,0h-4.8v0.5l31.5,53H60V0
                            L60,0z"/>
                            <path d="M25.8,41.6V0h4.8v53.5h-2.7L4.8,11.9v41.6H0V0h2.7L25.8,41.6z"/>
                        </g>
                    </svg>
                </span>
        </div>
        <div class="burgermenu">
            <label for="toggle" class="hamburger">
                <span class="top-bun"></span>
                <span class="meat"></span>
                <span class="bottom-bun"></span>
                <span class="hidden">Ouvrir le menu</span>
            </label>
        </div>
    </div>
    <div class="navigation">
        <nav class="header__nav nav" aria-labelledby="nav">
            <h2 class="nav__title hidden" id="nav" aria-level="2"><?= __('Navigation principale', 'prt'); ?></h2>
            <?php wp_nav_menu([
                'menu' => 'primary',
                'container' => false,
                'menu_class' => 'nav__container',
                'menu_id' => 'navigation',
                'walker' => new PrimaryMenuWalker(),
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