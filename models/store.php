<?php
include_once 'dbConn.php';

class Store
{
    public function getAllStores()
    {          
        try {
            $db = new DbConnect();
            $pdo = $db -> dbh;
            
            $query = 'SELECT * FROM stores';
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
?>