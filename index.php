<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>
    body{
        background-color:#1d2630;
   
    }
.container{
    margin-top: 150px;
}
input{
    max-width: 300px;
    min-width: 300px;
}

</style>

</head>
<body>
<header>

<?php



include 'header.php';


?>
</header>

    <div class="container" >
<div class="row justify-content-center">n
    <div class="col-md-6 col-md-offset-3" align="center">
<form action="login.php" method="post">
<input type="text" name="username" class="form-control" placeholder="enter username"><br>
<div class="input-container">
<input type="password" name="password" class="form-control"  id="password" placeholder="enter password"  ><br>
<input type="submit" value="login" class="btn btn-success">

</form>

    </div>

</div>

    </div>
  

</body>
</html>