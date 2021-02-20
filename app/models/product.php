<?php

class Product{
    private $conn_db;

    public function __construct(){
        $this->conn_db = new Database;
    }

    public function getProducts(){
        $this->conn_db->query('SELECT * FROM products ORDER BY id DESC');
        $result = $this->conn_db->getDataSet();

        return $result;
    }
    public function getProduct($id_product){
        $this->conn_db->query('SELECT * FROM products WHERE id=:sql_req_id_prod');
        $this->conn_db->bind(':sql_req_id_prod', $id_product);
        
        $result = $this->conn_db->getSingleData();

        return $result;
    }
    public function add ($data_product){
        $this->conn_db->query('INSERT INTO products
                             (name, description, price_vat, price_wo_vat,img,created_at)
                             VALUES(:name, :description, :price_vat, :price_wo_vat, :img, :created_at)
                            ');
        $this->conn_db->bind(':name', $data_product['name']);
        $this->conn_db->bind(':description', $data_product['description']);
        $this->conn_db->bind(':price_vat', $data_product['price_vat']);
        $this->conn_db->bind(':price_wo_vat', $data_product['price_wo_vat']);
        $this->conn_db->bind(':img', $data_product['img']);
        $this->conn_db->bind(':created_at', $data_product['created_at']);

        if($this->conn_db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}