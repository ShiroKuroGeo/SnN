<?php 
require('Connection.php');
class register{

    public function getPrivateUserPersonalInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,$password, $repassword){
        return $this->privateUserPersonalInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,$password, $repassword);
    }

    public function getPrivateAdminPersonalInformations($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,$password, $repassword){
        return $this->privateAdminPersonalInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,$password, $repassword);
    }

    private function privateUserPersonalInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,$password, $repassword){
        
            if($this->checkValidInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7)){
                $db = new Connection();
                if($db->getStatus()){
                    $prepareConnection = $db->getConnection()->prepare($this->registerUserQuery());
                    $prepareConnection->execute(array($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,md5($password), md5($repassword)));
                    $result = $prepareConnection->fetch();
                    if(!$result){
                        $db->closeConnection();
                        return "Succesfully Added";
                    }else{
                        $db->closeConnection();
                        return "Unsuccessfully added";
                    }
                }else{
                    return "Status Connection failed";
                }
            }else{
                return "Information Required";
            }
    }

    //for Admin
    private function privateAdminPersonalInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,$password, $repassword){
        try{
            if($this->checkValidInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7)){
                $db = new Connection();
                if($db->getStatus()){
                    $tmp1 = md5($password);
                    $tmp2 = md5($repassword);
                    $prepareConnection = $db->getConnection()->prepare($this->registerAdminQuery());
                    $prepareConnection->execute(array($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7,$telephone, $father,$mother,$fatherOccupation,$motherOccupation,$fatherNumber,$motherNumber,$tmp1, $tmp2));
                    $result = $prepareConnection->fetch();
                    if(!$result){
                        $db->closeConnection();
                        return "Succesfully Added";
                    }else{
                        $db->closeConnection();
                        return "Unsuccessfully added";
                    }
                }else{
                    return "Status Connection failed";
                }
            }else{
                return "Information Required";
            }
        }catch(PDOException $th) {
            return "Something is wrong, connection invalid Error";
        }
    }
    
    private function checkValidInformation($firstname,$middlename,$lastname,$address,$PhoneNumber,$EmailAddress,$Gender,$birthday,$Age,$digit4,$digit7){
        if($firstname != "" && $middlename != "" && $lastname != "" && $address != "" && $PhoneNumber != "" && $EmailAddress != "" && $Gender != "" && $birthday != "" && $Age != "" && $digit4 != "" && $digit7 != ""){
            return true;
        }else{
            return false;
        }
    }

    //query
    //Query for Users
    private function registerUserQuery(){
        return "INSERT INTO `user_users`(`firstname`,`middlename`,`lastname`,`address`,`PhoneNumber`,`EmailAddress`,`Gender`,`birthday`,`Age`,`digit4`,`digit7`,`telephone`, `father`,`mother`,`fatherOccupation`,`motherOccupation`,`fatherNumber`,`motherNumber`,`password`, `repassword`) value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    }
    //Query for Admins
    private function registerAdminQuery(){
        return "INSERT INTO admin_user('firstname','middlename','lastname','address','PhoneNumber','EmailAddress','Gender','birthday','Age','digit4','digit7','telephone', 'father','mother','fatherOccupation','motherOccupation','fatherNumber','motherNumber','password', 'repassword') values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    }
}
?>