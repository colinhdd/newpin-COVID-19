
<?php

//Connect Database

$conn=mysqli_connect('localhost','colin','test1234','newpin');

if (!$conn) {
echo 'Connection error: ' . mysqli_connect_error();
}



if (isset($_POST['submit'])){
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $pin = mysqli_real_escape_string($conn, $_POST['pin']);
    $newpin = mysqli_real_escape_string($conn, $_POST['newpin']);
    $cnewpin = mysqli_real_escape_string($conn, $_POST['cnewpin']);

    if ($newpin == $cnewpin) {

    $sql = "UPDATE users SET PIN = '$newpin' WHERE ID = $userid AND PIN = $pin";

    $result = mysqli_query($conn, $sql);

    }

    else {
        echo('New pin does not match');
    }






}



?>  






<!DOCTYPE html>
<html>

<head>
    <title>Create New Pin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <div class="container">



        <h2 class="mt-5 mb-5">Create New Pin</h2>
        <form action="index.php" method="POST">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-6">
                    <input type="text" name="userid" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Current Pin</label>
                <div class="col-sm-6">
                    <input type="password" name="pin" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">New Pin</label>
                <div class="col-sm-6">
                    <input type="password" name="newpin" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm New Pin</label>
                <div class="col-sm-6">
                    <input type="password" name="cnewpin" class="form-control">
                </div>
            </div>
            <div  >
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </div>



        </form>
    </div>

</body>

</html>