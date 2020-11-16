<?php
require_once 'models/User.php';
class LoginController{
    public $content;
    public $error;
    public $title_page;
    public function render($file,$variables=[]){
        extract($variables);
        ob_start();
        require_once $file;
        $render_view=ob_get_clean();
        return $render_view;
    }
    public function login(){
        if(isset($_POST['user'])){
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $password=md5($_POST['password']);
            if (empty($username) || empty($password)) {
                $this->error = 'Username hoặc password không được để trống';
            }
            $model_user= new User();
            if(empty($this->error)){
                $user = $model_user->getUserByUsernameAndPassword($username, $password);
                if(empty($user)){
                    $this->error="Sai user hoặc password";
                }else{
                    $_SESSION['success']="Đăng nhập thành công";
                    $_SESSION['user']=$user;
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
            }
        }
        $this->title_page='Majestic Login';
        $this->content=$this->render('views/user/login.php');
        require_once 'views/layouts/main_login.php';


    }
    public function register(){
        if(isset($_POST['submit'])){
            $model_user=new User();
            $username=$_POST['username'];
            $password=$_POST['password'];
            $password_confirm=$_POST['confirm_password'];
            $user=$model_user->getUserByUsername($username);
            if (empty($username) || empty($password) || empty($password_confirm)) {
                $this->error = 'Không được để trống các trường';
            } else if ($password != $password_confirm) {
                $this->error = 'Password nhập lại chưa đúng';
            } else if (!empty($user)) {
                $this->error = 'Username này đã tồn tại';
            }
            if(empty($this->error)){
                $model_user->username=$username;
                $model_user->password=md5($password);
                $model_user->status=1;
                $is_insert=$model_user->insertRegister();
                if($is_insert){
                    $_SESSION['success']="Đăng ký thành công";
                }else{
                    $_SESSION['error']='Đăng ký thất bại';
                }
                header('Location:index.php?controller=login&action=login');
                exit();
            }
        }
        $this->title_page='DarkLook Register';
        $this->content=$this->render('views/user/register.php');
        require_once 'views/layouts/main_login.php';

    }

}
?>