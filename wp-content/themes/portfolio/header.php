<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?= prt_mix('css/style.css'); ?>"/>
    <script type="text/javascript" src="<?= prt_mix('js/script.js'); ?>"></script>
    <?php wp_head(); ?>
</head>
<body>
<header class="header">
    <h1 class="header__title hidden"><?= get_bloginfo('name'); ?></h1>
    <p class="header__tagline hidden"><?= get_bloginfo('description'); ?></p>
    <nav class="header__nav nav">
        <h2 class="nav__title hidden"><?= __('Navigation principale', 'prt'); ?></h2>
        <ul class="nav__container">
            <?php foreach (prt_get_menu_items('primary') as $link): ?>
                <li class="<?= $link->getBemClasses('nav__item'); ?>">
                    <a href="<?= $link->url; ?>"
                        <?= $link->title ? ' title="' . $link->title . '"' : ''; ?>
                       class="nav__link">
                        <?= $link->label; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="nav__languages">
            <?php foreach (pll_the_languages(['raw' => true]) as $code => $locale) : ?>
                <a href="<?= $locale['url']; ?>" lang="<?= $locale['locale']; ?>" hreflang="<?= $locale['locale']; ?>"
                   class="nav__locale" title="<?= $locale['name']; ?>"><?= $code; ?></a>
            <?php endforeach; ?>
        </div>
    </nav>
</header>