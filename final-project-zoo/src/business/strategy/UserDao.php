<?php

include_once '../boundary/CrudOperations.php';
include_once '../entity/User.php';

class UserDao extends CrudOperations
{
    private static $findAllStatement =
        'SELECT * FROM users';

    public static $findByUsernameOrEmailStatement =
        'SELECT * FROM users WHERE username = :usernameOrEmail OR email = :usernameOrEmail';

    private static $insertStatement =
        'INSERT INTO users (name, surname, username, email, password, role) VALUES (:name, :surname, :username, :email, :password, :role)';

    private static $updateStatement =
        'UPDATE users SET name = :name, surname = :surname, username = :username, email = :email, password= :password, role = :role WHERE id = :id';

    private static $deleteByIdStatement =
        'DELETE FROM users WHERE id = :id';

    public function findByUsernameOrEmail($usernameOrEmail)
    {
        return $this->executeStatement(self::$findByUsernameOrEmailStatement, [':usernameOrEmail' => $usernameOrEmail])
            ->fetchObject('User');
    }

    public function findAll()
    {
        return $this->executeStatement(self::$findAllStatement)->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public function insert($data)
    {
        return $this->executeStatement(self::$insertStatement,
            [
                ':name' => $data->getName(),
                ':surname' => $data->getSurname(),
                ':username' => $data->getUsername(),
                ':email' => $data->getEmail(),
                ':password' => $data->getPassword(),
                ':role' => $data->getRole(),
                ':id' => $data->getId()
            ]);
    }

    public function update($data, $id)
    {
        return $this->executeStatement(self::$updateStatement, [
            ':name' => $data->getName(),
            ':surname' => $data->getSurname(),
            ':username' => $data->getUsername(),
            ':email' => $data->getEmail(),
            ':password' => $data->getPassword(),
            ':role' => $data->getRole(),
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        return $this->executeStatement(self::$deleteByIdStatement, [':id' => $id]);
    }
}