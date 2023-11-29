<?php
if (isset($_GET['id'])) {
    $guestId = mysqli_real_escape_string($mysqli, $_GET['id']);
    $guestQuery = "SELECT * FROM guest WHERE guest_id = '$guestId'";
    $guestResult = mysqli_query($mysqli, $guestQuery);
    $guestData = mysqli_fetch_assoc($guestResult);

    $roomsQuery = "SELECT * FROM `rooms`";
    $roomsResult = mysqli_query($mysqli, $roomsQuery);
} else {
    header("Location: index.php");
    exit();
}

if (isset($_POST['checkin'])) {
    $roomId = mysqli_real_escape_string($mysqli, $_POST['room']);
    $stayDuration = mysqli_real_escape_string($mysqli, $_POST['stay_duration']);
    $numberOfGuest = mysqli_real_escape_string($mysqli, $_POST['NOG']);

    $roomQuery = "SELECT * FROM `rooms` WHERE room_id = '$roomId'";
    $roomResult = mysqli_query($mysqli, $roomQuery);
    $roomData = mysqli_fetch_assoc($roomResult);

    $roomType = $roomData['type'];
    $number_of_guest = $roomData['number_of_guest'];
    $roomCost = $roomData['cost'];

    $discount = 200;

    // Calculate the total cost with discounts and free stay
    $totalCost = 0;
    $subTotal = 0;
    $totalnumberGuest = 0;

    if ($guestData['type'] == 1) {
        $totalnumberGuest = ceil($numberOfGuest / $number_of_guest);
        $subTotal = $roomCost * $stayDuration * $totalnumberGuest;

        // Apply additional discount for every 5,000 worth of room accommodations
        $additionalDiscount = floor($subTotal / 5000) * $discount;
        $subTotal -= $additionalDiscount;

        $totalCost = $subTotal;
    } else {
        $totalnumberGuest = ceil($numberOfGuest / $number_of_guest);
        $totalCost = $roomCost * $stayDuration * $totalnumberGuest;
    }

    // Redirect to billing.php with the necessary data
    header("Location: billing.php?id=$guestId&roomType=$roomType&stayDuration=$stayDuration&totalCost=$totalCost&NOG=$numberOfGuest");
    exit();
}
?>
