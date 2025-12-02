<?php

//CRUD
class LangService {

    private $pdo;
    private $language;

    public function __construct(Connect $connect, Language $language) {
        $this->pdo = $connect->connect();
        $this->language = $language;
    }

    public function create() {
        $sql = "INSERT INTO languages(lang, hello_world)
                VALUES(:lang, :hello)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':lang', $this->language->__get('lang'));
        $stmt->bindValue(':hello', $this->language->__get('hello_world'));
        return $stmt->execute();
    }

    public function read() {
        $sql = "SELECT * FROM languages ORDER BY id DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id) {
        $sql = "SELECT * FROM languages WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update() {
        $sql = "UPDATE languages SET lang=?, hello_world=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $this->language->__get('lang'),
            $this->language->__get('hello_world'),
            $this->language->__get('id')
        ]);
    }

    public function delete() {
        $sql = "DELETE FROM languages WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$this->language->__get('id')]);
    }
}
