<?php

class language {
	private $id;
	private $name;
	private $hello_world;
	private $registered_at;

	public function __get($attribute) {
		return $this->$attribute;
	}

	public function __set($attribute, $value) {
		$this->$attribute = $value;
		return $this;
	}
}

?>