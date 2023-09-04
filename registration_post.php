<?php
session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// name part start

if($name){
    if(preg_match("/^([a-zA-Z' ]+)$/",$name)){
             echo $name;
        }else{
            $_SESSION['name_error']= 'Invalid name given.';
            header("location: registration.php");
        }

}
else{
    $_SESSION['name_error'] = "name is missing";
    header("location: registration.php");
}
// name part end

// email part start
if($email){
   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
       echo $email;
   }else{
        $_SESSION['email_error'] = "email is not valid";
        header("location: registration.php");
   }
}else{
    $_SESSION['email_error'] = "email is missing";
    header("location: registration.php");
}

if($password){
    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){

    }else{
        $_SESSION['password_error'] = "Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
        header("location: registration.php");
    }
}else{
    $_SESSION['password_error'] = "password is missing";
    header("location: registration.php");
}

if($confirm_password){
    if($confirm_password == $password){

    }else{
        $_SESSION['cn_password_error'] = "password is not match";
        header("location: registration.php");
    }
}else{
    $_SESSION['cn_password_error'] = " confirm password is missing";
    header("location: registration.php");
}





?>