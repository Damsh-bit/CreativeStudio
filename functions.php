<?php
function getPublicaciones()
{
    include('./db.php');

    $sql = "SELECT * FROM publicacion";

    $resultado2 = mysqli_query($conexion, $sql);
    $resultado = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_array($resultado2);
    if (empty($row)) {
?>

        <h1>No hay publicaciones todavia.</h1>

        <?php
    } else {
        while ($row = mysqli_fetch_array($resultado)) {
            $titulo = $row['titulo'];
            $fecha = $row['fecha'];
            $id_publicacion = $row['id_publicacion'];
            $id_usuario = $row['id_usuario'];
            $sql2 = "SELECT * FROM usuarios where id_usuario='$id_usuario'";

            $sql3 = "SELECT * FROM comentarios where id_publicacion='$id_publicacion'";
            $resultado4 = mysqli_query($conexion, $sql3);


            $contador = 0;
            while ($row3 = mysqli_fetch_array($resultado4)) {
                $contador++;
            }
            $resultado3 = mysqli_query($conexion, $sql2);

            while ($row2 = mysqli_fetch_array($resultado3)) {
                $nombre = $row2['nombre'];
                $apellido = $row2['apellido'];
            };
        ?>
            <div class="publicacion__box">
                <a href="details.php?id_pub=<?php echo $id_publicacion ?>">
                    <h2><?php echo $nombre . " " . $apellido ?></h2>
                    <?php
                    if ($row['foto']) {
                    ?> <div class="foto_publicacion"><img src="data:image/jpg;base64, <?php echo base64_encode($row['foto']) ?>" /></div><?php } else {
                                                                                                                                            ?> <span></span><?php
                                                                                                                                                        }
                                                                                                                                                            ?><h3><?php echo $titulo; ?></h3>
                    <p><?php echo $contador . " " . 'comentarios'; ?></p>


                    <div class="buttons"><span><?php echo $fecha ?></span><a href="addFavorite.php?id=<?php echo $id_publicacion ?>&id_u=<?php echo $_SESSION['id_usuario'] ?>"><i class="uil uil-favorite"></i></a></div>
                </a>
            </div>
        <?php
        }
    }
}


function getPublicacionesFavoritas()
{
    include('./db.php');
    $id_usuario = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM favoritos where id_usuario ='$id_usuario'";

    $resultado = mysqli_query($conexion, $sql);
    $resultado22 = mysqli_query($conexion, $sql);

    if (empty($row = mysqli_fetch_array($resultado))) {
        ?>
        <div>
            <h1>No hay publicaciones favoritas todavia.</h1>
        </div>

        <?php
    } else {
        while ($row = mysqli_fetch_array($resultado22)) {
            $id_publicacion = $row['id_publicacion'];
            $sql2 = "SELECT * FROM publicacion where id_publicacion ='$id_publicacion'";
            $resultado2 = mysqli_query($conexion, $sql2);

            while ($row3 = mysqli_fetch_array($resultado2)) {
                $titulo = $row3['titulo'];
                $fecha = $row3['fecha'];
                $id_publicacion = $row3['id_publicacion'];
                $id_usuario = $row3['id_usuario'];
                $img = $row3['foto'];

                $sql2 = "SELECT * FROM usuarios where id_usuario='$id_usuario'";

                $sql3 = "SELECT * FROM comentarios where id_publicacion='$id_publicacion'";
                $resultado4 = mysqli_query($conexion, $sql3);


                $contador = 0;
                while ($row3 = mysqli_fetch_array($resultado4)) {
                    $contador++;
                }
                $resultado3 = mysqli_query($conexion, $sql2);

                while ($row2 = mysqli_fetch_array($resultado3)) {
                    $nombre = $row2['nombre'];
                    $apellido = $row2['apellido'];
                };
        ?>
                <div class="publicacion__box">
                    <a href="details.php?id_pub=<?php echo $id_publicacion ?>">
                        <h2><?php echo $nombre . " " . $apellido ?></h2>
                        <?php
                        if ($img != null) {
                        ?> <div class="foto_publicacion"><img src="data:image/jpg;base64, <?php echo base64_encode($img) ?>" /></div><?php } else {
                                                                                                                                        ?> <span></span><?php
                                                                                                                                                }
                                                                                                                                                    ?><h3><?php echo $titulo; ?></h3>
                        <p><?php echo $contador . " " . 'comentarios'; ?></p>
                        <a href="removeFavorite.php?id_publicacion=<?php echo $id_publicacion ?>"><i class="uil uil-multiply"></i></a>


                    </a>
                </div>
        <?php
            }
        }
    }
}

function getPublicacionDetails($id_publicacion)
{
    include('./db.php');

    //traigo publicaciones
    $sql = "SELECT * FROM publicacion where id_publicacion = '$id_publicacion'";

    $resultado = mysqli_query($conexion, $sql);

    while ($row = mysqli_fetch_array($resultado)) {
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
        $fecha = $row['fecha'];
        $id_publicacion = $row['id_publicacion'];
        $id_usuario = $row['id_usuario'];
        $img = $row['foto'];


        //traigo datos de usuarios 
        $sql2 = "SELECT * FROM usuarios where id_usuario='$id_usuario'";
        $resultado2 = mysqli_query($conexion, $sql2);
        while ($row2 = mysqli_fetch_array($resultado2)) {
            $nombre = $row2['nombre'];
            $apellido = $row2['apellido'];
        };


        ?>
        <div class="publicacion-y-comments">
            <div class="publicacion__box">
                <h2><?php echo $nombre . " " . $apellido ?></h2>
                <?php
                if ($img != null) {
                ?> <div class="foto_publicacion"><img src="data:image/jpg;base64, <?php echo base64_encode($img) ?>" /></div><?php } else {
                                                                                                                                ?> <span></span><?php
                                                                                                                                            }
                                                                                                                                                ?>
                <p><?php echo $descripcion ?></p>
                <h3><?php echo $titulo; ?></h3>

            </div>
            <div class="publicacion__comments">
                <?php
                //traigo comentarios
                $sql3 = "SELECT * FROM comentarios where id_publicacion ='$id_publicacion'";
                $resultado3 = mysqli_query($conexion, $sql3);
                $resultado33 = mysqli_query($conexion, $sql3);
                $row3 = mysqli_fetch_array($resultado33);
                if (empty($row3)) {
                ?><h1>Todavia no hay comentarios</h1>
                    <?php
                } else {
                    while ($row3 = mysqli_fetch_array($resultado3)) {

                        $id_usuario = $row3['id_usuario'];
                        $comentario = $row3['comentario'];

                        $sql4 = "SELECT * FROM usuarios where id_usuario='$id_usuario'";
                        $resultado4 = mysqli_query($conexion, $sql4);
                        while ($row4 = mysqli_fetch_array($resultado4)) {
                            $nombre = $row4['nombre'];
                            $apellido = $row4['apellido'];
                        };
                    ?>
                        <div class="comment_box">
                            <h3><?php echo $nombre . " " . $apellido ?></h3>
                            <span><?php echo $comentario ?></span>
                        </div><?php
                            };
                        } ?>
                <form class="form_comment" action="sendComment.php" method="POST">
                    <textarea placeholder="comenta algo..." required name="comment" id="comment" cols="60" rows="5"></textarea>
                    <input required type="hidden" name="id_p" id="id_p" value="<?php echo $id_publicacion ?>">
                    <input required type="submit" value="enviar">
                </form>
            </div>
        </div>
<?php
    }
}
