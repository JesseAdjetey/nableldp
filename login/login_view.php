<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div id="header">Welcome n<span class="purple-text">Able</span>r!</div>
<h2>Your journey begins <span class="purple-text">here</span>.</h2><script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.93/build/spline-viewer.js"></script>
<spline-viewer url="https://prod.spline.design/d0a-yfpfYUSxALsz/scene.splinecode"></spline-viewer>
  <div class="container" id="container">
    <form id="loginForm" action="../actions/login_action.php" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required
               pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
               title="Please enter a valid email address">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required
               pattern=".{6,}" title="Password must be at least 6 characters">
      </div>

      <button type="submit">Login</button>
    </form>
    <p class="register-link">Don't have an account? <a href="register_view.php">Register</a></p>
  </div>
<script src="../js/script.js"></script>
</body>
</html>
