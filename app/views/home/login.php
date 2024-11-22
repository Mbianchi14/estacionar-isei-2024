<!DOCTYPE html>
<html lang="es">

<head>
    <?= $head ?>
    <title><?= $title ?></title>
</head>

<body class="bg-white d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center p-4 shadow rounded bg-light" style="max-width: 400px;">
        <form action="" method="post">
            <div class="mb-2">
                <h1 class="mb-3" style="color:#0022b2; font-weight:500;">Estacionar</h1>
                <img src="../img/favicon.png" alt="branding-app" class="img-fluid" style="max-width: 100px;">
            </div>
            <div class="mb-2">
                <h2>Crear una cuenta</h2>
                <p class="text-muted">Ingrese su email para registrarse en la App</p>
            </div>
            <div class="mb-3">
                <input type="email" name="mail" value="<?= $mail ?>" class="form-control" placeholder="email@domain.com"
                    required autocomplete="off" autofocus>
            </div>
            <?php if (!empty($error)): ?>
                <div class="position-relative mb-3">
                    <?php foreach ($error as $e): ?>
                        <output class="text-danger small d-block bg-light p-2 rounded shadow-sm border border-danger mt-1">
                            <?php echo htmlspecialchars($e) ?>
                        </output>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="mb-4">
                <button class="btn btn-primary w-100" name="send" type="submit">Registrarse</button>
            </div>
            <div class="d-flex align-items-center mb-4">
                <hr class="flex-grow-1">
                <p class="mx-2 mb-0">o continuar en</p>
                <hr class="flex-grow-1">
            </div>
            <div class="mb-4">
                <a href="https://"
                    class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center">
                    <i class='bx bxl-google me-2'></i> Google
                </a>
            </div>
            <div class="text-muted text-sm">
                <p class="mb-0">
                    Al hacer clic en continuar, estás aceptando nuestros
                    <a href="https://" class="text-decoration-none">términos de servicio</a> y
                    <a href="https://" class="text-decoration-none">políticas de privacidad</a>.
                </p>
            </div>
        </form>
    </div>
</body>

</html>