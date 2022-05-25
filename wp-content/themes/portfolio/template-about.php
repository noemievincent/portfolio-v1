<?php /* Template Name: About page template */ ?>
<?php get_header(); ?>
<?php if(have_posts()): while (have_posts()): the_post(); ?>
    <main class="layout about">
        <h2 class="about__title"><?= get_the_title(); ?></h2>
        <div class="about__content has-2-columns">
            <section class="about__hobbies">
                <h3><?= __('Qui suis-je ?', 'prt'); ?></h3>
                <div class="wysiwyg">
                    <?= get_field('hobbies'); ?>
                </div>
            </section>
            <section class="about__right">
                <section class="about__presentation">
                    <h3><?= __('Parcours professionnel', 'prt'); ?></h3>
                    <div class="wysiwyg">
                        <?= get_field('presentation'); ?>
                    </div>
                </section>
                <div class="cta">
                    <a href="https://cv.noemie-vincent.be/" class="cta__link btn btn--secondary"><?= __('Découvrir mon CV', 'prt'); ?></a>
                    <a href="<?= get_the_permalink(prt_get_template_page('template-contact')); ?>" class="cta__link btn"><?= __('Me contacter', 'prt'); ?></a>
                </div>
            </section>
        </div>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>