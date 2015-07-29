<?php
/**
 * Template Name: Artists Page Template
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		   $args = array(
		      'post_type' => 'artists'
		   );
		   $artists_posts = new WP_Query($args);
		?>
		<div class="artist-grid">
			<?php if($artists_posts->have_posts()) : ?>

				
				<?php while($artists_posts->have_posts()) : $artists_posts->the_post() ?>
				   <div class='artist'>
				      <div class='artist-thumbnail'>
				        <a href="<?php the_permalink(); ?>"> <img src="<?php the_field('artist_thumbnail'); ?>"></a>
				      </div>
					</div>

				<?php endwhile ?>
			<?php endif ?>
		</div>
		<div class="clear"></div>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

