<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Ready</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <link rel="stylesheet" type="text/css" href="../styles/list_main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="../js/jquery/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="../js/userlistform.js"></script>
  
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
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="/inf653/cms/addItem.php">Edit List</a></li>              
        </ul>
    </div>  
</nav>    
<?php
include_once '../models/userlistitem.php';

$userlistitem = new UserListItem();
$items = array();
$items = $userlistitem->getUserListItems();

// RWD Bootstrap table
/* echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="col-12 col-md-3 p-2 text-center font-weight-bold border-right border-left">Item</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Got It!</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Quantity</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Edit</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Category</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Store</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Frequency</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Delete</div>';
echo '</div>'; */

echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="col-12 col-md-11">';
echo '<div class="d-md-flex flex-row">';
echo '<div class="col-12 col-md-4 p-2 text-center font-weight-bold border-right border-left">Item</div>';    
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Got It!</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Quantity</div>';
//echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Edit</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Category</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Preferred Store</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Frequency</div>';
echo '</div>';
echo '</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Delete</div>';
echo '</div>';

//loop through collection of items
foreach ($items as $item)
    {                    
        /* echo '<div class="d-md-flex flex-row align-items-center border-bottom-2 bg-light-blue">';
        
        echo '<div class="col-12 col-md-3 text-center">'.htmlspecialchars($item["item"]).'</div>';
        */ /* echo '<div class="col-12 col-md-1">
                <a target="_self" href="/inf653/cms/images/full/'.htmlspecialchars($item["listing_id"]).'_full.jpeg">                    
                <img class="img-fluid img-thumbnail mx-auto d-block" style="max-width: 80%; height: auto;"
                             src="data:image/jpeg;base64,'.base64_encode($item["photo_thumb"]).'"></img></a>
                </div>';   */            

        /* echo '<div class="col-12 col-md-1 text-center">'.htmlspecialchars($item["checked_on_list"]).'</div>';
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
         *//* echo '<div class="col-12 col-md-1 text-center p-3">
                <form class="col form-inline mx-auto d-block" method="post" action="/inf653/cms/editItem.php"">
                    <input type="hidden" name="listingId" value="'.htmlspecialchars($item["userListItemId"]).'">
                    <input type="submit" value="Delete">
                </form>                    
                </div>'; */
        /* echo '</div>'; */
        
    echo '<div class="d-md-flex flex-row align-items-center bg-light-blue">';
    echo '<div class="col-12 col-md-11">';
    
    echo '<form class="needs-validation" method="post" action="" nonvalidate>';
    echo '<div class="d-md-flex form-row">';
    /* echo '<div class="col-12 col-md-4 p-2 listeditem">
            <div class="d-md-none d-inline-flex font-weight-bold">Item: </div>
            <div class="d-flex">
               <input type="text" class="form-control" style="text-align: center;" name="item" value="'.htmlspecialchars($item["item"]).'" required maxlength="100">
            </div>            
          </div>';  */ 

          echo '<div class="col-12 col-md-4 p-2 listeditem">
            <div class="d-md-none d-inline-flex font-weight-bold">Item: </div>
            <div class="d-flex">
               <input type="text" class="form-control" style="text-align: center;" name="item" readonly="readonly" value="'.htmlspecialchars($item["item"]).'" required maxlength="100">
            </div>            
          </div>'; 
    
    echo '<div class="col-12 col-md-1 p-2">
          <div class="d-md-none d-inline-flex font-weight-bold">Got It!: </div>
          <div class="d-flex">            
              <input type="hidden" class="gotitfrm" name="checked_on_list" value="'.htmlspecialchars($item["checked_on_list"]).'">
              <input type="hidden" class="useritemid" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
              <input type="button" class="mx-md-auto btn btn-default gotit" value="YES"> 
              </div>            
        </div>';

        /* echo '<div class="col-12 col-md-1 p-2 text-center">
        <button class="btn btn-default gotit">holdr</button>
      </div>'; */

    echo '<div class="col-3 col-md-1 p-2">
        <div class="d-md-none d-inline-flex font-weight-bold">Quantity: </div>
        <div class="d-flex">            
            <input type="text" class="form-control" style="text-align: right;" name="quantity" value="'.htmlspecialchars($item["quantity"]).'"required maxlength="10">
        </div>            
      </div>';
    /* echo '<div class="col-12 col-md-1 p-2 text-center">                
            <input type="hidden" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
            <input type="submit" value="Edit">
          </div>'; */

    /* echo '<div class="col-12 col-md-1 p-2 text-center">
            <button class="btn btn-default edit">Edit</button>
          </div>'; */

               
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Category: </div>
            <div class="d-flex">            
                <input type="text" class="form-control" style="text-align: right;" name="categoryName" value="'.htmlspecialchars($item["categoryName"]).'"required maxlength="10">
            </div>            
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Store: </div>
            <div class="d-flex">            
                <input type="text" class="form-control" style="text-align: center;" name="storeName" value="'.htmlspecialchars($item["storeName"]).'"required maxlength="250">
            </div>            
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Frequency: </div>
            <div class="d-flex">            
                <input type="text" class="form-control" style="text-align: center;" name="frequency" value="'.htmlspecialchars($item["frequency"]).'"required maxlength="50">
            </div>           
          </div>';   
    /* echo '<div class="col-12 col-md-1 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Category: </div>
            <div class="d-flex">            
                <input type="text" class="form-control" style="text-align: center;" name="category" value="'.htmlspecialchars($itemData["category"]).'"required maxlength="50">
            </div>            
          </div>'; */


    echo '</div>';
    echo '</form>';
    echo '</div>';    
    
    echo '<div class="col-12 col-md-1 p-2 text-center">';  
    echo '<form method="post" action="/inf653/cms/index.php">
            <input type="hidden" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
            <input type="submit" value="Delete">
          </form>';
    echo '</div>'; 

    echo '</div>';
    }
//echo '</tbody>';
//echo '</table>';

?> <!--end php-->

<script>
    /* $('button').on('click', function() {
    if ($(this).hasClass('save')) {
        alert("Saved!!!");
        $(this).text("Edit").removeClass('save');
        $('.listeditem').attr('readonly', 'true').css({
        'border': 'none',
        'outline': 'none'
        });
    } else {
        $(this).text("Save").addClass('save');
        $('.listeditem').attr('readonly', 'false').css({
        'border': 'blue solid 1px',
        'outline': 'none'
        }).focus();
    }
}); */
/* $(document).ready(function()
{
 $('.edit').click(function(event)
 {
   $("input[name='item']").removeAttr("readonly");
   event.preventDefault();  
 });

 }); */

</script>



<footer class="page-footer text-center bg-dark text-white py-3">	
    <p>
        &copy; <?php echo date("Y"); ?> List Ready - James Kobell
    </p>
</footer>
</body>
</html>