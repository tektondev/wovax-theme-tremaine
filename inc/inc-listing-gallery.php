<?php if( ! isset( $count ) ) $count = 12;?>
<section class="tre-gallery listing-gallery property-listing-gallery">
	<header>
    	<h2>
        	329 Listings Found
        </h2>
        <nav>
        	<div class="tre-field">
            	<label>Sort By</label>
                <select name="sort_price">
                	<option value="">Price</option>
                </select>
            </div>
            <ul class="tre-pagination">
                <li><span>Showing 13 - 24 of 326</span></li>
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
                   	<button class="set-nav" name="next" value="1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                </li>
            </nav>
        </nav>
    </header>
    <ul class="tre-gallery-results">
        <?php 
			
			foreach( $properties as $i => $property ){
				
				echo '<li class="tre-gallery-card property-listing-card">';
				
				include locate_template( 'inc/inc-property-card.php' );
				
				echo '</li>';
				
			} // end foreach
		
		
		/*for ( $i = 0; $i < $count; $i++ ) {
			  
			  echo '<li class="tre-gallery-card">';
			  
			  include locate_template( 'inc/inc-tre-gallery-listing-card.php' );
			  
			  echo '</li>';
			  
		  } // end for*/ ?>
    </ul>
    <footer>
    	<ul class="tre-pagination">
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
                        <button class="set-nav" name="next" value="1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    </li>
                </ul>
    </footer>
</section>