<?php
require_once("dbConnection.php");

if (isset($_GET['id']) && isset($_GET['roomType']) && isset($_GET['NOG']) && isset($_GET['stayDuration']) && isset($_GET['totalCost'])) {
    $guestId = mysqli_real_escape_string($mysqli, $_GET['id']);
    $numberOfGuest = mysqli_real_escape_string($mysqli, $_GET['NOG']);
    $roomType = mysqli_real_escape_string($mysqli, $_GET['roomType']);
    $stayDuration = mysqli_real_escape_string($mysqli, $_GET['stayDuration']);
    $totalCost = mysqli_real_escape_string($mysqli, $_GET['totalCost']);

    $guestQuery = "SELECT * FROM guest WHERE guest_id = '$guestId'";
    $guestResult = mysqli_query($mysqli, $guestQuery);
    $guestData = mysqli_fetch_assoc($guestResult);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php"><h1>Billing</h1></a>
    <table width='80%' border=0>
        <thead>
            <tr bgcolor='#DDDDDD'>
                <th scope="col">Fields</th>
                <th scope="col">Values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Guest ID</td>
                <td><?php echo $guestData['gen_id']; ?> (computer generated)</td>
            </tr>
            <tr>
                <td>Guest Name</td>
                <td><?= strtoupper($guestData['last_name']) ?>, <?= strtoupper($guestData['first_name']) ?> <?= strtoupper($guestData['mid_name']) ?></td>
            </tr>
            <tr>
                <td>Guest Type</td>
                <td><?php echo $guestData['type'] == 1 ? 'Member' : 'Non-Member'; ?></p></td>
            </tr>
            <tr>
                <td>Registration Date</td>
                <td><?php echo date('F j, Y', strtotime($guestData['dor'])); ?></td>
            </tr>
        </tbody>
    </table>
    <h2>Billing Details</h2>
    <p>Guest ID: <?php echo $guestData['gen_id']; ?></p>
    <p>Total Number of Guest: <?php echo $numberOfGuest; ?></p>
    <p>Room Type: <?php echo $roomType; ?></p>
    <p>Number of Days: <?php echo $stayDuration; ?></p>
    <br/>
    <p>Amount due: PhP <?php echo number_format($totalCost,2); ?></p>
</body>
</html>
