<?php


class Auth
{

    public $pdo;

    public function __construct(QueryBilder $db)
    {
        $this->db = $db;
    }

    public function register($email, $password)
    {
        $this->db->store('users', [
            'email' => $email,
            'password' => md5($password)
        ]);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", md5($password));
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

}