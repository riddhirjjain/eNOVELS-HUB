<?php

// Retrieve the submitted search term
$searchTerm = $_POST['search'];

// Connection configuration
$servername = "localhost";
$user_name = "user_name";
$password = "password";
$database = "library";

// Create connection
$conn = new mysqli($servername, $user_name, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform the search query
$sql = "SELECT * FROM books WHERE title LIKE '%$searchTerm%'";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    // Fetch the result and retrieve the PDF file path
    while($row = $result->fetch_assoc())
    {
        $filename = $row['title'];
        $pdfPath = $row['pdf_path'];
        $accessPermission = $row['access_permission'];  

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . basename($pdfPath) . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

        // Output the PDF file
        if ($accessPermission == 'read') 
        {
            readfile($pdfPath);
        } elseif ($accessPermission == 'write') 
        {
            echo "<a href='$pdfPath'></a>";
        }
    }
} else {
    echo 'PDF file not found.';
}

// Close the database connection
mysqli_close($conn);

?>