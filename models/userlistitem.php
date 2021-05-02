<?php
include_once 'dbConn.php';
//class for queries on userslistitems table
//inner joins are used for many to many 
class UserListItem
{
    public function getDefaultUserListItems($username)
    {
      try{
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT
                    categoryName,
                    checked_on_list,
                    frequency,
                    item,
                    quantity,
                    storeName,
                    userName,
                    userListItemId  
                  FROM
                    userslistitems uli
                  
                  INNER JOIN categories c
                    ON uli.categoryId = c.categoryId
                  INNER JOIN frequencies f
                    ON uli.frequencyId = f.frequencyId
                  INNER JOIN listitems l
                    ON uli.listItemId = l.listItemId
                  INNER JOIN stores s
                    ON uli.storeId = s.storeId
                  INNER JOIN users u
                    ON uli.userId = u.userId

                  WHERE
                    u.userName = :userName

                  ORDER BY
                    item';
        
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userName', $username);

        $stmt->execute();
        $result = $stmt->fetchAll();
        return($result);
    }
    catch (PDOException $e){
        $error_exception = $e->getMessage();
        return ($error_exception);
    }

    $stmt->closeCursor();
    }

    public function getUserListItems()
    { 
        session_start();
        if (isset($_SESSION["username"]))
        {
            $username = $_SESSION["username"];
        }
        else
        {
            $url = "../index.php";
            header("Location: $url");
        }

        try{
            $db = new DbConnect();
            $pdo = $db -> dbh;

            $query = 'SELECT
                        categoryName,
                        checked_on_list,
                        frequency,
                        item,
                        quantity,
                        storeName,
                        userName,
                        userListItemId  
                      FROM
                        userslistitems uli
                      
                      INNER JOIN categories c
                        ON uli.categoryId = c.categoryId
                      INNER JOIN frequencies f
                        ON uli.frequencyId = f.frequencyId
                      INNER JOIN listitems l
                        ON uli.listItemId = l.listItemId
                      INNER JOIN stores s
                        ON uli.storeId = s.storeId
                      INNER JOIN users u
                        ON uli.userId = u.userId

                      WHERE
                        u.userName = :userName

                      ORDER BY
                        categoryName';
            
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':userName', $username);

            $stmt->execute();
            $result = $stmt->fetchAll();
            return($result);
        }
        catch (PDOException $e){
            $error_exception = $e->getMessage();
            return ($error_exception);
        }

