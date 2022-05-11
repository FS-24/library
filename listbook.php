<?php
require("./partials/header.php");
require("./DbConnection.php");
require("./Book.php");

$db = new DBConnection("localhost", "root", "", "library");
$book = new Book();
$result = $db->getAll($book::selectQuery);
$success = null;
$error = null;
if (isset($_GET['id'])) {
    if($db->delete(Book::deleteByIdQuery,$_GET['id'] )){
        $success = "Book deleted successfully";
        // $_GET['id'] = null;
    }else{
        $error = "Error of deletion";
    }
}

if(isset($_POST['search'])){
    $search = '%'.$_POST['search'].'%';
    $fields = [$search,$search,$search];
   $result= $db->search(Book::searchQuery,"sss", $fields);
   $_POST['search'] = null; 
}

?>
<?php
    if (isset($error)) {
       echo "<div class='alert alert-danger'>",$error,"</div>";
     }

      if (isset($success)) {
        echo "<div class='alert alert-success'>",$success,"</div>";
      }      
 ?>

<form action="" method="post" class="my-3">
    <div class="input-group">
        <input type="search" placeholder="Search" class="form-control" name="search">
        <button class="btn btn-warning btn-md" type="submit">Search</button>
    </div>
</form>


<div class="card my-3">
    <div class="card-header">
        <h5 class="card-title text-center">List of Books</h5>
    </div>
    <div class="card-body">


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date of Publication</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?=$row['id'] ?></td>
                    <td><?=$row['title'] ?></td>
                    <td><?=$row['author'] ?></td>
                    <td><?=$row['description'] ?></td>
                    <td><?=$row['date_pub'] ?></td>
                    <td class="text-center">
                        <a href="update.php?id=<?=$row['id']; ?>" class="btn btn-info btn-sm mx-1"><i
                                class="bi bi-pencil-square "></i></a>
                        <a href="listbook.php?id=<?=$row['id']?>" class="btn btn-danger btn-sm mx-1"><i
                                class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php 
            }
            ?>
            </tbody>
        </table>
    </div>
</div>





<?php
require("./partials/footer.php");
?>