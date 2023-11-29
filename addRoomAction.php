<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
</head>
<body>
    <?php
        require_once("dbConnection.php");

        
        if (isset($_POST['submit'])){
            $type = mysqli_real_escape_string($mysqli, $_POST['type']);
            $cost = mysqli_real_escape_string($mysqli, $_POST['cost']);
            $number_of_guest = mysqli_real_escape_string($mysqli, $_POST['number_of_guest']); 

            $result = mysqli_query($mysqli, "INSERT INTO rooms (`type`, `cost`, `number_of_guest`) VALUES ('$type', '$cost', '$number_of_guest')");

            if ($result) {
                echo "<p>Data added!</p>";

                echo "<a href='index.php'>View Result</a>";
            } else {
                echo "<p>Error: " . mysqli_error($mysqli) . "</p>";
            }
        }
    ?>
</body>
</html>
