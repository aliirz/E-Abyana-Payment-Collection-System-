<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .vh-100 {
      min-height: 100vh;
    }
    .logo-section {
      background-color: #333;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }
    .logo-img {
      width: 100px;
      height: auto;
    }
    .form-section {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-form {
      max-width: 400px;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="container-fluid vh-100">
  <div class="row h-100">
    <!-- Logo Section (Left) -->
    <div class="col-md-6 logo-section">
      <div class="text-center">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/dd/Logo_of_Punjab_Irrigation_Department.svg/1100px-Logo_of_Punjab_Irrigation_Department.svg.png" alt="logo" class="logo-img mb-3" />
        <h1 class="h4 fw-bold">ABYANA</h1>
        <h2 class="fw-semibold text-success">Water Billing System</h2>
      </div>
    </div>

    <!-- Login Form Section (Right) -->
    <div class="col-md-6 form-section">
      <div class="login-form p-4 border rounded shadow">
        <h2 class="h4 fw-bold text-center text-primary mb-4">Login</h2>
      <form action="<?php echo e(url('signin')); ?>" method="post">
  <?php echo csrf_field(); ?>  <!-- CSRF Token for Laravel Security -->
  
  <!-- Email Field -->
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
  </div>

  <!-- Password Field -->
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
  </div>

  <!-- Submit Button -->
  <button type="submit" class="btn btn-success w-100 fw-semibold">Login</button>
</form>

      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/login.blade.php ENDPATH**/ ?>