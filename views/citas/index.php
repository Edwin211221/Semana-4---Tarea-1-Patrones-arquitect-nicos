<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Citas</title>
    <link rel="stylesheet" href="views/citas/assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="header-box">
            <img src="views/citas/assets/img/logo_hospital.png" alt="Logo Hospital" class="logo">
            <h1>Agenda de Citas Médicas</h1>
        </div>

        <div class="form-box">
            <h3>Nueva Cita</h3>
            <form action="index.php" method="POST">
                <div class="input-group">
                    <input type="text" name="nombre" placeholder="Nombre del Paciente" required>
                    <input type="text" name="telefono" placeholder="Teléfono" required>
                </div>
                <div class="input-group">
                    <select name="id_medico" required>
                        <option value="">Seleccione Doctor...</option>
                        <?php foreach ($listaMedicos as $medico): ?>
                            <option value="<?php echo $medico['id']; ?>">
                                <?php echo $medico['nombre'] . " (" . $medico['especialidad'] . ")"; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="datetime-local" name="fecha" required>
                </div>
                <button type="submit" class="btn-guardar">Agendar Cita</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Especialidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCitas as $cita): ?>
                <tr>
                    <td><?php echo $cita['fecha']; ?></td>
                    <td><?php echo $cita['paciente']; ?></td>
                    <td><?php echo $cita['medico']; ?></td>
                    <td><?php echo $cita['especialidad']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <button id="btnImprimir" class="btn-imprimir">Imprimir Reporte</button>
    </div>

    <script src="views/citas/assets/js/script.js"></script>
</body>
</html>