
<?php

    // connect to mysql database
    $con = mysql_connect("127.0.0.1","root","pass123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("TestDatabase", $con); // name of your database
    
    // check if "image" abd "CustomerID" is set 
    if(isset($_POST["image"]) && isset($_POST["CustomerID"])) {
        $data = $_POST["image"];
        $CustomerID = $_POST["CustomerID"];
        $ImageName = $CustomerID.".jpg";
        $filePath = "images/".$ImageName; // path of the file to store
        echo "file ".$filePath;
        // check if file exits
        if (file_exists($filePath)) {
            unlink($filePath); // delete the old file
        } 
        // create a new empty file
        $myfile = fopen($filePath, "w") or die("Unable to open file!");
        // add data to that file
        file_put_contents($filePath, base64_decode($data));

        // update the Customer table with new image name.
        mysql_query("UPDATE Customers SET imageName='$ImageName' WHERE id='$CustomerID'")
            or die('Could not save Image Name: ' . mysql_error());
        
    } else {
        echo 'not set';
    }
    // close the connection
    mysql_close($con);

?>