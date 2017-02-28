<section class="tre-profile-tabs">
	<div class="wrap">
        <div class="tre-tabs">
        	<nav><a href="#" class="tre-active">Current Listings</a><a href="#">Recently Sold</a></nav>
        	<ul class="tre-tabs-wrapper">
            	<li class="tre-active">
                    <div class="tre-gallery listing-gallery">
                    
                        <ul class="tre-gallery-results">
                            <?php for ( $i = 0; $i < 3; $i++ ) {
                                  
                                  echo '<li class="tre-gallery-card">';
                                  
                                  //include locate_template( 'inc/inc-tre-gallery-listing-card.php' );
                                  
                                  echo '</li>';
                                  
                              } // end for ?>
                        </ul>
                    
                    </div>
                
                </li>
                <li>
                <div class="tre-gallery listing-gallery">
                    
                        <ul class="tre-gallery-results">
                            <?php for ( $i = 0; $i < 2; $i++ ) {
                                  
                                  echo '<li class="tre-gallery-card">';
                                  
                                  //include locate_template( 'inc/inc-tre-gallery-listing-card.php' );
                                  
                                  echo '</li>';
                                  
                              } // end for ?>
                        </ul>
                    
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>