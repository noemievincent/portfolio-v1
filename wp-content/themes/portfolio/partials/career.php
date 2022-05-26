<article class="career">
    <a href="<?= get_field('location_url') ?>" class="post__link"><?= str_replace(':name', get_field( 'location_name' ), __('Se rendre sur le site de l‘ ":name"', 'prt')); ?> </a>
    <div class="career__card">
        <header class="career__head">
            <h3 class="career__title"><?= get_the_title(); ?></h3>
            <div class="career__dates">
                <p class="career__date career__start"><?= get_field('start_date') ?></p>
                <p class="career__date career__end"><?= get_field('end_date') ?></p>
            </div>
        </header>
        <figure class="career__fig">
			<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'career__thumb']); ?>
        </figure>
    </div>
</article>