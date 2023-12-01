<?php
function adddanhmuc($name){
    $sql= "INSERT INTO danhmuc(name) VALUE('$name')";
    pdo_execute($sql);
}
function listdanhmuc(){
    $sql= "SELECT * FROM danhmuc";
    $listdm = pdo_query($sql);
    return $listdm;
}

function loadall($id){
    $sql= "SELECT * FROM  danhmuc where id=".$id;
    $one = pdo_query_one($sql);
    return $one;
}

function updatedm($id,$name){
    $sql= "UPDATE danhmuc SET name='".$name."' WHERE id=".$id;
    pdo_execute($sql);
}
function deletedm_byid($id){
    $sql = 'DELETE FROM danhmuc WHERE id='.$id;
    pdo_execute($sql);
}
function tongdanhmuc(){
    $sql= 'SELECT count(danhmuc.id) FROM danhmuc ';
    $danhmuc = pdo_query($sql);
    return $danhmuc;
    
}
?>