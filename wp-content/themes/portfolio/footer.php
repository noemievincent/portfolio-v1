    <footer class="footer">
        <h2 class="footer__title hidden"><?= __('Pied de page', 'prt'); ?></h2>
        <a href="<?= get_home_url(); ?>">Noémie Vincent - 2022</a>
        <div class="footer__right">
            <a href="<?= get_the_permalink(prt_get_template_page('template-legals')); ?>"><?= __('mentions légales', 'prt'); ?></a>
            <ul class="footer__socials">
                <?php if (($socials = prt_get_socials())->have_posts()):while ($socials->have_posts()): $socials->the_post(); ?>
                    <li class="footer__item">
                        <figure class="footer__fig">
                            <a href="<?= get_field('url') ?>" class="footer__link">
                                <img src="<?php the_post_thumbnail_url(); ?>" class="footer__img style-svg <?= get_post_field( 'post_name', get_post()); ?>" alt="<?= get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?>">
                            </a>
                        </figure>
                    </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>