<div class="container-form-vacaciones">

    <form method="POST">
        <select id="tipo_solicitud" name="tipo_solicitud" required="">
            <option disabled="" selected="" value="">--Seleccione una opción--</option>
            <option value="1">SOLICITUD DE PERIODO DE VACACIONES VENCIDAS CON PAGO DE BONO VACACIONAL</option>
            <option value="2">SOLICITUD DE DIAS VACACIONES VENCIDAS NO DISFRUTADAS SIN PAGO DE BONO VACACIONAL</option>
        </select>
        <button name="buscar_tipo_solicitud">Aplicar</button>

    </form>

    <form method="POST">
        <button class="button button-primary" type="submit" name="generate_vacaciones_pdf" value="generate" id="btn">Descargar 
           planilla en blanco</button>
    </form>

    <form method="POST">

        <div id="con_bono" style="display:none">
                  <h3 style="text-align:center; margin-bottom: 3rem;">SOLICITUD DE PERIODO DE VACACIONES VENCIDAS CON PAGO DE BONO VACACIONAL</h3>
                  <h4 class="titulo-bono-vacacional-periodo">Bono vacacional periodo </h4>
            <div class="form-group-container-uno">
        
                <div class="form-group">
                    
                    
                    <label for="">Dia: </label>
                    <select id="fechas" name="dia_uno_bono" required="">
                    <option disabled="" selected="" value="">--Seleccione un Día--</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option> 
                            <option value="12">12</option> 
                            <option value="13">13</option> 
                            <option value="14">14</option> 
                            <option value="15">15</option> 
                            <option value="16">16</option>
                            <option value="17">17</option> 
                            <option value="18">18</option> 
                            <option value="19">19</option> 
                            <option value="20">20</option> 
                            <option value="21">21</option> 
                            <option value="22">22</option> 
                            <option value="23">23</option> 
                            <option value="24">24</option> 
                            <option value="25">25</option> 
                            <option value="26">26</option> 
                            <option value="27">27</option> 
                            <option value="28">28</option> 
                            <option value="29">29</option> 
                            <option value="30">30</option> 
                            <option value="31">31</option> 
        
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Mes: </label>
                    <select id="fechas" name="mes_uno_bono">
                    <option disabled="" selected="" value="" required="">--Seleccione un Mes--</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option> 
                            <option value="11">Noviembre</option> 
                            <option value="12">Diciembre</option> 
                        </select>
                </div>
            

                <div class="form-group">
                    <label for="">Año: </label>
                    <select id="years" name="ano_uno_bono" required="">
                        <option disabled="" selected="" value="">--Seleccione un Año--</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>

                    </select>
                </div>  

            </div>


            <br>

            <br>
            <h3 style="text-align:center">Al: </h3>

      <div class="form-group-container-uno">
        <div class="form-group">
            <label for="">Dia: </label>
            <select id="fechas" name="dia_dos_bono" required="">
              <option disabled="" selected="" value="">--Seleccione un Día--</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">04</option>
                     <option value="5">05</option>
                     <option value="6">06</option>
                     <option value="7">07</option>
                     <option value="8">08</option>
                     <option value="9">09</option> 
                     <option value="10">10</option> 
                     <option value="11">11</option> 
                     <option value="12">12</option> 
                     <option value="13">13</option> 
                     <option value="14">14</option> 
                     <option value="15">15</option> 
                     <option value="16">16</option>
                     <option value="17">17</option> 
                     <option value="18">18</option> 
                     <option value="19">19</option> 
                     <option value="20">20</option> 
                     <option value="21">21</option> 
                     <option value="22">22</option> 
                     <option value="23">23</option> 
                     <option value="24">24</option> 
                     <option value="25">25</option> 
                     <option value="26">26</option> 
                     <option value="27">27</option> 
                     <option value="28">28</option> 
                     <option value="29">29</option> 
                     <option value="30">30</option> 
                     <option value="31">31</option> 
 
              </select>
        </div>
            <div class="form-group">
                <label for="">Mes: </label>
                <select id="fechas" name="mes_dos_bono">
                <option disabled="" selected="" value="" required="">--Seleccione un Mes--</option>
                     <option value="1">Enero</option>
                     <option value="2">Febrero</option>
                     <option value="3">Marzo</option>
                     <option value="4">Abril</option>
                     <option value="5">Mayo</option>
                     <option value="6">Junio</option>
                     <option value="7">Julio</option>
                     <option value="8">Agosto</option>
                     <option value="9">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
                </select>
            </div>

            <div class="form-group">
                <label for="">Año: </label>
                <select id="years" name="ano_dos_bono" required="">
                    <option disabled="" selected="" value="">--Seleccione un Año--</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>

                </select>
            </div>  
    
       </div>

        <div class="form-group-bono-dias-a-disfrutar">
            <label for="years">Cantidad de días hábiles a disfrutar: </label>
            <input type="number" name="dias_a_disfrutar" style="width: 50px" required="">
        </div>  
    <h4 style="text-align:center">Fecha de inicio del período de vacaciones a disfrutar: </h4>
      <div class="form-group-container-uno">
        <div class="form-group">
            
            <label for="">Dia: </label>
            <select id="fechas" name="dia_uno_fecha_inicio" required="">
                    <option disabled="" selected="" value="">--Seleccione un Día--</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">04</option>
                     <option value="5">05</option>
                     <option value="6">06</option>
                     <option value="7">07</option>
                     <option value="8">08</option>
                     <option value="9">09</option> 
                     <option value="10">10</option> 
                     <option value="11">11</option> 
                     <option value="12">12</option> 
                     <option value="13">13</option> 
                     <option value="14">14</option> 
                     <option value="15">15</option> 
                     <option value="16">16</option>
                     <option value="17">17</option> 
                     <option value="18">18</option> 
                     <option value="19">19</option> 
                     <option value="20">20</option> 
                     <option value="21">21</option> 
                     <option value="22">22</option> 
                     <option value="23">23</option> 
                     <option value="24">24</option> 
                     <option value="25">25</option> 
                     <option value="26">26</option> 
                     <option value="27">27</option> 
                     <option value="28">28</option> 
                     <option value="29">29</option> 
                     <option value="30">30</option> 
                     <option value="31">31</option> 
 
            </select>
        </div>

        <div class="form-group">
            <label for="">Mes: </label>
            <select id="fechas" name="mes_uno_fecha_inicio" required="">
                    <option disabled="" selected="" value="">--Seleccione un Mes--</option>
                     <option value="1">Enero</option>
                     <option value="2">Febrero</option>
                     <option value="3">Marzo</option>
                     <option value="4">Abril</option>
                     <option value="5">Mayo</option>
                     <option value="6">Junio</option>
                     <option value="7">Julio</option>
                     <option value="8">Agosto</option>
                     <option value="9">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
            </select>
        </div>

          <div class="form-group">
                <label for="">Año: </label>
                <select id="years" name="ano_uno_fecha_inicio" required="">
                        <option disabled="" selected="" value="">--Seleccione un Año--</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>

                </select>
            </div>  
