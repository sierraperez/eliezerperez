<?php

/**
 * Nathalie Mota functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nathalie_Mota
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nathaliemota_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Nathalie Mota, use a find and replace
		* to change 'nathaliemota' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('nathaliemota', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Principal', 'nathaliemota'), // Muda de nome no wordpress deahboard
			'menu-2' => esc_html__('Footer', 'nathaliemota'), // Muda de nome no wordpress deahboard
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'nathaliemota_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'nathaliemota_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nathaliemota_content_width()
{
	$GLOBALS['content_width'] = apply_filters('nathaliemota_content_width', 640);
}
add_action('after_setup_theme', 'nathaliemota_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nathaliemota_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'nathaliemota'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'nathaliemota'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'nathaliemota_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function nathaliemota_scripts()
{
	wp_enqueue_style('nathaliemota-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('nathaliemota-style', 'rtl', 'replace');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', false, '6.4.2');
	wp_enqueue_style('theme-css', get_template_directory_uri() . '/assets/css/theme.css', array(), _S_VERSION);
	wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/assets/css/lightbox.css', array(), _S_VERSION);
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(),  _S_VERSION);
	wp_enqueue_script('nathaliemota-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('nathaliemota-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'nathaliemota_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**Ajax fuction add **/
function enqueue_load_more_script()
{
	wp_enqueue_script('load-more-photos', get_template_directory_uri() . '/js/load-more-photos.js', ['jquery'], null, true);
	wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.js', ['jquery'], null, true);
	wp_enqueue_script('body-scroll', get_template_directory_uri() . '/js/body-scroll.js', ['jquery'], null, true);

	// Passa a URL de AJAX e outros parâmetros para o JavaScript
	wp_localize_script('load-more-photos', 'ajax_params', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');



function load_more_photos()
{
	// Obtém o número da página enviado via AJAX
	$paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

	$args = array(
		'post_type'      => 'project',
		'posts_per_page' => 8, // Número de imagens por página
		'paged'          => $paged,
		'order'          => 'DESC',
		'orderby'        => 'DATE',
	);

	$query = new WP_Query($args);
	$response = array(); // Inicializa a resposta

	if ($query->have_posts()) {
		// Armazena o HTML gerado
		while ($query->have_posts()) {
			$query->the_post();
			ob_start();
			get_template_part('template-parts/photo/one-photo'); // Renderiza cada imagem
			$response['html'] .= ob_get_clean(); // Adiciona o HTML gerado à resposta
		}

		// Verifica se é a última página e adiciona a flag no retorno
		if ($paged >= $query->max_num_pages) {
			$response['no_more_posts'] = true;
		} else {
			$response['no_more_posts'] = false;
		}
	} else {
		$response['no_more_posts'] = true;
	}

	wp_send_json_success($response); // Envia a resposta via AJAX

	wp_die(); // Finaliza a requisição AJAX
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos'); // Permite acesso para visitantes





// Ajax para apenas apresentar fotos da mesma categoria . 

function load_more_photos_by_category()
{
	$category_id = isset($_POST['category']) ? intval($_POST['category']) : 0;
	$paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$exclude = isset($_POST['exclude']) ? explode(',', $_POST['exclude']) : array();

	// Query para buscar imagens da mesma categoria, excluindo os já exibidos
	$args = array(
		'post_type'      => 'project',
		'posts_per_page' => 2, // Carrega 2 imagens por vez
		'paged'          => $paged,
		'post__not_in'   => $exclude, // Exclui os posts já exibidos
		'tax_query'      => array(
			array(
				'taxonomy' => 'categorie',
				'field'    => 'term_id',
				'terms'    => $category_id,
			),
		),
	);

	$query = new WP_Query($args);

	$response = array(
		'html'          => '',
		'new_exclude'   => $exclude,
		'no_more_posts' => false,
	);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			ob_start();
			get_template_part('template-parts/photo/one-photo');
			$response['html'] .= ob_get_clean();

			// Adiciona o ID do post atual à lista de excluídos
			$response['new_exclude'][] = get_the_ID();
		}

		// Verifica se é a última página
		if ($paged >= $query->max_num_pages) {
			$response['no_more_posts'] = true;
		}
	} else {
		$response['no_more_posts'] = true;
	}

	wp_reset_postdata();

	// Retorna os dados como JSON
	wp_send_json($response);
}
add_action('wp_ajax_load_more_photos_by_category', 'load_more_photos_by_category');
add_action('wp_ajax_nopriv_load_more_photos_by_category', 'load_more_photos_by_category');




// FILTRAGEM de fotos de galeria principal 

// Função para filtrar as fotos via AJAX
function filter_photos()
{
	// Verifica se o nonce é válido
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'nathalie_mota_nonce')) {
		wp_send_json_error('Nonce inválido.');
		return;
	}

	// Obtém os dados do filtro
	$categorie = isset($_POST['categorie']) ? intval($_POST['categorie']) : '';
	$format = isset($_POST['format']) ? intval($_POST['format']) : '';
	$order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';

	// Configuração da query para filtrar as fotos
	$args = array(
		'post_type' => 'project', // Post type das fotos
		'posts_per_page' => -1, // Retorna todas as fotos que correspondem aos filtros
		'orderby' => 'date',
		'order' => $order,
	);

	// Filtro por categoria
	if ($categorie) {
		$args['tax_query'][] = array(
			'taxonomy' => 'categorie',
			'field'    => 'term_id',
			'terms'    => $categorie,
		);
	}

	// Filtro por formato
	if ($format) {
		$args['tax_query'][] = array(
			'taxonomy' => 'format',
			'field'    => 'term_id',
			'terms'    => $format,
		);
	}

	// Realiza a consulta no banco de dados
	$query = new WP_Query($args);

	// Se houver fotos, gera o HTML para as imagens
	if ($query->have_posts()) {
		ob_start();
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/photo/one-photo'); // Renderiza cada imagem
		}
		wp_reset_postdata();
		$output = ob_get_clean();
		wp_send_json_success($output);
	} else {
		wp_send_json_success('<p>Nenhuma foto encontrada.</p>');
	}

	wp_die(); // Importante para finalizar corretamente a requisição AJAX
}

// Registra a ação AJAX para usuários logados
add_action('wp_ajax_filter_photos', 'filter_photos');

// Registra a ação AJAX para usuários não logados
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');

// Conectar o js ao WP
function enqueue_custom_scripts()
{
	// Enfileira o jQuery (se já não estiver carregado)
	wp_enqueue_script('jquery');

	// Enfileira o arquivo filters.js
	wp_enqueue_script('filters-js', get_template_directory_uri() . '/js/filters.js', array('jquery'), null, true);

	// Passa a URL do admin-ajax.php e o nonce para o script
	wp_localize_script('filters-js', 'ajax_object', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('nathalie_mota_nonce')
	));
	wp_enqueue_style( 'swiper-style','https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script( 'swiper-script','https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',array(),'1.0.0',true);
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'); 
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
