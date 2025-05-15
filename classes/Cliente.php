<?php
class Cliente
{
    private int $id;
    private string $nombre;
    private string $apellido;
    private string $correo;
    private string $contrasenia;

    private array $mascotas = [];


    public static function registrar($conexionBD)
    {

        if ($_POST) {

            if ($_POST['nombre'] != '' || $_POST['apellido'] != '' || $_POST['correo'] != '' || $_POST['password'] != '') {

                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $password = $_POST['password'];

                $sql = "INSERT INTO cliente (id, nombre, apellido, correo, contrasenia) VALUES(NULL, :nombre, :apellido, :correo, :password)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':nombre', $nombre);
                $consulta->bindParam(':apellido', $apellido);
                $consulta->bindParam(':correo', $correo);
                $consulta->bindParam(':password', $password);
                $consulta->execute();

                header('Location:../views/form_login.php');
            } else {
                echo "Llena todo";
            }
        }
    }

    public static function cerrar_sesion()
    {
        session_start();
        session_destroy();
    }

    public static function login($conexionBD)
    {

        if ($_POST) {
            session_start();
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            $sql = $conexionBD->prepare('SELECT * FROM cliente WHERE correo=:correo AND contrasenia=:password');
            $sql->bindParam(':correo', $correo);
            $sql->bindParam(':password', $password);
            $sql->execute();
            $usuario = $sql->fetch(PDO::FETCH_ASSOC);

            //veterinarios
            $sqlVeterinario = $conexionBD->prepare('SELECT * FROM veterinario WHERE correo=:correo AND contrasenia=:password');
            $sqlVeterinario->bindParam(':correo', $correo);
            $sqlVeterinario->bindParam(':password', $password);
            $sqlVeterinario->execute();
            $veterinario = $sqlVeterinario->fetch(PDO::FETCH_ASSOC);


            if ($usuario) {
                $_SESSION['usuario'] = $usuario['id'];
                header('Location:../views/home.php');
            } else if ($veterinario) {
                $_SESSION['veterinario'] = $veterinario['id'];
                header('Location:../../../veterinario/php/dashboard.php');
            } else {
                echo "<script>
        alert('Contraseña o usuario incorrecto :)')
        window.location.href = '../views/form_login.php'
        </script>";
            }
        }
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

    // Getter for mascotas
    public function getMascotas($conexionBD): array
    {
        $consulta = $conexionBD->prepare("SELECT * FROM `clientemascotas` INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id WHERE id_cliente = $this->id");
        $consulta->execute();
        $this->mascotas = $consulta->fetchAll();
        return $this->mascotas;
    }

    // Setter for mascotas
    public function setMascotas(array $mascotas): void
    {
        $this->mascotas = $mascotas;
    }
}
