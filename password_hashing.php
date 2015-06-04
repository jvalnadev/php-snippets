<?php
/*--------------------------------------------------------------*/
/* Function for Generate BlueFish Hash Password
   EX: $password = "mypassword"; $hash = hash_password($password);
      echo $password;
/*--------------------------------------------------------------*/
  function hash_password($password)
  {
    $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
    $salt = base64_encode($salt);
    $salt = str_replace('+', '.', $salt);
    $hash = crypt('mysitepassword', '$2y$10$'.$salt.'$');
    return $hash;
  }
  /*--------------------------------------------------------------*/
  /* Function for Generate Custom  Salt-Hash Password
     EX: $password = "mypassword"; $hash = crypt_password($password);
     echo $password;
  /*--------------------------------------------------------------*/
  function crypt_password($password)
  {
    $salt_format = '$2y$10$';
    $salt_len = 22;
    $salt = crypt_generate( $salt_len );
    $salt_hash_formate = $salt_format . $salt;
    $hash = crypt($password, $salt_hash_formate);
    return $hash;
  }
  function crypt_generate($length){
    $salt = sha1(uniqid(mt_rand(), true));
    $salt = base64_encode($salt);
    $salt = str_replace('+', '.', $salt);
    $salt = substr($salt, 0 , $length);
    return $salt;
  }
  /*--------------------------------------------------------------*/
  /* Function for Checking Store Password And User input Password
     EX: $hash = crypt_check($password, $user_password['password']);
      if($hash){ return true; } else { return false; }
  /*--------------------------------------------------------------*/
  function crypt_check($password, $store_password ){
    $salt = crypt($password, $store_password);
    if($salt === store_password) {
     return ture;
    } else {
     return false;
    }

  }
  /*--------------------------------------------------------------*/
  /* Php Pre Bulid Hash Function
     EX: $password = "mypassword"; $password =  password_hash($password);
  /*--------------------------------------------------------------*/

    function password_hash($password)
     {
       $hash = password_hash($password, PASSWORD_DEFAULT);
       return $hash;
     }

   function hash_password_check($password,$user_hash_password)
     {
       $password = password_verify($password,$user_hash_password);
         if($password){
           return true;
         } else {
           return false;
         }
       return false;
     }


?>
