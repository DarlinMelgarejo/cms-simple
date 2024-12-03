<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-soft">
    <div class="h-100v flex flex-column justify-center items-center">
        <div class="l-container bg-white b-radius-4">
            <h1 class="mb-8">Inicia Sesión en CMS Simple</h1>
            <form class="w-full" action="index.php?route=usuarios&action=login" method="POST">
                <div class="flex flex-column mb-4">
                    <label class="form-label form-label-black" for="email">Correo electrónico</label>
                    <input class="form-control form-control-black" type="email" id="email" name="email"/>
                </div>
                <div class="flex flex-column mb-8">
                    <label class="form-label form-label-black" for="password">Contraseña</label>
                    <input class="form-control form-control-black" type="password" id="password" name="password" />
                </div>
                <div class="flex flex-row mb-8">
                    <div class="flex flex-row items-center gap-2">
                        <input type="checkbox" name="recordarme" id="recordarme"/>
                        <label class="fs-9" for="recordarme">Recordarme</label>
                    </div>
                    <a class="fs-9 secondary-color text-bold flex justify-end w-3-4" href="">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="flex flex-row">
                    <button class="btn btn-primary w-full" type="submit">Iniciar sesión</button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>