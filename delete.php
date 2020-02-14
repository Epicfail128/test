<?php

require 'database/QueryBilder.php';

$db = new QueryBilder();

$id = $_GET['id'];

//$db->deleteTasks($id);

$db->delete("tasks", $id);

header("Location: /");