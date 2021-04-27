<?php

// Turn off all error reporting
error_reporting(0);

session_start();

require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()) {
    $reg_user->redirect('index.php?q=2');
}

$msg = "";

if(isset($_POST["register"]) && ($_POST["register"] == "Sign Up"))
{
    $uname = trim($_POST['txtuname']);
    $email = trim($_POST['txtemail']);
    $upass = trim($_POST['txtpass']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $code = md5(uniqid(rand()));
    
    $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
    $stmt->execute(array(":email_id"=>$email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($stmt->rowCount() > 0) {
        $msg = "<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Sorry !</strong>  Email already exists , Please Try another one OR do you want to Login ?
                </div>";
    } else { 
        if($reg_user->register($uname,$email,$upass,$code,$mobile,$address)) {           
            $id = $reg_user->lasdID();      
            $key = base64_encode($id);
            $id = $key;
            $message = "<center>
                            <img style='width:300px' src='http://grocerpoint.in/assets/images/logo/logo.png'/>      <br>                
                            <p style='font-size:20px;color:black'><b>{$uname},</b><br /><br />
                                Welcome to Grocer Point<br>
                                To sign in to our website, use these credentials during checkout or on the <a style='color:blue' href='http://grocerpoint.in/profile.php' target='_blank'> My Account </a> page:<br />
                                <b>Email:</b> {$email}<br />
                                <b>Password:</b> Password you set when creating account <br/ >
                                If you have forgotten your account password then click <a style='color:blue' href='http://grocerpoint.in/fpass.php' target='_blank'>here </a> to reset it. <br />
                                When you sign in to your account, you will be able to: <br / > <br />
                                - Proceed through checkout faster <br>
                                - Check the status of your order <br>
                                - View order history <br /><br />
                                Thank You, Grocer Point <br>
                            </p>
                        </center>";
                        
            $subject = "Welcome to Grocer Point ";
                        
            $reg_user->send_mail($email,$message,$subject); 

            $msg = "<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Thank you for registering with Grocer Point . Please Sign In using your login credentials.
                    </div>";
            header("Location: index.php");            
        } else {
            $msg = "<div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Failure!</strong> Some error occured while registering with Grocer Point. Please try again.
                    </div>";
        }       
    }
}
?> 
        

                                        <?php 
                                            if(isset($msg)) {
                                                echo $msg;
                                            }  
                                        ?>
                                        <form class="mb-0" action="" method="post" name="registration" id="create-account_form" accept-charset="UTF-8"> <h1 class="text-center">Create Account</h1>
                                            
                                            <label>User Name</label>
                                            <input autofocus     name="txtuname" required="" type="text">
                                            <label>Email Id</label>
                                            <input   name="txtemail" required="" type="email">       
                                            <label>Password</label>                                   
                                            <input    value="" name="txtpass"  required="" type="password">

                                            <div class="form-group" id="mobile-block">
                                                <label>Mobile</label>  
                                                <input type="text"  id="mobile" minlength="10" maxlength="10"   name="mobile" required="" />
                                            </div>
                                         
                                             <label>Address</label>  
                                            <input  id="address"  value="" name="address" required="" type="text">
                                           
                                            <br />
                                            <p class="text-center">
                                                <button class="btn" type="submit" name="register" value="Sign Up" >Register</button>
                                            </p>
                                        </form>

 
                              
        <?php include "allscript.php"; ?>

    