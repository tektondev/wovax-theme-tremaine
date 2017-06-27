<hr />
<fieldset id="wx-development-property-editor">
	<h3>Edit Development</h3>
    <div class="wx-field">
    	<label>Subtitle</label>
    	<input type="text" name="_subtitle" value="<?php echo $settings['_subtitle'];?>" />
    </div>
    <div class="wx-field">
    	<label>Number of Residences</label>
    	<input type="text" name="_residences" value="<?php echo $settings['_residences'];?>" />
    </div>
    <div class="wx-field">
    	<label>Unit Mix</label>
    	<input type="text" name="_unit_mix" value="<?php echo $settings['_unit_mix'];?>" />
    </div>
    <div class="wx-field">
    	<label>Pricing</label>
    	<input type="text" name="_pricing" value="<?php echo $settings['_pricing'];?>" />
    </div>
    <div class="wx-field">
    	<label>Architect</label>
    	<input type="text" name="_architect" value="<?php echo $settings['_architect'];?>" />
    </div>
    <div class="wx-field">
    	<label>Developer</label>
    	<input type="text" name="_developer" value="<?php echo $settings['_developer'];?>" />
    </div>
    <div class="wx-field">
    	<label>Interior Designer</label>
    	<input type="text" name="_interior_designer" value="<?php echo $settings['_interior_designer'];?>" />
    </div>
    <div class="wx-field">
    	<label>Address</label>
    	<input type="text" name="_address" value="<?php echo $settings['_address'];?>" />
    </div>
    <div class="wx-field">
    	<label>More Informaiton Link URL</label>
    	<input type="text" name="_more_link" value="<?php echo $settings['_more_link'];?>" />
    </div>
    <div class="wx-field">
    	<label>More Informaiton Link URL (Optional)</label>
        <select name="_more_info_modal">
        	<?php foreach( $modals as $m_id => $m_name ):?>
            	<option value="<?php echo $m_id; ?>" <?php selected( $m_id, $settings['_more_info_modal'] );?> ><?php echo $m_name; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="wx-field">
    	<label>Property Search Text</label>
    	<input type="text" name="_prop_search_text" value="<?php echo $settings['_prop_search_text'];?>" />
    </div>
    <div class="wx-field">
    	<label>Logo</label>
    	<input type="text" name="_logo" value="<?php echo $settings['_logo'];?>" />
    </div>
    <div class="wx-field">
    	<label>Modal ID</label>
    	<input type="text" name="_modal_id" value="<?php echo $settings['_modal_id'];?>" />
    </div>
    <div class="wx-field">
    	<label>Modal Link Text</label>
    	<input type="text" name="_modal_link_text" value="<?php echo $settings['_modal_link_text'];?>" />
    </div>
</fieldset>
<hr />