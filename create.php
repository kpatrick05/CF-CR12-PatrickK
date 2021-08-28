<?php

    require_once "components/db_connect.php";

  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'components/boot.php'?>
        <title>PHP CRUD  |  Add Trip</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }       
        </style>
    </head>
    <body>
    <?php require_once "components/navbar.php"; ?>
        <fieldset>
           
            <legend class='h2'>Add a Trip</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Location name</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="location_name" placeholder="Location Name">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Picture</span>
  <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="picture" >
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="price" placeholder="Price">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="description" placeholder="Description">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Longitude</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="longitude" placeholder="Longitude">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Latitude</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name ="latitude" placeholder="Latitude">
</div>


</div>

        
<tr>
    
    <td><input class="btn btn-success" type="submit" name="submit"></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <?php require_once "components/footer.php"; ?>
    </body>
</html>