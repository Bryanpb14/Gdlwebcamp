<section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, quasi. Accusantium, aspernatur. Accusamus voluptatibus odit tenetur id, enim saepe, ipsa quidem recusandae optio adipisci tempore qui magni voluptas consequatur dolorum.</p>
    </section>
    <!--seccion-->

        <?php 
        try{
            require_once('includes/funciones/bd_conexion.php');
            $sql = " SELECT * FROM invitados ";
            $resultado=$conn->query($sql);
        }catch(\Exception $e){
            $error = $e->getMessage();
        }       
        ?>
        
        <section class="invitados contenedor seccion">
            <h2>Invitados</h2>
            <ul class="lista-invitados clearfix">     
                <?php while($invitados = $resultado->fetch_assoc() ) { ?>      
                        <li>     
                            <div class="invitado">
                                <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                                    <img src="img/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado">
                                    <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?></p>
                                </a>
                            </div> 
                        </li>
                        <div style="display:none;">
                            <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
                                <h2><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?><h2>
                                <img src="img/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado">
                                <p><?php echo $invitados['descripcion'] ?></p>
                            </div>
                        </div>                               
                <?php } ?>
            </ul>
        </section>

        <?php 
            $conn->close();
        ?>  