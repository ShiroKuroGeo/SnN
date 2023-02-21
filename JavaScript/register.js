//Register Personal Information
// $('#btnGoToPass').click(function(){
//     if($('#Usertype').val() != "SelectUserType"){
//         checkEmptyField();
//     }else{
//         errorSaying("error","Select user types!");
//     }
// });


$('#btnCreateAccount').click(function(){
    checkEmptyField();
});

$('#signIn').click(function(){
    alert();
})


//Check empty fields
const checkEmptyField =()=>{
    // if($('#firstname').val() != ""){
    //     errorSaying("error","First name is empty!");
    // }else if($('#PresentAddress').val() != ""){
    //     errorSaying("error","Present Address is empty!");
    // }else if($('#EmailAddress').val() != ""){
    //     errorSaying("error","Email Address is empty!");
    // }else if($('#Age').val() != ""){
    //     errorSaying("error","Age is empty!");
    // }else if($('#MiddleName').val() != ""){
    //     errorSaying("error","Middle name is empty!");
    // }else if($('#PhoneNumber').val() != ""){
    //     errorSaying("error","Phone Number is empty!");
    // }else if($('#gender').val() != ""){
    //     errorSaying("error","Gender is empty!");
    // }else if($('#4DigitCode').val() != ""){
    //     errorSaying("error","4 Digit Code is empty!");
    // }else if($('#LastName').val() != ""){
    //     errorSaying("error","Last name is empty!");
    // }else if($('#Birthday').val() != ""){
    //     errorSaying("error","Birthday is empty!");
    // }else if($('#7DigitCode').val() != ""){
    //     errorSaying("error","7 Digit Code is empty!");
    // }else 
    if($('#firstname').val() != "" && $('#PresentAddress').val() != "" && $('#EmailAddress').val() != "" && $('#Age').val() != "" && 
    $('#MiddleName').val() != "" && $('#PhoneNumber').val() != "" && $('#gender').val() != "" && $('#4DigitCode').val() != "" && 
    $('#LastName').val() != "" && $('#Birthday').val() != "" && $('#7DigitCode').val() != ""){
        checkOwnDigit();
    }else{
        errorSaying("error","Please fill up empty fields");
    }   
}

//4 and 7 digit is only positive
const checkOwnDigit =()=>{
    let digits4 = $('#4DigitCode').val();
    let digits7 = $('#7DigitCode').val();

    if(digits4 >= 999 && digits4 <= 9999){
        if(digits7 >= 999999 && digits7 <= 9999999){
            checkUsers();
        }else{
            errorSaying("error","Please Fill 9 digit only positive number");
        }
    }else{
        errorSaying("error","Please Fill 4 digit only positive number");
    }
}

//check if User or Admin registration
const checkUsers =()=>{
    if($('#Usertype').val() == "Admin"){
        requestAdminData();
    }else if($('#Usertype').val() == "User"){
        requestUserData();
    }
}

const requestUserData =()=>{
    $.ajax({
        type: 'POST',
        url: '../Backend/Router.php',
        data: {choice: 'userUsers', firstname:$('#firstname').val(),lastname:$('#LastName').val(),middlename:$('#MiddleName').val(),
        address:$('#PresentAddress').val(),phonenumber:$('#PhoneNumber').val(),telephonenumber:$('#TelephoneNumber').val(),
        emailaddress:$('#EmailAddress').val(),gender:$('#gender').val(),birthday:$('#Birthday').val(),age:$('#Age').val(),
        digit4:$('#4DigitCode').val(),digit7:$('#7DigitCode').val(),fathername:$('#FatherName').val(),mothername:$('#MotherName').val(),
        fatheroccupation:$('#FatherOccupation').val(),motheroccupation:$('#MotherOccupation').val(),fathernumber:$('#FatherPhoneNumberEmail').val(),mothernumber:$('#MotherPhoneNumberEmail').val(),
        password:$('#password').val(), repassword:$('#repassword').val()},
        success: function(data){
            alert(data);
            // if(data == "Succesfully Added"){
            //     window.location.href = "../login/dashboard/dashboard.html";
            // }else if(data == "Unsuccessfully added"){
            //     alert(data);
            // }else if(data == "Status Connection failed"){
            //     alert(data);
            // }else if(data == "Information Required"){
            //     alert(data);
            // }else if(data == "Something is wrong, connection invalid Error"){
            //     alert(data);
            // }
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    })
}

const requestAdminData =()=>{
    $.ajax({
        type: 'POST',
        url: '../Backend/Router.php',
        data: {choice: 'adminUsers', firstname:$('#firstname').val(),lastname:$('#LastName').val(),middlename:$('#MiddleName').val(),
        address:$('#PresentAddress').val(),phonenumber:$('#PhoneNumber').val(),telephonenumber:$('#TelephoneNumber').val(),
        emailaddress:$('#EmailAddress').val(),gender:$('#gender').val(),birthday:$('#Birthday').val(),age:$('#Age').val(),
        digit4:$('#4DigitCode').val(),digit7:$('#7DigitCode').val(),fathername:$('#FatherName').val(),mothername:$('#MotherName').val(),
        fatheroccupation:$('#FatherOccupation').val(),motheroccupation:$('#MotherOccupation').val(),fathernumber:$('#FatherPhoneNumberEmail').val(),mothernumber:$('#MotherPhoneNumberEmail').val(),
        password:$('#password').val(), repassword:$('#repassword').val()},
        success: function(data){
            if(data == "Succesfully Added"){
                window.location.href = "../login/dashboard/dashboard.html";
            }else if(data == "Unsuccessfully added"){
                alert(data);
            }else if(data == "Status Connection failed"){
                alert(data);
            }else if(data == "Information Required"){
                alert(data);
            }else if(data == "Something is wrong, connection invalid Error"){
                alert(data);
            }
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    })
}








// Error Saying
const errorSaying =(id,word)=>{
    document.getElementById(id).innerHTML = word;
}
