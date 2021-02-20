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
         if(isset($_POST['name'])){
             $date = new DateTime();
             $datas=[
                 'name'=>$_POST['name'],
                 'description'=>$_POST['description'],
                 'price_vat'=>$_POST['price_wo_vat']*1.20,
                 'price_wo_vat'=>$_POST['price_wo_vat'],
                 'created_at'=>$date->format('y-m-d')
             ];
         } 
         if(isset($_FILES['img'])){
            $uploadDir = 'img/products/';
            $uploadFiles = $uploadDir.basename($_FILES['img']['name']);
            if(move_uploaded_file($_FILES['img']['tmp_name'],$uploadFiles)){
                $datas['img']=$_FILES['img']['name'];
            }
            $this->productModel->add($datas);
            redirect('admin/products');
         }
        
        $products = $this->productModel->getProducts();

        $data = [
             'title'=>'gestion produit',
             'products'=>$products
         ];

         $this->view('admin/products/index', $data);

     }
}