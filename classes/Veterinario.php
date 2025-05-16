<?php
class Veterinario
{
    private int $id;
    private string $nombre;
    private string $apellido;
    private string $correo;
    private string $contrasenia;

    public static function tomarCitaVeterinario($conexionBD, $id_veterinario)
    {
        if ($_POST) {
            $id_cita = isset($_POST['id']) ? $_POST['id'] : '';
            $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
            // echo '<pre>';
            // var_dump($_POST);
            // echo '</pre>';
            // exit;
            $estado = 'Taken';


            if ($accion != '') {

                if ($accion == 'agregar') {

                    $sql2 = "UPDATE citas SET estado = :estado WHERE id_cita=:id";
                    $consulta2 = $conexionBD->prepare($sql2);
                    $consulta2->bindParam(':id', $id_cita);
                    $consulta2->bindParam(':estado', $estado);
                    $consulta2->execute();

                    $sql3 = "INSERT INTO veterinariocitas (id, id_veterinario, id_cita) VALUES (NULL, :id_veterinario, :id_cita)";
                    $consulta3 = $conexionBD->prepare($sql3);
                    $consulta3->bindParam(':id_veterinario', $id_veterinario);
                    $consulta3->bindParam(':id_cita', $id_cita);
                    $consulta3->execute();

                    header("Location: dashboard.php");
                }
            }

            echo $id_cita;
        }
    }

    public static function getVeterinarioLogged($conexionBD)
    {
        $id_veterinario = $_SESSION['veterinario'];

        $sql2 = "SELECT * FROM `veterinario` WHERE id = $id_veterinario";
        $consulta2 = $conexionBD->prepare($sql2);
        $consulta2->execute();
        $veterinario = $consulta2->fetchAll(PDO::FETCH_ASSOC);
        return $veterinario;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    public function getContrasenia(): string
    {
        return $this->contrasenia;
    }

    public function setContrasenia(string $contrasenia): void
    {
        $this->contrasenia = $contrasenia;
    }
}
