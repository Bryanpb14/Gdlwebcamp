<?php

include_once 'funciones/bd_conexion.php';


    $titulo = $_POST['titulo_evento'];
    $categoria_id = $_POST['categoria_evento'];
    $invitado_id = $_POST['invitado'];
    

    //obtener la fechas
    $fecha = $_POST['fecha_evento'];
    $fecha_formateada = date('Y-m-d', strtotime($fecha));

    //hora
    $hora = $_POST['hora_evento'];
    $hora_formateada = date('H:i', strtotime($hora));

    $id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){ 

    try{
        $stmt = $conn->prepare('INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?, ?, ?, ?, ? ) ')
        $stmt->bind_param('sss', $titulo, $fecha_formateada, $hora, $categoria_id, $invitado_id);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array (
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
            );
    }else{
        $respuesta = array(
            'respuesta' => 'error'
        );
    }
        $stmt->close();
        $conn->close();
    }catch(Exception $e){
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));

}
if($_POST['registro'] == 'actualizar'){
 
    
    try{
        $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE evento_id = ?');
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_formateada, $hora, $categoria_id, $invitado_id, $id_registro);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_insertado
            );

        } else {
            $respuesta = array(
                'respuesta' => 'error'
            )
        }

        
        $stmt->close();
        $stmt->close();
    }catch (Exception $e){
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );

    }
    die (json_encode($respuesta));
}

if($_POST['registro'] == 'eliminar'){

    $id_borrar = $_POST['id'];

    try{
        $stmt = $conn->prepare('DELETE FROM eventos WHERE evento_id = ?');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
            
        }else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    }catch(Exception $e){
        $respuesta = array (
            'respuesta' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));

}
