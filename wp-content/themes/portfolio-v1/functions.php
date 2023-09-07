<?php

// Charger les fichiers nécessaires
require_once(__DIR__ . '/acf.php');
require_once(__DIR__ . '/CustomSearchQuery.php');
require_once(__DIR__ . '/Menus/PrimaryMenuWalker.php');
require_once(__DIR__ . '/Menus/PrimaryMenuItem.php');
require_once(__DIR__ . '/Forms/BaseFormController.php');
require_once(__DIR__ . '/Forms/ContactFormController.php');
require_once(__DIR__ . '/Forms/Sanitizers/BaseSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/TextSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/EmailSanitizer.php');
require_once(__DIR__ . '/Forms/Validators/BaseValidator.php');
require_once(__DIR__ . '/Forms/Validators/RequiredValidator.php');
require_once(__DIR__ . '/Forms/Validators/EmailValidator.php');
require_once(__DIR__ . '/Forms/Validators/AcceptedValidator.php');

// Lancer la sessions PHP pour pouvoir passer des variables de page en page
add_action('init', 'prt_boot_theme', 1);

function prt_boot_theme() {
	load_theme_textdomain('prt', __DIR__ . '/locales');


	if ( ! session_id()) {
		session_start();
	}
}

// Désactiver l'éditeur "Gutenberg" de Wordpress
add_filter('use_block_editor_for_post', '__return_false');

// Activer les images sur les articles
add_theme_support('post-thumbnails');

// Enregistrer un seul custom post-type pour "mes projets"
register_post_type('project', [
	'label'         => 'Projets',
	'labels'        => [
		'name'          => 'Projets',
		'singular_name' => 'Projet',
	],
	'description'   => 'Tous mes projets',
	'public'        => true,
	'has_archive'   => true,
	'menu_position' => 5,
	'menu_icon'     => 'dashicons-book',
	'supports'      => ['title', 'editor', 'thumbnail'],
	'rewrite'       => ['slug' => 'projets'],
]);

// Enregistrer un seul custom post-type pour mon parcours
register_post_type('experience', [
	'label'         => 'Parcours professionnels',
	'labels'        => [
		'name'          => 'Parcours professionnels',
		'singular_name' => 'Parcours professionnel',
	],
	'public'        => true,
	'show_ui'       => true,
	'description'   => 'Mon parcours professionnel',
	'menu_position' => 5,
	'menu_icon'     => 'dashicons-welcome-learn-more',
	'supports'      => ['title', 'editor', 'thumbnail'],
	'rewrite'       => ['slug' => 'experience'],
]);


register_post_type('social', [
	'label'         => 'Réseaux sociaux',
	'labels'        => [
		'name'          => 'Réseaux sociaux',
		'singular_name' => 'Réseau social',
	],
	'public'        => true,
	'show_ui'       => true,
	'description'   => 'Mes réseaux sociaux',
	'menu_position' => 5,
	'menu_icon'     => 'dashicons-networking',
	'supports'      => ['title', 'editor', 'thumbnail'],
	'rewrite'       => ['slug' => 'social'],
]);

// Enregistrer un custom post-type pour les messages de contact
register_post_type('message', [
	'label'         => 'Messages de contact',
	'labels'        => [
		'name'          => 'Messages de contact',
		'singular_name' => 'Message de contact',
	],
	'description'   => 'Les messages envoyés par le formulaire de contact.',
	'public'        => false,
	'show_ui'       => true,
	'menu_position' => 15,
	'menu_icon'     => 'dashicons-buddicons-pm',
	'capabilities'  => [
		'create_posts'       => false,
		'read_post'          => true,
		'read_private_posts' => true,
		'edit_posts'         => true,
	],
	'map_meta_cap'  => true,
]);

// Récupérer les projets via une requête Wordpress
function prt_get_projects($count = 10) {
	$projects = new WP_Query([
		'post_type'      => 'project',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => $count,
	]);

	return $projects;
}

// Récupérer les réseaux sociaux via une requête Wordpress
function prt_get_socials() {
	// 1. on instancie l'objet WP_Query
	$socials = new PRT_CustomSearchQuery([
		'post_type' => 'social',
		'order'     => 'DESC',
	]);

	// 2. on retourne l'objet WP_Query
	return $socials;
}

