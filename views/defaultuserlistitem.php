<?php
include_once '../models/userlistitem.php';

$userlistitem = new UserListItem();
$items = array();
$items = $userlistitem->getUserListItems();

if ($items != null)
{
    include_once 'userlist.php';
}
else
{
    //redirect to additem.php    
    $url = "additem.php";
    header("Location: $url");    
}
?>