        $stmt->closeCursor();
    }

    public function getSortByStore()
    { 
        session_start();
        if (isset($_SESSION["username"]))
        {
            $username = $_SESSION["username"];
        }
        else
        {
            $url = "../index.php";
            header("Location: $url");
        }

        try{
            $db = new DbConnect();
            $pdo = $db -> dbh;

            $query = 'SELECT
                        categoryName,
                        checked_on_list,
                        frequency,
                        item,
                        quantity,
                        storeName,
                        userName,
                        userListItemId  
                      FROM
                        userslistitems uli
                      
                      INNER JOIN categories c
                        ON uli.categoryId = c.categoryId
                      INNER JOIN frequencies f
                        ON uli.frequencyId = f.frequencyId
                      INNER JOIN listitems l
                        ON uli.listItemId = l.listItemId
                      INNER JOIN stores s
                        ON uli.storeId = s.storeId
                      INNER JOIN users u
                        ON uli.userId = u.userId

                      WHERE
                        u.userName = :userName

                      ORDER BY
                        storeName';
            
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':userName', $username);

            $stmt->execute();
            $result = $stmt->fetchAll();
            return($result);
        }
        catch (PDOException $e){
            $error_exception = $e->getMessage();
            return ($error_exception);
        }

        $stmt->closeCursor();
    }

    public function getSortByItem()
    { 
        session_start();
        if (isset($_SESSION["username"]))
        {
            $username = $_SESSION["username"];
        }
        else
        {
            $url = "../index.php";
            header("Location: $url");
        }

        try{
            $db = new DbConnect();
            $pdo = $db -> dbh;

            $query = 'SELECT
                        categoryName,
                        checked_on_list,
                        frequency,
                        item,
                        quantity,
                        storeName,
                        userName,
                        userListItemId  
                      FROM
                        userslistitems uli
                      
                      INNER JOIN categories c
                        ON uli.categoryId = c.categoryId
                      INNER JOIN frequencies f
                        ON uli.frequencyId = f.frequencyId
                      INNER JOIN listitems l
                        ON uli.listItemId = l.listItemId
                      INNER JOIN stores s
                        ON uli.storeId = s.storeId
                      INNER JOIN users u
                        ON uli.userId = u.userId

                      WHERE
                        u.userName = :userName

                      ORDER BY
                        item';
            
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':userName', $username);

            $stmt->execute();
            $result = $stmt->fetchAll();
            return($result);
        }
        catch (PDOException $e){
            $error_exception = $e->getMessage();
            return ($error_exception);
        }

        $stmt->closeCursor();
    }

    public function updateUserListItems($valueArray)
    {
      try{
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'UPDATE userslistitems uli

                  INNER JOIN categories c
                      ON c.categoryName = :categoryName
                  INNER JOIN stores s
                    ON s.storeName = :storeName
                  INNER JOIN frequencies f
                    ON f.frequency = :frequency                  

                  SET uli.quantity = :quantity,
                      uli.categoryId = c.categoryId,
                      uli.storeId = s.storeId,
                      uli.frequencyId = f.frequencyId

                  WHERE uli.userListItemId = :userListItemId';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userListItemId', $valueArray['userListItemId']);
        $stmt->bindValue(':quantity', $valueArray['quantity']);
        $stmt->bindValue(':categoryName', $valueArray['categoryName']);
        $stmt->bindValue(':storeName', $valueArray['storeName']);
        $stmt->bindValue(':frequency', $valueArray['frequency']);

        $result = $stmt->execute();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function deleteUserListItem($valueArray)
    {
      try{
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'DELETE FROM userslistitems

                  WHERE userListItemId = :userListItemId';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userListItemId', $valueArray['userListItemId']);       

        $result = $stmt->execute();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }
    
    public function updateCheckedOnList($valueArray)
    {
      try{
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'UPDATE userslistitems
                  SET checked_on_list = :checked_on_list
                  WHERE userListItemId = :userListItemId';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':checked_on_list', $valueArray['checked_on_list']);
        $stmt->bindValue(':userListItemId', $valueArray['userListItemId']);

        $result = $stmt->execute();        
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getQuantityUserListItem($valueArray)
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT        
                    quantity 
                  FROM
                    userslistitems 
                  WHERE userListItemId = :userListItemId';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userListItemId', $valueArray['userListItemId']);

        $stmt->execute();
        $result = $stmt->fetch();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getCategoryUserListItem($valueArray)
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT        
                    categoryName 
                  FROM
                    userslistitems uli
                  INNER JOIN categories c
                    ON uli.categoryId = c.categoryId

                  WHERE uli.userListItemId = :userListItemId';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userListItemId', $valueArray['userListItemId']);

        $stmt->execute();
        $result = $stmt->fetch();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getAllCategories()
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT        
                    categoryName 
                  FROM
                    categories';

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getStoreUserListItem($valueArray)   
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT        
                    storeName 
                  FROM
                    userslistitems uli
                  INNER JOIN stores s
                    ON uli.storeId = s.storeId

                  WHERE uli.userListItemId = :userListItemId';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userListItemId', $valueArray['userListItemId']);

        $stmt->execute();
        $result = $stmt->fetch();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getAllStores()
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT        
                    storeName 
                  FROM
                    stores';

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getFrequencyUserListItem($valueArray)
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT        
                    frequency 
                  FROM
                    userslistitems uli
                  INNER JOIN frequencies f
                    ON uli.frequencyId = f.frequencyId

                  WHERE uli.userListItemId = :userListItemId';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userListItemId', $valueArray['userListItemId']);

        $stmt->execute();
        $result = $stmt->fetch();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getAllFrequencies()
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'SELECT        
                    frequency 
                  FROM
                    frequencies';

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function getSearchItems($valueArray)
    {
      $str = $valueArray['item'];
      $search = '%'.$str.'%';
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = "SELECT        
                    item 
                  FROM
                    listitems                  
                  WHERE 
                    item LIKE :item";

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':item', $search);

        $stmt->execute();
        $result = $stmt->fetchAll();
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function insertMasterListItem($valueArray)
    {
      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'INSERT INTO        
                    listitems
                    (item) 
                  VALUES
                    (:item)';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':item', $valueArray['item']);

        $result = $stmt->execute();        
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }

    public function insertUserListItem($valueArray)
    {
      $username= '';
      session_start();

      if (isset($_SESSION["username"]))
      {
        $username = $_SESSION["username"];
      }
      session_write_close();

      try
      {
        $db = new DbConnect();
        $pdo = $db -> dbh;

        $query = 'INSERT INTO        
                    userslistitems
                    (userId, listItemId, categoryId, storeId, frequencyId)
                  VALUES
                    ((SELECT        
                        userId 
                      FROM
                        users u
                      WHERE u.userName = :userName),
                    (SELECT        
                        listItemId 
                      FROM
                        listitems l
                      WHERE l.item = :item),
                    (SELECT        
                        categoryId 
                      FROM
                        categories c
                      WHERE c.categoryName = :categoryName), 
                    (SELECT        
                        storeId 
                      FROM
                        stores s
                      WHERE s.storeName = :storeName),
                    (SELECT        
                        frequencyId 
                      FROM
                        frequencies f
                      WHERE f.frequency = :frequency))';                  
                    

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':userName', $username);
        $stmt->bindValue(':item', $valueArray['item']);
        $stmt->bindValue(':categoryName', $valueArray['categoryName']);
        $stmt->bindValue(':storeName', $valueArray['storeName']);
        $stmt->bindValue(':frequency', $valueArray['frequency']);

        $result = $stmt->execute();        
        return($result);
      }
      catch (PDOException $e){
          $error_exception = $e->getMessage();
          return ($error_exception);
      }

      $stmt->closeCursor();
    }
}

