<?php

include_once "../entity/Species.php";
include_once "../boundary/CrudOperations.php";

class SpeciesDao extends CrudOperations
{

    private static $findAllStatement =
        "SELECT * FROM species";

    private static $findByIdStatement =
        "SELECT * FROM species WHERE id = :id";

    private static $insertStatement =
        "INSERT INTO species (type, description, image) VALUES (:type, :description, :image)";

    private static $updateStatement =
        "UPDATE species SET type = :type, description = :description, image = :image WHERE id = :id";

    private static $deleteStatement =
        "DELETE FROM species WHERE id = :id";

    public function findById($id)
    {
        return $this->executeStatement(self::$findByIdStatement, [":id" => $id])
            ->fetchObject("Species");
    }

    public function findAll()
    {
        return $this->executeStatement(self::$findAllStatement)
            ->fetchAll(PDO::FETCH_CLASS, "Species");
    }

    public function insert($data)
    {
        return $this->executeStatement(self::$insertStatement,
            [
                ':type' => $data->getType(),
                ':description' => $data->getDescription(),
                ':image' => $data->getImage()
            ]);
    }

    public function update($data)
    {
        return $this->executeStatement(self::$updateStatement,
            [
                ':type' => $data->getType(),
                ':description' => $data->getDescription(),
                ':image' => $data->getImage(),
                ':id' => $data->getId()
            ]);
    }

    public function delete($id)
    {
        return $this->executeStatement(self::$deleteStatement, [':id' => $id]);
    }
}