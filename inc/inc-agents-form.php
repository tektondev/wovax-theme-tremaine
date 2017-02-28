<section id="browse-agents-shortcode">
	<form id="search-agents-form" method="get">
    	<fieldset class="agents-search-bar-wrapper">
        	<div class="agents-search-field">
            	<input type="text" name="skeyword" value="<?php echo $keyword;?>" placeholder="Search By Name" />
            </div>
            <div class="agents-search-field">
            	<input type="text" name="company" value="" placeholder="Search By Company" />
            </div>
            <div class="agents-search-field">
            	<button type="submit" class="agents-submit-search">
                    Search<i class="fa fa-caret-right" aria-hidden="true"></i>
                </button>
            </div>
        </fieldset>
        <!--<div class="tre-gallery">
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
                </ul>
            </nav>
        </header>
        <ul class="tre-gallery-results">
            <?php for ( $i = 0; $i < 12; $i++ ) {
                  
                  echo '<li class="tre-gallery-card">';
                  
                  include locate_template( 'inc/inc-tre-agent-gallery-card.php' );
                  
                  echo '</li>';
                  
              } // end for ?>
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
    </div>-->
    </form>
</section>