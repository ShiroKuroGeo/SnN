$('#signIn').click(function(){
    checkValid();
})
$('#signUp').click(function(){
    window.location.href = "../register/register.html";
})

const checkValid =()=>{
    if($('#inputEmail').val() != "" && $('#inputUsername').val() != "" && $('#inputPassword').val() != ""){
        window.location.href = "../dashboard/dashboard.html";
    }else{
        errorSaying("error","Fill up empty Field");
    }
}
// Error Saying
const errorSaying =(id,word)=>{
    document.getElementById(id).innerHTML = word;
}
