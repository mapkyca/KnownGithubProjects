Github Projects for Known
=========================

This plugin provides an new content type - a Github Project, for you to list github projects that you create.

It allows you to provide some description about your project, and also provides the owner with a webhook endpoint, which can be used in the project's github notification settings, to fire webhooks your way.

You can use these hooks to update your github project page entry. 

Installation
------------

* Drop the GithubProject folder into the IndoPlugins folder of your Known installation.
* Log into known and click on Administration.
* Click "install" on the plugins page

Using the webhook
-----------------

As the owner of a Github project entry, you will be given a special url. Use this URL in Github's webhook settings (found in your project's settings page).

Once set up, github will ping this endpoint when something happens to your project. 

When a webhook is received and validated, this plugin will fire an event ```webhook/github/[ACTION]``` where [ACTION] is the webhook action being triggered (see https://developer.github.com/webhooks/) for details.

This plugin will also, by default, update the entry's updated timestamp, so if you sort your projects by updated time it'll show the most recently updated ones first. Handy for project lists.

See
---
 * Author: Marcus Povey <http://www.marcus-povey.co.uk> 
 * Github actions documentation <https://developer.github.com/webhooks/>

