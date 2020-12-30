<?php



if(isset($_POST['signup_submit'])){
    
require 'dbhinc.php';


$username = $_POST["name"];
$userlastname= $_POST["lastname"];
$email = $_POST["mail"];
$password = $_POST["pwd"];
$passwordRepeat = $_POST["pwd_repeat"];

if(empty($username) || empty($userlastname) || empty($email) || empty($password) || empty($passwordRepeat) ){
    header("Location: ../register.php?error=emptyfields&name=".$username."&mail=".$email);
    exit();
}

else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username) ){
    header("Location: ../register.php?error=invalidmailname");
    exit();

}

else if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
    header("Location: ../register.php?error=invalidmail&name=".$username);
    exit();

}
else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: ../register.php?error=invalidname&mail=".$email);
    exit();

}
else if(!preg_match("/^[a-zA-Z0-9]*$/",$userlastname)){
    header("Location: ../register.php?error=invalidlastname&mail=".$email);
    exit();

}

else if($password !==$passwordRepeat){
    header("Location: ../register.php?error=passwordcheck&name=".$username."&lastname=".$userlastname."&mail=".$email);
    exit();

}
else{

    $sql="SELECT nameUsers FROM users WHERE nameUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){

        header("Location: ../register.php?error=sqlerror");
        exit();
    }
    else{

        mysqli_stmt_bind_param($stmt , "s" ,$username );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck>0){
            header("Location: ../register.php?error=usernamealredytaken&mail=".$email);
            exit();
        }
        else{

            $sql="INSERT INTO users (nameUsers,lastnameUsers,emailUsers,pwdUsers) VALUES ( ? , ? , ? , ?) ";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
        
                header("Location: ../register.php?error=sqlerror");
                exit();
            }
            else{

                $hashedPwd= password_hash($password,PASSWORD_DEFAULT);
              
                  mysqli_stmt_bind_param($stmt , "ssss" ,$username , $userlastname ,$email , $hashedPwd );
                  mysqli_stmt_execute($stmt);
                  header("Location: ../register.php?signup=success");
                  exit();
              
              }


            }

        }
        
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
        }
        else{
            header("Location: ../register.php");
            exit();
        
}

?>

