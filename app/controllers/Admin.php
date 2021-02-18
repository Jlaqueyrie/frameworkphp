<?php 

class Admin extends Controller{
     public function __construct()
     {
         if(!isAdmin()){
            redirect('users/login');
         }
         else{
             //loggué an tant qu'admin
             $this->userModel =$this->model('User');
             $this->productModel =$this->model('Product');

         }
     }
     public function index(){
         $data =[
             'title'=>'tableaux de bord'
         ];
         $this->view('admin/index', $data);
     }

     public function products(){
          
        $products = $this->productModel->getProduct();

        $data = [
             'title'=>'gestion produit',
             'products'=>$products
         ];

         $this->view('admin/products', $data);
     }
}