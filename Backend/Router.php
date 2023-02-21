<?php
require('SourceCode/register.php');
if(isset($_POST['choice'])){
    switch($_POST['choice']){
        case 'userUsers':
            $connect = new register();
            echo $connect->getPrivateUserPersonalInformation(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['middlename'],
                $_POST['address'],
                $_POST['phonenumber'],
                $_POST['telephonenumber'],
                $_POST['emailaddress'],
                $_POST['gender'],
                $_POST['birthday'],
                $_POST['age'],
                $_POST['digit4'],
                $_POST['digit7'],
                $_POST['fathername'],
                $_POST['mothername'],
                $_POST['fatheroccupation'],
                $_POST['motheroccupation'],
                $_POST['fathernumber'],
                $_POST['mothernumber'],
                $_POST['password'],
                $_POST['repassword'],
            );
            break;
        case 'adminUsers':
            $connect = new register();
            echo $connect->getPrivateAdminPersonalInformations(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['middlename'],
                $_POST['address'],
                $_POST['phonenumber'],
                $_POST['telephonenumber'],
                $_POST['emailaddress'],
                $_POST['gender'],
                $_POST['birthday'],
                $_POST['age'],
                $_POST['digit4'],
                $_POST['digit7'],
                $_POST['fathername'],
                $_POST['mothername'],
                $_POST['fatheroccupation'],
                $_POST['motheroccupation'],
                $_POST['fathernumber'],
                $_POST['mothernumber'],
                $_POST['password'],
                $_POST['repassword'],
            );
            break;
        case 'default':
            echo "Error!";
            break;
    }
}
?>