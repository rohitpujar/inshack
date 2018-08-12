<?php
// Connect to the database
$dbLink = new mysqli("localhost", "root", "root", "hackathon");
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}

$tagsearch = $_GET["tagsearch"];
echo $tagsearch;
// Query for a list of all existing files
$sql = 'SELECT `fileId`, `fileName`, `userId`, `tags` FROM `fileDetails` where `tags` LIKE "%'.$tagsearch.'%"';
echo $sql;
$result = $dbLink->query($sql);

// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Mime</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';

        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['fileId']}</td>
                    <td>{$row['fileName']}</td>
                    <td>{$row['userId']}</td>
                    <td>{$row['tags']}</td>
                    <td><a href='view_file.php?id={$row['id']}'>View</a></td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }

        // Close table
        echo '</table>';
      }

      // Free the result
      $result->free();
  }
  else
  {
      echo 'Error! SQL query failed:';
      echo "<pre>{$dbLink->error}</pre>";
  }

  // Close the mysql connection
  $dbLink->close();
  ?>

