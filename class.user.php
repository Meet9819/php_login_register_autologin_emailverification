<?php

require_once 'dbconfig.php';

class USER
{

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function lasdID()
    {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }

    public function register($uname, $email, $upass, $code, $mobile, $address)
    {
        try
        {
            $password = md5($upass);
            $stmt = $this->conn->prepare("INSERT INTO tbl_users(userName,userEmail,userPass,tokenCode,mobile,address)
			                                             VALUES(:user_name, :user_mail, :user_pass, :active_code,:mobile,:address)");
            $stmt->bindparam(":user_name", $uname);
            $stmt->bindparam(":user_mail", $email);
            $stmt->bindparam(":user_pass", $password);
            $stmt->bindparam(":active_code", $code);
            $stmt->bindparam(":mobile", $mobile);
            $stmt->bindparam(":address", $address);

            if ($stmt->execute()) {
                session_unset();
                session_destroy();
                session_start();
                $_SESSION['userSession'] = $this->conn->lastInsertId();
                return true;
            } else {
                return false;
            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function login($email, $upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE mobile=:email_id or userEmail = :email_id");
            $stmt->execute(array(":email_id" => $email));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                if ($userRow['userStatus'] == "Y") {
                    if ($userRow['userPass'] == md5($upass)) {
                        $_SESSION['userSession'] = $userRow['userID'];
                        return true;
                    } else {
                        header("Location: login.php?error");
                        exit;
                    }
                } else {
                    header("Location: login.php?inactive");
                    exit;
                }
            } else {
                header("Location: login.php?error");
                exit;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['userSession'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['userSession'] = false;
    }

    public function send_mail($email, $message, $subject)
    {
          require_once('mailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); 
        $mail->SMTPDebug  = 0;                     
        $mail->SMTPAuth   = false;                  
        $mail->SMTPSecure = "none";              
        $mail->Host       = "localhost";      
        $mail->Port       = 587;   
        $mail->AddAddress($email);

        $mail->Username="info@aaplekarigar.com";  
        $mail->Password="info@123";            
        $mail->SetFrom('info@aaplekarigar.com','Aaple Karigar | Handicrafts');
        $mail->AddReplyTo("info@aaplekarigar.com","Aaple Karigar | Handicrafts");
        $mail->Subject    = "Order Confirmation - Aaple Karigar | Handicrafts";
        $mail->MsgHTML($message);
        $mail->Send();
    }
}
