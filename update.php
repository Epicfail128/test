<?php

require 'database/QueryBilder.php';

$db = new QueryBilder();

$data = [
    "id"    =>  $_GET['id'],
    "title" =>  $_POST['title'],
    "content"   =>  $_POST['content']
];

$db->update("tasks",$data);

header("Location: /"); exit;