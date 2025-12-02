<?php

class Language {
    private $id;
    private $lang;
    private $hello_world;
    private $registered_at;

    public function __get($attr) {
        return $this->$attr;
    }

    public function __set($attr, $value) {
        $this->$attr = $value;
        return $this;
    }
}