</div>

<br>
<br>
<br>

            <h4 style="text-align:center">Fecha de termino del período de vacaciones a disfrutar: </h4>

      <div class="form-group-container-uno">
        <div class="form-group">
            <label for="">Dia: </label>
            <select id="fechas" name="dia_uno_fecha_termino" required="">
              <option disabled="" selected="" value="">--Seleccione un Día--</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">04</option>
                     <option value="5">05</option>
                     <option value="6">06</option>
                     <option value="7">07</option>
                     <option value="8">08</option>
                     <option value="9">09</option> 
                     <option value="10">10</option> 
                     <option value="11">11</option> 
                     <option value="12">12</option> 
                     <option value="13">13</option> 
                     <option value="14">14</option> 
                     <option value="15">15</option> 
                     <option value="16">16</option>
                     <option value="17">17</option> 
                     <option value="18">18</option> 
                     <option value="19">19</option> 
                     <option value="20">20</option> 
                     <option value="21">21</option> 
                     <option value="22">22</option> 
                     <option value="23">23</option> 
                     <option value="24">24</option> 
                     <option value="25">25</option> 
                     <option value="26">26</option> 
                     <option value="27">27</option> 
                     <option value="28">28</option> 
                     <option value="29">29</option> 
                     <option value="30">30</option> 
                     <option value="31">31</option> 
 
            </select>
        </div>

        <div class="form-group">
            <label for="">Mes: </label>
            <select id="fechas" name="mes_uno_fecha_termino" required="">
               <option disabled="" selected="" value="">--Seleccione un Mes--</option>
                     <option value="1">Enero</option>
                     <option value="2">Febrero</option>
                     <option value="3">Marzo</option>
                     <option value="4">Abril</option>
                     <option value="5">Mayo</option>
                     <option value="6">Junio</option>
                     <option value="7">Julio</option>
                     <option value="8">Agosto</option>
                     <option value="9">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
                </select>
        </div>

        <div class="form-group">
            <label for="">Año: </label>
                <select id="years" name="ano_uno_fecha_termino" required="">
                    <option disabled="" selected="" value="">--Seleccione un Año--</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>

                </select>
        </div>

