<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $username = $_POST['email'];
    $password = $_POST['psw'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Read the current users from the JSON file
    $users = json_decode(file_get_contents('users.json'), true);

    // Check if the username already exists
    foreach ($users['users'] as $user) {
        if ($user['username'] == $username) {
            echo "Username already exists. Please choose a different username.";
            exit;
        }
    }

    // Add new user to the array
    $users['users'][] = [
        'username' => $username,
        'password' => $hashed_password
    ];

    // Save the updated user data back to the JSON file
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    echo "Registration successful! You can now <a href='login.php'>log in</a>.";
}
?>