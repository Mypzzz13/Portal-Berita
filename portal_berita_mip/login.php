<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login - Portal Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            background: linear-gradient(135deg, #198754 0%, #157347 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            animation: gradientShift 15s ease infinite;
            background-size: 200% 200%;
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .login-container {
            width: 100%;
            max-width: 340px;
            padding: 10px;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            border: none;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            overflow: hidden;
        }

        .card-body {
            padding: 1.2rem 1rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 0.8rem;
        }

        .login-header .brand-icon {
            font-size: 1.8rem;
            color: #198754;
            margin-bottom: 0.2rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .login-header h2 {
            color: #333;
            font-weight: 700;
            margin-bottom: 0rem;
            font-size: 1.3rem;
        }

        .login-header p {
            color: #999;
            font-size: 0.75rem;
        }

        .form-group {
            margin-bottom: 0.8rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.3rem;
            font-size: 0.85rem;
        }

        .form-label i {
            margin-right: 0.5rem;
            color: #198754;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.5rem 0.7rem;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            border-color: #198754;
            background: white;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.1);
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .captcha-section {
            text-align: center;
            margin-bottom: 0.8rem;
            padding: 0.7rem;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .captcha-section label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.4rem;
            font-size: 0.85rem;
        }

        .captcha-section img {
            max-width: 100%;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            background: white;
            padding: 0.2rem;
            border: 2px solid #e0e0e0;
        }

        .btn-login {
            background: linear-gradient(135deg, #198754 0%, #157347 100%);
            border: none;
            border-radius: 12px;
            padding: 0.6rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(25, 135, 84, 0.6);
            background: linear-gradient(135deg, #157347 0%, #198754 100%);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert {
            border: none;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-10px);
            }

            75% {
                transform: translateX(10px);
            }
        }

        .alert-danger {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-left: 4px solid #f5576c;
        }

        .alert-danger i {
            margin-right: 0.5rem;
        }

        .form-divider {
            text-align: center;
            margin: 0.6rem 0;
            color: #999;
            font-size: 0.8rem;
        }

        .form-divider::before,
        .form-divider::after {
            content: '';
            display: inline-block;
            width: 40%;
            height: 1px;
            background: #e0e0e0;
            vertical-align: middle;
        }

        .form-divider::before {
            margin-right: 1rem;
        }

        .form-divider::after {
            margin-left: 1rem;
        }

        @media (max-width: 600px) {
            .card-body {
                padding: 2rem 1.5rem;
            }

            .login-header .brand-icon {
                font-size: 2.5rem;
            }

            .btn-login {
                padding: 0.7rem;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="login-header">
                    <div class="brand-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                    <h2>Portal Berita</h2>
                    <p>Admin Dashboard</p>
                </div>

                <!-- Error Alert -->
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <?= $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form action="proses_login.php" method="POST">
                    <!-- Username -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i>
                            Username
                        </label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i>
                            Password
                        </label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <div class="form-divider">atau</div>

                    <!-- CAPTCHA -->
                    <div class="captcha-section">
                        <label>
                            <i class="fas fa-shield-alt"></i> Verifikasi Captcha
                        </label>
                        <img src="captcha.php" alt="captcha">
                        <input type="text" name="captcha" class="form-control text-center" placeholder="Masukkan kode di atas" required>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>