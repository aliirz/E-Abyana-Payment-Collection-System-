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

    

    <div class="vh-100"
        style="background-image: url('<?php echo e(asset('assets/login-bg.jpg')); ?>'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat; position:relative">
        <div class="text-center align-items-center d-flex gap-3" style="position: absolute; top:20px; left:30px">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/dd/Logo_of_Punjab_Irrigation_Department.svg/1100px-Logo_of_Punjab_Irrigation_Department.svg.png"
                alt="logo" class="logo-img mb-3" />
            <div>
                <h1 class="h4 fw-bold mb-0">ABYANA</h1>
                <h2 class="text-success text-sm">Water Billing System</h2>
            </div>
        </div>
        <div class="row h-100">


            <!-- Logo Section (Left) -->
            <!-- Login Form Section (Right) -->
            <div class="col-md-12 form-section">
                <div class="login-form p-4 border shadow bg-white" style="border-radius: 15px">
                    <h2 class="h4 fw-bold text-center text-primary mb-4">Login</h2>
                    <form action="<?php echo e(url('signin')); ?>" method="post">
                        <?php echo csrf_field(); ?> <!-- CSRF Token for Laravel Security -->

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter Email">
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter Password">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 fw-semibold">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/abyana/resources/views/login.blade.php ENDPATH**/ ?>