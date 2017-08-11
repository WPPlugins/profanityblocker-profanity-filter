=== ProfanityBlocker - Profanity Filter ===
Contributors: BaneD
Tags: profanity filter, profane, swearing filter, content filter, phonetic filter, word abuse filter, buddypress, buddypress filter
Requires at least: 2.7
Tested up to: 3.9.1
Stable tag: trunk

ProfanityBlocker is a cloud based service that scans for profane (swearing/abusive) words - giving you greater control of allowed text on your site

== Description ==

= What is ProfanityBlocker =
ProfanityBlocker is a highly advanced system with a clean and simple interface shown to the end user - you! We made the system easily configurable over our plugin and the control panel on our website.

With our plugin you have content instantly, without any fuss automatically moderated for any bad words such as profanity, swearing, or abusive language. You can also have your personal blacklist. Just login to our control panel and add the word. We'll do the rest. The system will update our network with your change.

= Why ProfanityBlocker is here =
After running a few communities, we needed a filtering service that is both simple and advanced. We weren't spoilt for rich choices when the company started looking into filters, at least the ones that would scan the text without a need to type in all of the variations of the words that members of our communities used - to say what they wanted, even if means hurting others.

After testing several options, we found that there was either a question of speed, quality or both and this has resulted in an advanced system that you can see today.
This system is being used by the plugin and we have decided that our first plugin should be for the WordPress community.

This is of course not only limited to WordPress, but it will filter your texts even if you are running BuddyPress or bbPress (with bbPress being at the start of the implementation).

Do check the screenshots for more..


== Installation ==

= Manual installation =
1. Extract the plugin archive.
1. Upload `profanityblocker-profanity-filter` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Visit (http://www.profanity-blocker.com) to register and create a license
1. Return to your WordPress site
1. Go to the Settings->ProfanityBlocker Management page and set the key that you got from our website
1. Check the options you'd like to enable and save
1. Let it work for you

= Automated Installation =
1. Go to the 'Plugins' menu in WordPress and click on Search
1. Search for our plugin `ProfanityBlocker – Profanity Filter` and click install
1. Click to activate the plugin
1. Visit (http://www.profanity-blocker.com) to register and create a license
1. Return to your WordPress site
1. Go to the Settings->ProfanityBlocker Management page and set the key that you got from our website
1. Check the options you'd like to enable and save
1. Let it work for you


== Frequently Asked Questions ==

= Can I specify my own character for replacing bad text instead of *? =
Currently this is not possible, but we do have that in our task list so it should be available in the near future.

= Does the Plugin change the content in the WordPress database? =
Yes, currently it saves it in your database for faster loading and less website traffic. We have plans of adding our own tables and having a live filtering option, but they are not available at this time.

= Why is the text changed once I post it for public? =
There are various settings one can set for their WordPress site, many allowing anonymous users to post text on their website. The plugin will not check drafts simply to make sure that no one is trying to go around the system without anyone being able to see them.
Once the text is posted to public and on any subsequent update, the text will be scanned to see if there are any new profane words to remove or not.

= My posts are saved in few different formats - will it still work? =
Yes, our plugin only looks to avoid filtering on a draft. As soon as it is changed into something else (for example gets published), it is sent for filtering.

= Does this plugin work for WordPress core only? =
No. Our plugin is filtering with WordPress core elements, but also BuddyPress elements and some bbPress elements. We are however planning to expand bbPress coverage so that we can filter any part of the system that might be a problem for your community.

= I found a bug, do you care? =
Yes of course! We are at beta stage for now, so we know that there are some bugs that are likely to pop up and as such we are interested in hearing any possible issues that you might have because of our plugin in order to help you out in a fast manner, but also to others that opt for our plugin. Just go to support tab and let us know more, or send us an email to support/@t\profanity-blocker.com

== Screenshots ==

1. Plugin activated.
2. Plugin settings location (Settings->ProfanityBlocker Management)
3. Options available for you to setup and the location where you should enter the license key in order to use our service.
4. Example of the text before submission.
5. The text after it has been submitted.
6. Example of the comment before submission.
7. The comment after it has been submitted.


== Changelog ==

= 1.1 =
* Fixed the issue where a class was not initialized before being read for some reason.

= 1.0 =
* Filtering using array submissions
* code separation and minimization (refactoring)
* Errors reporting option

== Other Notes ==
= How to set it up =
You will need to get a license key from our website. To do that you will need to go here: [Profanity-Blocker.com](http://www.profanity-blocker.com/ "Profanity-Blocker.com - Your very own Profanity Blocker").

After you go there either log in if you are already registered or signup by following the instructions on the site. You will get a free 15 days trial Premium package right after subscribing.

The payment agreement is set right away after you create an account for your domain, but as you are shown, you are not billed until the trial license expires.

Once you set the agreement you will get your account activated and can start using it straight away.

= What will you get =
You get a Premium package as a trial (you can opt for Basic or Enterprise if you so choose, but the payment is then made the very next day). This means that you get the advanced filtering plus the email filtering, phone numbers filtering and the links filtering for 15 free days - that is if you select them in your plugin.

= Quick links =
To register go here [Profanity-Blocker.com signup](http://www.profanity-blocker.com/user/register "Create your own Profanity Blocker account").
To check out our pricing page, go here: [Profanity-Blocker.com pricing]( http://www.profanity-blocker.com/pricing "Check out our offers and their prices here").