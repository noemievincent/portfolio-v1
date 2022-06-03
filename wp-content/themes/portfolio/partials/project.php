<article class="project" aria-labelledby="<?= get_post_field('post_name'); ?>">
    <a href="<?= get_the_permalink(); ?>" class="project__link full__link"><?= str_replace(':title', get_the_title(), __('Voir le projet :title', 'prt')); ?></a>
	<div class="project__card">
        <h3 class="project__title" id="<?= get_post_field('post_name'); ?>" aria-level="3"><?= get_the_title(); ?></h3>
        <img src="<?= get_field('icon'); ?>" alt="<?= str_replace(':title', get_the_title(), __('Voir le projet :title', 'prt')); ?>" class="project__icon style-svg">
	</div>
    <div class="project__background">
        <svg version="1.1" class="project__svg" id="<?= get_post_field('post_name'); ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 180 190.6" style="enable-background:new 0 0 180 190.6;" xml:space="preserve">
        <style type="text/css">
            .<?= get_post_field('post_name'); ?>{fill:<?= get_field('css_color') ?>;}
        </style>
            <path class="<?= get_post_field('post_name'); ?>" d="M2.6,104C-4,72.7,1.7,37,23.3,17.6c21.7-19.3,59-22.5,91-10.8c32,11.6,58.2,38.1,64.3,69.2
		c6.2,31.2-7.9,67-33.1,86.6c-25.1,19.7-61.4,23.2-89.1,11.5C28.6,162.3,9.5,135.3,2.6,104L2.6,104z"/>
        </svg>
    </div>
</article>