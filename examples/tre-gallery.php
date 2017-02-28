<section class="tre-gallery">
	<header>
    	<h2>
        	Agents
        </h2>
        <nav>
        	<div class="tre-field">
            	<label>Sort By</label>
                <select name="company">
                	<option value="">Company</option>
                </select>
            </div>
            <ul class="tre-pagination">
                <li><span>Showing 13-24 of 326</span></li>
                <li>
                	<button class="set-nav" name="prev" value="1"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></button>
                    <ul class="results-sets">
                        <li class="active"><button name="offset_index" value="1">1</button></li>
                        <li><button name="offset_index" value="2">2</button></li>
                        <li><button name="offset_index" value="3">3</button></li>
                        <li><button name="offset_index" value="4">4</button></li>
                        <li><span>.....</span></li>
                        <li><button name="offset_index" value="329">329</button></li>
                    </ul>
                   	<button class="set-nav" name="prev" value="1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                </li>
            </nav>
        </nav>
    </header>
    <ul class="tre-gallery-results">
        <?php for ( $i = 0; $i < 12; $i++ ) {
			  
			  echo '<li class="tre-gallery-card">';
			  
			  include locate_template( 'inc/inc-tre-gallery-listing-card.php' );
			  
			  echo '</li>';
			  
		  } // end for ?>
    </ul>
    <footer>
    </footer>
</section>

<a href="#"><img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/agent-temp.jpg" /></a>
<ul class="tre-gallery-card-info">
    <li class="tre-gallery-card-titles">
        <h3>Patrick Alvarez</h3>
        <h4>Real Estate Champs</h4>
    </li>
    <li class="tre-gallery-card-details">
        <ul>
            <li class="tre-icon tre-email"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:">joe@yourcompany.com</a></li>
            <li class="tre-icon tre-phone"><i class="fa fa-phone" aria-hidden="true"></i> +1 555 22 66 8810</li>
            <li class="tre-icon tre-website"><i class="fa fa-globe" aria-hidden="true"></i> <a href="#">themetrail.com</a></li>
        </ul> 
    </li>
</ul>