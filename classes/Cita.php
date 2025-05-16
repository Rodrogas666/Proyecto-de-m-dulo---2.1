<?php

class Cita
{
    private int $id_cita;
    private string $asunto;
    private DateTime $fecha;
    private string $estado;
    private int $id_cliente;
    private int $id_mascota;


    public static function finalizarCita($conexionBD)
    {
        $idCita = $_GET['id'];
        $sql = "UPDATE CITAS SET estado='Done' WHERE id_cita = $idCita";
        $consulta = $conexionBD->prepare($sql);
        $consulta->execute();

                echo "<script>
        alert('Cita terminada :)')
        window.location.href = 'dashboard_citas_accepted.php'
        </script>";
    }

    public static function obtenerCitasPorCliente($conexionBD, $cliente)
    {
        $id_cliente = $cliente->getId();
        $sql2 = "SELECT * from citas c 
        inner join mascota m  on c.id_mascota=m.id
        inner join clientemascotas cm on cm.id_mascota=c.id_mascota WHERE cm.id_cliente = $id_cliente";
        $consulta = $conexionBD->prepare($sql2);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCitasNotTaken($conexionBD)
    {
        $sql2 = "SELECT * from citas c 
            inner join mascota m  on c.id_mascota=m.id
            where estado = 'Not taken'
        ";
        $consulta = $conexionBD->prepare($sql2);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function operaciones($conexionBD)
    {
        // session_start();
        $asunto = isset($_POST['asunto']) ? $_POST['asunto'] : '';
        $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';
        $fecha_hora = isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $estado = "Not taken";
        $id_cliente = $_SESSION['usuario'];
        $mascota = isset($_POST['mascota']) ? $_POST['mascota'] : '';
        $mascota = intval($mascota);
        $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
        if ($accion != '') {
            switch ($accion) {
                case 'agregar':
                    $sql = "INSERT INTO citas (id_cita, asunto, fecha, estado, id_cliente, id_mascota) VALUES (NULL, :asunto, :fecha, :estado, :id_cliente, :id_mascota)";
                    $consulta = $conexionBD->prepare($sql);
                    $consulta->bindParam(':asunto', $asunto);
                    $consulta->bindParam(':fecha', $fecha_hora);
                    $consulta->bindParam(':estado', $estado);
                    $consulta->bindParam(':id_cliente', $id_cliente);
                    $consulta->bindParam(':id_mascota', $mascota);
                    $consulta->execute();

                    echo "<script>
            alert('Cita agendada :)')
            window.location.href = 'vista_citas_usuario.php'
            </script>";

                    // header("Location: vista_citas_usuario.php");

                    // print_r($sql);


                    break;
            }
        }
    }

    public function getIdCita(): int
    {
        return $this->id_cita;
    }

    public function setIdCita(int $id_cita): void
    {
        $this->id_cita = $id_cita;
    }

    public function getAsunto(): string
    {
        return $this->asunto;
    }

    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    public function setFecha(DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getIdCliente(): int
    {
        return $this->id_cliente;
    }

    public function setIdCliente(int $id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function getIdMascota(): int
    {
        return $this->id_mascota;
    }

    public function setIdMascota(int $id_mascota): void
    {
        $this->id_mascota = $id_mascota;
    }
}
