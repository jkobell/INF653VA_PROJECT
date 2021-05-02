<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Ready</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <link rel="stylesheet" type="text/css" href="../styles/list_main.css">

  <link rel="stylesheet" type="text/css" href="../bs/dist/css/bootstrap.min.css">

  <script src="../js/jquery/jquery-3.3.1.js"></script>
  <script src="../bs/dist/js/bootstrap.min.js"></script>
  <script src="../js/addlistitemform.js"></script> 
  
</head>

<body id="indexBody">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <span class="navbar-brand">List Ready</span>
    <span class="text-white">Add To My Grocery List</span>  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon bg-info"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/defaultuserlistitem.php">My Grocery List</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/addmaster.php">Add Master List Item</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/logout.php">Logout</a></li>              
        </ul>
    </div>  
</nav>    
<?php

echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="col-12 col-md-12">';
echo '<div class="d-md-flex flex-row">';
echo '<div class="col-12 col-md-1 p-1 text-center font-weight-bold border-right">Reset Item</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Search</div>';
echo '<div class="col-12 col-md-3 p-2 text-center font-weight-bold border-right border-left">Item</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Quantity</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Category</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Preferred Store</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Frequency</div>';

echo '</div>';
echo '</div>';
echo '</div>';

include_once '../models/category.php';
include_once '../models/store.php';
include_once '../models/frequency.php';

//calls to get values for Dropdowns
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
    echo '<div class="col-12 col-md-1 p-2">          
            <div class="d-flex addresetbuttonwrapper">
                <input type="button" id="addresetbutton" class="mx-auto my-1 addresetbutton" value="Reset"> 
            </div>            
          </div>';
    echo '<div class="col-12 col-md-1 p-2">          
            <div class="d-flex addsearchitemswrapper">
                <input type="button" id="addsearchitems" class="mx-auto my-1 search" value="Search"> 
            </div>            
          </div>';
    echo '<div class="col-12 col-md-3 p-2 listeditem">
            <div class="d-md-none d-inline-flex font-weight-bold">Item: </div>
            <div class="d-flex additemcontainer">
                <input type="text" id="item" class="form-control additeminput" style="text-align: center;" name="item" value="">
            </div>            
          </div>';
    echo '<div class="col-3 col-md-1 p-2">
        <div class="d-md-none d-inline-flex font-weight-bold">Quantity: </div>
        <div class="d-flex">            
            <input type="text" id="quantity" class="form-control addformquantity" style="text-align: center;" name="quantity" value="1">
        </div>            
      </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Category: </div>
            <div class="d-flex addcategorycontainer">            
                <select class="form-control addcategoryselect" id="addcategory" style="text-align: center;">';
                foreach ($categories as $category)
                {
                    $str = '<option value="'.htmlspecialchars($category["categoryName"]).'">'.htmlspecialchars($category["categoryName"]).'</option>';
                    $strselected = '<option value="'.htmlspecialchars($category["categoryName"]).'"selected>'.htmlspecialchars($category["categoryName"]).'</option>';            
    echo            $category["categoryName"] == 'unspecified' ? $strselected : $str;                
                }
    echo       '</select>
            </div>            
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Store: </div>
            <div class="d-flex addstorecontainer">            
            <select class="form-control addstoreselect" id="addstore" style="text-align: center;">';
            foreach ($stores as $store)
            {
                $str = '<option value="'.htmlspecialchars($store["storeName"]).'">'.htmlspecialchars($store["storeName"]).'</option>';
                $strselected = '<option value="'.htmlspecialchars($store["storeName"]).'"selected>'.htmlspecialchars($store["storeName"]).'</option>';            
    echo        $store["storeName"] == 'unspecified' ? $strselected : $str;                
            }
    echo    '</select>
            </div>            
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Frequency: </div>
            <div class="d-flex addfrequencycontainer">            
            <select class="form-control addfrequencyselect" id="addfrequency" style="text-align: center;">';
            foreach ($frequencies as $frequency)
            {
                $str = '<option value="'.htmlspecialchars($frequency["frequency"]).'">'.htmlspecialchars($frequency["frequency"]).'</option>';
                $strselected = '<option value="'.htmlspecialchars($frequency["frequency"]).'"selected>'.htmlspecialchars($frequency["frequency"]).'</option>';            
    echo        $frequency["frequency"] == 'unspecified' ? $strselected : $str;                
            }
    echo   '</select>
            </div>           
          </div>';
    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';

?> <!--end body php-->
</body>

<?php
include_once 'view_footer.php';
?>

