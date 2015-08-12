<?php

// Add tool page
function tuba_add_page()
{
// 	add_submenu_page('tools.php', 'Tracking URL Builder for Analytics', 'Tracking URL Builder for Analytics', 'Admin', 'tracking-url-builder-for-analytics', 'tuba_creator_form');
	add_management_page('Tracking URL Builder for Analytics', 'Tracking URL Builder for Analytics', 'manage_options', 'tracking-url-builder-for-analytics', 'tuba_creator_form');
}
add_action('admin_menu', 'tuba_add_page');

// Tracking URL Builder for Analytics Form
function tuba_creator_form(){
	?>
	<h2>Tracking URL Builder for Analytics</h2>
		<div class="trackingUrlContainer" style="width: 75%;">
			<p><?php _e('This Plugin allows you to add parameters to the URL to use in custom  Web-based advertising campaigns. A custom campaign is any ad campaign not using the AdWords auto-tagging feature.', 'tracking-url-builder-for-analytics')?></p>
			
			<p><?php _e('When users click one of the custom links, the unique parameters are sent to your Google Analytics account, so you can identify the URLs that are most effective in attracting users to your content.', 'tracking-url-builder-for-analytics')?></p>
			
			<p><?php _e('In this way, Google Analytics custom campaign will help you measure the impact of your online campaigns.', 'tracking-url-builder-for-analytics')?><br><?php _e('They are a very powerful tool for anyone involved in Web Marketing and this plugin will help you quickly create the url to use in your campaigns.', 'tracking-url-builder-for-analytics')?></p>
			
			<form onsubmit="createUrl(); return false;" name="createUrlForm">
				<p><b><?php _e('Step 1:', 'tracking-url-builder-for-analytics')?></b> <?php _e('Enter the URL of your website.', 'tracking-url-builder-for-analytics')?></p>
				
				<table class="outline" cellspacing="5" cellpadding="0" border="0">
					<tr>
						<td width="25%" nowrap="nowrap"><?php _e('Website URL *', 'tracking-url-builder-for-analytics')?></td>
						<td width="75%" valign="top" nowrap="nowrap"><input type="text" size="50" name="website" placeholder="http://www.example.com/page"></td>
					</tr>
				</table>
				
				<p><b><?php _e('Step 2:', 'tracking-url-builder-for-analytics')?></b> <?php _e('Fill in the following fields and generates the URL.', 'tracking-url-builder-for-analytics')?><br><b><?php _e('Campaign Source, Campaign Medium and Campaign Name', 'tracking-url-builder-for-analytics')?></b> <?php _e('should always be used.', 'tracking-url-builder-for-analytics')?></p>
				
				<table class="outline" cellspacing="5" cellpadding="0" border="0">
					<tr>
						<td width="20%" nowrap="nowrap"><?php _e('Campaign Source *', 'tracking-url-builder-for-analytics')?></td>
						<td width="60%" valign="top" nowrap="nowrap">
							<input type="text" size="25" name="utm_source">
							<code><?php _e('(referrer: google, citysearch, newsletter4)', 'tracking-url-builder-for-analytics')?></code>
						</td>
					</tr>
					<tr>
						<td width="20%" nowrap="nowrap"><?php _e('Campaign Medium *', 'tracking-url-builder-for-analytics')?></td>
						<td width="60%" valign="top" nowrap="nowrap">
							<input type="text" size="25" name="utm_medium">
							<code><?php _e('(marketing medium: cpc, banner, email)', 'tracking-url-builder-for-analytics')?></code>
						</td>
					</tr>
					<tr>
						<td width="20%" nowrap="nowrap"><?php _e('Campaign Term', 'tracking-url-builder-for-analytics')?></td>
						<td width="60%" valign="top" nowrap="nowrap">
							<input type="text" size="25" name="utm_term">
							<code><?php _e('(identify the paid keywords)', 'tracking-url-builder-for-analytics')?></code>
						</td>
					</tr>
					<tr>
						<td width="20%" nowrap="nowrap"><?php _e('Campaign Content', 'tracking-url-builder-for-analytics')?></td>
						<td width="60%" valign="top" nowrap="nowrap">
							<input type="text" size="25" name="utm_content">
							<code><?php _e('(use to differentiate ads)', 'tracking-url-builder-for-analytics')?></code>
						</td>
					</tr>
					<tr>
						<td width="20%" nowrap="nowrap"><?php _e('Campaign Name *', 'tracking-url-builder-for-analytics')?></td>
						<td width="60%" valign="top" nowrap="nowrap">
							<input type="text" size="25" name="utm_campaign">
							<code><?php _e('(product, promo code, or slogan)', 'tracking-url-builder-for-analytics')?></code>
						</td>
					</tr>
				</table>
				
				<p><?php _e('* Required field', 'tracking-url-builder-for-analytics')?></p>
				
				<input class="button-primary" type="submit" onclick="createUrl();" value="<?php _e('Generate URL', 'tracking-url-builder-for-analytics')?>">
				<input class="button-secondary" type="button" onclick="clearUrl();" value="<?php _e('Clear', 'tracking-url-builder-for-analytics')?>">
			</form>
			
			<p><b><?php _e('Step 3:', 'tracking-url-builder-for-analytics')?></b> <?php _e('Copy the address below and use it to your custom campaigns.', 'tracking-url-builder-for-analytics')?></p>
			
			<table class="outline" cellspacing="5" cellpadding="0" border="0">
				<tr>
					<td width="25%" nowrap="nowrap"><?php _e('Result URL', 'tracking-url-builder-for-analytics')?></td>
					<td width="75%" valign="top" nowrap="nowrap">
						<input class="resultUrl" type="text" size="50" name="website" value="">
					</td>
				</tr>
			</table>
		
			<script language="javascript" type="text/javascript">
				function clearUrl() {
					jQuery('form[name="createUrlForm"] input[type="text"], input.resultUrl').val("");
					return -1;
				}
	
				function createUrl(){
					var serialize = jQuery('form[name="createUrlForm"]').serializeArray();
	
					if(serialize[0].value != "" && serialize[1].value != "" && serialize[2].value != "" && serialize[5].value != ""){
						var url = jQuery('input[name="website"]').val().split('?');
						var result = url[0]+'?';
						if(url[1]){
							result += url[1]+"&";
						}
						
						jQuery(serialize).each(function(i){
							if(serialize[i].value != "" && i != 0){
								result += serialize[i].name+"="+serialize[i].value+"&";
							}
						});
						result = result.slice(0, -1);
						jQuery('input.resultUrl').val(result);
					}
	
					return -1;
				}
			</script>
		</div>
		
	<?php 
}