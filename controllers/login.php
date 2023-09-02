<?php 
require_once("models/FileMangerModel.php"); //require the model FileManger
class Login extends Controller{
    function __construct()
    { 
        parent::__construct();        
        $this->view->render("login/index");                
        $_SESSION["login"] = false;
        !isset($_SESSION["acount_created"]) ? $_SESSION["acount_created"] = 0 : $_SESSION["acount_created"]++;        
        if($_SESSION["acount_created"] == 0){
            //User Created Successfull - print just one time.
            alert("User Created Successfull", "success m-aler");  
            cleanAlerts(4000);
        }
    }
    
    public function SingIn(){                
            if(isset($_POST["submit"])){
                $username =  isset($_POST["username"]) ? $_POST["username"] : "";
                $password =  isset($_POST["password"]) ? $_POST["password"] : "";
                $username_validator = false; $password_validator = false;        
                $data_file =FileMangerModel::getDataFile("db/users.json"); //read the file with the users
                if (!empty($username) || !empty($password)){
                    if(isset($data_file) && !empty($data_file)){
                        $users = json_decode($data_file, true); 
                        foreach($users as $user){
                            if($user["username"]==$username){
                                $username_validator = true;
                            }
                            if($user["password"]==$password){
                                $password_validator = true;
                            }
                        }
                        !$username_validator ?  alert("Error acess: The username field is not correct, try again", "danger m-aler") : null;
                        !$password_validator ?  alert("Error acess: The Password field does not match", "danger m-aler") : null;                                                
                        cleanAlerts(6000);
                        if($username_validator && $password_validator){                                                        
                            $_SESSION["login"] = true;                            
                            header("Location: ".URL."dashboard");
                            exit();
                        }
                    }   
                }     
            }   
        }
    }

?> 