<?php 
class Category{
    public $id , $name ,$name_ar;

    function __construct($id = null)
    {
        $this->id = $id;
    }    
    static  function find($id){
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $stm = $pdo->prepare("select * from categories where id =:id");
        $stm->bindParam("id" , $id);
        $stm->execute();        
        // fetchObject => return object of stdClass
        if($row = $stm->fetchObject()){
            $c = new Category($row->id);
            $c->name = $row->name;
            $c->name_ar = $row->name_ar;
          return $c;
        }else{
            return null;
        }
        $pdo=null;
    }
    static  function get_product_count($id){
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $stm = $pdo->prepare("select count(*) c from products where category_id =:id");
        $stm->bindParam("id" , $id);
        $stm->execute();        
        // fetchObject => return object of stdClass
        if($row = $stm->fetchObject()){
           return $row->c;
        }else{
            return 0;
        }
        $pdo=null;
    }
    static function all(){
        $categories =[];
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $rslt = $pdo->query("select * from categories");
        while($cat = $rslt->fetchObject()){
           array_push($categories , $cat) ;
        }
        $pdo=null;
        return  $categories;
    }
}
class Brand{

    public $id , $name ,$logo ;
    
    function __construct($id = null)
    {
        $this->id = $id;
    }

    static  function find($id){
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $stm = $pdo->prepare("select * from brands where id =:id");
        $stm->bindParam("id" , $id);
        $stm->execute();        
        // fetchObject => return object of stdClass
        if($b = $stm->fetchObject()){
            $br = new Brand();
            $br->id = $b->id;
            $br->name = $b->name;
            $br->logo = $b->logo;
          return $br;
        }else{
            return null;
        }
        $pdo=null;
    }
    static function all(){
        $data =[];
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $rslt = $pdo->query("select * from brands");
        while($obj = $rslt->fetchObject()){
           array_push($data , $obj) ;
        }
        $pdo=null;
        return  $data;
    }
    static  function get_brand_count(){
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $stm = $pdo->prepare("select count(*) c from brands");
        $stm->bindParam("id" , $id);
        $stm->execute();        
        // fetchObject => return object of stdClass
        if($row = $stm->fetchObject()){
           return $row->c;
        }else{
            return 0;
        }
        $pdo=null;
    }
}

class User {

    public $id , $name , $role , $email , $password;

    function __construct($id = null)
    {
        $this->id = $id;
    }

    static  function find($id){
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $stm = $pdo->prepare("select * from users where id =:id");
        $stm->bindParam("id" , $id);
        $stm->execute();        
        // fetchObject => return object of stdClass
        if($b = $stm->fetchObject()){
            $br = new User();
            $br->id = $b->id;
            $br->name = $b->name;
            $br->email = $b->email;
            $br->role = $b->role;
          return $br;
        }else{
            return null;
        }
        $pdo=null;
    }

}
class Product{
    public $id , $name , $price, $offerPrice ;
    public $details ;    
    public Category $category ;
    public $brand ;
    public User  $seller ;

    private $pdo ; 

    function __construct()
    {
        require_once("connection.php");
        $this->pdo =  new PDO( DSN,  DB_USER,DB_PW);
    }

    function add(){
        $qry = "insert into products (name , price , offer_price , details , category_id , brand_id , seller_id)
          values ( :x , :price , :offer_price , :details , :category_id , :brand_id , :seller_id)";
        $stm = $this->pdo->prepare($qry);
        $stm->bindParam("x" , $this->name);
        $stm->bindParam("price" , $this->price);
        $stm->bindParam("offer_price" , $this->offer_price);
        $stm->bindParam("details" , $this->details);
        $stm->bindParam("category_id" , $this->category->id);
        if (!empty($this->brand)){
            $stm->bindParam("brand_id" , $this->brand->id);
        }else{
            $stm->bindParam("brand_id" ,$this->brand);
        }
        $stm->bindParam("seller_id" , $this->seller->id);
        $stm->execute();
        $this->id = $this->pdo->lastInsertId();
    }

    function delete(){

    }

    static function all(){
        $data =[];
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $rslt = $pdo->query("select * from products");
        while($obj = $rslt->fetchObject()){
           array_push($data , $obj) ;
        }
        $pdo=null;
        return  $data;
    }
     static function find_by_cat($cat_id){
        $data =[];
        require_once("connection.php");
        $pdo =  new PDO( DSN,  DB_USER,DB_PW);
        $rslt = $pdo->query("select * from products where category_id = $cat_id");
        while($obj = $rslt->fetchObject()){
           array_push($data , $obj) ;
        }
        $pdo=null;
        return  $data;
    }

}