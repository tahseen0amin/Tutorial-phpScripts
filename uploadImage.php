
<?php

    $con = mysql_connect("127.0.0.1","root","pass123");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("TestDatabase", $con);
    
    if(isset($_POST["image"]) && isset($_POST["CustomerID"])) {
        $data = $_POST["image"];
        $CustomerID = $_POST["CustomerID"];
        $ImageName = $CustomerID.".jpg";
        $filePath = "images/".$ImageName;
        echo "file ".$filePath;
        if (file_exists($filePath)) {
            unlink($filePath);
        } 

        $myfile = fopen($filePath, "w") or die("Unable to open file!");
        file_put_contents($filePath, base64_decode($data));

        mysql_query("UPDATE Customers SET imageName='$ImageName' WHERE id='$CustomerID'")
            or die('Could not save Image Name: ' . mysql_error());
        
    } else {
        echo 'not set';
    }
    
    mysql_close($con);

?>