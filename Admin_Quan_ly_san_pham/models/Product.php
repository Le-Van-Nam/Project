<?php
require_once 'models/Model.php';
class Product extends Model{
    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $price;
    public $amount;
    public $summary;
    public $content;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $status;
    public $created_at;
    public $updated_at;
    public $str_search = '';
  public function getAll(){
       $sql__select="SELECT products.*,categories.name As category_name FROM products INNER JOIN categories ON categories.id=products.category_id WHERE TRUE $this->str_search ORDER BY products.created_at DESC";
      $obj_select=$this->connection->prepare($sql__select);
       $arr_select=[];
      $obj_select->execute($arr_select);
       $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
       return $products;
  }
    public function getAllPagination($arr_params){
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products INNER JOIN categories ON categories.id = products.category_id WHERE TRUE $this->str_search ORDER BY products.updated_at DESC, products.created_at DESC LIMIT $start,$limit");
        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;

    }
    public function countTotal(){
        $obj_select=$this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();

    }
    public function insert(){
       $sql_insert="INSERT INTO products(category_id, title, avatar, price, amount, summary, content, seo_title, seo_description, seo_keywords, status) 
                                VALUES (:category_id, :title, :avatar, :price, :amount, :summary, :content, :seo_title, :seo_description, :seo_keywords, :status)";
       $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':amount' => $this->amount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':status' => $this->status,
        ];
       return $obj_insert->execute($arr_insert);
    }
    //detail
    public function getById($id){
        $sql_select_one="SELECT products.* categories.name As category_name FROM products INNER JOIN categories ON products.category_id=categories.id WHERE products.id=$id";
        $obj_select_one=$this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }
    //delete
    public function delete($id){
        $sql_delete_one="DELETE FROM products WHERE id=$id";
        $obj_delete_one=$this->connection->prepare($sql_delete_one);
        return $obj_delete_one->execute();
    }
    //update
    public function update($id){
        $sql_update_one="UPDATE products SET category_id=:category_id, title=:title, avatar=:avatar, price=:price,amount=:amount,summary=:summary, content=:content, seo_title=:seo_title, seo_description=:seo_description, seo_keywords=:seo_keywords, status=:status, updated_at=:updated_at WHERE id = $id";
        $obj_update_one=$this->connection->prepare($sql_update_one);
        $arr_update = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':amount' => $this->amount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update_one->execute($arr_update);
    }
}
?>