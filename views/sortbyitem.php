<?php
include_once '../models/userlistitem.php';

$userlistitem = new UserListItem();
$items = array();
$items = $userlistitem->getSortByItem();

if ($items != null)
{
    include_once 'userlist.php';
}
else
{
    //redirect to additem.php
    $items = $userlistitem->getDefaultUserListItems('tester0@aol.com');
    include_once 'userlist.php';
}
?>