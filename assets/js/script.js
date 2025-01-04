
function checkPassword(){

    let password=document.getElementById("password").value;
    let confirmpassword=document.getElementById("confirmpassword").value;

    console.log(password,confirmpassword);

    let message=document.getElementById("message");

    if(password.length != 0){
        if(password == confirmpassword){
            message.textContent = "password match...";
            alert("you are Registered.....");


        }else{
            message.textContent = "password dose't match !!";
            alert("Password Dose't Match..!!");
        }
    }

}