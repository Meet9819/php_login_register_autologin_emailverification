
<?php
error_reporting(0);
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
    
    
    $user_login->redirect('shop.php?q=2');
}

if(isset($_POST['btn-login']))
{
    $email = trim($_POST['txtemail']);
    $upass = trim($_POST['txtupass']);

    if($user_login->login($email,$upass))
    {
        $user_login->redirect('login.php');
    }
}
?>
    <!-- LOGIN --> 

    <?php include "allcss.php" ?>
         
       
        <?php include "header.php" ?>
              

                              <div class="note form-success hide" id="ResetSuccess">
                                 We&#39;ve sent you an email with a link to update your password.
                              </div>





                                       <?php 
                                        if(isset($_GET['inactive']))
                                        {
                                            ?>
                                             <div class='alert alert-danger'>
                                                <button class='close' data-dismiss='alert'>&times;</button>
                                                 <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it.
                                              </div>
                                             <?php
                                        }
                                        ?>
                                        <?php
                                        if(isset($_GET['error']))
                                        {
                                            ?>
                                            <div class='alert alert-danger'>
                                                <button class='close' data-dismiss='alert'>&times;</button>
                                                  <strong>Wrong Details!</strong>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <form action="" method="post" name="registration" id="create-account_form">
                                            <h1 class="text-center">Login</h1>
                                            
                                            <label for="CustomerEmail">Email</label>
                                            <input placeholder="Enter your Email Id / Mobile No"  id="email" name="txtemail" required="" type="text">
                                            
                                            <label for="CustomerPassword">Password</label>
                                            <input  id="passwd" name="txtupass" placeholder="Enter your Password" required="" type="password">

                                            <div class="text-center">
                                                <p><a href="#recover" id="RecoverPassword">Forgot your password?</a></p>
                                                <input type="submit" name="btn-login" class="btn" value="Sign In">
                                                <p><a href="register.php" id="customer_register_link">Create account</a></p>
                                            </div>
                                        </form>

 

 


       <?php include "allscript.php" ?>

