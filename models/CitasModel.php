<?php
class CitasModel {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    // Para llenar el "Select" del formulario
    public function obtenerMedicos() {
        $sql = "SELECT * FROM medicos";
        $resultado = $this->db->query($sql);
        $medicos = [];
        while ($row = $resultado->fetch_assoc()) {
            $medicos[] = $row;
        }
        return $medicos;
    }

    public function obtenerCitas() {
        $sql = "SELECT c.id, c.fecha, m.nombre AS medico, m.especialidad, p.nombre AS paciente 
                FROM citas c
                INNER JOIN medicos m ON c.id_medico = m.id
                INNER JOIN pacientes p ON c.id_paciente = p.id
                ORDER BY c.fecha DESC"; // Ordenamos por fecha
        $resultado = $this->db->query($sql);
        $citas = [];
        while ($row = $resultado->fetch_assoc()) {
            $citas[] = $row;
        }
        return $citas;
    }

    // Función maestra: Crea paciente y agenda la cita en un solo paso
    public function agendarCita($nombrePaciente, $telefono, $idMedico, $fecha) {
        // 1. Insertamos al paciente
        $sqlPaciente = "INSERT INTO pacientes (nombre, telefono) VALUES ('$nombrePaciente', '$telefono')";
        $this->db->query($sqlPaciente);
        
        // 2. Obtenemos el ID del paciente que acabamos de crear
        $idPaciente = $this->db->insert_id;

        // 3. Creamos la cita vinculando médico y paciente
        $sqlCita = "INSERT INTO citas (id_medico, id_paciente, fecha) VALUES ('$idMedico', '$idPaciente', '$fecha')";
        return $this->db->query($sqlCita);
    }
}
?>