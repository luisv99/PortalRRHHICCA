<form method="POST">
    <input type="number" name="codigo_prestaciones_sociales" placeholder="codigo del trabajador">
    <button type="submit" name="search_prestaciones">Buscar</button>
</form>

<?php
global $wpdb;
$result = $wpdb->get_results( "SELECT * FROM ic_prestaciones_sociales");

echo "<div class='table_container' >
		<table id = 'tabla_uno' style='width: 50vw; '>
 		<tr>
				<th style='padding-left:10px'>ID</th>
				 <th>Codigo del Trabajador</th>
				 <th >Solicitante</th>
                                 <th>Monto Solicitado</th>
                                 <th>Motivo</th>
                                 <th>Modalidad</th>
                                 <th>Fecha Emision</th>
                                 <th>Status</th>
                    

			</tr>";

foreach ($result as $row) {
    $id = $row->ID; 
    $codigo_empleado = $row-> codigo_empleado;
    $nombres = $row->nombres; 
    $apellidos = $row->apellidos; 
    $monto_solicitado = $row->monto_solicitado;
    $motivo = $row-> motivo;
    $modalidad = $row-> modalidad; 
    $fecha_emision = $row-> fecha_emision;
    $status= $row-> status; 

echo "<tr>
			<td>" . $id . "</td>
			<td>". $codigo_empleado . "</td>
			<td >" . $nombres. ' '. $apellidos . "</td>
                        <td>" . $monto_solicitado . "</td>
                        <td>" . $motivo. "</td>
                        <td>" . $modalidad. "</td>
                         <td>" . $fecha_emision. "</td>
                         <td> " . $status. "</td>
                        

		</tr>";

}

echo "</table>	
</div>";



if(isset($_POST['search_prestaciones'])) {
    $codigo_prestaciones_sociales= $_POST['codigo_prestaciones_sociales'];
    global $wpdb;
    $query = $wpdb->get_results( "SELECT * FROM ic_prestaciones_sociales
    WHERE '$codigo_prestaciones_sociales' = codigo_empleado "); 
    
    if($query == true){
        echo "<div class='table_container'>
        <table style='width: 80vw; margin-left: -20rem'>
            <tr>
				<th style='padding-left:10px'>ID</th>
				 <th>Codigo del Trabajador</th>
				 <th >Solicitante</th>
                                 <th>Monto Solicitado</th>
                                 <th>Motivo</th>
                                 <th>Modalidad</th>
                                 <th>Fecha Emision</th>
                                 <th>Status</th>
			</tr>";

    foreach ($query as $row) {
    $id = $row->ID; 
    $codigo_empleado = $row-> codigo_empleado;
    $nombres = $row->nombres; 
    $apellidos = $row->apellidos; 
    $monto_solicitado = $row->monto_solicitado;
    $motivo = $row-> motivo;
    $modalidad = $row-> modalidad; 
    $fecha_emision = $row-> fecha_emision;
    $status= $row-> status; 
    echo "<tr>
			<td>" . $id . "</td>
			<td>". $codigo_empleado . "</td>
			<td >" . $nombres. ' '. $apellidos . "</td>
                        <td>" . $monto_solicitado . "</td>
                        <td>" . $motivo. "</td>
                        <td>" . $modalidad. "</td>
                         <td>" . $fecha_emision. "</td>
                         <td>" . $status. "</td>
		</tr>";
    }
    echo "</table>	
          </div>";
      
    echo "<script>alert('Resultados encontrados')</script>
          <script>tabla_uno = document.getElementById('tabla_uno')
          tabla_uno.style.display = 'none';</script>";
          

  }else{
        
      echo "<script>alert('NO Resultados encontrados')</script>";
    
    }

}
    

