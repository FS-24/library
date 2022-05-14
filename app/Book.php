<?php
namespace Ablam;

use \Exception;

include ("./functions.php");
/**
 * Book : manage book
 * @author FS-24 3W Academy 
 */
class Book{
    const insertQuery = "INSERT INTO book(title, author, description, date_pub) values(?,?,?,?)";
    const updateQuery = "UPDATE book set title = ?, author = ?, description = ?, date_pub = ? WHERE id = ?";
    const selectQuery = "SELECT * FROM book";
    const selectByIdQuery = "SELECT * FROM book WHERE id=?";
    const deleteByIdQuery = "DELETE  FROM book WHERE id=?";
    const searchQuery = "SELECT *  FROM book WHERE title like ? OR description like ? OR author like ?";
    private int $id;
    private string $title;
    private string $author;
    private string $description;
    private string $datePub;
    public  $errorMsg =[];

    public function setId(int $id){
       $this->id = $id;
    }

    public function setTitle(string $title){
        try {
         $this->title = checkField("Title", $title, 1);   
        } catch (Exception $e) {
            $this->errorMsg["title"] = $e->getMessage();
        }
         
      
    }

    public function setAuthor(string $author){
        try {
        $this->author = checkField("Author", $author, 2);    
        } catch (Exception $e) {
            $this->errorMsg["author"] = $e->getMessage();
        }
        
    }
    
    public function setDescription(string $description){
        try {
         $this->description = checkField("Description", $description);   
        } catch (Exception $e) {
            $this->errorMsg["description"] = $e->getMessage();
        }
        
    } 
    
    public function setDatePub(string $datePub){
        try {
         $this->datePub = checkField("DatePub", $datePub,9);   
        } catch (Exception $e) {
            $this->errorMsg["datePub"] = $e->getMessage();
        }
        
    }

    public function getId(){
        return $this->id;
    } 
    
    public function getTitle(){
        return $this->title;
    }
    
    public function getAuthor(){
        return $this->author;
    } 
    
    public function getDescription(){
        return $this->description;
    }

    public function getDatePub(){
        return $this->datePub;
    }
   
    function Query() :string{
        return "INSERT INTO book(title, author, description, date_pub) values(?,?,?,?)";
    }

    function getFields(): array{
        return [$this->getTitle(),$this->getAuthor(),$this->getDescription(),$this->getDatePub()];
    }

}