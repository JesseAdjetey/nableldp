<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div id="header">Make Time with n<span class="purple-text">Able</span></div>
<script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.93/build/spline-viewer.js"></script>
<spline-viewer url="https://prod.spline.design/d0a-yfpfYUSxALsz/scene.splinecode"></spline-viewer>
  <div class="container" id="container">
    <form id="registerForm" action="../actions/register_action.php" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
  <label for="age">Age:</label>
  <input type="number" id="age" name="age" placeholder="Enter your age" required min="0">
</div>

      <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="form-group">
        <label for="occupation">Occupation:</label>
        <input type="text" id="occupation" name="occupation" placeholder="Enter your occupation" required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required
               pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
               title="Please enter a valid email address">
      </div>

      <div class="form-group">
        <label for="number">Phone Number:</label>
        <input type="text" id="number" name="number" placeholder="Enter your phone number" required>
      </div>

      <div class="form-group">
        <label for="inst_id">Institution:</label>
        <select id="inst_id" name="inst_id">
          <option value="">None</option>
          <?php
          include('../settings/connection.php');

            $query = "SELECT * FROM institutions";
            $result = $connection->query($query);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["inst_id"] . '">' . $row["institution_name"] . '</option>';
              }
            }
          ?>
        </select>
        </div>

        <div class="form-group">
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" placeholder="Enter password" required
         pattern=".{6,}" title="Password must be at least 6 characters">
</div>

<div class="form-group">
  <label for="confirm_password">Confirm Password:</label>
  <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
</div>

      <button type="submit">Register</button>
    </form>
    <p class="register-link">Already have an account? <a href="login_view.php">Login</a></p>
  </div>
<script src="script.js"></script>
</body>
</html>
