<?php

require 'database/QueryBilder.php';

$db = new QueryBilder();

$id = $_GET['id'];

//$task = $db->getTask($id);

$task = $db->getOne("tasks", $id);// Получить запись по ID

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $task['title'];?></h1>
            <p>
                <?= $task['content'];?>
            </p>
            <a href="/" class="btn btn-info">Go Back</a>
        </div>
    </div>
</div>
</body>
</html>