/*
	Plugin Name: Astriz Studios - Profanity Blocker
	Version: 1.0
	Author: Astriz Studios
	Author URI: http://astrizstudios.com
	License: GPL2
	Description: There are no reasons why you should worry about the profanities on your blog comments or any other part of it.
	File Info: JavaScript used on the administration side.
	Plugin URI: http://profanity-blocker.com/plugins/wordpress/
*/

var defColor = null;

function astriz_checkPass()
{
	var d = document.getElementById('astriz_password');

	if(defColor === null)	{ defColor = d.style.borderColor; }

	if(d.value == '')
	{
		d.style.borderColor = 'red';
		d.select();
		alert('You will need to enter some password first');
		return false;
	}

	d.style.borderColor = defColor;

	return true;
}

function astriz_unlockMe(v)
{
	var pass = prompt("Please enter your password","Password");

	pass = pass.trim();

	if(pass === null || pass == '')
	{
		return false;
	}

	v.value = 'true';

	var d = document.getElementById('astriz_password');

	d.value = pass;

	return true;
}

function astriz_verifyLicence()
{
	var d = document.getElementById('astriz_pro_block_licence');

	var b = d.value.trim();

	//the length of the licence / private key
	if(b.length < 9) //@HERE - Will need to be changed..
	{
		return false;
	}

	var data = {
		action: 'my_action',
		whatever: 1234
	};

	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	$.post(ajaxurl, data, function(response)
	{
		alert('Got this from the server: ' + response);
	});
	
}