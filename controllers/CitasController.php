<?php
require_once 'models/CitasModel.php';

class CitasController {
    public function index() {
        $modelo = new CitasModel();

        // SI EL USUARIO ENVIÓ EL FORMULARIO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $medico = $_POST['id_medico'];
            $fecha = $_POST['fecha'];

            // Guardamos
            $modelo->agendarCita($nombre, $telefono, $medico, $fecha);
            
            // Recargamos la página para ver la nueva cita y evitar reenvíos
            header("Location: index.php"); 
            exit();
        }

        // CARGA NORMAL DE LA PÁGINA
        $listaMedicos = $modelo->obtenerMedicos(); //formulario
        $listaCitas = $modelo->obtenerCitas();     //tabla
        
        require_once 'views/citas/index.php';
    }
}
?>