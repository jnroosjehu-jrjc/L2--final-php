<?php

function connexion(){
    $user = 'root';
    $pswd = '';
    $dns = 'mysql:host=localhost;dbname=hopital';

    try{
        $con = new PDO($dns,$user,$pswd);

        if($con)
        {
            return $con;
        }
    }catch(PDOException $ex){
        die($ex->getmessage());
    }
}
