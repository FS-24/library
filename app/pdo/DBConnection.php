<?php
namespace Ablam\pdo;

use PDO;
use PDOException;

class DBConnection{
  

 function __construct($user, $pass)
 {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=boutique', $user, $pass);
        foreach($dbh->query('SELECT * from article') as $row) {
            print_r($row);
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
 }

}