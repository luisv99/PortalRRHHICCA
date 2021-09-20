

<div class="agregar_trabajador">
    <form method= "POST">
        <label for="status_trabajador">Estatus:</label>
        <select id="status_trabajador" name="status_trabajador">
            <option value="ACTIVO">ACTIVO</option>
            <option value="INACTIVO">INACTIVO</option>
        </select>
 
        <div class="nombre_nacionalidad_cedula" id="div_form_agregar_trabajador">
            <label for="codigo_trabajador">Codigo:</label>
            <input type="number" name="nombre_trabajador" id="codigo_trabajador" maxlength="4" require>
            
            <label for="nacionalidad_trabajador">Nacionalidad:</label>
            <input type="text" name="nacionalidad_trabajador" id="nacionalidad_trabajador" require>
            
            <label for="cedula_trabajador">Cédula:</label>
            <input type="number" name="cedula_trabajador" id="cedula_trabajador" maxlength="9" require>
        </div>

        <div class="rif_primer_nombre_segundo_nombre" id="div_form_agregar_trabajador">
            <label for="rif_trabajador">RIF:</label>
            <input type="text" name="rif_trabajador" id="rif_trabajador" require>
            
            <label for="primer_nombre_trabajador">Primer Nombre:</label>
            <input type="text" name="primer_nombre_trabajador" id="primer_nombre_trabajador" require>
            
            <label for="segundo_nombre_trabajador">Segundo Nombre:</label>
            <input type="text" name="segundo_nombre_trabajador" id="segundo_nombre_trabajador">
        </div>

        <div class="primer_apellido_segundo_apellido_direccion_uno" id="div_form_agregar_trabajador">
            <label for="primer_apellido_trabajador">Primer Apellido:</label>
            <input type="text" name="primer_apellido_trabajador" id="primer_apellido_trabajador" require>
            
            <label for="segundo_apellido_trabajador">Segundo Apellido:</label>
            <input type="text" name="segundo_apellido_trabajador" id="segundo_apellido_trabajador" require>
            
            <label for="direccion_uno_trabajador">Dirección 1:</label>
            <input type="text" name="direccion_uno_trabajador" id="direccion_uno_trabajador" require>
        </div>

        <div class="direccion_dos_ciudad_residencia_estado_residencia" id="div_form_agregar_trabajador">
            <label for="direccion_dos_trabajador">Dirección 2:</label>
            <input type="text" name="direccion_dos_trabajador" id="direccion_dos_trabajador">

            <label for="ciudad_residencia_trabajador">Ciudad de Residencia:</label>
            <input type="text" name="ciudad_residencia_trabajador" id="ciudad_residencia_trabajador" require>
            
            <label for="estado_residencia_trabajador">Estado de Residencia:</label>
            <input type="text" name="estado_residencia_trabajador" id="estado_residencia_trabajador" require>
        </div>

        <div class="pais_residencia_telefono_habitacion_sexo" id="div_form_agregar_trabajador">
            <label for="pais_residencia_trabajador">País de Residencia:</label>
            <input type="text" name="pais_residencia_trabajador" id="pais_residencia_trabajador" require>

            <label for="telefono_habitacion_trabajador">Teléfono de Habitación:</label>
            <input type="number" name="telefono_habitacion_trabajador" id="telefono_habitacion_trabajador" maxlenght="11" require>
            
            <label for="sexo_trabajador">Sexo:</label>
            <select type="number" name="sexo_trabajador" id="sexo_trabajador" require>
                <option disabled="" selected="" value="">--Seleccione una opción--</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
            </select>
        </div>  

        <div class="estado_civil_fecha_nacimiento_sueldo">
            <label for="estado_civil_trabajador">Sexo:</label>
            <select type="number" name="estado_civil_trabajador" id="estado_civil_trabajador" require>
                <option disabled="" selected="" value="">--Seleccione una opción--</option>
                <option value="SOLTERO">MASCULINO</option>
                <option value="CASADO">FEMENINO</option>
                <option value="CONCUBINO">MASCULINO</option>
                <option value="DIVORCIADO">FEMENINO</option>
            </select>
        </div>
        
        
    </form>
</div>