<?php
define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/inc' );
require_once(THEME_URL."/inc/theme_setup.php");
 function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'create-product-template.php' ) ) {
		wp_enqueue_style( 'UI CSS', 'https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css' );
        wp_enqueue_style( 'index-create-product', get_bloginfo('stylesheet_directory') . '/inc/drag_img/index.css' );
		wp_enqueue_script('Jquery UI', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', false, false, true);
		wp_enqueue_script('indexdrag_img', get_bloginfo('stylesheet_directory') . '/inc/drag_img/index.js', false, false, true);
		wp_enqueue_script('background_js', get_bloginfo('stylesheet_directory') . '/inc/drag_img/background.js', false, false, true);
    }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );


  if ( ! isset( $content_width ) ) {
        $content_width = 620;
   }
  if ( ! function_exists( 'quangan_theme_setup' ) ) {
        function quangan_theme_setup() {
                $language_folder = THEME_URL . '/languages';
                load_theme_textdomain( 'quangan', $language_folder );
                add_theme_support( 'automatic-feed-links' );
                add_theme_support( 'post-thumbnails' );
                add_theme_support( 'title-tag' );
                add_theme_support( 'post-formats',
                        array(
                                'video',
                                'image',
                                'audio',
                                'gallery'
                        )
                 );
                $default_background = array(
                        'default-color' => '#e8e8e8',
                );
                add_theme_support( 'custom-background', $default_background );
                register_nav_menu ( 'primary-menu', __('Primary Menu', 'quangan') );
				
                $sidebar = array(
                    'name' => __('Main Sidebar', 'quangan'),
                    'id' => 'main-sidebar',
                    'description' => 'Main sidebar for quangan theme',
                    'class' => 'main-sidebar',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
                    'before_title' => '<h3 class="widget-title">',
                    'after_sidebar' => '</h3>'
                 );
                 register_sidebar( $sidebar );
				 
				 $landingpage_sidebar = array(
                    'name' => __('LadingPage 01', 'quangan'),
                    'id' => 'ladingpage-sidebar',
                    'description' => 'LandingPage Content',
                    'class' => 'ladingpage-sidebar',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',					
                    'before_title' => '<h2 class="widget-title title-V3">',
                    'after_sidebar' => '</h2>'
                 );
                 register_sidebar( $landingpage_sidebar );
				 
				 $footer_sidebar = array(
                    'name' => __('Footer Content', 'quangan'),
                    'id' => 'footer-sidebar',
                    'description' => 'Footer Sidebar',
                    'class' => 'footer-sidebar',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',					
                    'before_title' => '<h2 class="widget-title title-V3">',
                    'after_sidebar' => '</h2>'
                 );
                 register_sidebar( $footer_sidebar );
        }
        add_action ( 'init', 'quangan_theme_setup' );
  }
function init_scripts() {
  wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
  wp_enqueue_style( 'main-style' );
  wp_enqueue_script('Jquery 3.4.1', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
  wp_enqueue_script('myscript', get_template_directory_uri() . '/myscript.js' );
}
add_action( 'wp_enqueue_scripts', 'init_scripts' );



if ( ! function_exists( 'quangan_logo' ) ) {
  function quangan_logo() {?>
    <div class="logo">
 
      <div class="site-name">
        <?php if ( is_home() ) {
          printf(
            '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } else {
          printf(
            '</p><a href="%1$s" title="%2$s">%3$s</a></p>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } // endif ?>
      </div>
      <div class="site-description"><?php bloginfo( 'description' ); ?></div>
 
    </div>
  <?php }
}
 

if ( ! function_exists( 'quangan_menu' ) ) {
  function quangan_menu( $slug ) {
    $menu = array(
      'theme_location' => $slug,
      'container' => 'nav',
      'container_class' => $slug,
    );
    wp_nav_menu( $menu );
  }
}




if ( ! function_exists( 'quangan_pagination' ) ) {
  function quangan_pagination() {
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
      return '';
    }
  ?>
 
  <nav class="pagination" role="navigation">
    <?php if ( get_next_post_link() ) : ?>
      <div class="prev"><?php next_posts_link( __('Older Posts', 'quangan') ); ?></div>
    <?php endif; ?>
 
    <?php if ( get_previous_post_link() ) : ?>
      <div class="next"><?php previous_posts_link( __('Newer Posts', 'quangan') ); ?></div>
    <?php endif; ?>
 
  </nav><?php
  }
}
  
 

if ( ! function_exists( 'quangan_thumbnail' ) ) {
  function quangan_thumbnail( $size ) {
    if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
<?php
    endif;
  }
}

if ( ! function_exists( 'quangan_entry_header' ) ) {
  function quangan_entry_header() {
    if ( is_single() ) : ?>
 
      <h1 class="entry-title title-V3">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="entry-title title-V3">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2><?php
 
    endif;
  }
}
 

if( ! function_exists( 'quangan_entry_meta' ) ) {
  function quangan_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="entry-meta">';

        printf( __('<span class="author">Posted by %1$s</span>', 'quangan'),
          get_the_author() );
 
        printf( __('<span class="date-published"> at %1$s</span>', 'quangan'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'quangan'),
          get_the_category_list( ', ' ) );

        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'quangan'),
              __('One comment', 'quangan'),
              __('% comments', 'quangan'),
              __('Read all comments', 'quangan')
             );
          echo '</span>';
        endif;
      echo '</div>';
    endif;
  }
}
 

function quangan_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'quangan') . '</a>';
}
add_filter( 'excerpt_more', 'quangan_readmore' );
 

  if ( ! function_exists( 'quangan_entry_content' ) ) {
    function quangan_entry_content() {
 
      if ( ! is_single() ) :
        the_excerpt();
      else :
        the_content();
 
        /*
         * Code hiển thị phân trang trong post type
         */
        $link_pages = array(
          'before' => __('<p>Page:', 'quangan'),
          'after' => '</p>',
          'nextpagelink'     => __( 'Next page', 'quangan' ),
          'previouspagelink' => __( 'Previous page', 'quangan' )
        );
        wp_link_pages( $link_pages );
      endif;
 
    }
  }
 

if ( ! function_exists( 'quangan_entry_tag' ) ) {
  function quangan_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'quangan'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}