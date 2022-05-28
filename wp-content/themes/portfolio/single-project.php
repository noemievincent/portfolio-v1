<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="singleProject">
        <section class="singleProject__header" aria-labelledby="singleProject">
            <a href="<?= get_post_type_archive_link('project') ?>"
               class="singleProject__return"><?= __('Retour aux projets', 'prt') ?></a>
            <h2 class="singleProject__title" id="singleProject" aria-level="2"><?= get_the_title(); ?></h2>
        </section>
        <div class="singleProject__container">
            <div class="singleProject__content">
				<?php the_content(); ?>
            </div>
            <a href="<?= get_field('link'); ?>"
               class="singleProject__link btn"><?= __('Visiter le projet', 'prt') ?></a>
            <figure class="singleProject__fig">
				<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleProject__thumb']); ?>
            </figure>
        </div>
        <div class="singleProject__nav">
			<?php prt_previous_post_link('project'); ?>
			<?php prt_next__post_link('project'); ?>
        </div>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>


