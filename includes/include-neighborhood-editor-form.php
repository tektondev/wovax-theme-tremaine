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
    	<label>Filter Logic (If Comma Seperated List for Field Values):</label>
        <select name="_property_filter_field_logic">
        	<option value="OR" <?php selected( 'OR', $settings['_property_filter_field_logic']);?>>OR</option>
            <option value="And" <?php selected( 'And', $settings['_property_filter_field_logic']);?>>And</option>
        </select>
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
    <div class="wx-field">
    	<label>Latitude</label>
    	<input type="text" name="_latitude" value="<?php echo $settings['_latitude'];?>" />
    </div>
    <div class="wx-field">
    	<label>Longitude</label>
    	<input type="text" name="_longitude" value="<?php echo $settings['_longitude'];?>" />
    </div>
    <div class="wx-field">
    	<label>Map Zoom Level</label>
    	<input type="text" name="_geo_zoom" value="<?php echo $settings['_geo_zoom'];?>" />
    </div>
</fieldset>
<hr />