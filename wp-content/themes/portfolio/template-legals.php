<?php /* Template Name: Legals page template */ ?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <main class="layout legals">
        <h2 class="legals__title"><?= get_the_title(); ?></h2>
        <div class="legals__container has-2-columns">
            <section class="legals__coords">
                <h3><?= __('Informations légales', 'prt'); ?></h3>
                <div class="coords__container">
                    <div class="legals__coord mail">
                        <div class="coord__head">
                            <h4 class="coord__title"><?= __('Mail', 'prt') ?></h4>
                            <img src="<?= get_field('mail_icon'); ?>" alt="" class="coord__icon style-svg" width="15px" height="15px">
                        </div>
                        <p class="coord__meta">
                            <a href="mailto:<?= get_field('mail'); ?>" class="coord__link"><?= get_field('mail'); ?></a>
                        </p>
                    </div>
                    <div class="legals__coord tel">
                        <div class="coord__head">
                            <h4 class="coord__title"><?= __('Téléphone', 'prt') ?></h4>
                            <img src="<?= get_field('phone_icon'); ?>" alt="" class="coord__icon style-svg" width="15px" height="15px">
                        </div>
                        <p class="coord__meta"><?= get_field('phone'); ?></p>
                    </div>
                    <div class="legals__coord address">
                        <div class="coord__head">
                            <h4 class="coord__title"><?= __('Adresse', 'prt') ?></h4>
                            <img src="<?= get_field('address_icon'); ?>" alt="" class="coord__icon style-svg" width="15px" height="15px">
                        </div>
                        <div class="address">
                            <p class="coord__meta"><?= get_field('address_name'); ?></p>
                            <p class="coord__meta"><?= get_field('address_street'); ?></p>
                            <p class="coord__meta"><?= get_field('address_city'); ?></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="legals__container">
                <h3><?= __('Clause de confidentialité', 'prt'); ?></h3>
                <p class="legals__terms"><?= get_the_content(); ?></p>
        </div>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>