<?php
$status_check=0;
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pass=sha1($_POST['password']);
    $query_st="select * from user where email='$email' and password='$pass'";
    require_once './includes/db_new.php';
    $result_1=  mysql_query($query_st);
   if(mysql_num_rows($result_1)==1)
   {
       $rows=  mysql_fetch_assoc($result_1);
       if($rows['verified']==Y)
       {
           session_start();
           $role_id=$rows['role_id'];
           $name=$rows['name'];
           $email=$rows['email'];
           $_SESSION['name']= $name;
              $_SESSION['role_id']= $role_id;
              $_SESSION['email']= $email;
              if($role_id=='admin')
              {
                  header('Location:./includes/Admin/Dashboard.php');
              }
              else{
                  if($role_id=='member'){
                  header('Location:./includes/Member/Dashboard.php');
              }
              }    
       }
       else{
           $status_check=2;
           echo 'Nothing found';
       }
   }
   else{
       $status_check=3;
   }
    
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            LOGIN FORM
        </title>
    </head>
    <body>
        <div id="content">
            <h2>
                Login Form
            </h2>
            <form action="login.php" method="POST">
                <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" value="<?php echo "$email"?>" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" value="" /></td>
                    </tr>
                    <tr >
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Login" /></td>
                        
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    
    </body>
</html>