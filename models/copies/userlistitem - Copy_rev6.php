<?php
include_once 'dbConn.php';

class UserListItem
{
    public function getUserListItems()
    { 
        session_start();
        if (isset($_SESSION["username"]))
        {
            $username = $_SESSION["username"];
        }
        else
        {
            $url = "./login.php";
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
}

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
  }  
}

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
}
?>