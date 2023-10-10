<?php
// Establish a connection to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "register";

$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$food = $_POST['food'] ?? [];
$drink = $_POST['drink'] ?? [];
$note = $_POST['note'] ?? '';

// Retrieve prices of selected food items
$foodPrices = [
  'burger' => 10,
  'pizza' => 12,
  'pasta' => 8
];

$drinkPrices = [
  'coke' => 2,
  'pepsi' => 2,
  'lemonade' => 3
];

$totalCost = 0;

foreach ($food as $foodItem) {
  if (isset($foodPrices[$foodItem])) {
    $totalCost += $foodPrices[$foodItem];
  }
}

foreach ($drink as $drinkItem) {
  if (isset($drinkPrices[$drinkItem])) {
    $totalCost += $drinkPrices[$drinkItem];
  }
}

// Prepare the SQL query
$sql = "INSERT INTO `order` (food, drink, note, totalCost) VALUES ('" . implode(",", $food) . "', '" . implode(",", $drink) . "', '$note', $totalCost)";

// Execute the query
if (mysqli_query($conn, $sql)) {
  echo "Order placed successfully. Total cost: $" . $totalCost;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