//update controller
if (isset($_POST["userListItemId"]))
{
  $uli = new UserListItem();
  $formData = array();
  $formResultData = array();

  if (isset($_POST['update_action']))
  {
    if (($_POST['update_action']) == "updatecheckedonlist")
    {
      $formData['userListItemId'] = filter_var($_POST['userListItemId'], FILTER_SANITIZE_STRING);
      $formData['checked_on_list'] = filter_var($_POST['checked_on_list'], FILTER_SANITIZE_STRING);

      $formResultData = $uli->updateCheckedOnList($formData);
      $formResultData == true ? $response = 'Got It! Update Successful!': $response = 'Got It! Update Failed!'; 
      echo json_encode($response);
    }

    if (($_POST['update_action']) == "savelistedit")
    {
      $formData['userListItemId'] = filter_var($_POST['userListItemId'], FILTER_SANITIZE_STRING);
      $formData['quantity'] = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
      $formData['categoryName'] = filter_var($_POST['categoryName'], FILTER_SANITIZE_STRING);
      $formData['storeName'] = filter_var($_POST['storeName'], FILTER_SANITIZE_STRING);
      $formData['frequency'] = filter_var($_POST['frequency'], FILTER_SANITIZE_STRING);

      $formResultData = $uli->updateUserListItems($formData);

      $formResultData == true ? $response = 'Update Successful!': $response = 'Update Failed!'; 
      echo json_encode($response);
    }
    //delete
    if (($_POST['update_action']) == "deletelistitem")
    {
      $formData['userListItemId'] = filter_var($_POST['userListItemId'], FILTER_SANITIZE_STRING);      

      $formResultData = $uli->deleteUserListItem($formData);
      $formResultData == true ? $response = 'Delete Successful!': $response = 'Delete Failed!'; 
      echo json_encode($response);
    }
  }  
}

