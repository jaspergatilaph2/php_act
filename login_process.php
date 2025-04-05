<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['psw'];

    // Read the users from the JSON file
    $users = json_decode(file_get_contents('users.json'), true);

    // Search for the user in the JSON file
    $user_found = false;
    foreach ($users['users'] as $user) {
        if ($user['username'] == $username) {
            $user_found = true;

            // Check if the password is correct
            if (password_verify($password, $user['password'])) {
                // Start the session
                $_SESSION['username'] = $user['username'];

                // Redirect to welcome page
                header("Location: welcome.php"); // Corrected path
                exit();
            } else {
                // Incorrect password
                echo "Incorrect password!";
                exit();
            }
        }
    }

    if (!$user_found) {
        // Username not found
        echo "Username not found!";
    }
}
?>
