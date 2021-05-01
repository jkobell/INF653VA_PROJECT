<?php
include_once 'dbConn.php';

class User
{    
    //check if username is already registered   
    public function checkUsernameRegistered($username)
    {
        try{
            $db = new DbConnect();
            $pdo = $db -> dbh;
            
            $query = 'SELECT * FROM users WHERE userName = :userName';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':userName', $username);
            $stmt->execute();
            $result = $stmt->fetch();            
            return($result);
        }
        catch (PDOException $e){
            $error_exception = $e->getMessage();
            return ($error_exception);
        }
        $stmt->closeCursor();        
    }   

    //a new user will register with email as their username, and a password as password. 
    public function registerUser()
    {
        $isUsernameAlreadyRegistered = $this->checkUsernameRegistered($_POST["email"]);

        if ($isUsernameAlreadyRegistered) {
            $response = array(
                "status" => "error",
                "message" => "Email already registered."
            );
        }         
        else {
            if (!empty($_POST["register_password"])) {
                //hash password for persist                
                $hashed_password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);
            }
            try{
                $db = new DbConnect();
                $pdo = $db -> dbh;
                $query = 'INSERT INTO users (userName, password)
                          VALUES (:userName, :password)';
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(':userName', $_POST["email"]);
                $stmt->bindValue(':password', $hashed_password);
                $result = $stmt->execute();

                if ($result == true) {
                    $response = array(
                        "status" => "success",
                        "message" => "Registration successful!"
                    );
                }
            }
            catch (PDOException $e){
                $error_exception = $e->getMessage();
                return ($error_exception);
            }
            $stmt->closeCursor();             
        }
        return $response;
    }

    public function getUser($username)
    {
        try{
            $db = new DbConnect();
            $pdo = $db -> dbh;
            $query = 'SELECT * FROM users WHERE userName = :userName';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':userName', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return($result);
        }
        catch (PDOException $e){
            $error_exception = $e->getMessage();
            return ($error_exception);
        }

        $stmt->closeCursor();        
    }

    //user login with email and password
    public function loginUser()
    {
        $registeredUser = $this->getUser($_POST["username"]);
        $login_password = 0;
        if (!empty($registeredUser)) {
            if (!empty($_POST["login_password"])) {
                $password = $_POST["login_password"];
            }
            $hashedPassword = $registeredUser["password"];
            $login_password = 0;
            if (password_verify($password, $hashedPassword)) {
                $login_password = 1;
            }
        } else {
            $login_password = 0;
        }
        if ($login_password == 1) {
            //start a session if login authenticates. write session and close
            session_start();
            $_SESSION["username"] = $registeredUser["userName"];
            session_write_close();           

            $url = "./views/defaultuserlistitem.php";
            header("Location: $url");

        } else if ($login_password == 0) {
            $login_message = "Invalid username or password.";
            return $login_message;
        }
    }
}
