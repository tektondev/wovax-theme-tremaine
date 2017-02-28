<hr />
<fieldset id="wx-neighborhood-property-editor">
	<h3>Filter Properties</h3>
    <div class="wx-field">
    	<label>Custom Field Name</label>
    	<input type="text" name="_property_filter_field_name" value="<?php echo $settings['_property_filter_field_name'];?>" />
    </div>
    <div class="wx-field">
    	<label>Custom Field Value</label>
    	<input type="text" name="_property_filter_field_value" value="<?php echo $settings['_property_filter_field_value'];?>" />
    </div>
    <div class="wx-field">
    	<label>Use Compare Logic:</label>
        <select name="_property_filter_compare">
        	<option value="ex-match" <?php selected( 'ex-match', $settings['_property_filter_compare']);?>>Exact Match</option>
            <option value="neqt" <?php selected( 'neqt', $settings['_property_filter_compare']);?>>Not Equal to</option>
            <option value="contains" <?php selected( 'contains', $settings['_property_filter_compare']);?>>Contains</option>
            <option value="contains-not" <?php selected( 'contains-not', $settings['_property_filter_compare']);?>>Does Not Contain</option>
        </select>
    </div>
    <div class="wx-field">
    	<label>Raw HTML/JS/CSS (For Map)</label>
        <textarea name="_html_code" style="width: 100%;height: 150px;"><?php echo $settings['_html_code'];?></textarea>
    </div>
</fieldset>
<hr />