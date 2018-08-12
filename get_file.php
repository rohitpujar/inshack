<?php
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        $dbLink = new mysqli("localhost", "root", "root", "hackathon");
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Fetch the file information
        $query = "
            SELECT `fileId`, `fileName`, `tags`, `fileBlob`
            FROM `fileDetails`
            WHERE `id` = {$fileId}";
        $result = $dbLink->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
                header("Content-Type: ". $row['fileId']);
                header("Content-Length: ". $row['fileName']);
                header("Content-Disposition: attachment; filename=". $row['fileName']);
 
                // Print data
                echo $row['fileBlob'];
            }
            else {
                echo 'Error! No image exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>