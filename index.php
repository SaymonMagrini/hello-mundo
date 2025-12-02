<?php
require "connection.php";
require "langModel.php";
require "langService.php";

$service = new LangService(new Connect(), new Language());
$languages = $service->read();
?>
<h2>Languages</h2>

<a href="create.php">Add language</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Language</th>
        <th>Hello World</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($languages as $l): ?>
        <tr>
            <td><?= htmlspecialchars($l->lang) ?></td>
            <td><?= htmlspecialchars($l->hello_world) ?></td>
            <td>
                <a href="edit.php?id=<?= $l->id ?>">Edit</a> |
                <a href="langController.php?action=delete&id=<?= $l->id ?>" onclick="return confirm('Delete?')">
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>