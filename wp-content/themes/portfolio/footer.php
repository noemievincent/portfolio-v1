    <footer class="footer">
        <h2 class="footer__title hidden"><?= __('Pied de page', 'prt'); ?></h2>
        <a href="#">Noémie Vincent - 2022</a>
        <div class="footer__right">
            <a href="<?= get_the_permalink(prt_get_template_page('template-legals')); ?>"><?= __('mentions légales', 'prt'); ?></a>
            <ul class="footer__container">
                <?php if (($socials = prt_get_socials())->have_posts()):while ($socials->have_posts()): $socials->the_post(); ?>
                    <li class="footer__item">
                        <figure class="footer__fig">
                            <a href="<?= get_field('url') ?>" class="footer__link">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?>" width="36px" height="33px" class="footer__img">
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