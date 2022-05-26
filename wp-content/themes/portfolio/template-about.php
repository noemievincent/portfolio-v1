<?php /* Template Name: About page template */ ?>
<?php get_header(); ?>
    <main class="layout about">
        <h2 class="about__title"><?= get_the_title(); ?></h2>
        <div class="about__content has-2-columns">
            <section class="about__presentation">
                <h3><?= __('Qui suis-je ?', 'prt'); ?></h3>
                <div class="about__content">
                </div>
            </section>
            <section class="about__right">
                <section class="about__career">
                    <h3><?= __('Parcours professionnel', 'prt'); ?></h3>
                    <div class="about__container">
	                    <?php if (($exp = prt_get_exp())->have_posts()):while ($exp->have_posts()): $exp->the_post(); ?>
                            <article class="career">
                                <a href="<?= get_field('location_url') ?>" class="post__link"><?= str_replace(':name', get_field( 'location_name' ), __('Se rendre sur le site de l‘ :name', 'prt')); ?> </a>
                                <div class="career__card">
                                    <header class="career__head">
                                        <h4 class="career__title"><?= get_the_title(); ?></h4>
                                        <p class="career__location"><?= get_field('location_adress') ?></p>
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
                        <?php endwhile; else: ?>
                        <p class="trips__empty"><?= __('Il n’y a pas de voyages à vous raconter...', 'prt'); ?></p>
	                    <?php endif; ?>
                    </div>
                </section>
                <div class="about__cta">
                    <a href="https://cv.noemie-vincent.be/" class="cta__link btn btn--secondary"><?= __('Découvrir mon CV', 'prt'); ?></a>
                    <a href="<?= get_the_permalink(prt_get_template_page('template-contact')); ?>" class="cta__link btn"><?= __('Me contacter', 'prt'); ?></a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>