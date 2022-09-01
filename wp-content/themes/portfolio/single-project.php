<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="singleProject">
        <section class="singleProject__header" aria-labelledby="singleProject">
            <a href="<?= get_post_type_archive_link('project') ?>"
               class="singleProject__return full__link"><?= __('Retour aux projets', 'prt') ?></a>
            <h2 class="singleProject__title" id="singleProject" aria-level="2"><?= get_the_title(); ?></h2>
        </section>
        <div class="singleProject__container">
            <p class="singleProject__content">
                <?= get_the_content(); ?>
            </p>
            <?php if (get_field('link')): ?>
                <a href="<?= get_field('link'); ?>"
                   class="singleProject__link btn" target="_blank"><?= __('Visiter le projet', 'prt') ?></a>
            <?php endif; ?>
            <?php if (has_post_thumbnail()): ?>
                <figure class="singleProject__fig">
                    <?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleProject__thumb']); ?>
                </figure>
            <?php else: ?>
                <div class="iframe__container">
                    <p class="iframe__info"><?= __('Ceci est un simple aperçu du projet, cliquez sur le bouton <strong>"Visitez le projet"</strong> pour en découvrir davantage.', 'prt') ?></p>
                    <iframe src="<?= get_field('link'); ?>" class="singleProject__frame" height="700"></iframe>
                </div>
            <?php endif; ?>
            <div class="singleProject__nav">
                <?php prt_previous_post_link('project'); ?>
                <?php prt_next__post_link('project'); ?>
            </div>
        </div>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>