<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once __DIR__.'/../core.php';
include_once __DIR__.'/../ConfigDB.php';
include_once __DIR__.'/../DB_Connect.php';


if(!function_exists('hash_equals')) {
  function hash_equals($str1, $str2) {
    if(strlen($str1) != strlen($str2)) {
      return false;
    } else {
      $res = $str1 ^ $str2;
      $ret = 0;
      for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
      return !$ret;
    }
  }
}

function sec_session_start() {
    
    if( isset($secure) == NULL && isset($httponly) == NULL )
    {
        return false;
    }

    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {

        header("Location: ../error.php?err=El inicio de session se hizo de forma sospechosa (ini_set)");
        exit();

    }
        
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();

    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
   
       
    
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE id_user = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 25) {
            return true;
        } else {
            return false;
        }
    }
}





function login_admindi_rest() {
    
    if( !isset( $_COOKIE['loginadmindi'] ) || $_COOKIE['loginadmindi'] == false )
    {
        
        //session_start();
        //session_destroy();
        
        //echo "false";
        return false;
    }
    
    
    session_start();
    
    
    if (isset($_SESSION['idadmin'], $_SESSION['nombre'], $_SESSION['admindi_string'])) {
         
        $idadmin = $_SESSION['idadmin'];
        $nombre = $_SESSION['nombre'];
        $loginrest_string = $_SESSION['admindi_string'];
 
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
        
        $managedb = new DB_Connect();
        
        $mysqli = $managedb->connect();
        if ($mysqli->connect_errno) {

            $prepare['rpta'] = "0";
            $prepare['code'] = -1;

            $respuesta = json_encode($prepare);

            echo $respuesta;
        
           $managedb->close();
            return;
        }
        
        $sql  = "SELECT passwd FROM useradmin WHERE idadmin='$idadmin'";

        $resultado = $mysqli->query($sql);

        if ($resultado) {

            
            if ($resultado->num_rows == 1) {

                $row = $resultado->fetch_assoc();
                $password = $row['passwd'];
                
                
                $login_check = hash('sha512', $password . $user_browser);
                
                if (hash_equals($login_check, $loginrest_string) ){
                    $mysqli->close();echo "g";
                    return true;
                } else {
                    $mysqli->close();echo "h";
                    // Not logged in 
                    return false;
                }
                
            } else {
                $mysqli->close();
                // Not logged in 
                
                return false;
            }
            
            
        } else {
        $mysqli->close();
            // Not logged in 
            return false;
        }
        
    } else {
    
        // Not logged in 
        return false;
        
    }
    
    
}





function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

?>