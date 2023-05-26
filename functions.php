<?php
// Function to check if username exists
function checkUsernameExists($user_name, $con) {
    $user_name = $con->real_escape_string($user_name); // Sanitize the input

    // Prepare and execute the query
    $query = "SELECT * FROM users WHERE user_name = '$user_name'";
    $result = $con->query($query);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        return true; // Username exists
    } else {
        return false; // Username does not exist
    }
}

function check_login($con)
{
    if(isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
        $query = "select * from users where email = '$email' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //redirect to home page
    header("Location: HOME PAGE.html");
    die;
}
?>