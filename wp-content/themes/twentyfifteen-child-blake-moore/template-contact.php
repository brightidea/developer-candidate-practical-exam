<?php
/**
 * Template Name: Contact Page Template
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
			if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
				// Include the featured content template.
				get_template_part( 'featured-content' );
			}
		?>
						
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post(); ?>
					<h2 class="huge"> Contact Us</h2>
					<form action="#">

						  <header>
						    <div>This form is just an example form added to a custom page template. Not actually functional. </div>
						  </header>
						  
						  <div>
						    <label class="desc" id="title1" for="Field1">Full Name</label>
						    <div>
						      <input id="Field1" name="Field1" type="text" class="field text fn" value="" size="8" tabindex="1">
						    </div>
						  </div>
						    
						  <div>
						    <label class="desc" id="title3" for="Field3">
						      Email
						    </label>
						    <div>
						      <input id="Field3" name="Field3" type="email" spellcheck="false" value="" maxlength="255" tabindex="3"> 
						   </div>
						  </div>
						    
						  <div>
						    <label class="desc" id="title4" for="Field4">
						      Message
						    </label>
						    <div>
						      <textarea id="Field4" name="Field4" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
						    </div>
						  </div>
						  
						 <div>
							<div>
						  		<input id="saveForm" name="saveForm" type="submit" value="Submit">
						    </div>
						</div>
						  
						</form>
					<?php endwhile;
					?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

