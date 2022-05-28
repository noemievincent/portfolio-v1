<?php /* Template Name: About page template */ ?>
<?php get_header(); ?>
    <main class="layout about">
        <h2 class="about__title"><?= get_the_title(); ?></h2>
        <div class="about__container has-2-columns">
            <section class="about__presentation">
                <h3><?= __('Qui suis-je ?', 'prt'); ?></h3>
                <div class="about__content">
	                <?= get_the_content(); ?>
                </div>
            </section>
            <div class="about__right">
                <section class="about__career">
                    <h3><?= __('Parcours professionnel', 'prt'); ?></h3>
                    <div class="about__container">
	                    <?php if (($exp = prt_get_exp())->have_posts()):while ($exp->have_posts()): $exp->the_post(); ?>
                            <div class="career__container">
                                <a href="<?= get_field('location_url') ?>" class="career__link"><?= str_replace(':name', get_field( 'location_name' ), __('Se rendre sur le site de l‘:name', 'prt')); ?> </a>
                                <div class="career__card">
                                    <figure class="career__fig">
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="career__img <?= get_post_field( 'post_name', get_post()); ?>" alt="<?= get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?>" height="94px" width="62px">
                                    </figure>
                                    <div class="career__head">
                                        <div class="career__dates">
                                            <p class="career__date"><?= get_field('start_date') ?> - <?= get_field('end_date') ?></p>
                                        </div>
                                        <h4 class="career__title"><?= get_the_title(); ?></h4>
                                        <p class="career__location"><?= get_field('location_adress') ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                    <div class="about__cta">
                        <a href="https://cv.noemie-vincent.be/" class="cta__link btn btn--secondary"><?= __('Découvrir mon CV', 'prt'); ?></a>
                        <a href="<?= get_the_permalink(prt_get_template_page('template-contact')); ?>" class="cta__link btn"><?= __('Me contacter', 'prt'); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </main>
<?php get_footer(); ?>