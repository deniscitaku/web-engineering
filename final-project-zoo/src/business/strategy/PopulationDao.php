<?php

include_once "../boundary/CrudOperations.php";
include_once "../entity/Population.php";

class PopulationDao extends CrudOperations
{

    private static $findAllStatement =
        "SELECT * FROM population";

    private static $findBySpecieStatement =
        "SELECT * FROM population WHERE specie = :specie";

    private static $insertStatement =
        "INSERT INTO population (name, image, specie, length, weight, distribution, living_place, diet, status, description, created_on, updated_on, created_by, updated_by) 
            VALUES (:name, :image, :specie, :length, :weight, :distribution, :living_place, :diet, :status, :description, :created_on, :updated_on, :created_by, :updated_by)";

    private static $updateStatement =
        "UPDATE population SET 
                      name = :name, image = :image, specie = :specie, length = :length, weight = :weight, distribution = :distribution,
                      living_place = :living_place, diet = :diet, status = :status, description = :description, 
                      created_on = :created_on, updated_on = :updated_on, created_by = :created_by, updated_by = :updated_by";

    private static $deleteStatement =
        "DELETE FROM population WHERE id = :id";

    public function findBySpecie($specieId)
    {
        return $this->executeStatement(self::$findBySpecieStatement, ["specie" => $specieId])
            ->fetchAll(PDO::FETCH_CLASS, "Population");
    }

    public function findAll()
    {
        return $this->executeStatement(self::$findAllStatement)
            ->fetchAll(PDO::FETCH_CLASS, "Population");
    }

    public function insert($data)
    {
        return $this->executeStatement(self::$insertStatement,
            [
                ':name' => $data->getName(),
                ':image' => $data->getImage(),
                ':specie' => $data->getSpecie(),
                ':length' => $data->getLength(),
                ':weight' => $data->getWeight(),
                ':distribution' => $data->getDistribution(),
                ':living_place' => $data->getLivingPlace(),
                ':diet' => $data->getDiet(),
                ':status' => $data->getStatus(),
                ':description' => $data->getDescription(),
                ':created_on' => $data->getCreatedOn(),
                ':created_by' => $data->getCreatedBy(),
                ':updated_on' => $data->getUpdatedOn(),
                ':updated_by' => $data->getUpdatedBy(),
            ]);
    }

    public function update($data)
    {
        return $this->executeStatement(self::$insertStatement,
            [
                ':name' => $data->getName(),
                ':image' => $data->getImage(),
                ':specie' => $data->getSpecie(),
                ':length' => $data->getLength(),
                ':weight' => $data->getWeight(),
                ':distribution' => $data->getDistribution(),
                ':living_place' => $data->getLivingPlace(),
                ':diet' => $data->getDiet(),
                ':status' => $data->getStatus(),
                ':description' => $data->getDescription(),
                ':created_on' => $data->getCreatedOn(),
                ':created_by' => $data->getCreatedBy(),
                ':updated_on' => $data->getUpdatedOn(),
                ':updated_by' => $data->getUpdatedBy(),
                ':id' => $data->getId()
            ]);
    }

    public function delete($id)
    {
        return $this->executeStatement(self::$deleteStatement, [':id' => $id]);
    }
}