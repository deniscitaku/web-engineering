<?php

require_once(__DIR__ . "/../entity/News.php");
require_once(__DIR__ . "/../boundary/CrudOperations.php");

class NewsDao extends CrudOperations
{

    private static $findAllStatement =
        "SELECT * FROM news";

    private static $insertStatement =
        "INSERT INTO news(title, content, image, created_by, updated_by) VALUES (:title, :content, :image, :createdBy, :updatedBy)";

    private static $updateStatement =
        "UPDATE news SET title = :title, content = :content, image = COALESCE(:image, image) WHERE id = :id";

    private static $deleteByIdStatement =
        "DELETE FROM news WHERE id = :id";

    public function findAll()
    {
        return $this->executeStatement(self::$findAllStatement)->fetchAll(PDO::FETCH_CLASS, "News");
    }

    public function insert($data)
    {
        $this->executeStatement(self::$insertStatement,
            [
                ':title' => $data->getTitle(),
                ':content' => $data->getContent(),
                ':image' => $data->getImage(),
                ':createdBy' => $data->getCreatedBy(),
                ':updatedBy' => $data->getUpdatedBy()
            ]);
        return true;
    }

    public function update($data)
    {
        return $this->executeStatement(self::$updateStatement,
            [
                ':title' => $data->getTitle(),
                ':content' => $data->getContent(),
                ':image' => $data->getImage(),
                ':id' => $data->getId()
            ]);
    }

    public function delete($id)
    {
        return $this->executeStatement(self::$deleteByIdStatement, [':id' => $id]);
    }
}