</div>
      <div class="form-group-bono-dias-totales-solicitados">
    <label for="dias_solicitados">Días Totales Solicitados: </label>
    <input type="number" name="dias_totales_solicitados" id="dias_solicitados" required="">
     </div>

<h3>Fecha de reintegro </h3>

        <div class="form-group-container-uno">
        <div class="form-group">
           
            
            <label for="">Dia: </label>
            <select id="fechas" name="dia_de_reintegro" required="">
                    <option disabled="" selected="" value="">--Seleccione un Día--</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">04</option>
                     <option value="5">05</option>
                     <option value="6">06</option>
                     <option value="7">07</option>
                     <option value="8">08</option>
                     <option value="9">09</option> 
                     <option value="10">10</option> 
                     <option value="11">11</option> 
                     <option value="12">12</option> 
                     <option value="13">13</option> 
                     <option value="14">14</option> 
                     <option value="15">15</option> 
                     <option value="16">16</option>
                     <option value="17">17</option> 
                     <option value="18">18</option> 
                     <option value="19">19</option> 
                     <option value="20">20</option> 
                     <option value="21">21</option> 
                     <option value="22">22</option> 
                     <option value="23">23</option> 
                     <option value="24">24</option> 
                     <option value="25">25</option> 
                     <option value="26">26</option> 
                     <option value="27">27</option> 
                     <option value="28">28</option> 
                     <option value="29">29</option> 
                     <option value="30">30</option> 
                     <option value="31">31</option> 
 
              </select>
        </div>

        <div class="form-group">
            <label for="">Mes: </label>
            <select id="fechas" name="mes_de_reintegro" required="">
                    <option disabled="" selected="" value="">--Seleccione un Mes--</option>
                     <option value="1">Enero</option>
                     <option value="2">Febrero</option>
                     <option value="3">Marzo</option>
                     <option value="4">Abril</option>
                     <option value="5">Mayo</option>
                     <option value="6">Junio</option>
                     <option value="7">Julio</option>
                     <option value="8">Agosto</option>
                     <option value="9">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
                </select>
        </div>

        <div class="form-group">
            <label for="">Año: </label>
            <select id="years" name="ano_de_reintegro" required="">
                <option disabled="" selected="" value="">--Seleccione un Año--</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>

            </select>
        </div>  
</div>
    <button class="button button-primary" type="submit" name="generate_vacaciones_pdf" value="generate" id="btn">Descargar 
           archivo para solicitud de vacaciones</button>


</div>

</form>

<form method="POST">
<div id="sin_bono" style="display:none">

<h3 style="text-align:center">SOLICITUD DE DIAS VACACIONES VENCIDAS NO DISFRUTADAS SIN PAGO DE BONO VACACIONAL</h3>

<div class="form-group-tres">
            <label for="years">Cantidad de días a disfrutar: </label>
            <input type="number" name="dias_a_disfrutar_sin_bono" style="width: 50px" required="">
        </div>  

