<?php
include_once 'dbConn.php';

class Category
{
    public function getAllCategories()
    {          
        try {
            $db = new DbConnect();
            $pdo = $db -> dbh;
            
            $query = 'SELECT * FROM categories';
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