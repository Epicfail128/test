<?php

class QueryBilder{

    public $pdo;

    function __construct()
    {
        // 1. Подключиться к БД
        $this->pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
    }

    //Список задач
    function all($table)
    {
//2. Подготовить запрос
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql); //подготовить
        $statement->execute(); //true || false
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
//Получаем записи
    }

    //Вывод одной задачи(show & edit)
    function getOne($table,$id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //Сохранение новой задачи
    function store($table,$data)
    {
        //ключ масива
        $keys = array_keys($data);
        //сформировать строку title, content
        $stringOfKeys = implode(',', $keys);
        //сформировать метки
        $placeholders = ":" . implode(', :', $keys);

        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); //true || false
    }

    //Изминение/обновление существующей задачи
    function update($table,$data)
    {
        $fields = '';

        foreach ($data as $key => $value) {
            $fields .= $key . "=:" . $key . ",";
        }

        $fields = rtrim($fields, ',');

        $sql = "UPDATE $table SET $fields WHERE id=:id";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); // true || false
    }

    //Удаление задачи
    function delete($table, $id){
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}