<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Ready</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <link rel="stylesheet" type="text/css" href="../styles/list_main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  
</head>

<body id="indexBody">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <span class="navbar-brand">List Ready</span>
    <span class="text-white">My Grocery List</span>  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon bg-info"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="https://www.nextechclassifieds.com/"> Search</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="https://www.nextechclassifieds.com/"> Sort by Category</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="https://www.nextechclassifieds.com/"> Sort by Store</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="/inf653/cms/addItem.php">Admin Mode</a></li>              
        </ul>
    </div>  
</nav>    
<?php
include_once '../models/userlistitem.php';

$userlistitem = new UserListItem();
$items = array();
$items = $userlistitem->getUserListItems();

// table made with Bootstrap
echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="col-12 col-md-3 p-2 text-center font-weight-bold border-right border-left">Item</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Got It!</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Quantity</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Edit</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Category</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Store</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Frequency</div>';


echo '</div>';

//loop through collection of items
foreach ($items as $item)
    {                    
        echo '<div class="d-md-flex flex-row align-items-center border-bottom-2 bg-light-blue">';
        
        echo '<div class="col-12 col-md-3 text-center">'.htmlspecialchars($item["item"]).'</div>';
        /* echo '<div class="col-12 col-md-1">
                <a target="_self" href="/inf653/cms/images/full/'.htmlspecialchars($item["listing_id"]).'_full.jpeg">                    
                <img class="img-fluid img-thumbnail mx-auto d-block" style="max-width: 80%; height: auto;"
                             src="data:image/jpeg;base64,'.base64_encode($item["photo_thumb"]).'"></img></a>
                </div>';   */            

        echo '<div class="col-12 col-md-1 text-center">'.htmlspecialchars($item["checked_on_list"]).'</div>';
        echo '<div class="col-12 col-md-1 text-center">'.htmlspecialchars($item["quantity"]).'</div>';
        echo '<div class="col-12 col-md-1 text-center p-3">
                <form class="form-inline mx-auto d-block" method="post" action="/inf653/cms/detail.php">
                    <input type="hidden" name="listingId" value="'.htmlspecialchars($item["userListItemId"]).'">
                    <input type="submit" value="Edit">
                </form>  
                </div>';
        echo '<div class="col-12 col-md-2 text-center">'.htmlspecialchars($item["categoryName"]).'</div>';
        echo '<div class="col-12 col-md-2 text-center">'.htmlspecialchars($item["storeName"]).'</div>';
        echo '<div class="col-12 col-md-2 text-center">'.htmlspecialchars($item["frequency"]).'</div>';
        /* echo '<div class="col-12 col-md-1 text-center p-3">
                <form class="col form-inline mx-auto d-block" method="post" action="/inf653/cms/editItem.php"">
                    <input type="hidden" name="listingId" value="'.htmlspecialchars($item["userListItemId"]).'">
                    <input type="submit" value="Delete">
                </form>                    
                </div>'; */
        echo '</div>';                
    }
echo '</tbody>';
echo '</table>';

?> <!--end php-->

<footer class="page-footer text-center bg-dark text-white py-3">	
    <p>
        &copy; <?php echo date("Y"); ?> List Ready - James Kobell
    </p>
</footer>
</body>
</html>