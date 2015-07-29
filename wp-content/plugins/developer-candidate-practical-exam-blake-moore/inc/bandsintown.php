<?php
/**
 * Bandsintown Artist Shortcode - Display artist page based on BandsinTown API including upcoming shows
 *
 * @package   BandsintownArtist
 * @version   0.0.1
 * @author    Blake Moore <blakeevanmoore@gmail.com>
 * @copyright GPL
 * @link      http://themehybrid.com/plugins/breadcrumb-trail
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Gets an Artist's Events via the Bandsintown Api and displays using shortcode. 
 * @since  0.0.1
 * @access public
 * @param  array $args Arguments to pass to Bandsintown_Artist.
 * @return void
 */

class Bandsintown_Artist {
	var $pluginPath;
	var $pluginUrl;
	var $artist;

	public function __construct()
	{
		// Set Plugin Path
		$this->pluginPath = dirname(__FILE__);
	
		// Set Plugin URL
		$this->pluginUrl = WP_PLUGIN_URL . '/developer-candidate-practical-exam-blake-moore';
		
		add_shortcode('DisplayShows', array($this, 'shortcode'));
		
		// Add shortcode support for widgets
		add_filter('widget_text', 'do_shortcode');
	}
	
	public function getShows($artist)
	{
		include 'BandsintownAPI.php';
		
		$BandsintownAPI = new BandsintownAPI($artist);
		$shows = $BandsintownAPI->getArtistShows($artist);
		

		if($shows) {
			$html[] = '<div class="artist-info">';
			$html[] = '<div class="artist-name"><h2>Featured Artist - ' . $shows[0]->artists[0]->name . '</h2></div>';
			$html[] = '<div class="artist-thumbnail"><img src="' . $shows[0]->artists[0]->thumb_url . '"></div>';
			$html[] = '<div class="artist-facebook"><a href="' . $shows[0]->artists[0]->facebook_page_url . '">Like ' . $shows[0]->artists[0]->name . ' on Facebook</a></div>';
			$html[] = '<div class="clear"></div>';
			$html[] = '</div>';

			$html[] = '<ul class="artist-shows">';
			
			foreach($shows as $show) {

				// combine all show vars into overall show element to be added to list
				$html[] = '<li class="show">';
				$html[] = '<div class="show-title">' . $show->title . '</div>';
				$html[] = '<div class="show-date">' . $show->formatted_datetime . '</div>';
				$html[] = '<div class="show-venue">' . $show->venue->name . ', ' . $show->venue->city . ', ' . $show->venue->region . ' </div>';
				$html[] = '<div class="buy-tickets"><a href="' . $show->ticket_url . '" title="' . $show->title . '" target="_blank">BUY TICKETS</a></div>';
				$html[] = '</li>';

			}
			$html[] = '</ul>';
			
			// return the list
			return implode("\n", $html);
		}
	}
	
	public function shortcode($atts)
	{
		extract(shortcode_atts(array(
			'artist' => 'skrillex',
		), $atts));
		
		// pass the attributes to getImages function and render the images
		return $this->getShows(rawurlencode($atts['artist']));
	}
}

//This is a wrapper function for the Bandsintown_Artist class which gets used in the shortcode.
function bandsintown_artist($artist)
{
	$Bandsintown_Artist = new Bandsintown_Artist;
	echo $Bandsintown_Artist->getShows($artist);
}

$Bandsintown_Artist = new Bandsintown_Artist;

