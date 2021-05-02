<?php
include_once 'view_header.php';//DRY html head
?>

<body id="indexBody">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <span class="navbar-brand">List Ready</span>
    <span class="text-white">My Grocery List</span>  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon bg-info"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/defaultuserlistitem.php"> Sort by Category</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/sortbyitem.php"> Sort by Item</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/sortbystore.php"> Sort by Store</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/additem.php">Add My Grocery List Item</a></li>
            <li class="nav-item"><a class="nav-link text-light font-weight-bold" href="../views/logout.php">Logout</a></li>              
        </ul>
    </div>  
</nav>    
<?php

echo '<div class="d-md-flex flex-row flex-nowrap d-none d-md-block flex-row border bg-secondary">';
echo '<div class="col-12 col-md-12">';
echo '<div class="d-md-flex flex-row">';
echo '<div class="col-12 col-md-3 p-2 text-center font-weight-bold border-right border-left">Item</div>';    
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Got It?</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Quantity</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Category</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Preferred Store</div>';
echo '<div class="col-12 col-md-2 p-2 text-center font-weight-bold border-right">Frequency</div>';
echo '<div class="col-12 col-md-1 p-2 text-center font-weight-bold border-right">Delete</div>';
echo '</div>';
echo '</div>';
echo '</div>';


//loop through collection of items to create user list of items
foreach ($items as $item)
    {  
    echo '<div class="d-md-flex flex-row align-items-center bg-light-blue itemwrapper'.htmlspecialchars($item["userListItemId"]).'">';
    echo '<div class="col-12 col-md-12">';
    echo '<form class="needs-validation" method="post" action="" nonvalidate>';
    echo '<div class="d-md-flex form-row">';
    echo '<div class="col-12 col-md-3 p-2 listeditem">
      <div class="d-md-none d-inline-flex font-weight-bold">Item: </div>
      <div class="d-flex">
          <input type="text" id="itemulid'.htmlspecialchars($item["userListItemId"]).'" class="form-control" style="text-align: center;" name="item" readonly="readonly" value="'.htmlspecialchars($item["item"]).'">
      </div>            
    </div>';
    echo '<div class="col-12 col-md-1 p-2">
          <div class="d-md-none d-inline-flex font-weight-bold">Got It?: </div>
          <div class="d-flex">
              <input type="hidden" data-updatecheckedonlistulid="'.htmlspecialchars($item["userListItemId"]).'" class="updatecheckedonlist" name="updatecheckedonlist" value="false">            
              <input type="hidden" id="checked_on_listulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" class="gotitfrm" name="checked_on_list" value="'.htmlspecialchars($item["checked_on_list"]).'">
              <input type="hidden" class="useritemid" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
              <input type="button" id="gotitbuttonulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" class="mx-md-auto btn btn-default gotitbtn" value="Got It!"> 
              </div>            
        </div>';
    echo '<div class="col-3 col-md-1 p-2">
        <div class="d-md-none d-inline-flex font-weight-bold">Quantity: </div>
        <div class="d-flex">            
            <input type="text" id="quantityulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" class="form-control editformquantity" style="text-align: center;" name="quantity" readonly="readonly" value="'.htmlspecialchars($item["quantity"]).'"required maxlength="10">
        </div>            
      </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Category: </div>
            <div class="d-flex categorycontainer categoryulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'">            
                <input type="text" id="categoryulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" data-inputstate="typetext" class="form-control editformcategory" style="text-align: center;" name="categoryName" readonly="readonly" value="'.htmlspecialchars($item["categoryName"]).'">
            </div>            
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Store: </div>
            <div class="d-flex storecontainer storeulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'">            
                <input type="text" id="storeulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" data-inputstate="typetext" class="form-control editformstore" style="text-align: center;" name="storeName" readonly="readonly" value="'.htmlspecialchars($item["storeName"]).'">
            </div>            
          </div>';
    echo '<div class="col-12 col-md-2 p-2">
            <div class="d-md-none d-inline-flex font-weight-bold">Frequency: </div>
            <div class="d-flex frequencycontainer frequencyulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'"">            
                <input type="text" id="frequencyulid'.htmlspecialchars($item["userListItemId"]).'" data-ulid="'.htmlspecialchars($item["userListItemId"]).'" data-inputstate="typetext" class="form-control editformfrequency" style="text-align: center;" name="frequency" readonly="readonly" value="'.htmlspecialchars($item["frequency"]).'">
            </div>           
          </div>'; 
    echo '<div class="col-12 col-md-1 p-2">          
            <div class="d-flex saveordelete">              
            <input type="hidden" class="useritemid" name="userListItemId" value="'.htmlspecialchars($item["userListItemId"]).'">
            <input type="hidden" id="saveulid'.htmlspecialchars($item["userListItemId"]).'" class="savelistedit" name="savelistedit" value="false">
            <input type="button" id="savedeleteulid'.htmlspecialchars($item["userListItemId"]).'" class="mx-auto delete" value="Delete" data-ulid="'.htmlspecialchars($item["userListItemId"]).'"> 
            </div>            
          </div>';

    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '<div class="itemborder'.htmlspecialchars($item["userListItemId"]).'" style="border-top: solid 4px lightblue;" ></div>';
    }

?> <!--end body php-->


<?php
include_once 'view_footer.php';//DRY html footer
?>


