<?php

class Mascota
{
    private $id;
    private $nombre;
    private $especie;
    private $raza;
    private $edad;
    private $genero;

    public static function operaciones($conexionBD, $id_cliente)
    {
        if ($_POST) {

            $accion = isset($_POST['accion']) ? $_POST['accion'] : '';

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $raza = isset($_POST['raza']) ? $_POST['raza'] : '';
            $especie = isset($_POST['especie']) ? $_POST['especie'] : '';
            $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
            $genero = isset($_POST['genero']) ? $_POST['genero'] : '';

            $id_mascota = isset($_POST['id_mascota']) ? $_POST['id_mascota'] : '';

            if ($accion) {
                switch ($accion) {
                    case 'agregar':
                        if ($_POST['nombre'] != '' || $_POST['raza'] != '' || $_POST['edad'] != '' || $_POST['genero'] != '' || $_POST['especie'] != '') {

                            $sql = "INSERT INTO mascota (id, nombre, especie, raza, edad, genero) VALUES (NULL, :nombre, :especie, :raza, :edad, :genero)";
                            $consulta = $conexionBD->prepare($sql);
                            $consulta->bindParam(':nombre', $nombre);
                            $consulta->bindParam(':especie', $especie);
                            $consulta->bindParam(':raza', $raza);
                            $consulta->bindParam(':edad', $edad);
                            $consulta->bindParam(':genero', $genero);
                            $consulta->execute();

                            $ultimo_id_mascota = $conexionBD->lastInsertId();

                            $sql2 = "INSERT INTO clientemascotas (id, id_mascota, id_cliente) VALUES(NULL, :id_mascota, :id_cliente)";
                            $consulta2 = $conexionBD->prepare($sql2);
                            $consulta2->bindParam(':id_mascota', $ultimo_id_mascota);
                            $consulta2->bindParam(':id_cliente', $id_cliente);
                            $consulta2->execute();

                            echo "<script>
                            alert('Mascota agregada :)')
                            window.location.href = 'mascota_vista.php'
                            </script>";

                            // header("Location: mascota_vista.php");
                        } else {
                            echo "Llena todo";
                        }
                        break;


                    case 'editar':

                        $sql = "UPDATE mascota SET nombre=:nombre, especie=:especie, raza=:raza, edad=:edad, genero=:genero  WHERE id =:id_mascota";
                        $consulta = $conexionBD->prepare($sql);
                        $consulta->bindParam(':id_mascota', $id_mascota);
                        $consulta->bindParam(':nombre', $nombre);
                        $consulta->bindParam(':especie', $especie);
                        $consulta->bindParam(':raza', $raza);
                        $consulta->bindParam(':edad', $edad);
                        $consulta->bindParam(':genero', $genero);
                        $consulta->execute();

                        echo "<script>
                            alert('Datos de mascota editados :)')
                            window.location.href = 'mascota_vista.php'
                            </script>";

                        // header("Location: mascota_vista.php");
                        // echo $sql;
                        break;

                    case 'eliminar':
                        $sql = "DELETE FROM mascota WHERE id=:id_mascota";
                        $consulta = $conexionBD->prepare($sql);
                        $consulta->bindParam(':id_mascota', $id_mascota);
                        $consulta->execute();

                        echo "<script>
                            alert('Mascota eliminada :)')
                            window.location.href = 'mascota_vista.php'
                            </script>";

                        // header("Location: mascota_vista.php");

                        break;

                        // case 'seleccionar':
                        //     $sql = "SELECT * FROM clientemascotas WHERE id_cliente=:id_cliente";
                        //     $consulta = $conexionBD->prepare($sql);
                        //     $consulta->bindParam(':id_cliente', $id_cliente);
                        //     $consulta->execute();
                        //     $mascota=$consulta->fetch(PDO::FETCH_ASSOC);

                        //     $nombre_alumno=$alumno['nombre'];
                        //     $apellidos_alumno=$alumno['apellidos'];

                        //     $sql = "SELECT cursos.id FROM alumnos_cursos INNER JOIN cursos ON cursos.id = alumnos_cursos.id_curso WHERE alumnos_cursos.id_alumno=:id_alumno";
                        //     $consulta=$conexionBD->prepare($sql);
                        //     $consulta->bindParam(':id_alumno', $id);
                        //     $consulta->execute();
                        //     $cursosAlumno=$consulta->fetchAll(PDO::FETCH_ASSOC);

                        //     print_r($cursosAlumno);

                        //     foreach ($cursosAlumno as $curso) {
                        //         $arregloCursos[]=$curso['id'];
                        //     }

                        //     break;
                }
            }
        }
    }
    public static function agregar_mascota_cliente($conexionBD, $mascota, $cliente)
    {
        $id_cliente = $cliente->getId();
        $id_mascota = $mascota->getId();

        // Verificar si ya existe la relación
        $sql_check = "SELECT COUNT(*) FROM clientemascotas WHERE id_mascota = :id_mascota AND id_cliente = :id_cliente";
        $consulta_check = $conexionBD->prepare($sql_check);
        $consulta_check->bindParam(':id_mascota', $id_mascota);
        $consulta_check->bindParam(':id_cliente', $id_cliente);
        $consulta_check->execute();

        if ($consulta_check->fetchColumn() > 0) {
            echo "<script>
            alert('Esta mascota ya está asociada a este cliente')
            window.location.pathname = '/user/php/views/mascota_vista.php'
            </script>";
            return;
        }

        $sql = "INSERT INTO clientemascotas (id, id_mascota, id_cliente) VALUES(NULL, :id_mascota, :id_cliente)";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':id_mascota', $id_mascota);
        $consulta->bindParam(':id_cliente', $id_cliente);
        $consulta->execute();

        echo "<script>
        alert('Mascota agregada al cliente :)')
        window.location.pathname = '/user/php/views/mascota_vista.php'
        </script>";
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEspecie()
    {
        return $this->especie;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEspecie($especie)
    {
        $this->especie = $especie;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
}
