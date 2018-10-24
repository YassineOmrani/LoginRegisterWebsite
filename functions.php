<?php

    function clean($string){

        return htmlentities($string);
    }

    function redirect($location){
        
        return header("Location: {$location}");
    }

    function set_messages($message){
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

?>