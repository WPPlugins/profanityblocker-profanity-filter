<?php
/*
	Note: Having a nice and clean code is what we are after. Do mind that this is beta 1 release of the plugin and service and that there will be future updates to all aspects to what we offer. While that is true, we will try to bring you the best possible right from the start.
	
	About file:
	This file holds the functions specific to the WordPress administration pages
*/

//A bit of security..
if(!defined('ABSPATH')) { exit; }

	//Activate the needed hooks only if the user is an administrator..
	if(is_admin())
	{
		//initialize all needed things
		add_action('admin_init', 'astrizstudios_pro_block_admin_init');
		//Show the page in the wordpress/buddypress administration
		add_action('admin_menu', 'astrizstudios_pro_block_menu_init');
	}

	function astrizstudios_pro_block_admin_init()
	{
		register_setting( 'astrizstudios_pro_block_options_save', 'astrizstudios_pro_block_options', 'astrizstudios_pro_block_options_validate' );
		wp_register_script('astrizstudios_pro_block_script_admin', plugins_url('/js/admin.js', __FILE__), false, 'v0001');
		wp_register_style('astrizstudios_pro_block_style_admin', plugins_url('/css/admin.css', __FILE__), false, 'v0001');
	}

	function valid_option($option, $fallback)
	{
		if(!preg_match('/^[0-1]{1}$/i', $option))	{ return $fallback; }
		return $option;
	}

	//Sanetize the options..
	function astrizstudios_pro_block_options_validate($options)
	{
		$opt = astrizstudios_pro_block_get_options();

		$opt['filter_wp_posts'] = (isset($options['filter_wp_posts'])) ? valid_option($options['filter_wp_posts'], 1) : 0;
		$opt['filter_wp_comments'] = (isset($options['filter_wp_comments'])) ? valid_option($options['filter_wp_comments'], 1) : 0;
		$opt['filter_wp_userinfo'] = (isset($options['filter_wp_userinfo'])) ? valid_option($options['filter_wp_userinfo'], 1) : 0;
		$opt['filter_wp_categories'] = (isset($options['filter_wp_categories'])) ? valid_option($options['filter_wp_categories'], 1) : 0;
		$opt['filter_bp_activity'] = (isset($options['filter_bp_activity'])) ? valid_option($options['filter_bp_activity'], 1) : 0;
		$opt['filter_bp_member'] = (isset($options['filter_bp_member'])) ? valid_option($options['filter_bp_member'], 1) : 0;
		$opt['filter_bp_group'] = (isset($options['filter_bp_group'])) ? valid_option($options['filter_bp_group'], 1) : 0;
		$opt['filter_bp_xprofile'] = (isset($options['filter_bp_xprofile'])) ? valid_option($options['filter_bp_xprofile'], 1) : 0;
		$opt['filter_bp_messages'] = (isset($options['filter_bp_messages'])) ? valid_option($options['filter_bp_messages'], 1) : 0;
		$opt['filter_check_emails'] = (isset($options['filter_check_emails'])) ? valid_option($options['filter_check_emails'], 1) : 0;
		$opt['filter_check_phone'] = (isset($options['filter_check_phone'])) ? valid_option($options['filter_check_phone'], 1) : 0;
		$opt['filter_check_links'] = (isset($options['filter_check_links'])) ? valid_option($options['filter_check_links'], 1) : 0;

		if(isset($options['userkey']) && !empty($options['userkey']))
		{
			/*if(!preg_match('/^[a-zA-Z0-9]{32}$/i', $opt['userkey'])) //@HERE
			{
				$opt['userkey'] = '';
			}*/
			$opt['userkey'] = $options['userkey'];
		}

		return $opt;
	}
	
	// Function that connects everything through the actions hook
	function astrizstudios_pro_block_menu_init()
	{
		//Allow edit of administrators and above or any members that are allowed to manage options
		// as per http://codex.wordpress.org/Roles_and_Capabilities
		$manage_page = add_options_page('Profanity-Blocker Management Page', 'ProfanityBlocker Management', 'manage_options', 'profanity-blocker-manager', 'astrizstudios_pro_block_administration');

		add_action( 'admin_print_styles-' . $manage_page, 'astrizstudios_pro_block_admin_style_load' );
		add_action( 'admin_print_scripts-' . $manage_page, 'astrizstudios_pro_block_admin_script_load' );
	}

	function astrizstudios_pro_block_administration()
	{
		?>
		<div class="wrap">
			<?php screen_icon( 'options-general' ); ?>
			<h2>Astriz Studios - ProfanityBlocker Managment Page</h2>

			<form method="post" action="options.php">
				<?php settings_fields('astrizstudios_pro_block_options_save'); ?>
				<?php /*$options = get_option('astrizstudios_pro_block_options');*/	?>
				<?php $options = astrizstudios_pro_block_get_options();	?>

				<div>
					<div id="astrizstudios_pro_block_plugginLogo">
						<i><b><img src="<?php echo plugins_url('/images/logo.png', __FILE__)?>" title="Profanity-Blocker.com" alt="Profanity-Blocker.com [profanity filter]"/></b></i>
					</div>

					<div id="astrizstudios_pro_block_licence">
						Before you can use our plugin and Service you will need to subscribe to a free 15 day trial.<br/>
						To do that you should go here: <a href="http://www.profanity-blocker.com/" target="_blank" title="Get your license">Profanity-Blocker.com homepage</a>
						<div class="line_break"><hr/></div>
						<div class="astrizstudios_left30">
							<?php if($options['userkey'] == "") { ?>
							If you own a license key, add it here. You can find it on the Member Area section on ProfanityBlocker's website.<br/>
							<?php } ?>
							<b>Licence (Private) Key:</b>
							<input name="astrizstudios_pro_block_options[userkey]" id="astriz_pro_block_licence" value="<?php echo $options['userkey']; ?>" autocomplete="off"/><br/>
							<br/>
						</div>
						<div class="right">
							
						</div>
					</div>

					<div class="line_break"><hr/></div>

					<div id="astrizstudios_pro_block_server_access">
						<h3 class="title">Server Access Settings</h3>

						<label>
							<input id="astrizstudios_pro_block_usecurl" name="astrizstudios_pro_block_options[connecting]" type="radio" <?php checked('use_rest_post', $options['connecting']); ?> value="use_rest_post"/> POST REST</label>
							<span><em>Recomended!</em> This is a POST implementation of REST protocol. This is the recommended way to connect to and use our services. There is <u>no</u> data limit and the service is fast.</span>
					</div>

				</div>

				<div class="line_break"><hr/></div>

				<div id="astrizstudios_pro_block_fitler_areas">
					<h3 class="title">Areas of filter you would like to filter out</h3>
					<h4 class="title">WordPress</h4>
					<?php /* WordPress */ ?>
					<label>
						<input name="astrizstudios_pro_block_options[filter_wp_posts]" type="checkbox" <?php checked(true , $options['filter_wp_posts']); ?>/> Filter out post text</label>
						<span><em>Activates only when the post is set as public.</em> It will send through the filter every post creation and post update when the post is not marked as draft.</span>
					<label>
						<input name="astrizstudios_pro_block_options[filter_wp_comments]" type="checkbox" <?php checked(true , $options['filter_wp_comments']); ?> /> Filter out comments</label>
						<span>Every comment will be sent through our filter. You will cover next sections by this option: comment author's email address, comment author's user name, content of a comment and comment text before it is added to your rss feed (make sure your RSS does not show profanity as well!).</span>
					<label>
						<input name="astrizstudios_pro_block_options[filter_wp_userinfo]" type="checkbox" <?php checked(true , $options['filter_wp_userinfo']); ?>/> Filter out user info</label>
						<span>You can filter out many new users sections. These are: user's "nice name", user's first name, user's last name, content about the user, user's display name, user's username for logging in, user's nickname.</span>
					<label>
						<input name="astrizstudios_pro_block_options[filter_wp_categories]" type="checkbox" <?php checked(true , $options['filter_wp_categories']); ?>/> Filter out category details</label>
						<span>Do you allow your users to add categories? This will help you make them <i>clean</i>. Our filter will check category nice name, category name and category desription. (If only administrators can create categories, you can turn this off for less requests from your server).</span>

					<?php /* @HERE is buddypress installed -> show options.. otherwise, no options needed to be shown.. */ ?>
					<?php /* if there is BuddyPress we need to show additional info */ ?>
					<?php
						if($options['bp_runs'] === true)
						{
							//BuddyPress is running - show the options
							//- BuddyPress is running bbpress inside of it..so we need to show its settings as well.. //@HERE - make checks for it first..
							?>
							<h4 class="title">BuddyPress</h4>
								<label>
									<input name="astrizstudios_pro_block_options[filter_bp_activity]" type="checkbox" <?php checked(true , $options['filter_bp_activity']); ?>/> Filter out activity sections</label>
									<span>Filter out activity sections such as: activity comment, activity content, activity post, new blog activity comment, activity feed, activity updates, activity forum posts, activity forum topics and new activity content.</span>
								<label>
									<input name="astrizstudios_pro_block_options[filter_bp_member]" type="checkbox" <?php checked(true , $options['filter_bp_member']); ?>/> Filter out member sections</label>
									<span>Filter out members latest updates.</span>
								<label>
									<input name="astrizstudios_pro_block_options[filter_bp_group]" type="checkbox" <?php checked(true , $options['filter_bp_group']); ?>/> Filter out group sections</label>
									<span>Filters group message notifications, forums topics and posts, group status, name, dascriptions, comments and invites</span>
								<label>
									<input name="astrizstudios_pro_block_options[filter_bp_xprofile]" type="checkbox" <?php checked(true , $options['filter_bp_xprofile']); ?>/> Filter out xprofile sections</label>
									<span>Filters xprofile sections.</span>
								<label>
									<input name="astrizstudios_pro_block_options[filter_bp_messages]" type="checkbox" <?php checked(true , $options['filter_bp_messages']); ?>/> Filter out messages</label>
									<span>Filters message notifications, subjects, and content</span>
							<?php
						}
					?>
				</div>

				<div class="line_break"><hr/></div>

				<div id="astrizstudios_pro_block_privacy">
					<h3 class="title">Your privacy preferences</h3>
					<span>planned feature</span>
				</div>

				<div class="line_break"><hr/></div>

				<div id="astrizstudios_pro_block_info">
					<h3 class="title">Extra Options</h3>
					Logging into your account on our website (<a href="http://www.profanity-blocker.com/user/login" title="Click to log into your account">http://www.profanity-blocker.com/user/login</a>) will allow you to view and edit everything from your control panel, making all changes instantly active.<br/>
					You can however set next options from within this page.<br/>
					<br/>
					<label>
						<input name="astrizstudios_pro_block_options[filter_check_emails]" type="checkbox" <?php checked(true , $options['filter_check_emails']); ?>/> Filter out emails sent by your users</label>
					<label>
						<input name="astrizstudios_pro_block_options[filter_check_phone]" type="checkbox" <?php checked(true , $options['filter_check_phone']); ?>/> Filter out phone numbers exchanged by your users</label>
					<label>
						<input name="astrizstudios_pro_block_options[filter_check_links]" type="checkbox" <?php checked(true , $options['filter_check_links']); ?>/> Filter out links exchanged by your users</label>
				</div>

				<p class="submit">
					<input name="Submit" type="submit" class="button-primary" value="Save All Changes" />
				</p>

			</form>
		</div>
		<?php
	}

	//Function to load every style/script from the files
	function astrizstudios_pro_block_admin_style_load()
	{
		wp_enqueue_style('astrizstudios_pro_block_style_admin');
	}

	function astrizstudios_pro_block_admin_script_load()
	{
		wp_enqueue_script( 'astrizstudios_pro_block_script_admin');
	}
?>