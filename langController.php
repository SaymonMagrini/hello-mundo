<?php

require "connection.php";
require "langModel.php";
require "langService.php";

$action = $_GET['action'] ?? null;

if ($action === "create") {

    $lang = new Language();
    $lang->__set('lang', $_POST['lang'])
        ->__set('hello_world', $_POST['hello_world']);

    $service = new LangService(new Connect(), $lang);
    $service->create();
    header("Location: index.php");
    exit;

}

if ($action === "delete") {

    $lang = new Language();
    $lang->__set('id', $_GET['id']);

    $service = new LangService(new Connect(), $lang);
    $service->delete();
    header("Location: index.php");
    exit;

}

if ($action === "update") {

    $lang = new Language();
    $lang->__set('id', $_POST['id'])
        ->__set('lang', $_POST['lang'])
        ->__set('hello_world', $_POST['hello_world']);

    $service = new LangService(new Connect(), $lang);
    $service->update();
    header("Location: index.php");
    exit;

}
