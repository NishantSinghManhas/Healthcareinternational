<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mental Health Feedback Form</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #c2e9fb, #a1c4fd);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-container {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 100%;
    }

    h2 {
      margin-bottom: 1rem;
      color: #2c3e50;
    }

    label {
      display: block;
      margin-top: 1rem;
      margin-bottom: 0.5rem;
      font-weight: 600;
    }

    input[type="text"], input[type="email"], textarea, select {
      width: 100%;
      padding: 0.7rem;
      border-radius: 0.5rem;
      border: 1px solid #ccc;
      font-size: 1rem;
      resize: vertical;
    }

    textarea {
      min-height: 100px;
    }

    button {
      margin-top: 1.5rem;
      background: #512da8;
      color: white;
      border: none;
      padding: 0.7rem 1.5rem;
      font-size: 1rem;
      border-radius: 0.5rem;
      cursor: pointer;
    }

    button:hover {
      background:rgb(99, 56, 198);
    }

    .success-message {
      color: green;
      margin-top: 1rem;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $experience = htmlspecialchars($_POST["experience"]);
        $suggestion = htmlspecialchars($_POST["suggestion"]);

        // You can store it in a DB or send an email from here.
        // Example for email:
        /*
        mail("your@email.com", "New Feedback", "Name: $name\nEmail: $email\nExperience: $experience\nSuggestion: $suggestion");
        */

        echo "<p class='success-message'>Thank you for your feedback, $name! We appreciate you taking the time to help us improve.</p>";
    } else {
    ?>
    <h2>We greatly value your feedback</h2>
    <p>If you'd like to help us improve, please take a moment to fill out the form below:</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="name">Your Name</label>
      <input type="text" name="name" id="name" required />

      <label for="email">Email Address (optional)</label>
      <input type="email" name="email" id="email" />

      <label for="experience">How would you rate your experience?</label>
      <select name="experience" id="experience" required>
        <option value="">-- Choose an option --</option>
        <option value="Excellent">Excellent 😊</option>
        <option value="Good">Good 🙂</option>
        <option value="Average">Average 😐</option>
        <option value="Poor">Poor 😞</option>
      </select>

      <label for="suggestion">Do you have any suggestions for us?</label>
      <textarea name="suggestion" id="suggestion" placeholder="Write your feedback here..."></textarea>

      <button type="submit">Submit Feedback</button>
    </form>
    <?php } ?>
  </div>
</body>
</html>