// Récupérer mon parcours professionnel via une requête Wordpress
function prt_get_exp() {
	// 1. on instancie l'objet WP_Query
	$exp = new PRT_CustomSearchQuery([
		'post_type' => 'experience',
	]);

	// 2. on retourne l'objet WP_Query
	return $exp;
}

// Enregistrer les zones de menus
register_nav_menu('primary', 'Navigation principale (haut de page)');

// Fonction pour récupérer les éléments d'un menu sous forme d'un tableau d'objets
function prt_get_menu_items($location) {
	$items = [];

	// Récupérer le menu Wordpress pour $location
	$locations = get_nav_menu_locations();

	if ( ! ($locations[$location] ?? false)) {
		return $items;
	}

	$menu = $locations[$location];

	// Récupérer tous les éléments du menu récupéré
	$posts = wp_get_nav_menu_items($menu);

	// Formater chaque élément dans une instance de classe personnalisée
	// Boucler sur chaque $post
	foreach ($posts as $post) {
		// Transformer le WP_Post en une instance de notre classe personnalisée
		$item = new PrimaryMenuItem($post);

		$items[] = $item;
	}

	// Retourner un tableau d'éléments du menu formatés
	return $items;
}

// Gérer l'envoi de formulaire personnalisé
add_action('admin_post_submit_contact_form', 'prt_handle_submit_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'prt_handle_submit_contact_form');

function prt_handle_submit_contact_form() {
	// Instancier le controlleur du formulaire
	$form = new ContactFormController($_POST);
}

function prt_get_contact_field_value($field) {
	if ( ! isset($_SESSION['contact_form_feedback'])) {
		return '';
	}

	return $_SESSION['contact_form_feedback']['data'][$field] ?? '';
}

function prt_get_contact_field_error($field) {
	if ( ! isset($_SESSION['contact_form_feedback'])) {
		return '';
	}

	if ( ! ($_SESSION['contact_form_feedback']['errors'][$field] ?? null)) {
		return '';
	}

	return '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors'][$field] . '</p>';
}

// Générer un lien vers la première page utilisant un certain template
function prt_get_template_page(string $template) {
	// Créer une WP_Query pour les pages
	$query = new WP_Query([
		'post_type'   => 'page', // uniquement récupérer des pages
		'post_status' => 'publish', // uniquement les pages publiées
		'meta_query'  => [
			[
				'key'   => '_wp_page_template',
				'value' => $template . '.php', // Filtrer sur le template utilisé
			]
		]
	]);

	return $query->posts[0] ?? null;
}

// Fonction permettant d'inclure des "partials" dans la vue et d'y injecter des variables "locales" (uniquement disponibles dans le scope de l'inclusion).
function prt_include(string $partial, array $variables = []) {
	extract($variables);

	include(__DIR__ . '/partials/' . $partial . '.php');
}

// Fonction qui charge les assets compilés et retourne leur chemin absolu
function prt_mix($path) {
	$path = '/' . ltrim($path, '/');

	if ( ! realpath(__DIR__ . '/public' . $path)) {
		return;
	}

	if ( ! ($manifest = realpath(__DIR__ . '/public/mix-manifest.json'))) {
		return get_stylesheet_directory_uri() . '/public' . $path;
	}

	// Ouvrir le fichier mix-manifest.json
	$manifest = json_decode(file_get_contents($manifest), true);

	// Regarder si on a une clef qui correspond au fichier chargé dans $path
	if ( ! array_key_exists($path, $manifest)) {
		return get_stylesheet_directory_uri() . '/public' . $path;
	}

	// Récupérer & retourner le chemin versionné
	return get_stylesheet_directory_uri() . '/public' . $manifest[$path];
}


//Ajouter les liens de navigations transversales entre les projets
function prt_previous_post_link(string $post_type) {
	if( get_adjacent_post(false, '', true) ) {
		previous_post_link('%link', '%title');
	} else {
		$first = new WP_Query('post_type=project&posts_per_page=1&order=DESC'); $first->the_post();
		echo '<a href="' . get_permalink() . '" rel="prev">' . get_the_title() .'</a>';
		wp_reset_query();
	};
}

function prt_next__post_link(string $post_type) {
	if( get_adjacent_post(false, '', false) ) {
		next_post_link('%link', '%title');
	} else {
		$last = new WP_Query('post_type=project&posts_per_page=1&order=ASC'); $last->the_post();
		echo '<a href="' . get_permalink() . '" rel="next">' . get_the_title() .'</a>';
		wp_reset_query();
	};
}