 
            <?php
            error_reporting(0);
            session_start();
            require_once 'class.user.php';
            $user_home = new USER();
            if(!$user_home->is_logged_in())
            {
            }
            $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
            $stmt->execute(array(":uid"=>$_SESSION['userSession']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 

            $con = mysqli_connect("localhost","root","","spices") or die ('Unable to connect');
            ?>


        

                                             <div class="header_user_info">
                                                <ul class="links list-unstyled">


                                                   <?php
                                                    if(isset($_SESSION['userSession']))
                                                    {
                                                     echo '  
                                                    <li > 
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Hi, '.substr($row['userName'],0,5).'..  </b> <i class="fa fa-angle-down"></i></a>
                                                          <ul>
                                                           <li>
                                                              <a class="account" rel="nofollow" href="account/login4236.html" title="My Account"><i class="ti-user ti-icon"></i> My Account</a>
                                                           </li>
                                                          
                                                            <li>
                                                                <a href="logout.php" > Sign Out</a> 
                                                            </li>
                                                        </ul>
                                                    </li>  
                                                    '; } else {
                                                    echo '  <li>
                                                      <a id="customer_login_link" href="login.php" title="Login"><i class="ti-lock ti-icon"></i> Login</a>
                                                   </li>
                                                   <li>
                                                      <a id="customer_register_link" href="register.php" title="Register"><i class="ti-pencil-alt ti-icon"></i> Register</a>
                                                   </li>';
                                                    }
                                                     ?> 

                                                  
                                                   
                                                </ul>
                                             </div>
                                          