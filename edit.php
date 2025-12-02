<?php
require "connection.php";
require "langModel.php";
require "langService.php";

$service = new LangService(new Connect(), new Language());
$item = $service->find($_GET['id']);
?>

<h2>Edit Language</h2>

<form action="langController.php?action=update" method="post">

    <input type="hidden" name="id" value="<?= $item->id ?>">

    <label>Language:</label><br>
    <input type="text" name="lang" value="<?= htmlspecialchars($item->lang) ?>"><br><br>

    <label>Hello World message:</label><br>
    <textarea name="hello_world"><?= htmlspecialchars($item->hello_world) ?></textarea><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="index.php">Back</a>
