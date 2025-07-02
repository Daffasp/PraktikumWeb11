<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐 Admin Login - Modern Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --border-color: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Floating Elements */
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: floatUp 15s infinite linear;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            left: 20%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 100px;
            height: 100px;
            left: 80%;
            animation-delay: 4s;
        }

        .floating-element:nth-child(4) {
            width: 40px;
            height: 40px;
            left: 70%;
            animation-delay: 6s;
        }

        .floating-element:nth-child(5) {
            width: 120px;
            height: 120px;
            left: 90%;
            animation-delay: 8s;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Login Container */
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 50px 40px;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 450px;
            text-align: center;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Login Header */
        .login-header {
            margin-bottom: 40px;
            position: relative;
        }

        .login-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .login-logo i {
            font-size: 2.5rem;
            color: white;
        }

        .login-header h1 {
            color: var(--dark-color);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .login-header p {
            color: #6b7280;
            font-size: 1rem;
            font-weight: 400;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
            text-align: left;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            color: var(--primary-color);
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid var(--border-color);
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
            background: rgba(255, 255, 255, 0.9);
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .form-control:focus + .input-icon {
            color: var(--primary-color);
        }

        /* Button Styles */
        .btn-login {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
            font-family: 'Inter', sans-serif;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        /* Alert Styles */
        .alert {
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 15px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border: 2px solid #fca5a5;
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.1);
        }

        .alert-danger i {
            color: #dc2626;
        }

        /* Demo Info */
        .demo-info {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            color: #0f172a;
            border: 2px solid #bae6fd;
            position: relative;
            overflow: hidden;
        }

        .demo-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        .demo-info .demo-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .demo-info .demo-header i {
            font-size: 1.2rem;
        }

        .demo-credentials {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 10px;
        }

        .demo-credential {
            background: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid #e0f2fe;
        }

        .demo-credential strong {
            display: block;
            color: var(--dark-color);
            margin-bottom: 5px;
            font-size: 0.8rem;
        }

        .demo-credential span {
            color: var(--primary-color);
            font-weight: 600;
            font-family: 'Courier New', monospace;
        }

        /* Login Footer */
        .login-footer {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid rgba(229, 231, 235, 0.5);
            text-align: center;
        }

        .login-footer p {
            color: #9ca3af;
            font-size: 0.85rem;
            margin: 0;
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            margin-top: 15px;
            padding: 10px 20px;
            border-radius: 50px;
            background: rgba(99, 102, 241, 0.1);
            transition: all 0.3s ease;
        }

        .back-home:hover {
            background: rgba(99, 102, 241, 0.2);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                margin: 20px;
                padding: 40px 30px;
                max-width: 100%;
            }

            .demo-credentials {
                grid-template-columns: 1fr;
            }

            .floating-elements {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Background Elements -->
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1>Admin Dashboard</h1>
            <p>Selamat datang kembali! Silakan masuk untuk melanjutkan</p>
        </div>

        <!-- Demo Credentials Info -->
        <div class="demo-info">
            <div class="demo-header">
                <i class="fas fa-info-circle"></i>
                <span>Demo Login Credentials</span>
            </div>
            <div class="demo-credentials">
                <div class="demo-credential">
                    <strong>Email:</strong>
                    <span>admin@email.com</span>
                </div>
                <div class="demo-credential">
                    <strong>Password:</strong>
                    <span>admin123</span>
                </div>
            </div>
        </div>

        <?php if (session()->getFlashdata('flash_msg')): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <?= session()->getFlashdata('flash_msg') ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" id="loginForm">
            <div class="form-group">
                <label for="InputForEmail">
                    <i class="fas fa-envelope"></i>
                    Email Address
                </label>
                <div class="input-wrapper">
                    <input type="email" name="email" class="form-control" id="InputForEmail"
                           value="<?= set_value('email') ?>" placeholder="Masukkan email Anda" required>
                    <i class="fas fa-envelope input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="InputForPassword">
                    <i class="fas fa-lock"></i>
                    Password
                </label>
                <div class="input-wrapper">
                    <input type="password" name="password" class="form-control" id="InputForPassword"
                           placeholder="Masukkan password Anda" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
            </div>

            <button type="submit" class="btn-login" id="loginBtn">
                <i class="fas fa-sign-in-alt"></i>
                Masuk ke Dashboard
            </button>
        </form>

        <div class="login-footer">
            <a href="<?= base_url('/'); ?>" class="back-home">
                <i class="fas fa-home"></i>
                Kembali ke Beranda
            </a>
            <p>&copy; 2024 Modern Admin Panel. Dibuat dengan ❤️</p>
        </div>
    </div>

    <script>
        // Form submission animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            btn.disabled = true;
        });

        // Auto-fill demo credentials
        document.addEventListener('DOMContentLoaded', function() {
            const demoCredentials = document.querySelectorAll('.demo-credential span');
            demoCredentials.forEach(credential => {
                credential.addEventListener('click', function() {
                    const text = this.textContent;
                    if (text.includes('@')) {
                        document.getElementById('InputForEmail').value = text;
                    } else {
                        document.getElementById('InputForPassword').value = text;
                    }

                    // Visual feedback
                    this.style.background = 'var(--success-color)';
                    this.style.color = 'white';
                    setTimeout(() => {
                        this.style.background = '';
                        this.style.color = '';
                    }, 500);
                });
            });
        });

        // Input focus animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
