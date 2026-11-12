
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesor</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #dbeafe, #e0f2fe);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .contenedor {
            width: 100%;
            max-width: 450px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .encabezado {
            background: #0879d1;
            color: white;
            text-align: center;
            padding: 18px;
            font-size: 21px;
            font-weight: bold;
        }

        .formulario {
            padding: 25px 30px;
        }

        .form-label {
            font-weight: bold;
            color: #444;
        }

        .form-control {
            border-radius: 7px;
            padding: 10px;
        }

        .botones {
            display: flex;
            gap: 8px;
            margin-top: 25px;
        }

        .botones a {
            flex: 1;
        }

        .botones button {
            width: 100%;
            min-height: 48px;
        }

        .btn-consultar {
            background-color: #17b6c9;
            color: white;
            border: none;
        }

        .btn-consultar:hover {
            background-color: #1095a5;
            color: white;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <div class="encabezado">
        <i class="bi bi-person-badge-fill"></i>
        Registro de Profesor
    </div>

    <div class="formulario">

        <form action="procesar.php" method="POST">

            <div class="mb-3">
                <label class="form-label">DNI *</label>
                <input type="text"
                       name="dni"
                       class="form-control"
                       placeholder="Ej: 12345678A"
                       maxlength="9"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       placeholder="Ej: Juan"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Primer apellido *</label>
                <input type="text"
                       name="apellido1"
                       class="form-control"
                       placeholder="Ej: Pérez"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Segundo apellido</label>
                <input type="text"
                       name="apellido2"
                       class="form-control"
                       placeholder="Ej: Gómez">
            </div>

            <div class="botones">

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Guardar
                </button>

                <button type="reset" class="btn btn-outline-secondary">
                    <i class="bi bi-eraser"></i>
                    Limpiar
                </button>

                <a href="Consulta.php">
                    <button type="button" class="btn btn-consultar">
                        <i class="bi bi-search"></i>
                        Consultar base de datos
                    </button>
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>