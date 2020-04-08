
<?php

//Connect Database

$conn=mysqli_connect('localhost','asterisk','c4llc3ntr3','asterisk');

if (!$conn) {
echo 'Connection error: ' . mysqli_connect_error();
}



if (isset($_GET['submit'])){
    $userid = mysqli_real_escape_string($conn, $_GET['name']);
    $pin = mysqli_real_escape_string($conn, $_GET['pin']);
    $newpin = mysqli_real_escape_string($conn, $_GET['newpin']);
    $cnewpin = mysqli_real_escape_string($conn, $_GET['cnewpin']);

  
    $errormsg = 'false';


    $sql1 = "SELECT secret FROM sipfriends where name = $userid";

    $result1 = mysqli_query($conn, $sql1);

    $secret = mysqli_fetch_assoc($result1);



    $sql2 = "SELECT name FROM sipfriends where name = $userid";

    $result2 = mysqli_query($conn, $sql2);

    $extension = mysqli_fetch_assoc($result2);


    if ($userid != $extension['name']) {
        $error = "Extension is not recognized";
    }

    elseif ($secret['secret'] != $pin) {
        $error = "Incorrect pin entered"; 
    }

    elseif ($newpin != $cnewpin) {
        $error = "New pin does not match";
    
    }

    else {
    
        $sql = "UPDATE sipfriends SET secret = $newpin WHERE name = $userid AND secret = $pin";
    
        $result = mysqli_query($conn, $sql);

        
    
            header("Location: /newpin-COVID-19/index.html");


       }




  

 

 


}



?>  






<!DOCTYPE html>
<html>

<head>

<style> .alert:empty {
    display: none;
}</style>
    <title>Create New Pin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">

    <div class="alert alert-danger" role="alert"><?php echo($error)?><?php?></div>



</div>
    


    <div class="container">
 

        <h2 class="mt-5 mb-5">Create New Pin</h2>
        <form method="GET">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Extension</label>
                <div class="col-sm-6">
                    <input type="number" placeholder="Enter extension number" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Current Pin</label>
                <div class="col-sm-6">
                    <input type="password" placeholder="Enter current pin" name="pin" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">New Pin</label>
                <div class="col-sm-6">
                    <input type="password" placeholder="Enter new pin" name="newpin" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm New Pin</label>
                <div class="col-sm-6">
                    <input type="password" placeholder="Re-enter new pin" name="cnewpin" class="form-control">
                </div>
            </div>
            <div  class="mt-5">
            <a href="index.html" class="btn btn-danger mr-3">Cancel</a>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </div>



        </form>
    </div>

</body>

</html>