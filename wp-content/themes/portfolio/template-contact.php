<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <main class="layout contact">
        <h2 class="contact__title"><?= get_the_title(); ?></h2>
        <div class="contact__content has-2-columns">
        <section class="contact__form">
            <h3><?= __('Formulaire de contact', 'prt'); ?></h3>
            <?php if(! isset($_SESSION['contact_form_feedback']) || ! $_SESSION['contact_form_feedback']['success']) : ?>
                <form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST" class="form" id="contact">
                    <?php if(isset($_SESSION['contact_form_feedback'])) : ?>
                        <p><?= __('Oups ! Il y a des erreurs dans le formulaire', 'prt') ?></p>
                    <?php endif; ?>
                    <div class="flex">
                        <div class="form__field">
                            <label for="firstname" class="form__label"><?= __('prénom', 'prt') ?></label>
                            <input type="text" name="firstname" id="firstname" placeholder="Lucie" class="form__input" value="<?= prt_get_contact_field_value('firstname'); ?>">
                            <?= prt_get_contact_field_error('firstname'); ?>
                        </div>
                        <div class="form__field">
                            <label for="lastname" class="form__label"><?= __('nom', 'prt') ?></label>
                            <input type="text" name="lastname" id="lastname" placeholder="Breton" class="form__input" value="<?= prt_get_contact_field_value('lastname'); ?>">
                            <?= prt_get_contact_field_error('lastname'); ?>
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="email" class="form__label"><?= __('adresse e-mail', 'prt') ?></label>
                        <input type="email" name="email" id="email" placeholder="lucie-breton@gmail.com" class="form__input" value="<?= prt_get_contact_field_value('email'); ?>">
                        <?= prt_get_contact_field_error('email'); ?>
                    </div>
                    <div class="form__field">
                        <label for="message" class="form__label"><?= __('message', 'prt') ?></label>
                        <textarea name="message" id="message" cols="30" rows="12" class="form__input"><?= prt_get_contact_field_value('message'); ?></textarea>
                        <?= prt_get_contact_field_error('message'); ?>
                    </div>
                    <div class="form__field">
                        <label for="rules" class="form__checkbox">
                            <input type="checkbox" name="rules" id="rules" value="1" />
                            <span class="form__checklabel"><?= str_replace(':conditions', '<a href="#">' . __('conditions générals d’utilisations', 'prt') . '</a>', __('J’accepte les :conditions', 'prt')) ?></span>
                        </label>
                        <?= prt_get_contact_field_error('rules'); ?>
                    </div>
                    <div class="form__actions">
                        <?php wp_nonce_field('nonce_submit_contact'); ?>
                        <input type="hidden" name="action" value="submit_contact_form" />
                        <button class="form__button btn" type="submit"><?= __('Envoyer', 'prt') ?></button>
                    </div>
                </form>
            <?php else : ?>
            <p id="contact"><?= __('Merci ! Votre message a bien été envoyé.', 'prt') ?></p>
            <?php unset($_SESSION['contact_form_feedback']); endif; ?>
        </section>
        <section class="contact__coords">
            <h3><?= __('Coordonnées', 'prt'); ?></h3>
        </section>
        </div>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>