<?php
/**
 * Generate options page
 *	
 */
	//Add support for decimal numbers 
    if (!current_user_can('manage_options')) {
      wp_die( _e('You do not have sufficient permissions to access this page.', 'crm-analytics') );
    }

    // See if the user has posted us some information
    if( isset($_POST['greenrope_analytics_save']) ){

    	check_admin_referer( 'greenrope_analytics_em_save_form', 'greenrope_analytics_em_name_of_nonce' );
 		 
 		$greenrope_analytics_settings = get_option('crm_analytics_settings');

 		//enable plugin option
		$greenrope_analytics_settings['enable_plugin'] = $_POST['enable_plugin'] ? true : false;

		//account number option
		$greenrope_analytics_settings['crm_acct'] = sanitize_text_field($_POST['crm_acct']);

		//if url is missing trailing slash add it
		$URL = esc_url_raw($_POST['crm_url'], array('http', 'https'));
		if(substr($URL, -1) != '/'){
			$URL = $URL . '/'; 
		} 

		$greenrope_analytics_settings['crm_url'] = $URL;
		
		update_option('crm_analytics_settings', $greenrope_analytics_settings);

		$str = '<div id="message" class="updated fade"><p>'. __('Options saved successfully.', 'crm-analytics') .'</p></div>';

		echo $str;
    	
	}
?>
<div class="wrap">

	<h2>CRM Analytics - settings</h2>
	<div id="page-wrap">

		<div id="inside">
		    <div id="options-div">
			   <!-- <div id="headerimage">
					<?php $greenrope_analytics_settings = get_option('crm_analytics_settings'); ?>
			    	<img src="<?php echo plugins_url('greenrope-analytics/img/greenrope-logo.jpg'); ?>" alt="Greenrope Analytics logo"/>
			    	<?php var_dump($greenrope_analytics_settings); ?>
				</div> -->
				<form method="post" id="addanalytic_options" name="addanalytic_options" onsubmit="return checkForm()">
					<?php wp_nonce_field( 'greenrope_analytics_em_save_form', 'greenrope_analytics_em_name_of_nonce' ); ?>		  
					<fieldset class="options">
						<table class="form-table">
							<tr style="vertical-align: top; font-size:15px;">
							 <th>
							 	<b><label for="enable_plugin" id="enable"><?php _e('Enable Tracking: ', 'crm-analytics'); ?></label></b>
							 </th>
							 <td>
							 	<input type="checkbox" name="enable_plugin" id="enable_plugin" <?php checked('1', $greenrope_analytics_settings['enable_plugin']); ?> />
							 </td>
							</tr>
						</table>
						<br />
						<table class="form-table">
							<tr style="vertical-align: top; font-size:13.2px;">
								<th scope="row">
									<b><label for="crm_acct"><?php _e('Greenrope Account Number: ', 'crm-analytics'); ?></label></b>
								</th>
								<td>
									<input type="textbox" name="crm_acct" id="crm_acct" value="<?php echo esc_attr($greenrope_analytics_settings['crm_acct']); ?>" style="width:167px" />
								</td>
							</tr>
							<tr style="vertical-align: top; font-size:13.2px;">
								<th scope="row">
									<b><label for="crm_acct"><?php _e('Greenrope URL: ', 'crm-analytics'); ?></label></b>
								</th>
								<td>
									<input type="url" name="crm_url" id="crm_url" value="<?php echo esc_url($greenrope_analytics_settings['crm_url']); ?>" class="regular-text code" />
									<p class="description" id="home-description">Format: http://www.sitename.com</a></p>
								</td>
							</tr>


							<tr style="vertical-align: top; ">
								<td scope="row" colspan="2">
									<textarea name="addanalytic_other" id="addanalytic_other" rows="8" cols="80" readonly><script language="JavaScript" type="text/javascript"> 
<!--document.write('<img src="<?php echo esc_url($greenrope_analytics_settings['crm_url']); ?>wt.pl?a=<?php echo esc_attr($greenrope_analytics_settings['crm_acct']); ?>&r=' + window.document.referrer + '" height="1" width="1">')
//-->
</script>
									</textarea>
								</td>
							</tr>
						</table>
					</fieldset>
					<p>
					  <input type="submit" name="greenrope_analytics_save" id="greenrope_analytics_save" class="button button-primary" value="Save Settings"  />
					</p>
		    	</form>
			</div><!-- end options div -->
		</div><!-- end inside -->
	<div style="clear: both;"></div>
	</div><!-- end pagewrap -->
</div><!-- end wrap -->