<?php

function get_categories(){
    include "connect.php";
    $sql ="SELECT * from categories";
    try{
        $result = $con->query($sql);
        return $result;
    }catch(Exception $e){
        echo "Error ".$e->getMessage();
    }
}

?>