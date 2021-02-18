<?php

class Product{
    private $conn_db;

    public function __construct(){
        $this->conn_db = new Database;
    }

    public function getProduct(){
        $this->conn_db->query('SELECT * FROM products ORDER BY id DESC');
        $result = $this->conn_db->getDataSet();

        return $result;
    }
}