//get controller
if (isset($_POST['get_action']))
{
  $uli = new UserListItem();
  $formData = array();    
  $getResultData = array();

  if (($_POST['get_action']) == "getQuantity")
  {
    $formData['userListItemId'] = filter_var($_POST['userListItemId'], FILTER_SANITIZE_STRING);
    
    $getResultData = $uli->getQuantityUserListItem($formData);
    //$formResultData == true ? $response = 'getQuantity Successful!': $response = 'getQuantity Failed!'; 
    echo json_encode($getResultData);
  }

  if (($_POST['get_action']) == "getCategory")
  {
    $formData['userListItemId'] = filter_var($_POST['userListItemId'], FILTER_SANITIZE_STRING);
    
    $getResultData = $uli->getCategoryUserListItem($formData);
    //$formResultData == true ? $response = 'getCategory Successful!': $response = 'getCategory Failed!'; 
    echo json_encode($getResultData);
  }

  if (($_POST['get_action']) == "getAllCategories")
  {    
    $getResultData = $uli->getAllCategories();    
    echo json_encode($getResultData);
  }

  if (($_POST['get_action']) == "getStore")
  {
    $formData['userListItemId'] = filter_var($_POST['userListItemId'], FILTER_SANITIZE_STRING);
    
    $getResultData = $uli->getStoreUserListItem($formData);
    //$formResultData == true ? $response = 'getStore Successful!': $response = 'getStore Failed!'; 
    echo json_encode($getResultData);
  }

  if (($_POST['get_action']) == "getAllStores")
  {    
    $getResultData = $uli->getAllStores();    
    echo json_encode($getResultData);
  }

  if (($_POST['get_action']) == "getFrequency")
  {
    $formData['userListItemId'] = filter_var($_POST['userListItemId'], FILTER_SANITIZE_STRING);
    
    $getResultData = $uli->getFrequencyUserListItem($formData);
    //$formResultData == true ? $response = 'getFrequency Successful!': $response = 'getFrequency Failed!'; 
    echo json_encode($getResultData);
  }

  if (($_POST['get_action']) == "getAllFrequencies")
  {    
    $getResultData = $uli->getAllFrequencies();    
    echo json_encode($getResultData);
  }

  if (($_POST['get_action']) == "searchitems")
  {  
    $formData['item'] = filter_var($_POST['item'], FILTER_SANITIZE_STRING);  
    $getResultData = $uli->getSearchItems($formData);    
    echo json_encode($getResultData);
  }
}

//insert controller
if (isset($_POST['insert_action']))
  {
    $uli = new UserListItem();
    $formData = array();    
    $getResultData = array();

    if (($_POST['insert_action']) == "insertmasterlistitem")
    {
      $formData['item'] = filter_var($_POST['item'], FILTER_SANITIZE_STRING);

      $formResultData = $uli->insertMasterListItem($formData);

      $formResultData === true ? $response = 'Insert Successful!': $response = 'Insert Failed!'; 
      echo json_encode($response);
    }

    if (($_POST['insert_action']) == "insertuserlistitem")
    {
      $formData['item'] = filter_var($_POST['item'], FILTER_SANITIZE_STRING);
      $formData['categoryName'] = filter_var($_POST['categoryName'], FILTER_SANITIZE_STRING);
      $formData['storeName'] = filter_var($_POST['storeName'], FILTER_SANITIZE_STRING);
      $formData['frequency'] = filter_var($_POST['frequency'], FILTER_SANITIZE_STRING);

      $formResultData = $uli->insertUserListItem($formData);

      $formResultData == true ? $response = 'Insert Successful!': $response = 'Insert Failed!'; 
      echo json_encode($response);
    }
  }
?>