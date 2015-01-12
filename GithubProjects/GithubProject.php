<?php

namespace IdnoPlugins\GithubProjects {

    class GithubProject extends \Idno\Common\Entity {

	/**
	 * Saves changes to this object based on user input
	 * @return bool
	 */
	function saveDataFromInput() {

	    if (empty($this->_id)) {
		$new = true;
	    } else {
		$new = false;
	    }

	    if ($time = \Idno\Core\site()->currentPage()->getInput('created')) {
		if ($time = strtotime($time)) {
		    $this->created = $time;
		}
	    }

	    foreach ([
		'title', 'body', 'project', 'website'
	    ] as $field) {

		$required = [
		    'title', 'body', 'project'
		];


		$value = \Idno\Core\site()->currentPage()->getInput($field);
		if (!$value && in_array($field, $required)) {
		    \Idno\Core\site()->session()->addErrorMessage("Sorry, required field $field is missing!");
		    return false;
		}

		$this->$field = $value;
	    }
	    
	    if ($new) {
		
		// Create a webhook code
		$this->webhook_code = strtolower(md5(rand().microtime(true). rand()));
		
	    }

	    if ($this->save()) {
		if ($new) {
		    $this->addToFeed();
		} // Add it to the Activity Streams feed
		\Idno\Core\Webmention::pingMentions($this->getURL(), \Idno\Core\site()->template()->parseURLs($this->getTitle() . ' ' . $this->getDescription()));

		return true;
	    } else {
		return false;
	    }
	}

    }

}