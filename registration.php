<?php
    $status=0;
    $template=1;
    $name='';
    $email='';
    $mobile='';
    $password='';
    $cnf_password=''; 
    $errors= array();
if(isset($_POST['submit'])){
    session_start();
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $cnf_password=$_POST['cnf_password'];
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    if(empty($name)){
        $errors['name']="Name required!!";
    }
    if(empty($email)){
        $errors['email']="Email required!!";
    }
    if(empty($password)){
        $errors['password']="Password can't be empty!!";
    }
    if(empty($cnf_password)){
        $errors['cnf_password']="Confirm Password can't be empty!!";
    }
    if(empty($mobile)){
        $errors['mobile']="Mobile number required!!";
    }
    if(count($errors)==0)
    {
        if(strlen($password)<6)
        {
            $errors['password']="Password must be atleast of 6 character";
        }
        if($password!=$cnf_password)
        {
            $errors['cnf_password']="Confirm password not matches!!";
        }
        if(!preg_match('/^[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z]+$/', $email)){
            $errors['email']="Email id not valid!!";
        }
        }
        if($email=='abc@example.com' || $email=='123@example.com'){
            $errors['email']="Email id not valid!!";

        }
        if(strlen($mobile)!=10)
        {
            $errors['mobile']="Mobile number must be of 10 digit";
        }
        
        if(count($errors)==0)
        {
    $query_st="select * from user where email='$email'";
    require_once './includes/db_new.php';
    $result_1=  mysql_query($query_st);
   if(mysql_num_rows($result_1)==1){
       $errors['email']="Email id already exists";
   }
        }
        if(count($errors)==0){
            $string='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$&!';
            $string= str_shuffle($string);
            $verification=  substr($string,0,12);
            $_SESSION['verification']=$verification;
            $password=  sha1($password);
            $query= "insert into user values('$email','$name','$mobile','$password','member','$verification','N')";
            require_once './includes/db_new.php';
            mysql_query($query);
            $template=2;     
        }
        
        
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
    </head>
    <body>
        <div id="content">
            <?php if($template==1){ ?>
            <form action="registration.php" method="POST">
                <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" value="<?php echo "$email"?>" />
                        <?php if(isset($errors['email'])){?> <span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" value="<?php echo "$name"?>" />
                        <?php if(isset($errors['name'])){?> <span class="error"><?php echo $errors['name'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" value="" />
                        <?php if(isset($errors['password'])){?> <span class="error"><?php echo $errors['password'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="cnf_password" value="" />
                        <?php if(isset($errors['cnf_password'])){?> <span class="error"><?php echo $errors['cnf_password'] ?></span>
                        <?php } ?>
                       
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td><input type="number" name="mobile" value="<?php echo "$mobile"?>" />
                        <?php if(isset($errors['mobile'])){?> <span class="error"><?php echo $errors['mobile'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Register" /></td>
                        
                    </tr>
                    
                </tbody>
            </table>
           &nbsp;&nbsp;<a href="login.php">Or, Already a member?</a>&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="login.php">Forgot Password?</a>
            </form>
            <?php } ?>
            <?php if($template==2){ 
                
                /*$to      = $email;
                
$subject = 'Account verification required';
$message = 'Verification code is:';
$headers = 'From: neeravkr04@gmail.com' . "\r\n" .
   'Reply-To: neeravkr04@gmail.com';

mail($to, $subject, $message, $headers);*/

                ?>
            <h2>Congratulations!! Registered Successfully </h2>
            <h3>An email has been sent on <?php echo "$email" ?> to verify your email id!!</h3>
            <?php } ?>
        </div>
    </body>
</html>
