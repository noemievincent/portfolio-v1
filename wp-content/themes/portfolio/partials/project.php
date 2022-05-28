<?php
$css = get_post_meta(get_the_ID(), 'css_color', true);
?>
<article class="project" style="background-color: <?= $css ?>">
	<a href="<?= get_the_permalink(); ?>" class="project__link"><?= str_replace(':title', get_the_title(), __('Voir le projet :title', 'prt')); ?></a>
	<div class="project__card">
        <h4 class="project__title"><?= get_the_title(); ?></h4>
        <img src="<?= get_field('icon'); ?>" alt="<?= str_replace(':title', get_the_title(), __('Voir le projet :title', 'prt')); ?>" class="project__icon style-svg">
	</div>
</article>