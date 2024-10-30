<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://likewowplugins.com
 * @since      1.0.0
 *
 * @package    crm-analytics
 * @subpackage crm-analytics/public/partials
 */
?>

<!-- Start CRM Analytics -->
	<script type="text/javascript">
		document.write('<img src="<?php echo esc_url($greenrope_analytics_settings['crm_url']); ?>wt.pl?a=<?php echo esc_attr($greenrope_analytics_settings['crm_acct']); ?>&r=' + window.document.referrer + '" height="1" width="1">')
	</script>
<!-- End Greenrope Analytics -->