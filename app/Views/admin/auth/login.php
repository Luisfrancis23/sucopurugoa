<!DOCTYPE html>
<html lang="tet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Informasaun Suku Purugoa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .login-header {
            background: #fff;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .login-header h4 {
            color: #000;
            font-weight: 700;
            font-size: 1.3rem;
            margin: 0;
        }

        .login-header p {
            color: #888;
            font-size: 0.85rem;
            margin: 5px 0 0;
        }

        .login-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #000;
            margin-bottom: 5px;
            display: block;
        }

        .form-group .input-group {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ccc;
            background: #fff;
        }

        .form-group .input-group:focus-within {
            border-color: #888;
        }

        .form-group .input-group-text {
            background: #f5f5f5;
            border: none;
            color: #666;
            padding: 10px 14px;
        }

        .form-group .form-control {
            border: none;
            padding: 10px 14px;
            font-size: 0.9rem;
            background: transparent;
            box-shadow: none;
        }

        .form-group .form-control:focus {
            box-shadow: none;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fff;
            color: #000;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #f5f5f5;
        }

        .login-footer {
            text-align: center;
            padding: 15px 30px;
            border-top: 1px solid #eee;
            font-size: 0.8rem;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h4><i class="fas fa-university me-2"></i>Sistema Informasaun</h4>
                <p>Jestaun Dadus Suku Purugoa</p>
            </div>

            <div class="login-body">
                <form action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Hakerek username" required autofocus autocomplete="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Hakerek password" required autocomplete="current-password" id="password">
                            <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Entra iha Sistema</button>
                </form>
            </div>

            <div class="login-footer">
                &copy; <?= date('Y') ?> <strong>Suku Purugoa</strong>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>

    <script>
        function togglePassword() {
            var pwd = document.getElementById('password');
            var icon = document.getElementById('toggleIcon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                pwd.type = 'password';
                icon.className = 'fas fa-eye';
            }
        }

        <?php if (session()->getFlashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Erro Login!',
            text: <?= json_encode(session()->getFlashdata('error')) ?>,
            confirmButtonColor: '#000',
            confirmButtonText: 'Tenta Fali'
        });
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Susesu!',
            text: <?= json_encode(session()->getFlashdata('success')) ?>,
            confirmButtonColor: '#000'
        });
        <?php endif; ?>
    </script>
</body>
</html>
