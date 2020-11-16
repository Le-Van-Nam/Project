<?php
require_once 'models/Model.php';
class Category extends Model{
    public $id;
    public $name;
    public $avatar;
    public $description;
    public $status;
    public $created_at;
    public $updated_at;
    public function insert(){
        $sql_insert="INSERT INTO categories(`name`,`avatar`,`description`,`status`)VALUES (:name,:avatar,:description,:status)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            'name'=>$this->name,
            'avatar'=>$this->avatar,
            'description'=>$this->description,
            'status'=>$this->status
        ];
        return $obj_insert->execute($arr_insert);
    }
    //index
 public function getAll(){
        $sql_select_all="SELECT * FROM categories ORDER BY id DESC ";
       $obj_select_all=$this->connection->prepare($sql_select_all);
       $obj_select_all->execute();
       $categories=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return$categories;
  }
    public function getAllPagination($params=[]){
        $limit=$params['limit'];
        $page=$params['page'];
        $start=($page-1)*$limit;

        $sql_select_all="SELECT * FROM categories LIMIT $start,$limit ";
        $obj_select_all=$this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return$categories;
    }
    public function countTotal(){
        $obj_select=$this->connection->prepare("SELECT COUNT(id) FROM categories");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
    public function delete($id){
        $sql_delete_one="DELETE FROM categories WHERE id=$id";
        $obj_delete_one=$this->connection->prepare($sql_delete_one);
        //
        $obj_delete_product = $this->connection
            ->prepare("DELETE FROM products WHERE category_id = $id");
        $obj_delete_product->execute();
        $is_delete=$obj_delete_one->execute();
        return $is_delete;
    }
    public function getOne($id){
        $sql_detail="SELECT * FROM categories WHERE id=$id";
        $obj_detail=$this->connection->prepare($sql_detail);
        $obj_detail->execute();
        $category=$obj_detail->fetch(PDO::FETCH_ASSOC);
        return $category;
    }
    public function update($id){
        $sql_update_one="UPDATE categories SET `name` = :name, `avatar` = :avatar, `description` = :description, `status` = :status, `updated_at` = :updated_at WHERE id=$id";
        $obj_update=$this->connection->prepare($sql_update_one);
        $arr_update = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }

}
?>