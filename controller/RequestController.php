<?php

class RequestController {
	private $config = [];
	private $request = [];

	public function __construct($slack_request) {
		$this->request = $slack_request;
		$this->config = include(__DIR__ . '/../config/config.php');
	}

	/**
	 * Validate incoming slack request.
	 * Check that we have a valid token
	 * @TODO check if we have a valid channel
	 * @TODO check if we have a username
	 * @TODO others checks
	 * @access public
	 * @return boolean
	 */
	public function isValid() {

		// die if we don't have atoken
		if (!isset($this->request['token'])) {
			return false;
		}

		// Looks like the request is not coming from Slack
		// Maybe we regenerated the token and forgot to update the config?
		if ($this->request['token'] !== $this->config['token']) {
			throw new RequestException('Invalid token');
		}

		return true;

	}

	// Parse slack request to determine route
	public function getRoute() {
		$params = explode(" ", $this->request['text']);
		$length = count($params);

		// no command? help the user by showing the menu
		$action = 'help';

		if ($length == 0) {
			$action = $params[0];
		} 
		elseif ($length == 1) {

		} 
		elseif ($length == 2) {
			
		}
		
		// Obfuscate function name
		return $this->config['prepend_fn'].ucwords($action);
	}
}

?>