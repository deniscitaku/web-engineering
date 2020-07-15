<?php

require_once(__DIR__.'/../boundary/CrudOperations.php');
require_once(__DIR__.'/../entity/User.php');

class UserDao extends CrudOperations
{
    private static $findAllStatement =
        'SELECT * FROM users';

    public static $findByUsernameOrEmailAndPasswordStatement =
        'SELECT * FROM users WHERE (username = :usernameOrEmail OR email = :usernameOrEmail) AND password = :password';

    public static $findByUsernameOrEmailStatement =
        'SELECT * FROM users WHERE (username = :usernameOrEmail OR email = :usernameOrEmail)';

    private static $insertStatement =
        'INSERT INTO users (full_name, username, email, password, role) VALUES (:name, :username, :email, :password, :role)';

    private static $updateStatement =
        'UPDATE users SET full_name = :name, username = :username, email = :email, password= :password, role = :role WHERE id = :id';

    private static $deleteByIdStatement =
        'DELETE FROM users WHERE id = :id';

    public function findByUsernameOrEmailAndPassword($usernameOrEmail, $password)
    {
        return $this->executeStatement(self::$findByUsernameOrEmailAndPasswordStatement,
            [
                ':usernameOrEmail' => $usernameOrEmail,
                ':password' => $password
            ])
            ->fetchObject('User');
    }

    public function findByUsernameOrEmail($usernameOrEmail)
    {
        return $this->executeStatement(self::$findByUsernameOrEmailStatement,
            [
                ':usernameOrEmail' => $usernameOrEmail
            ])
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
                ':name' => $data->getFullName(),
                ':username' => $data->getUsername(),
                ':email' => $data->getEmail(),
                ':password' => $data->getPassword(),
                ':role' => $data->getRole(),
                ':id' => $data->getId()
            ]);
    }

    public function update($data)
    {
        return $this->executeStatement(self::$updateStatement, [
            ':name' => $data->getFullName(),
            ':username' => $data->getUsername(),
            ':email' => $data->getEmail(),
            ':password' => $data->getPassword(),
            ':role' => $data->getRole(),
            ':id' => $data->getId()
        ]);
    }

    public function delete($id)
    {
        return $this->executeStatement(self::$deleteByIdStatement, [':id' => $id]);
    }
}