<div class="form-group-tres">
            <label for="years">Correspondiente al período: </label>
               <select id="fechas" name="mes_correspondiente_al_periodo_sin_bono" required="">
               <option disabled="" selected="" value="">--Seleccione un Mes--</option>
                     <option value="01">Enero</option>
                     <option value="02">Febrero</option>
                     <option value="03">Marzo</option>
                     <option value="04">Abril</option>
                     <option value="05">Mayo</option>
                     <option value="06">Junio</option>
                     <option value="07">Julio</option>
                     <option value="08">Agosto</option>
                     <option value="09">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
                </select>
        </div>  

<div class="form-group-tres">
            <label for="">Correspondiente al período: </label>
              <select id="years" name="ano_correspondiente_al_periodo_sin_bono" required="">
                <option disabled="" selected="" value="">--Seleccione un Año--</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>

              </select>
          </div>
<h3 style="text-align:center">Fecha de inicio del período de vacaciones a disfrutar: </h3>
<div class="form-group-container-uno">
<div class="form-grou">
            
            <label for="">Dia: </label>
            <select id="fechas" name="dia_uno_fecha_inicio_sin_bono" required="">
              <option disabled="" selected="" value="">--Seleccione un Día--</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">04</option>
                     <option value="5">05</option>
                     <option value="6">06</option>
                     <option value="7">07</option>
                     <option value="8">08</option>
                     <option value="9">09</option> 
                     <option value="10">10</option> 
                     <option value="11">11</option> 
                     <option value="12">12</option> 
                     <option value="13">13</option> 
                     <option value="14">14</option> 
                     <option value="15">15</option> 
                     <option value="16">16</option>
                     <option value="17">17</option> 
                     <option value="18">18</option> 
                     <option value="19">19</option> 
                     <option value="20">20</option> 
                     <option value="21">21</option> 
                     <option value="22">22</option> 
                     <option value="23">23</option> 
                     <option value="24">24</option> 
                     <option value="25">25</option> 
                     <option value="26">26</option> 
                     <option value="27">27</option> 
                     <option value="28">28</option> 
                     <option value="29">29</option> 
                     <option value="30">30</option> 
                     <option value="31">31</option> 
 
              </select>
</div>

         <div class="form-group">
            <label for="">Mes: </label>
            <select id="fechas" name="mes_uno_fecha_inicio_sin_bono" required="">
               <option disabled="" selected="" value="">--Seleccione un Mes--</option>
                     <option value="1">Enero</option>
                     <option value="2">Febrero</option>
                     <option value="3">Marzo</option>
                     <option value="4">Abril</option>
                     <option value="5">Mayo</option>
                     <option value="6">Junio</option>
                     <option value="7">Julio</option>
                     <option value="8">Agosto</option>
                     <option value="9">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
                </select>
     </div>

          <div class="form-group">
            <label for="">Año: </label>
              <select id="years" name="ano_uno_fecha_inicio_sin_bono" required="">
                <option disabled="" selected="" value="">--Seleccione un Año--</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>

              </select>
          </div>  
</div>

            <h3 style="text-align:center">Fecha de termino del período de vacaciones a disfrutar: </h3>

<div class="form-group-container-uno">
         <div class="form-group">
            <label for="">Dia: </label>
            <select id="fechas" name="dia_dos_fecha_termino_sin_bono" required="">
              <option disabled="" selected="" value="">--Seleccione un Día--</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">04</option>
                     <option value="5">05</option>
                     <option value="6">06</option>
                     <option value="7">07</option>
                     <option value="8">08</option>
                     <option value="9">09</option> 
                     <option value="10">10</option> 
                     <option value="11">11</option> 
                     <option value="12">12</option> 
                     <option value="13">13</option> 
                     <option value="14">14</option> 
                     <option value="15">15</option> 
                     <option value="16">16</option>
                     <option value="17">17</option> 
                     <option value="18">18</option> 
                     <option value="19">19</option> 
                     <option value="20">20</option> 
                     <option value="21">21</option> 
                     <option value="22">22</option> 
                     <option value="23">23</option> 
                     <option value="24">24</option> 
                     <option value="25">25</option> 
                     <option value="26">26</option> 
                     <option value="27">27</option> 
                     <option value="28">28</option> 
                     <option value="29">29</option> 
                     <option value="30">30</option> 
                     <option value="31">31</option> 
 
              </select>
