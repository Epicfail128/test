<?php
// $_POST
require 'database/QueryBilder.php';

$db = new QueryBilder();

$data = [
  "title" => $_POST['title'],
  "content" => $_POST['content']
];

//$db->addTasks($data);

$db->store("tasks", $data);

header("Location: /"); exit;