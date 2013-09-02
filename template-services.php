<?php
/*
Template Name: Services
*/

get_header(); ?>

    <div id="main" role="main">
		<?php
        if ( have_posts() ) :
			while ( have_posts() ) :
			the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php 
						$service_select = $smof_data['service_select']; 
						$page = get_page_by_path($service_select); // get page by slug name
						echo sp_child_page_lists($page->ID, 'menu_order', 68, 68);
					?>
				</div><!-- .entry-content -->
			</article><!-- #post -->
		<?php endwhile;
        else : ?>
			<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', SP_TEXT_DOMAIN ); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', SP_TEXT_DOMAIN ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
			</article><!-- #post-0 -->
        <?php endif; ?>
    </div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>