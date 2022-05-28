<?php get_header(); ?>

<main class="layout">
    <section class="layout__projects projects">
        <h2 class="projects__title"><?= __('Mes projets', 'prt'); ?></h2>
        <div class="projects__container">
	        <?php if(have_posts()): while(have_posts()): the_post();
		        prt_include('project');
	        endwhile; else: ?>
                <p class="projects__empty"><?= __('Il n’y a pas de projets à vous présenter...', 'prt'); ?></p>
	        <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>