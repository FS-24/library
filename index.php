<?php
require_once("./DBConnection.php");
include_once("./Book.php");
$db = new DBConnection("localhost", "root", "", "library");
/**
 * inititialize variables
 *
 * @return void
 */
function init(){
    global $title ;
   global $author ;
   global $description;
   global $date_pub;
   global $book;
$title =null;
$author =null;
$description = null;
$date_pub = null;
$book = new Book();
}

$success = null;
$error = null;
init();
if(isset($_POST['save'])){
$title =$_POST['title'];
$author =$_POST['author'];
$description = $_POST['description'];
$date_pub = $_POST['date_pub'];
$book->setTitle($title);
$book->setAuthor($author);
$book->setDescription($description);
$book->setDatePub($date_pub);  
if (count($book->errorMsg)==0) {
    if ($db->add($book::insertQuery,"ssss",$book->getFields())) {
        $success = "added with success"  ;
       init();
      }else{
          $error = "error of insertion"  ;
      }
}

}

require_once("./partials/header.php")
?>

<!-- main -->
<?php
            if (isset($error)) {
            echo "<div class='alert alert-danger'>",$error,"</div>";
            }

            if (isset($success)) {
            echo "<div class='alert alert-success'>",$success,"</div>";
            }
            ?>
<div class="card my-4">
    <div class="card-header">
        <h5 class="card-title text-center"> Add new book </h5>
    </div>
    <div class="card-body">


        <form method="POST" action="">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?=$title; ?>">
            </div>
            <?php 
                    if (isset($book->errorMsg["title"])) {
                     echo "<div class='alert alert-danger'>",$book->errorMsg['title'],"</div>";
                    }
                    ?>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?=$author; ?>">
            </div>
            <?php 
                    if (isset($book->errorMsg["author"])) {
                     echo "<div class='alert alert-danger'>",$book->errorMsg['author'],"</div>";
                    }
                    ?>
            <div class=" mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" "><?=$description; ?></textarea>
                    </div>
                    <?php 
                    if (isset($book->errorMsg["description"])) {
                     echo "<div class='alert alert-danger'>",$book->errorMsg['description'],"</div>";
                    }
                    ?>

                    <div class=" mb-3">
                        <label for="date_pub" class="form-label">Date of Publication</label>
                        <input type="date" class="form-control" id="date_pub" name="date_pub" value="<?=$date_pub; ?>">
                    </div>
                    <?php 
                    if (isset($book->errorMsg["datePub"])) {
                     echo "<div class='alert alert-danger'>",$book->errorMsg['datePub'],"</div>";
                    }
                    ?>
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>


   <?php
   require_once "./partials/footer.php";
   ?>