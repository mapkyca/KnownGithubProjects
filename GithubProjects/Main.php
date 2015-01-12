<?php

namespace IdnoPlugins\GithubProjects {

    class Main extends \Idno\Common\Plugin {

	function registerPages() {
	    \Idno\Core\site()->addPageHandler('/githubproject/edit/?', '\IdnoPlugins\GithubProjects\Pages\Edit');
	    \Idno\Core\site()->addPageHandler('/githubproject/edit/([A-Za-z0-9]+)/?', '\IdnoPlugins\GithubProjects\Pages\Edit');
	    
	    \Idno\Core\site()->addPageHandler('/githubproject/delete/([A-Za-z0-9]+)/?', '\IdnoPlugins\GithubProjects\Pages\Delete');
	    
	    \Idno\Core\site()->addPageHandler('/[0-9]+/([A-Za-z0-9\-\_]+)/([A-Za-z0-9]+)/?', '\IdnoPlugins\GithubProjects\Pages\Webhook');
	}

    }

}