<section id="browse-agents-shortcode">
    <fieldset class="agents-search-bar-wrapper">
        <div class="agents-search-field">
            <input type="text" name="agent-keyword" value="<?php echo $presets['agent-keyword'];?>" placeholder="Search By Name" />
        </div>
        <div class="agents-search-field">
            <select name="company-filter" class="tremaine-submit-on-change">
            	<option value="">Filter By Office</option>
                <option value="0" <?php selected( 0, $presets['company-filter'] );?>>All Companies</option>
				<?php foreach( $offices as $office_id => $office_array ):?>
                <option value="<?php echo $office_id; ?>" <?php selected( $office_id, $presets['company-filter'] );?>><?php echo $office_array['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="agents-search-field">
            <button type="submit" class="agents-submit-search" style="color: #fff">
                Search<i class="fa fa-caret-right" aria-hidden="true"></i>
            </button>
        </div>
    </fieldset>
</section>