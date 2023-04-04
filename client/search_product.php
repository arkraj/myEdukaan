<?php

// Get the search query from the URL parameter
$query = $_GET['search_query'];

// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database_name");

// Build the SQL query to search for matching products
$sql = "SELECT * FROM products WHERE name LIKE '%$query%'";

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);

// Check if any results were found
if (mysqli_num_rows($result) > 0) {
  // Loop through the results and display them
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>" . $row['name'] . "</p>";
    // Add more HTML code here to display other product information
  }
} else {
  echo "<p>No results found.</p>";
}

// Close the database connection
mysqli_close($conn);

?>
