<?php
    require_once "../components/db_connect.php";
    require_once "../components/file_upload.php";

    if($_POST) {
        $id = $_POST["id"];
        $location = $_POST["location_name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $longitude = $_POST["longitude"];
        $latitude = $_POST["latitude"];
       

        $uploadError ="";

        $picture = file_upload($_FILES["picture"]);
         
            if($picture->error === 0) {
                ($_POST["picture"] == "trip.jpg") ?: unlink("../pictures/$_POST[picture]");
                $sql = "UPDATE `trips` SET `picture`='$picture->fileName',`location_name`='$location',`price`='$price',`description`='$description',`longitude`='$longitude',`latitude`='$latitude' WHERE id =$id";
                
            } else {
                $sql = "UPDATE `trips` SET `location_name`='$location',`price`='$price',`description`='$description',`longitude`='$longitude',`latitude`='$latitude' WHERE id =$id";
            }
        
        if(mysqli_query($connect, $sql) == true){
            $class = "success";
            $message = "The record was successfully updated";
            $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
            header("refresh:3;url=../index.php");
        } else {
            $class = "danger";
            $message = "Error while updating record : <br>" . mysqli_connect_error();
            $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        }
        mysqli_close($connect);
    } else {
        header("location: ../error.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>Update</title>
       <?php require_once '../components/boot.php'?> 
   </head>
   <body>
       <div class="container">
           <div class="mt-3 mb-3">
               <h1>Update request response</h1>
           </div>
           <div class="alert alert-<?php echo $class;?>" role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
               <p><?php echo ($uploadError) ?? ''; ?></p>
               <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
               <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
           </div>
       </div>
       
   </body>
</html>