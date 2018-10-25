<?php


    function clean($string){

        return htmlentities($string);
    }

    function redirect($location){
        
        return header("Location: {$location}");
    }

    function set_message($message){
        if (!empty($message)){
            $_SESSION['message'] = $message;
        }else{
            $message = "";
        }
    }

    function display_message(){
        if (isset( $_SESSION['message'])){
            echo  $_SESSION['message'];
            unset  ($_SESSION['message']);
        }
    }

    function token_generator(){
        //  Creates a unique ID with a random prefix more secure than a static prefix  
        $token = $_SESSION['token'] =  md5(uniqid(mt_rand(), true));
        
        return $token;
    }

    function validation_errors($error_message){
        $error_message = '
        <div class="alert alert-danger alert-danger" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>Warning!</strong> '.$error_message.'
        </div>';

        return $error_message;
    }
//  Testing if the email already exists  in the database
    function email_exists($email){
        $sql = "SELECT id FROM users WHERE email = '$email' ";
        $result = query($sql);

        if (row_count($result) == 1){

            return true;
        }else{

            return false;
        }
    }
//  Testing is the username already exists in the database
    function username_exists($username){
        $sql = "SELECT id FROM users WHERE username = '$username' ";
        $result = query($sql);

        if (row_count($result) == 1){

            return true;
        }else{
            
            return false;
        }
    }
    //  Validation functions

    function validate_user_registration(){
        
        $errors = [];

        $min = 3;
        $max = 8;

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $name     =     clean($_POST['Name']);
            $email    =     clean($_POST['Email']);
            $username =     clean($_POST['Username']);
            $password =     clean($_POST['Password']);
            $website  =     clean($_POST['Website']);


            if (empty($name)){
                $errors[] = "Your name can't be empty"; 
            }else if (strlen($name) < $min){
                $errors[] = "Your name's length can't be less then ".$min." characters.";
            }


            if (empty($email)){
                $errors[] = "Your email can't be empty";
            }else if (strlen($email) < $min){
                $errors[] = "Your email's length can't be less then ".$min." characters.";
            }else if (email_exists($email)){
                $errors[] = "This email already exists";
            }

            if (empty($username)){
                $errors[] = "Your username can't be empty";
            }else if (strlen($username) < $min){
                $errors[] = "Your username's length can't be less then ".$min." characters.";
            }else if (username_exists($username)){
                $errors[] = "This username already exists";
            }

            if (empty($password)){
                $errors[] = "Password can't be empty";
            }else if (strlen($password) < $max){
                $errors[] = "Password must be at least ".$max." characters";
            }

            //  Checking if there's errors             
            if (!empty($errors)){
                foreach($errors as $error){
                    //  Display errors
                    echo validation_errors($error);
                }
            }else if ( register_user($name, $email, $username, $password, $website)){
                set_message("<p class='bg-success text-center' >welcome $name we are happy you joined us </p>");
                redirect("index.php");
            }

        }
    }
    //  Registration function   
    function register_user($name, $email, $username, $password, $website){
           
        //  escaping the data helps us prevent SQL injection
            $name     = escape($name);
            $email    = escape($email);
            $username = escape($username);
            $password = escape($password);
            $website  = escape($website);

            if(email_exists($email)){
                return false;
            }else if(username_exists($username)){
                return false;
            }else{
                //  Encrypting the password
                $password = md5($password);

                $sql  = "INSERT INTO users(name, email, username, password, website, is_active) VALUES('$name','$email','$username','$password','$website',0) ";
                $result = query($sql);
                confirm($result);
                
                return true;
            }
    }


?>