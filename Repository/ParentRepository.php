<?php

class ParentRepository
{

    protected $pdo;

    protected $table;

    protected $tableClass;

    public function __construct($pdo, $table, $tableClass){

        $this->pdo = $pdo;
        $this->table = $table;
        $this->tableClass = $tableClass;
    }

    public function getList()
    {
        $stmt = $this->pdo->query('SELECT * FROM '. $this->table);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->tableClass);

        return $stmt->fetchAll();
    }
    
    public function getItemById(int $id)
    {
        $itemSql = "SELECT * FROM " . $this->table . " WHERE id = " . $id ;
        $itemStmt = $this->pdo->query($itemSql);

        $itemStmt->setFetchMode(PDO::FETCH_CLASS, $this->tableClass);

        return $itemStmt->fetch();
    }



}