</div>
         <div class="form-group">
            <label for="">Mes: </label>
            <select id="fechas" name="mes_dos_fecha_termino_sin_bono" required="">
               <option disabled="" selected="" value="">--Seleccione un Mes--</option>
                     <option value="1">Enero</option>
                     <option value="2">Febrero</option>
                     <option value="3">Marzo</option>
                     <option value="4">Abril</option>
                     <option value="5">Mayo</option>
                     <option value="6">Junio</option>
                     <option value="7">Julio</option>
                     <option value="8">Agosto</option>
                     <option value="9">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
                </select>
     </div>

          <div class="form-group">
            <label for="">Año: </label>
              <select id="years" name="ano_dos_fecha_termino_sin_bono" required="">
                <option disabled="" selected="" value="">--Seleccione un Año--</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>

              </select>
          </div>
</div>

<div class="form-group-tres">
    <label for="dias_solicitados">Días Totales Solicitados: </label>
    <input type="number" name="dias_totales_solicitados_sin_bono" id="dias_solicitados" required="">
</div>

<h3 style="text-align:center">Fecha de reintegro </h3>
<div class="form-group-container-uno">
<div class="form-group">
           
            <label for="">Dia: </label>
            <select id="fechas" name="dia_de_reintegro_sin_bono" required="">
              <option disabled="" selected="" value="">--Seleccione un Día--</option>
                     <option value="1">01</option>
                     <option value="2">02</option>
                     <option value="3">03</option>
                     <option value="4">04</option>
                     <option value="5">05</option>
                     <option value="6">06</option>
                     <option value="7">07</option>
                     <option value="8">08</option>
                     <option value="9">09</option> 
                     <option value="10">10</option> 
                     <option value="11">11</option> 
                     <option value="12">12</option> 
                     <option value="13">13</option> 
                     <option value="14">14</option> 
                     <option value="15">15</option> 
                     <option value="16">16</option>
                     <option value="17">17</option> 
                     <option value="18">18</option> 
                     <option value="19">19</option> 
                     <option value="20">20</option> 
                     <option value="21">21</option> 
                     <option value="22">22</option> 
                     <option value="23">23</option> 
                     <option value="24">24</option> 
                     <option value="25">25</option> 
                     <option value="26">26</option> 
                     <option value="27">27</option> 
                     <option value="28">28</option> 
                     <option value="29">29</option> 
                     <option value="30">30</option> 
                     <option value="31">31</option> 
 
              </select>
</div>

         <div class="form-group">
            <label for="">Mes: </label>
            <select id="fechas" name="mes_de_reintegro_sin_bono" required="">
               <option disabled="" selected="" value="">--Seleccione un Mes--</option>
                     <option value="1">Enero</option>
                     <option value="2">Febrero</option>
                     <option value="3">Marzo</option>
                     <option value="4">Abril</option>
                     <option value="5">Mayo</option>
                     <option value="6">Junio</option>
                     <option value="7">Julio</option>
                     <option value="8">Agosto</option>
                     <option value="9">Septiembre</option>
                     <option value="10">Octubre</option> 
                     <option value="11">Noviembre</option> 
                     <option value="12">Diciembre</option> 
                </select>
     </div>

          <div class="form-group">
            <label for="">Año: </label>
              <select id="years" name="ano_de_reintegro_sin_bono" required="">
                <option disabled="" selected="" value="">--Seleccione un Año--</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>

              </select>
          </div>

    </div>
        <button class="button button-primary" type="submit" name="generate_vacaciones_pdf" value="generate" id="btn">Descargar 
           archivo para solicitud de vacaciones</button>
    
    

    </div></form>

</div>