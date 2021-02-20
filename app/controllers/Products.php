<?php

class Products extends Controller{

    public function __construct(){
        $this->productModel = $this->model('Product');
    }
    public function index(){
        $products = $this->productModel->getProducts();

        $data = [
            'title'=>'Boutique',
            'products'=> $products
        ];
        $this->view('products/index', $data);

    }
    public function show($id_product){

        $product = $this->productModel->getProduct($id_product);
        $data = [
            'product' => $product
        ];
        $this->view('products/show', $data);

    }
}