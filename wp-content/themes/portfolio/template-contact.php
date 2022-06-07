<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="layout contact">
        <h2 class="contact__title"><?= get_the_title(); ?></h2>
        <div class="contact__content has-2-columns">
            <section class="contact__form" aria-labelledby="form">
                <h3 id="form" aria-level="3"><?= __('Formulaire de contact', 'prt'); ?></h3>
				<?php if ( ! isset($_SESSION['contact_form_feedback']) || ! $_SESSION['contact_form_feedback']['success']) : ?>
                    <form action="<?= substr(get_home_url(), 0, - 2); ?>wp-admin/admin-post.php" method="POST"
                          class="form" id="contact">
						<?php if (isset($_SESSION['contact_form_feedback'])) : ?>
                            <p class="form__error form__title"><?= __('Oups ! Il y a des erreurs dans le formulaire', 'prt') ?></p>
						<?php endif; ?>
                        <div class="flex">
                            <div class="form__field">
                                <label for="firstname" class="form__label"><?= __('prénom', 'prt') ?></label>
								<?= prt_get_contact_field_error('firstname'); ?>
                                <input type="text" size="5" name="firstname" id="firstname" placeholder="Lucie"
                                       class="form__input" value="<?= prt_get_contact_field_value('firstname'); ?>">
                            </div>
                            <div class="form__field">
                                <label for="lastname" class="form__label"><?= __('nom', 'prt') ?></label>
								<?= prt_get_contact_field_error('lastname'); ?>
                                <input type="text" size="5" name="lastname" id="lastname" placeholder="Breton"
                                       class="form__input" value="<?= prt_get_contact_field_value('lastname'); ?>">
                            </div>
                        </div>
                        <div class="form__field">
                            <label for="email" class="form__label"><?= __('adresse e-mail', 'prt') ?></label>
							<?= prt_get_contact_field_error('email'); ?>
                            <input type="email" name="email" id="email" placeholder="lucie-breton@gmail.com"
                                   class="form__input" value="<?= prt_get_contact_field_value('email'); ?>">
                        </div>
                        <div class="form__field">
                            <label for="message" class="form__label"><?= __('message', 'prt') ?></label>
							<?= prt_get_contact_field_error('message'); ?>
                            <textarea name="message" id="message" cols="30" rows="12" class="form__input"
                                      placeholder="<?= __('Bonjour,...', 'prt') ?>"><?= prt_get_contact_field_value('message'); ?></textarea>
                        </div>
                        <div class="form__field">
							<?= prt_get_contact_field_error('rules'); ?>
                            <label for="rules" class="form__checkbox">
                                <input type="checkbox" name="rules" id="rules" value="1"/>
                                <span class="form__checklabel"><?= str_replace(':conditions', '<a href="' . get_the_permalink(prt_get_template_page('template-legals')) . '">' . __('conditions générales d’utilisations', 'prt') . '</a>', __('J’accepte les :conditions', 'prt')) ?></span>
                            </label>
                        </div>
                        <div class="form__actions">
							<?php wp_nonce_field('nonce_submit_contact'); ?>
                            <input type="hidden" name="action" value="submit_contact_form"/>
                            <button class="form__button btn" type="submit"><?= __('Envoyer', 'prt') ?></button>
                        </div>
                    </form>
				<?php else : ?>
                    <p id="contact"
                       class="form__success"><?= __('Merci ! Votre message a bien été envoyé.', 'prt') ?></p>
					<?php unset($_SESSION['contact_form_feedback']); endif; ?>
            </section>
            <section class="contact__coords" aria-labelledby="coords">
                <h3 id="coords" aria-level="3"><?= __('Coordonnées', 'prt'); ?></h3>
                <div class="coords__container" itemscope itemtype="https://schema.org/Person">
                    <div class="contact__coord mail">
                        <div class="coord__head">
                            <h4 class="coord__title" aria-level="4"><?= __('Mail', 'prt') ?></h4>
                            <img src="<?= get_field('mail_icon'); ?>" alt="" class="coord__icon style-svg" width="15"
                                 height="15">
                        </div>
                        <p class="coord__meta" itemprop="email">
                            <a href="mailto:<?= get_field('mail'); ?>" class="coord__link"><?= get_field('mail'); ?></a>
                        </p>
                    </div>
                    <div class="contact__coord tel">
                        <div class="coord__head">
                            <h4 class="coord__title" aria-level="4"><?= __('Téléphone', 'prt') ?></h4>
                            <img src="<?= get_field('phone_icon'); ?>" alt="" class="coord__icon style-svg" width="15"
                                 height="15">
                        </div>
                        <p class="coord__meta" itemprop="telephone"><?= get_field('phone'); ?></p>
                    </div>
                    <div class="contact__coord address">
                        <div class="coord__head">
                            <h4 class="coord__title" aria-level="4"><?= __('Adresse', 'prt') ?></h4>
                            <img src="<?= get_field('address_icon'); ?>" alt="" class="coord__icon style-svg"
                                 width="15" height="15">
                        </div>
                        <div class="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <p class="coord__meta" itemprop="name"><?= get_field('address_name'); ?></p>
                            <a href="https://goo.gl/maps/TF2PkphQEhrZBN1G7">
                                <p class="coord__meta" itemprop="streetAddress"><?= get_field('address_street'); ?></p>
                                <p class="coord__meta" itemprop="postalCode"><?= get_field('address_city'); ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php unset($_SESSION['contact_form_feedback']) ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>