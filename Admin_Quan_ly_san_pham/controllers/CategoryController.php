<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class CategoryController extends Controller
{
    public function index()
    {
        $category_model = new Category();
        $params=[
            'limit'=>4,
            'query_string'=>'page',
            'controller'=>'category',
            'action'=>'index',
            'full_mode'=>FALSE,
        ];
        $page=1;
        if(isset($_GET['page'])){
            $page=$_GET['page'];

        }
        $count_total=$category_model->countTotal();
        $params['total']=$count_total;
        $params['page']=$page;
        $paganition= new Pagination($params);
        $pages=$paganition->getPagination();
        $categories = $category_model->getAllPagination($params);
        $this->content = $this->render('views/categories/index.php',
            ['categories' => $categories,
                'pages'=>$pages
            ]);
        require_once 'views/layouts/main.php';

    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $avatar_files = $_FILES['avatar'];

            //check validate
            if (empty($name)) {
                $this->error = 'Cần nhập tên';
            }
            else if ($avatar_files['error'] == 0) {
                $extension_arr = ['jpg', 'jpeg', 'gif', 'png'];
                $extension = pathinfo($avatar_files['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $file_size_mb = $avatar_files['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $extension_arr)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb >= 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }
            $avatar = '';
            if (empty($this->error)) {
                if ($avatar_files['error'] == 0) {
                    $dir_upload = __DIR__ . '/../assets/upload';
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    $avatar = time() . '-' . $avatar_files['name'];
                    move_uploaded_file($avatar_files['tmp_name'], $dir_upload . '/' . $avatar);
                }
                $category_model = new Category();
                $category_model->name = $name;
                $category_model->avatar = $avatar;
                $category_model->description = $description;
                $category_model->status = $status;
                $is_insert = $category_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php?controller=category&action=index');
                exit();
            }

        }
        $this->content = $this->render('views/categories/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID category không hợp lệ';
            header('Location: index.php?controller=category&action=index');
            exit();
        }

        $id = $_GET['id'];
        $category_model = new Category();
        $category = $category_model->getOne($id);
        //submit form
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $avatar_files = $_FILES['avatar'];

            if (empty($name)) {
                $this->error = 'Cần nhập tên';
            }
            else if ($avatar_files['error'] == 0) {
                $extension_arr = ['jpg', 'jpeg', 'gif', 'png'];
                $extension = pathinfo($avatar_files['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $file_size_mb = $avatar_files['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $extension_arr)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb >= 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }
            $avatar = $category['avatar'];
            if (empty($this->error)) {

                if ($avatar_files['error'] == 0) {
                    $dir_upload = __DIR__ . '/../assets/upload';
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    @unlink($dir_upload . '/' . $avatar);
                    $avatar = time() . '-' . $avatar_files['name'];

                    move_uploaded_file($avatar_files['tmp_name'], $dir_upload . '/' . $avatar);
                }
                $category_model = new Category();
                $category_model->name = $name;
                $category_model->avatar = $avatar;
                $category_model->description = $description;
                $category_model->status = $status;
                $category_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $category_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update thành công';
                } else {
                    $_SESSION['error'] = 'Update thất bại';
                }
                header('Location: index.php?controller=category&action=index');
                exit();
            }

        }

        $this->content = $this->render('views/categories/update.php', ['category' => $category]);
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']='ID không hợp lệ';
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        $id=$_GET['id'];
        $category_model= new Category();
        $is_delete=$category_model->delete($id);
        if($is_delete){
            $_SESSION['success']='<i class="mdi mdi-emoticon-happy"></i>Success delete';
        }else{
            $_SESSION['error']='<i class="mdi mdi-emoticon-sad"></i>Xóa thất bại';
        }
        header('Location:index.php?controller=category&action=index');
        exit();
    }
    public function detail(){
        if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']='ID không hợp lệ';
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        $id=$_GET['id'];
        $category_model=new Category();
        $category=$category_model->getOne($id);
        $this->content=$this->render('views/categories/detail.php',['category'=>$category]);
        require_once 'views/layouts/main.php';

    }

}
?>