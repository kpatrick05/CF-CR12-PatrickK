<?php
    require_once "components/db_connect.php";

    if($_GET["id"]) {
        $id = $_GET["id"];
        $sql= "SELECT * FROM trips WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
        } else {
            header("location: error.php");
        }
        mysqli_close($connect);
    } else {
        header("location: error.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=#, initial-scale=1.0">
    <?php require_once "components/boot.php" ?>
    <title>Update</title>
</head>
<body>
<?php require_once'components/navbar.php'; ?>
<div class="container mb-5">
    <a class="btn btn-primary mt-3 mb-3" href="index.php">Go Back</a>
<form action="actions/a_update.php" method="POST" enctype="multipart/form-data">

    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Location name</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="location_name" placeholder="title" value="<?= $data["location_name"] ?>">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Picture</span>
  <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="picture" >
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="price" placeholder="Price" value="<?= $data["price"] ?>">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="description" placeholder="Description" value="<?= $data["description"] ?>">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Longitude</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="longitude" placeholder="Author First Name" value="<?= $data["longitude"] ?>">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Latitude</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="latitude" placeholder="Author Last Name" value="<?= $data["latitude"] ?>">
</div>


<input class="btn btn-success" type="submit" name="submit">
</div>

        <input type="hidden" name="id" value="<?= $data["id"] ?>">
        <input type="hidden" name="picture" value="<?= $data["picture"] ?>">
        
    
    </form>

</div>
    <?php require_once'components/footer.php'; ?>
</body>
</html>