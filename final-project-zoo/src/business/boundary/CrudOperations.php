<?php

include "../../config/AppConfig.php";

abstract class CrudOperations
{

    public function getConnection() {
        return AppConfig::getInstance()->getConnection();
    }

    public function executeStatement($sqlStatement, $input_params = null) {
        $statement = $this->getConnection()->prepare($sqlStatement);
        $statement->execute($input_params);
        return $statement;
    }

    public abstract function findAll();
    public abstract function insert($data);
    public abstract function update($data, $id);
    public abstract function delete($id);
}