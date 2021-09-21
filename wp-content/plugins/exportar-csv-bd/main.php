<!-- <form method='post'>
        <button type='submit' name='truncate_table'>Eliminar datos antiguos</button>
</form>
<p style="display: none; color: red" id='alerta_not_csv'><b>Ha ocurrido un error, puede que el archivo ingresado no sea .csv</b></p>
<p style="display: none; color: red" id='alerta_invalid_csv'><b>Ha ocurrido un error, asegúrese que el archivo ingresado es el correcto</b></p>
<p style="display: none; color: red" id='alerta_success'><b>Se han actualizado los días de vacaciones</b></p>
<p style="display: none; color: red" id='alerta'><b>El sistema ha detectado que no ha eliminado los datos antiguos,
por lo que se ha hecho automaticamente, por favor vuelva a cargar el archivo correspondiente y pulse 
el botón de importación
</b></p>

<form method='post' enctype='multipart/form-data'>
    <input type='file' name='import_file'>
    <button type='submit' name='csv_import_file'>Actualizar Datos</button>
</form> -->



<?php

global $wpdb;

// Import CSV
if(isset($_POST['csv_import_fileee'])){
    
    $is_table_empty = $wpdb->get_results( "SELECT COUNT(*) cuenta FROM ic_dias_vacaciones_disponibles");

    foreach($is_table_empty as $cuenta){
        $is_empty = $cuenta -> cuenta;
    }

    if($is_empty==0){

        // File extension
        $extension = pathinfo($_FILES['import_file']['name'], PATHINFO_EXTENSION);

        // If file extension is 'csv'
        if(!empty($_FILES['import_file']['name']) && $extension == 'csv'){
            
            // Open file in read mode
            $csvFile = fopen($_FILES['import_file']['tmp_name'], 'r');

            $csvData = fgetcsv($csvFile,1000, ";");
            $csvData = array_map("utf8_encode", $csvData);
            $dataLen = count($csvData);
            if($dataLen !==2){
                $insert_into_table = false;
                echo "<script>document.getElementById('alerta_invalid_csv').style.display='block'</script>";
            }else{
            // Read file
                while(($csvData = fgetcsv($csvFile,1000, ";")) !== FALSE){
                $csvData = array_map("utf8_encode", $csvData);

                // Row column length
                /*       $dataLen = count($csvData);
                echo "Data Lenght-> ".$dataLen;
                echo "Data [0]-> ".$csvData[0];
            echo "Data [1]-> ".$csvData[1]; */
            
                    
            // Assign value to variables
            //if($csvData[0]===true and $csvData[1]===true){
                $codigo_empleado = trim($csvData[0]);
                $dias_vacaciones = trim($csvData[1]);
            //}
            
            // Check if variable is empty or not
            if(!empty($codigo_empleado) and !empty($dias_vacaciones)) {
                
                // Insert Record
                $insert_into_table = $wpdb->insert('ic_dias_vacaciones_disponibles', 
                array(
                    'codigo_empleado' =>$codigo_empleado,
                    'dias_disponibles' =>$dias_vacaciones,
                ));
            }
            }
        }
        
            if($insert_into_table == true){
                
                echo "<script>alert('Se han actualizado los datos correctamente')</script>";
                echo "<script>document.getElementById('alerta_success').style.display='block'</script>";
            }else{
                echo "<script>alert('Ha ocurrido un error. 
                Puede deberse a:
                - El archivo no es de tipo .csv
                - Error de comunicación con el servidor
                - EL número de columnas no coincide con la base de datos
                - No ha realizado antes el vaciado de la tabla')</script>";
                }
        }else{
              echo "<script>document.getElementById('alerta_not_csv').style.display='block'</script>";
        }

    
    }else{
            echo "<script>document.getElementById('alerta').style.display='block'</script>";
        }
        
}


if(isset($_POST['truncate_table'])){
    $vaciado = true;
    global $wpdb;
    $truncate_table = $wpdb->query('TRUNCATE TABLE ic_dias_vacaciones_disponibles');

    if($truncate_table){
        echo "<script>alert('Se ha vaciado la tabla correctamente')</script>";
    }//else{
     // echo "<script>alert('Ha ocurrido un error. Intentelo de nuevo'</script>";
    //}

    }


?>