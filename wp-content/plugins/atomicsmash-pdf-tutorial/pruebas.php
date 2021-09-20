<form method = "POST">
    <label for = "codigo_editar_user">Codigo del Trabajador:</label>
    <input type = "number" name="codigo_editar_user" id="codigo_editar_user">
    <button type="submit" name="search_user_to_edit">Buscar Usuario</button>
</form>

<?php

if(isset($_POST['search_user_to_edit'])){

    $codigo_editar_user = $_POST['codigo_editar_user'];

    $user_to_edit= $wpdb -> get_results( "SELECT * FROM ic_trabajadores 
    WHERE '$codigo_editar_user' = codigo_empleado;");

    foreach($user_to_edit as $query){ 
        $status = $query -> status;
        $codigo_empleado = $query->codigo_empleado;
        $e_nombre = $query->primer_nombre; 
        $e_s_nombre = $query->segundo_nombre; 
        $e_p_apellido = $query->primer_apellido; 
        $e_s_apellido = $query->segundo_apellido; 
        $e_cedula = $query->cedula; 
        $e_sueldo = $query->sueldo_diario;
        $e_fecha_ingreso = $query->fecha_ingreso; 
        $e_cargo = $query->cargo;
        $departamento = $query-> departamento;
        $e_rif = $query->rif;
        $nacionalidad = $query->nacionalidad;
        $direccion_1 = $query->direccion_1;
        $direccion_2 = $query->direccion_2;
        $ciudad_residencia = $query->ciudad_residencia;
        $edo_residencia = $query->edo_residencia;
        $pais_residencia = $query->pais_residencia; 
        $telf_hab = $query -> telf_hab;
        $sexo = $query -> sexo;
        $edo_civil = $query -> edo_civil ;
        $fecha_nacimiento = $query -> fecha_nacimiento;
        $codigo_dpto = $query -> codigo_dpto;
        $codigo_cargo = $query -> codigo_cargo;
        $email = $query -> email;
        $fecha_ingreso = $query -> fecha_ingreso;
    }

   if($user_to_edit == true){
    echo "<script>alert('Existe')</script>";
} else{
    "<script>alert('falso')</script>";
}
       
   echo '<div class="agregar_trabajador" style="display:block;">
    
        <form method= "POST">
            <label for="status_trabajador">Estatus:</label>
                <select id="status_trabajador" name="status_trabajador">
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                </select>

            <div class="nombre_nacionalidad_cedula" id="div_form_agregar_trabajador">
                <label for="codigo_trabajador">Código Empleado</label>
                <input type="text" name="codigo_trabajador_input" id="codigo_trabajador_input" maxlength="4" value="'.$codigo_empleado.'">

                <div>
                <label for="nacionalidad_trabajador">Nacionalidad:</label>
                <input type="text" name="nacionalidad_trabajador" id="nacionalidad_trabajador" required>
                </div>

                <label for="cedula_trabajador">Cédula:</label>
                <input type="number" name="cedula_trabajador" id="cedula_trabajador" maxlength="9" required>
            </div>

            <div class="rif_primer_nombre_segundo_nombre" id="div_form_agregar_trabajador">
                <label for="rif_trabajador">RIF:</label>
                <input type="text" name="rif_trabajador" id="rif_trabajador" required>
                
                <label for="primer_nombre_trabajador">Primer Nombre:</label>
                <input type="text" name="primer_nombre_trabajador" id="primer_nombre_trabajador" required>
                
                <label for="segundo_nombre_trabajador">Segundo Nombre:</label>
                <input type="text" name="segundo_nombre_trabajador" id="segundo_nombre_trabajador">
            </div>

            <div class="primer_apellido_segundo_apellido_direccion_uno" id="div_form_agregar_trabajador">
                <label for="primer_apellido_trabajador">Primer Apellido:</label>
                <input type="text" name="primer_apellido_trabajador" id="primer_apellido_trabajador" required>
                
                <label for="segundo_apellido_trabajador">Segundo Apellido:</label>
                <input type="text" name="segundo_apellido_trabajador" id="segundo_apellido_trabajador" required>
                
                <label for="direccion_uno_trabajador">Dirección 1:</label>
                <input type="text" name="direccion_uno_trabajador" id="direccion_uno_trabajador" required>
            </div>

            <div class="direccion_dos_ciudad_residencia_estado_residencia" id="div_form_agregar_trabajador">
                <label for="direccion_dos_trabajador">Dirección 2:</label>
                <input type="text" name="direccion_dos_trabajador" id="direccion_dos_trabajador">

                <label for="ciudad_residencia_trabajador">Ciudad de Residencia:</label>
                <input type="text" name="ciudad_residencia_trabajador" id="ciudad_residencia_trabajador" required>
                
                <label for="estado_residencia_trabajador">Estado de Residencia:</label>
                <input type="text" name="estado_residencia_trabajador" id="estado_residencia_trabajador" required>
            </div>

            <div class="pais_residencia_telefono_habitacion_sexo" id="div_form_agregar_trabajador">
                <label for="pais_residencia_trabajador">País de Residencia:</label>
                <input type="text" name="pais_residencia_trabajador" id="pais_residencia_trabajador" required>

                <label for="telefono_habitacion_trabajador">Teléfono de Habitación:</label>
                <input type="text" name="telefono_habitacion_trabajador" id="telefono_habitacion_trabajador" maxlenght="11" required>
                
    <div>
                <label for="sexo_trabajador">Sexo:</label>
                <select name="sexo_trabajador" id="sexo_trabajador" required>
                    <option disabled="" selected="" value="">--Seleccione una opción--</option>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMENINO">FEMENINO</option>
                </select>
    </div>
            </div>  

            <div class="estado_civil_fecha_nacimiento_sueldo_trabajador">
                <label for="estado_civil_trabajador">Estado Civil:</label>
                <select name="estado_civil_trabajador" id="estado_civil_trabajador" required>
                    <option disabled="" selected="" value="">--Seleccione una opción--</option>
                    <option value="SOLTERO">SOLTERO</option>
                    <option value="CASADO">CASADO</option>
                    <option value="CONCUBINO">CONCUBINO</option>
                    <option value="DIVORCIADO">DIVORCIADO</option>
                </select>
    <div>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento_input" required>
    </div>

    <div>
                <label for="sueldo_trabajador">Sueldo:</label>
                <input type="text" name="sueldo_trabajador" id="sueldo_trabajador_input" min="0" required>
            </div>
    </div>

            <div class="codigo_dpto_departamento_codigo_cargo">
                <label for="codigo_dpto">Codigo del Departamento:</label>
                <input type="text" name="codigo_dpto" id="codigo_dpto" min="0" required>

    <div>
                <label for="departamento">Departamento:</label>
                <select name="departamento_trabajador" id="departamento_input" required>
                    <option disabled="" selected="" value="">--Seleccione un Departamento--</option>
                    <option value="ADMINISTRACION Y FINANZAS">ADMINISTRACION Y FINANZAS</option>
                    <option value="ALMACEN">ALMACEN</option>
                    <option value="ASEGUR. CALIDAD COSMETICOS">ASEGUR. CALIDAD COSMETICOS</option>
                    <option value="ASEGUR. CALIDAD FLOW PACK">ASEGUR. CALIDAD FLOW PACK</option>
                    <option value="ASEGUR. CALIDAD PROCT FEMENINA">ASEGUR. CALIDAD PROCT FEMENINA</option>
                    <option value="ASEGUR. CALIDAD PROCT INFANTIL">ASEGUR. CALIDAD PROCT INFANTIL</option>
                    <option value="ASEGUR. CALIDAD PROCT. ADULTO">ASEGUR. CALIDAD PROCT. ADULTO</option>
                    <option value="CADENA DE SUMINISTRO">CADENA DE SUMINISTRO</option>
                    <option value="COMERCIALIZACION (VENTAS)">COMERCIALIZACION (VENTAS)</option>
                    <option value="GERENCIA GENERAL">GERENCIA GENERAL</option>
                    <option value="GERENCIA GENERAL (PAT) ">GERENCIA GENERAL (PAT) </option>
                    <option value="GERENCIA GENERAL (SSL) ">GERENCIA GENERAL (SSL) </option>
                    <option value="INGENIERIA - MANTENIMIENTO">INGENIERIA - MANTENIMIENTO</option>
                    <option value="LOGISTICA Y DISTRIBUCION">LOGISTICA Y DISTRIBUCION</option>
                    <option value="MERCADEO TRADE  WIPES">MERCADEO TRADE  WIPES</option>
                    <option value="PRODUCCION COSMETICOS">PRODUCCION COSMETICOS</option>
                    <option value="PRODUCCION PROCT ADULTO">PRODUCCION PROCT ADULTO</option>
                    <option value="PRODUCCION PROCT FEMENINA">PRODUCCION PROCT FEMENINA</option>
                    <option value="PRODUCCION PROCT INFANTIL">PRODUCCION PROCT INFANTIL</option>
                    <option value="SEGURIDAD FISICA (CTO FABRIL)">SEGURIDAD FISICA (CTO FABRIL)</option>
                    <option value="SEGURIDAD Y SALUD E/E TRABAJO">SEGURIDAD Y SALUD E/E TRABAJO</option>
                    <option value="WIPES FLOW PACK">WIPES FLOW PACK</option>
                </select>
    </div>

    <div>
                <label for="codigo_cargo">Codigo Cargo:</label>
                <input type="text" name="codigo_cargo" id="codigo_cargo" maxlenght="5" min="0" required>
    </div>        
    <div>

            <div class="cargo_trabajador_email_trabajador_fecha_ingreso_trabajador">
                <label for="cargo_trabajador">Cargo:</label>
                <input type="text" name="cargo_trabajador" id="cargo_trabajador" required>
                
                <label for="email_trabajador">Correo Electrónico:</label>
                <input type="text" name="email_trabajador" id="email_trabajador" required>
            
                <label for="fecha_ingreso_trabajador">Fecha Ingreso:</label>
                <input type="date" name="fecha_ingreso_trabajador" id="fecha_ingreso_trabajador" required>

            </div>

            <button type="submit" name="add_new_employee">Agregar Trabajador</button>
        </form>
    </div>';

}