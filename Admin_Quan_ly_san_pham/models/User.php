<?php
require_once 'models/Model.php';
class User extends Model{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $email;
    public $avatar;
    public $position;
    public $last_login;
    public $status;
    public $created_at;
    public $updated_at;

    public $str_search;

    public function __construct()
    {
        parent::__construct();
        if(isset($_GET['username'])&& !empty($_GET['username'])){
            $username=addslashes($_GET['username']);
            $this->str_search.="AND users.username LIKE '%$username%'";
        }

    }
    public function getAllPagination($params=[]){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE TRUE $this->str_search ORDER BY created_at DESC LIMIT $start, $limit");
        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function getTotal() {
        $obj_select = $this->connection ->prepare("SELECT COUNT(id) FROM users WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
    public function insert() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, first_name, last_name, phone, address, email, avatar, position, status)
VALUES(:username, :password, :first_name, :last_name, :phone, :address, :email, :avatar, :position, :status)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':position' => $this->position,
            ':status' => $this->status,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getUserByUsernameAndPassword($usernam,$password){
        $sql_select="SELECT * FROM users WHERE username=:username AND password=:password LIMIT 1";
        $obj_select=$this->connection->prepare($sql_select);
        $arr_select=[
            ':username'=>$usernam,
            ':password'=>$password
        ];
        $obj_select->execute($arr_select);
        $user=$obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getUserByUsername($username){
        $sql_select="SELECT COUNT(id) FROM users WHERE username='$username'";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetchColumn();


    }
    public function insertRegister(){
      $sql_insert="INSERT INTO users(username,password,status)VALUES(:username,:password,:status)";
       $obj_insert=$this->connection->prepare($sql_insert);
      $arr_insert=[
          ':password'=>$this->password,
           ':username'=>$this->username,
           ':status'=>$this->status
       ];
       return $obj_insert->execute($arr_insert);
   }
   public function delete($id){
       $obj_delete = $this->connection->prepare("DELETE FROM users WHERE id = $id");
       return $obj_delete->execute();
   }
   public function getById($id){
       $obj_select = $this->connection
           ->prepare("SELECT * FROM users WHERE id = $id");
       $obj_select->execute();
       return $obj_select->fetch(PDO::FETCH_ASSOC);

   }
   public function update($id){
       $obj_update = $this->connection
           ->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, phone=:phone, address=:address, email=:email, avatar=:avatar, position=:position, status=:status, updated_at=:updated_at WHERE id = $id");
       $arr_update = [
           ':first_name' => $this->first_name,
           ':last_name' => $this->last_name,
           ':phone' => $this->phone,
           ':address' => $this->address,
           ':email' => $this->email,
           ':avatar' => $this->avatar,
           ':position' => $this->position,
           ':status' => $this->status,
           ':updated_at' => $this->updated_at,
       ];
       $obj_update->execute($arr_update);

       return $obj_update->execute($arr_update);
   }
   public function detail($id){

   }


}
?>