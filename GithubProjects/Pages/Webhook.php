<?php

namespace IdnoPlugins\GithubProjects\Pages {

    class Webhook extends \Idno\Common\Page {

	function getContent() {
	    if (!empty($this->arguments[0])) {
		$object = \IdnoPlugins\GithubProjects\GithubProject::getByID($this->arguments[0]);
		if (empty($object)) {
		    $object = \IdnoPlugins\GithubProjects\GithubProject::getBySlug($this->arguments[0]);
		}
	    }
	    if (empty($object)) {
		$this->goneContent();
	    }

	    $t = \Idno\Core\site()->template();
	    $t->__(array('title' => 'Github Webhook endpoint', 'body' => $t->draw('pages/GithubProjects/webhook')))->drawPage();
	}

	function postContent() {

	    // Are we loading an entity?
	    if (!empty($this->arguments[0])) {
		$object = \IdnoPlugins\GithubProjects\GithubProject::getByID($this->arguments[0]);
		if (empty($object)) {
		    $object = \IdnoPlugins\GithubProjects\GithubProject::getBySlug($this->arguments[0]);
		}
	    }
	    if (empty($object)) {
		$this->goneContent();
	    }

	    // Verify code
	    if ($this->arguments[1] != $object->webhook_code)
		throw new \Exception("Sorry, webhook URL is invalid");

	    // Process webhook
	    if ($json = json_decode($_POST)) {
		
		$headers = getallheaders();
		$action = $json->action;
		
		if (!$action) throw new \Exception('Unrecognised payload');
		
		// Turn webhook into a Known event, allow you to handle specific actions, but we will always update the project's updated ts (unless you return false).
		if (\Idno\Core\site()->triggerEvent("webhook/github/$action", [
		    'headers' => $headers,
		    'action' => $action,
		    'object' => $object
		], true))
			$object->save(); // Update the project's updated ts, to allow for sorting by last updated.
		
	    } else {
		throw new \Exception('Unrecognised webhook payload.');
	    }
	    
	}

    }

}