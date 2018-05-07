<?php

// needs comments
class RequestException extends Exception {

	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

	public function __toString() {
		$error = $this->message;
		return $error;
	}
}

?>