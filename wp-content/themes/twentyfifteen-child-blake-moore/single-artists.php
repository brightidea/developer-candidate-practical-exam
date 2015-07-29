<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="artist-page">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); 
					$artistname = get_the_title();
					$facebook = get_field('facebook_page_url');
				?>

						<h2 class="huge"><?php echo $artistname ?></h2>
						<div class="artist-thumbnail"><img src="<?php the_field('artist_thumbnail'); ?>"></div>
						<div class="artist-facebook"><a href="<?php echo $facebook ?>" target="_blank">Like <?php echo $artistname ?> on Facebook</a></div>
						<div class="clear"></div>


						<?php if( have_rows('shows') ): ?>

					<ul class="artist-shows">


						<?php while( have_rows('shows') ): the_row(); 

							// vars
							$title = get_sub_field('show_title');
							$date = get_sub_field('show_date');
							$venuename = get_sub_field('venue_name');
							$venuecity = get_sub_field('venue_city');
							$venuestate = get_sub_field('venue_state');
							$ticketsurl = get_sub_field('buy_tickets_url');

							?>

							<li class="show">

								<?php if( $title ): ?>
									<div class="show-title"><?php echo $title; ?></div>
								<?php endif; ?>
								<?php if( $date ): ?>
									<div class="show-date"><?php echo $date; ?></div>
								<?php endif; ?>
								<?php if( $venuename ): ?>
									<div class="show-venue"><?php echo $venuename; ?>, <?php echo $venuecity; ?>, <?php echo $venuestate; ?></div>
								<?php endif; ?>
								<?php if( $ticketsurl ): ?>
								<div class="buy-tickets"><a href="<?php echo $ticketsurl; ?>" title="<?php echo $title; ?>" target="_blank">BUY TICKETS</a></div>
								<?php endif; ?>
							</li>

						<?php endwhile; ?>

						</ul>

					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
