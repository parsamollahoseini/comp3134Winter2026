<?php
// Array of the top 10 most common passwords from the CNN article
$common_passwords = array(
    '123456',
    'password',
    '123456789',
    '12345678',
    '12345',
    '111111',
    '1234567',
    'sunshine',
    'qwerty',
    'iloveyou'
);

// Check if form was submitted
$authenticated = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $entered_password = $_POST['password'];

    // Check if entered password matches any of the common passwords
    if (in_array($entered_password, $common_passwords)) {
        $authenticated = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weak Password Login</title>
</head>
<body>
    <?php if ($authenticated): ?>
        <h1>Successfully authenticated</h1>
        <p>You have successfully logged in with a weak password!</p>
    <?php else: ?>
        <h1>Weak Password</h1>
        <form method="post">
            <label>Password</label>
            <input type="password" name="password">
            <br/>
            <input type="submit">
        </form>
    <?php endif; ?>
</body>
</html>
