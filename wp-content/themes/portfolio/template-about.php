<?php /* Template Name: About page template */ ?>
<?php get_header(); ?>
    <main class="layout">
        <section class="about" aria-labelledby="about">
            <h2 class="about__title" id="about" aria-level="2"><?= get_the_title(); ?></h2>
            <div class="about__container has-2-columns">
                <section class="about__presentation" aria-labelledby="who">
                    <h3 id="who" aria-level="3"><?= __('Qui suis-je ?', 'prt'); ?></h3>
                    <div class="about__content">
						<?php the_content(); ?>
                    </div>
                </section>
                <div class="about__right">
                    <section class="about__career" aria-labelledby="career">
                        <h3 id="career" aria-level="3"><?= __('Parcours professionnel', 'prt'); ?></h3>
                        <div class="about__container">
							<?php if (($exp = prt_get_exp())->have_posts()):while ($exp->have_posts()): $exp->the_post(); ?>
                                <div class="career__container">
                                    <a href="<?= get_field('location_url') ?>"
                                       class="career__link full__link" target="_blank"><?= str_replace(':name', get_field('location_name'), __('Se rendre sur le site de l‘:name', 'prt')); ?> </a>
                                    <div class="career__card">
                                        <figure class="career__fig">
                                            <img src="<?php the_post_thumbnail_url(); ?>"
                                                 class="career__img <?= get_post_field('post_name', get_post()); ?>"
                                                 alt="<?= get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?>"
                                                 height="94" width="62">
                                        </figure>
                                        <div class="career__head">
                                            <div class="career__dates">
                                                <p class="career__date"><?= get_field('start_date') ?>
                                                    - <?= get_field('end_date') ?></p>
                                            </div>
                                            <h4 class="career__title" aria-level="4"><?= get_the_title(); ?></h4>
                                            <p class="career__location"><?= get_field('location_adress') ?></p>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; endif; ?>
                        </div>
                        <div class="about__cta">
                            <a href="https://cv.noemie-vincent.be/"
                               class="cta__link btn btn--secondary"><?= __('Découvrir mon CV', 'prt'); ?></a>
                            <a href="<?= get_the_permalink(prt_get_template_page('template-contact')); ?>"
                               class="cta__link btn"><?= __('Me contacter', 'prt'); ?></a>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>