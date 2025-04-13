<?php
session_start();

// Simulated user store
$users = [
  "demo@example.com" => [
    "name" => "Demo User",
    "password" => password_hash("demo123", PASSWORD_DEFAULT)
  ]
];

// Handle Sign Up
if (isset($_POST['signup_submit'])) {
  $name = trim($_POST['signup_name']);
  $email = trim($_POST['signup_email']);
  $password = trim($_POST['signup_password']);

  if (empty($name) || empty($email) || empty($password)) {
    echo "<script>alert('Please fill in all fields.');</script>";
  } elseif (isset($users[$email])) {
    echo "<script>alert('User already exists. Please sign in.');</script>";
  } else {
    $users[$email] = [
      "name" => $name,
      "password" => password_hash($password, PASSWORD_DEFAULT)
    ];
    echo "<script>alert('Sign Up successful! Please sign in.');</script>";
  }
}

// Handle Sign In
if (isset($_POST['signin_submit'])) {
  $email = trim($_POST['signin_email']);
  $password = trim($_POST['signin_password']);

  if (empty($email) || empty($password)) {
    echo "<script>alert('Please enter both email and password.');</script>";
  } elseif (!isset($users[$email])) {
    echo "<script>alert('User not found. Please sign up.');</script>";
  } elseif (!password_verify($password, $users[$email]['password'])) {
    echo "<script>alert('Incorrect password.');</script>";
  } else {
    $_SESSION['user'] = $users[$email]['name'];
    echo "<script>alert('Welcome, " . $_SESSION['user'] . "!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign In / Sign Up</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #e8eaf6;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 40px;
    }

    .form-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 320px;
      display: none;
      margin-top: 9%;
    }

    .form-container.active {
      display: block;
    }

    h2 {
      color: #512da8;
      margin-bottom: 20px;
      text-align: center;
    }

    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      gap: 10px;
    }

    .form-buttons button {
      flex: 1;
      background-color: #512da8;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .form-buttons button.secondary {
      background-color: #b39ddb;
    }

    .form-buttons button:hover {
      opacity: 0.9;
    }

    a {
      text-decoration: none;
      font-size: 12px;
      color: #512da8;
      display: block;
      margin-top: 10px;
      text-align: right;
    }
  </style>
</head>
<body>

  <!-- Sign Up Form -->
  <div id="signup-form" class="form-container active">
    <h2>Create Account</h2>
    <form method="POST" action="">
      <input type="text" name="signup_name" placeholder="Name" required />
      <input type="email" name="signup_email" placeholder="Email" required />
      <input type="password" name="signup_password" placeholder="Password" required />
      <div class="form-buttons">
        <button type="submit" name="signup_submit">Sign Up</button>
        <button type="button" class="secondary" onclick="showForm('signin')">Already have an account?</button>
      </div>
    </form>
  </div>

  <!-- Sign In Form -->
  <div id="signin-form" class="form-container">
    <h2>Welcome Back</h2>
    <form method="POST" action="">
      <input type="email" name="signin_email" placeholder="Email" required />
      <input type="password" name="signin_password" placeholder="Password" required />
      <a href="ResetPassword.html" target="_blank">Forgot your password?</a>
      <div class="form-buttons">
        <button type="submit" name="signin_submit">Sign In</button>
        <button type="button" class="secondary" onclick="showForm('signup')">Don't have an account?</button>
      </div>
    </form>
  </div>

  <script>
    function showForm(type) {
      const signUpForm = document.getElementById('signup-form');
      const signInForm = document.getElementById('signin-form');

      if (type === 'signup') {
        signUpForm.classList.add('active');
        signInForm.classList.remove('active');
      } else {
        signInForm.classList.add('active');
        signUpForm.classList.remove('active');
      }
    }
  </script>

</body>
</html>
