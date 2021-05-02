<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Ready</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <link rel="stylesheet" type="text/css" href="../styles/list_main.css">

  <link rel="stylesheet" type="text/css" href="../bs/dist/css/bootstrap.min.css">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
 <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="../js/jquery/jquery-3.3.1.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script src="../bs/dist/js/bootstrap.min.js"></script>
  <script src="../js/addmasterlistitem.js"></script>
  
</head>

<body id="main_body">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <span class="navbar-brand">List Ready</span>
    <span class="text-white">Add To My Grocery List</span>  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon bg-info"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/defaultuserlistitem.php">My Grocery List</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/additem.php">Add My Grocery List Item</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/logout.php">Logout</a></li>              
        </ul>
    </div>  
</nav>    
<?php

echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="col-12 col-md-12">';
echo '<div class="d-md-flex flex-row">';
echo '<div class="col-12 col-md-4 p-1 text-center font-weight-bold border-right"></div>';
echo '<div class="col-12 col-md-1 p-1 text-center font-weight-bold border-right">Save</div>';
/* echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Search</div>'; */
echo '<div class="col-12 col-md-3 p-2 text-center font-weight-bold border-right border-left">Item</div>';
echo '<div class="col-12 col-md-4 p-1 text-center font-weight-bold border-right"></div>';
/* echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Quantity</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Category</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Preferred Store</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Frequency</div>'; */

echo '</div>';
echo '</div>';
echo '</div>';

include_once '../models/category.php';
include_once '../models/store.php';
include_once '../models/frequency.php';

$categoryobj = new Category();
$categories = array();
$categories = $categoryobj->getAllCategories();

$storeobj = new Store();
$stores = array();
$stores = $storeobj->getAllStores();

$frequencyobj = new Frequency();
$frequencies = array();
$frequencies = $frequencyobj->getAllFrequencies();

    echo '<div class="d-md-flex flex-row align-items-center bg-light-blue">';
    echo '<div class="col-12 col-md-12">';
    echo '<form class="needs-validation" method="post" action="" nonvalidate>';
    echo '<div class="d-md-flex form-row">';
    echo '<div class="col-12 col-md-4 p-2">          
            <div class="d-flex addresetbuttonwrapper">
                <p></p> 
            </div>            
          </div>';
    echo '<div class="col-12 col-md-1 p-2">          
            <div class="d-flex addmasteritemwrapper">
                <input type="button" id="addmasteritem" class="mx-auto my-1 save" value="Save"> 
            </div>            
          </div>';
    echo '<div class="col-12 col-md-3 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Item: </div>
            <div class="d-flex addmasteritemcontainer">
                <input type="text" id="item" class="form-control addmasteriteminput" style="text-align: center;" name="item" value="" required maxlength="25">
            </div>            
          </div>';
    /* echo '<div class="col-12 col-md-1 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Got It?: </div>
            <div class="d-flex">
                <input type="hidden" data-updatecheckedonlistulid="'.htmlspecialchars($item["userListItemId"]).'" class="updatecheckedonlist" name="updatecheckedonlist" value="false">            
                <input type="hidden" id="checked_on_listulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" class="gotitfrm" name="checked_on_list" value="'.htmlspecialchars($item["checked_on_list"]).'">
                <input type="hidden" class="useritemid" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
                <input type="button" id="gotitbuttonulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" class="mx-md-auto btn btn-default gotitbtn" value="Got It!"> 
            </div>            
          </div>'; */
    echo '<div class="col-3 col-md-1 p-2">
        <div class="d-md-none d-inline-flex font-weight-bold"></div>
        <div class="d-flex">            
        <p></p>
        </div>            
      </div>';
    echo '<div class="col-12 col-md-1 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold"></div>
            <div class="d-flex">            
            <p></p>
            </div>            
          </div>';
    echo '<div class="col-12 col-md-1 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold"></div>
            <div class="d-flex">            
            <p></p>
            </div>            
          </div>';
    echo '<div class="col-12 col-md-1 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold"></div>
            <div class="d-flex">            
            <p></p>
            </div>           
          </div>';

    /* echo '<div class="col-12 col-md-1 p-2 text-center">
            <button class="btn btn-default edit">Edit</button>
          </div>'; */
          
    /* echo '<div class="col-12 col-md-1 p-2 text-center">                
            <input type="hidden" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
            <input type="submit" value="Edit">
          </div>'; */
    
    /* echo '<div class="col-12 col-md-1 p-2 text-right">';  
    echo '<form method="post" action="/inf653/cms/index.php">
            <input type="hidden" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
            <input type="submit" class="" value="Delete">
          </form>';
    echo '</div>';  */

    /* echo '<div class="col-12 col-md-1 p-2">          
            <div class="d-flex addsavebuttonwrapper">
                <input type="button" id="addsavebutton" class="mx-auto my-1 addsavebutton" value="Save"> 
            </div>            
          </div>'; */
    

    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    /* echo '<div class="additemborder" style="border-top: solid 4px lightblue;" ></div>'; */
    

?> <!--end body php-->
</body>
<?php
include_once 'view_footer.php';
?>