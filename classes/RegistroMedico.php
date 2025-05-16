<?php

class RegistroMedico
{
    private int $id;
    private string $examenes;
    private string $resultados;
    private string $enfermedades;
    private string $medicamentos;
    private int $id_mascota;

    public static function editarRegistroMedico($conexionBD)
    {

        $examenes = $_POST['examenes'];
        $resultados = $_POST['resultados'];
        $enfermedades = $_POST['enfermedades'];
        $medicamentos = $_POST['medicamentos'];

        $id_mascota = $_POST['id_mascota'];
        $id_registro = $_POST['id_registro'];

        $sql = "UPDATE registro_medico SET examenes='$examenes',resultados='$resultados',enfermedades='$enfermedades',medicamentos='$medicamentos' WHERE id = $id_registro";

        $consulta = $conexionBD->prepare($sql);
        $consulta->execute();

        echo "<script>
            alert('Registro editado !')
            window.location.href = 'view_mascotaHistorial.php?id=$id_mascota'
            </script>";
    }

    public static function agregarRegistroMedico($conexionBD)
    {
        $examenes = $_POST['examenes'];
        $resultados = $_POST['resultados'];
        $enfermedades = $_POST['enfermedades'];
        $medicamentos = $_POST['medicamentos'];
        $id_mascota = intval($_POST['id_mascota']);

        $sql = "INSERT INTO registro_medico(examenes,resultados,enfermedades,medicamentos,id_mascota) VALUES('$examenes','$resultados','$enfermedades','$medicamentos',$id_mascota)";
        $consulta = $conexionBD->prepare($sql);
        $consulta->execute();

        echo "<script>
            alert('Registro agregado !')
            window.location.href = 'view_mascotas.php'
            </script>";
    }
    public static function eliminarRegistroMedico($conexionBD)
    {
        $id_registro = $_GET['id_registro'];
        $id_mascota = $_GET['id_mascota'];

        $sql = "DELETE FROM registro_medico WHERE id=$id_registro";

        $consulta = $conexionBD->prepare($sql);
        $consulta->execute();

        echo "<script>
            alert('Registro eliminado !')
            window.location.href = 'view_mascotaHistorial.php?id=$id_mascota'
            </script>";
    }

    // Getter and Setter for id
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter and Setter for examenes
    public function getExamenes(): string
    {
        return $this->examenes;
    }

    public function setExamenes(string $examenes): void
    {
        $this->examenes = $examenes;
    }

    // Getter and Setter for resultados
    public function getResultados(): string
    {
        return $this->resultados;
    }

    public function setResultados(string $resultados): void
    {
        $this->resultados = $resultados;
    }

    // Getter and Setter for enfermedades
    public function getEnfermedades(): string
    {
        return $this->enfermedades;
    }

    public function setEnfermedades(string $enfermedades): void
    {
        $this->enfermedades = $enfermedades;
    }

    // Getter and Setter for medicamentos
    public function getMedicamentos(): string
    {
        return $this->medicamentos;
    }

    public function setMedicamentos(string $medicamentos): void
    {
        $this->medicamentos = $medicamentos;
    }

    // Getter and Setter for id_mascota
    public function getIdMascota(): int
    {
        return $this->id_mascota;
    }

    public function setIdMascota(int $id_mascota): void
    {
        $this->id_mascota = $id_mascota;
    }
}
