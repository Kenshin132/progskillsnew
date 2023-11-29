<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <?php
        require_once("dbConnection.php");

        if (isset($_POST['update'])){
            $room_id = $_POST['id'];
            $type = (mysqli_real_escape_string($mysqli, $_POST['type']));
            $cost = (mysqli_real_escape_string($mysqli, $_POST['cost']));
            $number_of_guest = (mysqli_real_escape_string($mysqli, $_POST['number_of_guest']));

            $result = mysqli_query($mysqli, "UPDATE rooms SET `type`='$type', `cost`='$cost', `number_of_guest`='$number_of_guest'WHERE `room_id` = '$room_id'");

            if ($result) {
                echo "<p>Data updated!</p>";
                echo "<a href='index.php'>View Result</a>";
            } else {
                echo "<p>Error: " . mysqli_error($mysqli) . "</p>";
            }
        }
    ?>
</body>
</html>

style.css
body {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}
