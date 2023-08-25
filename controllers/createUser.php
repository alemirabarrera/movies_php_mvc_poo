<?php 
require_once("models/FileMangerModel.php"); //require the model FileManger
class CreateUser extends Controller{
    function __construct()
    { 
        parent::__construct();
        $this->view->render("createUser/index");
    } 
    
    public function validarUsuario(){                                
        $this->loadModel("CreateUserModel"); //load the model CreateUser        
        if(isset($_POST["submit"])){
            $username =  isset($_POST["username"]) ? $_POST["username"] : "";
            $phone =  isset($_POST["phone"]) ? $_POST["phone"] : "";
            $email =  isset($_POST["email"]) ? $_POST["email"] : "";
            $password =  isset($_POST["password"]) ? $_POST["password"] : "";
            $this->model->createUser($username, $phone, $email, $password);            
            $errors = $this->model->validateFields();            
            if(!empty($errors)){
                foreach($errors as $err){
                    alert($err, "danger");
                }
                goDown();
                cleanAlerts(8000);            
            }else{   
                    
                    $data_file =FileMangerModel::getDataFile("db/users.json"); //read the DB            
                    if(isset($data_file) && !empty($data_file)){                
                        //Users created before - there exist users
                        $users = json_decode($data_file, true);                         
                        $existEmail =$this->model->existEmail($email, $users);                                       
                        $users[] = $this->model->getUserArray();                
                        
                    } else{
                        //fisrt user in file
                        $users[] = $this->model->getUserArray();
                    }
                    $json_User= json_encode($users);
                    
                    if($existEmail){
                        alert("Email is registered in the application: '".$email."'", "danger");
                    }else{
                        FileMangerModel::saveFile("db/users.json", $json_User);
                        //go to the login page                                            
                        header("Location: ".URL."login");                        
                        exit();
                    } 
            } 
        }
    }


    
}
?>