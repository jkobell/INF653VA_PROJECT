<?php
include_once 'dbConn.php';

class Frequency
{
    public function getAllFrequencies()
    {          
        try {
            $db = new DbConnect();
            $pdo = $db -> dbh;
            
            $query = 'SELECT * FROM frequencies';
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