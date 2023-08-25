<?php
class CreateUserModel {
    private $username;
    private $email;
    private $password;
    private $phone;

    
    public function createUser($username, $phone, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public function __toString()
    {   
        return '"username":'.$this->username.', "phone":'.$this->phone .', "email:'.$this->email .',"password":'.$this->password;
    }
    public function getUserArray(){        
        $arr = array();
        $arr["username"] = $this->username; 
        $arr["phone"] = $this->phone; 
        $arr["email"] = $this->email; 
        $arr["password"] = $this->password;         
        return $arr;
    } 
    
    public function existEmail($email, $arr_users){
        $found = false;
        foreach($arr_users as $user){
            $found = array_search($email, $user);
        }
        if($found){
            return true;
        }
        return false;
    }
    public function getUserName(){
        return $this->username;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }  
    public function setUserName($username){
        $this->username = $username;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function setEmail($email){
        $this->email =$email;
    }
    public function setPassword($password){
        $this->password = $password;
    }      
    
    public function validateFields(){
        $arr_erros = array();        
        if(!preg_match("/.+/", $this->username) || preg_match("/[0-9]/", $this->username)){            
            $arr_erros[] = "The phone is obligatory, cannot contain any number, only letters";
        }
        $regex = '/^\+{1}\d[^\W]{7}/';
        $this->phone = preg_replace("/\s/", "", $this->phone);
        if(!preg_match($regex, $this->phone) || empty($this->phone)){                            
            $arr_erros[] = 'The phone is obligatory, The phone number must have the format "+" followed by 9 numbers';            
        }
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if(!preg_match($regex, $this->email)){
            $arr_erros[] = "You must send a valid email";
        }
        $regex = '/^(?=.*[A-Z])(?=.*\*)(?=.*.)(?=.*-)\S{6}$/'; 
        if(!preg_match($regex, $this->password)){
            $arr_erros[] ='The password will be 6 characters long, have 1 uppercase letter and contain the following special characters "*" "-" and "."';
        }
        return $arr_erros;        
    }    
}
?>
