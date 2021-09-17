<?php
/*
* Plugin Name: Atomic Smash FPDF Tutorial
* Description: A plugin created to demonstrate how to build a PDF document from WordPress posts.
* Version: 1.0
* Author: Anthony Hartnell
* Author URI: https://blog.atomicsmash.co.uk/blog/author/anthony/
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
}


include( 'fpdf183/fpdf.php');
include( 'atomicsmash-pdf-helper-functions.php');

/*  if( isset($_POST['send_mail'])){
    
    $para      = 'luisvar2703@gmail.com';
    $asunto    = 'prueba correo';
    $descripcion   = 'probando envio de correo';
    $de = 'From: luisvar2703@gmail.com';
    mail($para, $asunto, $descripcion, $de);
}  */

global $wpdb;
$current_user = wp_get_current_user();
$user_login = $current_user->user_login;

$result = $wpdb->get_results( "SELECT primer_nombre, segundo_nombre,primer_apellido,segundo_apellido,
cedula,sueldo_diario, fecha_ingreso, cargo 
FROM ic_trabajadores t
WHERE '$user_login' = t.codigo_empleado;");

foreach ($result as $row) {
    $e_primer_nombre = $row->primer_nombre; 
    $e_segundo_nombre = $row->segundo_nombre; 
    $e_primer_apellido = $row->primer_apellido; 
    $e_segundo_apellido = $row->segundo_apellido; 
    $e_cedula = $row->cedula; 
    $e_sueldo = $row->sueldo_diario;
    $e_fecha_ingreso = $row->fecha_ingreso; 
    $e_cargo = $row->cargo; 
} 

    

if( isset($_POST['generate_posts_pdf'])){
    $insert = $wpdb->insert(
        'ic_constancias_trabajo',
        array(
            'codigo_empleado'=>$user_login,
            'nombre'=>$e_primer_nombre.' '.$e_segundo_nombre,
            'apellido'=>$e_primer_apellido.' '.$e_segundo_apellido
        ));

    output_pdf($e_primer_nombre,$e_segundo_nombre,$e_primer_apellido,$e_segundo_apellido, $e_cedula, $e_fecha_ingreso, $e_sueldo, $e_cargo);

}



add_action( 'admin_menu', 'as_fpdf_create_admin_menu2' );
function as_fpdf_create_admin_menu2() {
    $hook = add_submenu_page(
        'tools.php',
        'Atomic Smash PDF Generator',
        'Atomic Smash PDF Generator',
        'manage_options',
        'as-fdpf-tutorial',
        'as_fpdf_create_admin_page2'
    );
}


/* ===============================OUTPUT DEL CONSTANCIA DE TRABAJO ========================================== */
/* ===============================OUTPUT DEL CONSTANCIA DE TRABAJO ========================================== */
/* ===============================OUTPUT DEL CONSTANCIA DE TRABAJO ========================================== */
/* ===============================OUTPUT DEL CONSTANCIA DE TRABAJO ========================================== */

    
function output_pdf($e_primer_nombre,$e_segundo_nombre,$e_primer_apellido,$e_segundo_apellido, $e_cedula, $e_fecha_ingreso, $e_sueldo, $e_cargo) {
        setlocale(LC_TIME, "spanish");
        $month = strftime("%B");
        //devuelve: noviembre
        $week_day = date("j");
        $year = date("Y");
        $ruta_imagen = 'http://localhost/Portal%20ICCA%20RRHH/wp-content/uploads/2021/08/logo-2.png';

        $pdf = new FPDF();
        $pdf->AddPage('portrait', 'letter');
        $pdf->SetFont( 'Arial', '', 12 );
        $pdf->Write(10, ' ');
        $pdf->Image($ruta_imagen);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(0,3, utf8_decode('A QUIEN PUEDA INTERESAR'),0,2,'C');
        $pdf->Ln();
        $pdf->Ln(); 
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(6,utf8_decode('Por medio de la presente se hace constar que el  Sr(a). ' . $e_primer_nombre. ' ' . $e_segundo_nombre . ' '.  $e_primer_apellido. ' '.$e_segundo_apellido. ', cedula de identidad No. '. $e_cedula. ' presta sus servicios en Industrias Corpañal, C.A desde '. $e_fecha_ingreso. ' , laborando como '. $e_cargo . ' , devegando un Sueldo Mensual de Bs. '. $e_sueldo. ' ')); 
        $pdf->Ln(); 
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(6, utf8_decode('Constancia que se expide, a peticion de la parte interesada, en la ciudad de Guarenas, a los '. $week_day. ' dias del mes de '. $month. ' de '.$year.' '));
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(0,3, utf8_decode('Atentamente'),0,2,'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(0,3, utf8_decode('Aura Cañizales Terán'),0,2,'C');
        $pdf->Ln();
        $pdf->Cell(0,3, utf8_decode('Coordinadora de Recursos Humanos'),0,2,'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont( 'Arial', '', 10 );
        $pdf->Write(10, ' ');
        $pdf->Ln();
        $pdf->Cell(0,3,utf8_decode('Urbanización Industrial Guayabal, Parcelas 12 y 13'),0,1,'C');
        $pdf->Ln();
        $pdf->Cell(0,3,'Municipio Plaza - Guarenas. Edo. Miranda, Venezuela',0,2,'C');
        $pdf->Ln();
        $pdf->Cell(0,3,'Telfs: (+58)(0212)8239105 - Fax: (+58)(0212)8239296',0,2,'C');
        $pdf->Ln();
        $pdf->Cell(0,3,'0212-351-21-10',0,2,'C');
        $pdf->Ln();
        $pdf->Cell(0,3,'www.Iccavenezuela.com',0,2,'C');
 
        $pdf->Output('D','constancia.pdf');
        exit;

        
}

/* ===============================FIN DEL CONSTANCIA DE TRABAJO ========================================== */
/* ===============================FIN DEL CONSTANCIA DE TRABAJO ========================================== */
/* ===============================FIN DEL CONSTANCIA DE TRABAJO ========================================== */
/* ===============================FIN DEL CONSTANCIA DE TRABAJO ========================================== */



function as_fpdf_create_admin_page2() {
?>
<div class="wrap">
    <h1>Solicitud de constancia de trabajo</h1>
    <p>Haga click en el boton para descargar el archivo </p>
    <p>Recuerde que una vez impreso el archivo, debera llevarlo al departamento de 
        Recursos Humanos para que sea colocado el sello humedo</p>
	<form method="post" id="as-fdpf-form">
        <button class="button button-primary" type="submit" name="generate_posts_pdf" value="generate">Descargar recibo</button>
    </form>
</div>
<?php
}


/* ===============================OUTPUT DEL RECIBO DE PAGO================================================ */
/* ===============================OUTPUT DEL RECIBO DE PAGO================================================ */
/* ===============================OUTPUT DEL RECIBO DE PAGO================================================ */
/* ===============================OUTPUT DEL RECIBO DE PAGO================================================ */

if (isset($_POST['generate_recibo_pago_pdf'])){

$month_select = $_POST['month'];
$year_select = $_POST['year'];

$current_user = wp_get_current_user();
$user_login = $current_user->user_login;

$asignaciones = $wpdb->get_results( "SELECT t.codigo_empleado codigo,primer_nombre,segundo_nombre,primer_apellido,
segundo_apellido,cedula,sueldo_diario,fecha_ingreso,cargo,departamento,concepto,fecha_movimiento,
funcion_concepto, cantidad, monto_calculado
FROM ic_recibos_de_pago rp
INNER JOIN ic_trabajadores t on t.codigo_empleado=rp.codigo_empleado
WHERE '$user_login' = t.codigo_empleado AND SUBSTRING(fecha_movimiento,4,2)='$month_select' AND 
funcion_concepto= 'ASIGNACION' ;");

$deducciones = $wpdb->get_results( "SELECT t.codigo_empleado codigo,primer_nombre,segundo_nombre,primer_apellido,
segundo_apellido,cedula,sueldo_diario,fecha_ingreso,cargo,departamento,concepto,fecha_movimiento,
funcion_concepto, cantidad, monto_calculado
FROM ic_recibos_de_pago rp
INNER JOIN ic_trabajadores t on t.codigo_empleado=rp.codigo_empleado
WHERE '$user_login' = t.codigo_empleado AND SUBSTRING(fecha_movimiento,4,2)='$month_select' AND 
funcion_concepto= 'DEDUCCION' ;");

    if ($asignaciones and $deducciones != true){
        echo '<script>alert("No se encontraron resultados")</script>';
    }else{

        foreach($asignaciones as $query){ //ASIGNACIONES Y DEDUCCIONES
            $codigo_empleado = $query->codigo;
            $e_nombre = $query->primer_nombre; 
            $e_s_nombre = $query->segundo_nombre; 
            $e_p_apellido = $query->primer_apellido; 
            $e_s_apellido = $query->segundo_apellido; 
            $e_cedula = $query->cedula; 
            $e_sueldo = $query->sueldo_diario;
            $e_fecha_ingreso = $query->fecha_ingreso; 
            $e_cargo = $query->cargo;
            $departamento = $query-> departamento;
            //$total_asignaciones = $total_asignaciones + $e_sueldo;
        }
        
        setlocale(LC_TIME, "spanish");
        $month = strftime("%B"); //devuelve: mes actual
        $week_day = date("j");
        $year = date("Y");
        $pdf = new FPDF();
        $pdf->AddPage('L', 'legal');
        $ruta_imagen = 'http://localhost/Portal%20ICCA%20RRHH/wp-content/uploads/2021/08/logo-2.png';
        //$pdf-> SetX(55);
        $pdf->Image($ruta_imagen,80,100,170,40);
        $pdf->SetFont( 'Arial', '', 20 );
        
        $pdf->Cell(0,3, utf8_decode('RECIBO DE PAGO'),0,2,'C'); //TITULO
        $pdf->Ln();
        
        $pdf->SetFont( 'Arial', '', 12 );
        //Cell(ANCHO, ALTO, TEXTO, BORDE (1,0), ln(0,1,2), ALIGN(L,C,R), FONDO(BOOLEAN))
    
        $pdf->SetTextColor(7,25,83); //COLOR AZUL PARA TEXTO DE CODIGO
        $pdf->SetFillColor(183,191,232); // FONDO GRIS PARA CODIGO
        $pdf->Cell(25,10,utf8_decode('Codigo'),1,2,'C',true); //TEXTO DE CODIGO
    
        $pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA TEXTO DEL NUMERO DE CODIGO 
        $pdf->Cell(25,10,utf8_decode($codigo_empleado),1,2,'C'); //TEXTO DEL NUMERO DE CODIGO
    
        $pdf-> Ln(2); //SALTO DE LINEA
        $pdf->SetTextColor(7,25,83); //COLOR AZUL PARA FECHA INGRESO
        $pdf->SetFillColor(183,191,232); // FONDO GRIS PARA FECHA INGRESO
        $pdf->Cell(45,10,utf8_decode('FECHA INGRESO '),1,2,'C',true); //TEXTO DE FECHA INGRESO
        
        $pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA FECHA INGRESO 
        $pdf->Cell(45,10,utf8_decode($e_fecha_ingreso),1,2,'C'); //TEXTO DEL FECHA INGRESO
    
        $pdf-> SetY(38);
        $pdf-> SetX(70);
        $pdf->SetTextColor(7,25,83); //COLOR AZUL PARA SUELDO
        $pdf->SetFillColor(183,191,232); // FONDO GRIS PARA SUELDO
        $pdf->Cell(45,10,utf8_decode('SUELDO MENSUAL'),1,2,'C',true); //TEXTO DE SUELDO
        
        //$pdf-> SetY(40);
        $pdf-> SetX(70);
        $pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA SUELDO 
        $pdf->Cell(45,10,utf8_decode($e_sueldo),1,2,'C'); //TEXTO DEL SUELDO
    
    
        $pdf->SetFont( 'Arial', '', 30 ); //FUENTE SOLO PARA TEXTO DE ABAJO
        //$pdf-> SetX(100);
        $pdf-> SetY(42);
        $pdf->SetTextColor(7,25,83); //COLOR NEGRO PARA SUELDO 
        $pdf->Cell(280,10,utf8_decode('INDUSTRIAS CORPANAL, C.A.'),0,1,'R', false); //TEXTO DEL SUELDO
    
        $pdf->SetFont( 'Arial', '', 12 ); //SE RETOMA ARIAL 12
    
        $pdf-> SetY(49);
        $pdf-> SetX(180);
        $pdf->SetTextColor(7,25,83); //COLOR NEGRO PARA SUELDO 
        $pdf->Cell(70,10,utf8_decode('RIF.: J-30070620-6'),0,1,'C', false); //TEXTO DEL SUELDO
        
        
        
    
        $pdf-> SetY(16);
        $pdf-> SetX(37);
        $pdf->SetTextColor(7,25,83); //COLOR AZUL PARA TEXTO DE NOMBRE
        $pdf->SetFillColor(183,191,232); // FONDO GRIS PARA NOMBRE
        $pdf->Cell(90,10,utf8_decode('NOMBRE '),1,0,'C',true); //TEXTO DE NOMBRE
        
        $pdf-> SetY(26);
        $pdf-> SetX(37);
        $pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA NOMBRE 
        $pdf->Cell(90,10,utf8_decode($e_nombre . ' '. $e_primer_apellido),1,2,'C'); //TEXTO DEL NOMBRE
    
    
    
    
    
        $pdf-> SetY(16);
        $pdf-> SetX(129);
        $pdf->SetTextColor(7,25,83); //COLOR AZUL PARA TEXTO DE DPTO
        $pdf->SetFillColor(183,191,232); // FONDO GRIS PARA DPTO
        $pdf->Cell(90,10,utf8_decode('DEPARTAMENTO '),1,0,'C',true); //TEXTO DE DPTO
    
        $pdf-> SetY(26);
        $pdf-> SetX(129 );
        $pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA DPTO 
        $pdf->Cell(90,10,utf8_decode($departamento),1,2,'C'); //TEXTO DEL DPTO
    
    
        $pdf-> SetY(16);
        $pdf-> SetX(222);
        $pdf->SetTextColor(7,25,83); //COLOR AZUL PARA PERIODO DE PAGO
        $pdf->SetFillColor(183,191,232); // FONDO GRIS PARA PERIODO DE PAGO
        $pdf->Cell(50,10,utf8_decode('PERIODO DE PAGO '),1,0,'C',true); //TEXTO DE PERIODO DE PAGO
    
        $pdf-> SetY(26);
        $pdf-> SetX(222);
        $pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA PERIODO DE PAGO 
        $pdf->Cell(50,10,utf8_decode($month_select . '/' . $year_select),1,2,'C'); //TEXTO DEL PERIODO DE PAGO
    
        $pdf-> SetY(16);
        $pdf-> SetX(275);
        $pdf->SetTextColor(7,25,83); //COLOR AZUL PARA CEDULA
        $pdf->SetFillColor(183,191,232); // FONDO GRIS PARA CEDULA
        $pdf->Cell(50,10,utf8_decode('CEDULA'),1,0,'C',true); //TEXTO DE CEDULA
    
        $pdf-> SetY(26);
        $pdf-> SetX(275);
        $pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA CEDULA 
        $pdf->Cell(50,10,utf8_decode($e_cedula),1,2,'C'); //TEXTO DEL CEDULA
    
        $pdf->Ln(30);
        
        
        /* $pdf->SetTextColor(7,25,83);
        $pdf->SetFillColor(157,176,232);
        $pdf->Cell(30,10, utf8_decode('CANTIDAD_A'),1,0,'C',1);
        $pdf->Cell(100,10, utf8_decode('DESCRIPCION_A'),1,0,'C',1);
        $pdf->Cell(35,10, utf8_decode('MONTO_A'),1,0,'C',1);
        $pdf->SetX($pdf->GetX()+5);
        $pdf->Cell(30,10, utf8_decode('CANTIDAD_D'),1,0,'C',1);
        $pdf->Cell(100,10, utf8_decode('DESCRIPCION_D'),1,0,'C',1);
        $pdf->Cell(35,10, utf8_decode('MONTO_D'),1,2,'C',1);
        $pdf->Ln(-10);
    
        
            /* $pdf->Ln();
            $pdf->SetFillColor(255,255,255);
            $pdf->Cell(30,10, utf8_decode($e_nombre . ' ' . $e_s_nombre),1,0,'C',1);
            $pdf->Cell(100,10, utf8_decode($e_p_apellido . ' '. $e_s_apellido),1,0,'C',1);
            $pdf->Cell(35,10, utf8_decode($e_sueldo),1,0,'C',1);
            $pdf->SetX($pdf->GetX()+5);
            $pdf->Cell(30,10, utf8_decode($e_nombre . ' ' . $e_s_nombre),1,0,'C',1);
            $pdf->Cell(100,10, utf8_decode($e_p_apellido . ' '. $e_s_apellido),1,0,'C',1);
            $pdf->Cell(35,10, utf8_decode($e_sueldo),1,0,'C',1); */
    
            /* }
            $pdf->Ln();
            $pdf->SetX($pdf->GetX()+90);
            $pdf->Cell(40,10, utf8_decode('Total Asignaciones'),1,0,'C',1);
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(35,10, utf8_decode($total_asignaciones),1,0,'C',1);
    
            $pdf->SetX($pdf->GetX()+95);
            $pdf->Cell(40,10, utf8_decode('Total_asignaciones'),1,0,'C',1);
            $pdf->SetX($pdf->GetX());
            $pdf->Cell(35,10, utf8_decode($total_asignaciones),1,0,'C',1); */
           
            $pdf->SetXY(10,42);//Esquina del inicio del margen de la cabecera dependencia // 
            
            $posicion_MulticeldaDX= $pdf->GetX();//Aquí inicializo donde va a comenzar el primer recuadro en la posición X
            $posicion_MulticeldaDY= $pdf->GetY();//Aquí inicializo donde va a comenzar el primer recuadro en la posición Y
            //Estas lineas comentadas las ocupo para verificar la posición, imprime la posición de cada eje//
            //$pdf->Cell(50,5,utf8_decode('Posicion X'  ." " .$posicion_MulticeldaDX),1,0,'C');
            //$pdf->Cell(50,5,utf8_decode('Posicion Y'  ." " .$posicion_MulticeldaDY),1,0,'C');
      //-------------------------------------------------------------------------//
//**************************************************************************//
          // Estas lineas son para asignar relleno, color del texto y color de lineas de contorno si mal no recuerdo //
            $pdf->SetFillColor(224,235,255); 
            $pdf->SetTextColor(0); 
            $pdf->SetDrawColor(224,235,255);  
            
//*************************************************************************//
            $pdf->SetFont( 'Arial', '', 12 );
            //Recuadro que bordea toda tabla
            $pdf->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY+20); //Aquí le indicas la posición de la esquina superior izquierda para el primer multicell que envuelve toda la tabla o recuadro
            $pdf->MultiCell(142,100,'',1);

            $pdf->SetTextColor(7,25,83);
            $pdf->SetDrawColor(16,22,114); 
            $pdf->SetFillColor(183,191,232);
            $pdf->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY+20); // Esto posiciona cada etiqueta en base a la posición de la esquina 
            $pdf->Cell(25,7,'CANTIDAD', 1,1,'C',true);

            $pdf->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY+20); // Esto posiciona cada etiqueta en base a la posición de la esquina 
            $pdf->Cell(25,100,'', 1,1,'C');

            $pdf->SetDrawColor(16,22,114);
            $pdf->SetFillColor(183,191,232);
            $pdf->SetXY($posicion_MulticeldaDX+25,$posicion_MulticeldaDY+20); // Esto posiciona cada etiqueta en base a la posición de la esquina 
            $pdf->Cell(85,7,'DESCRIPCION', 1,1,'C',true);

            $pdf->SetXY($posicion_MulticeldaDX+25,$posicion_MulticeldaDY+20); // Esto posiciona cada etiqueta en base a la posición de la esquina 
            $pdf->Cell(85,100,'', 1,1,'C');

            $pdf->SetDrawColor(16,22,114);
            $pdf->SetFillColor(183,191,232);
            $pdf->SetXY($posicion_MulticeldaDX+110,$posicion_MulticeldaDY+20); // Esto posiciona cada etiqueta en base a la posición de la esquina 
            $pdf->Cell(32,7,'MONTO', 1,1,'C',true);

            $pdf->SetXY($posicion_MulticeldaDX+110,$posicion_MulticeldaDY+20); // Esto posiciona cada etiqueta en base a la posición de la esquina 
            $pdf->Cell(32,100,'', 1,1,'C');

        $a_y1_position = 70;

        $pdf->SetTextColor(0,0,0);
        foreach($asignaciones as $query){ //CANTIDAD DE ASIGNACIONES
            $a_cantidad = $query->cantidad;

            $pdf->SetDrawColor(224,235,255); 
            $pdf->SetXY($posicion_MulticeldaDX-3,$a_y1_position);
            $pdf->Cell(30,5,$a_cantidad, 0,1,'C');
            $a_y1_position = $a_y1_position+6;
        }

        $a_y2_position = 70;
        foreach($asignaciones as $query){ //CANTIDAD DE ASIGNACIONES
            $a_concepto = $query->concepto; 

            $pdf->SetDrawColor(0,235,1);
            $pdf->SetXY($posicion_MulticeldaDX+25,$a_y2_position);
            $pdf->Cell(85,5,utf8_decode($a_concepto),0,1,'L',0);
            $a_y2_position = $a_y2_position+6;
        }

        $a_y3_position = 70;
        $total_asignaciones = 0;
        foreach($asignaciones as $query){ //CANTIDAD DE ASIGNACIONES
            $a_monto_calulcado = $query->monto_calculado; 
            $total_asignaciones = $total_asignaciones + $a_monto_calulcado;

            $pdf->SetDrawColor(0,135,255); 
            $pdf->SetXY($posicion_MulticeldaDX+105,$a_y3_position);
            $pdf->Cell(37,5,$a_monto_calulcado, 0,1,'R');
            $a_y3_position = $a_y3_position+6;
        }

            $pdf->SetFont( 'Arial', 'B', 14 );
            $pdf->SetDrawColor(16,22,114);
            $pdf->SetTextColor(7,25,83);
            $pdf->SetXY($posicion_MulticeldaDX+40,$posicion_MulticeldaDY+120);
            $pdf->Cell(70,5,utf8_decode('Total asignaciones'),0,1,'R',0);

            $pdf->SetDrawColor(16,22,114);
            $pdf->SetTextColor(0); 
            $pdf->SetXY($posicion_MulticeldaDX+110,$posicion_MulticeldaDY+120);
            $pdf->Cell(32,5,utf8_decode($total_asignaciones),1,1,'C',0);



            $pdf->Ln();  // Termina seccion de multicelda de datos de dependencia
            $pdf->SetFont('','');
            $fill = True;
            $pdf->SetXY(153,42); // Esquina del unicio de la cabecera del usuario//
            $posicion_MulticeldaUX= $pdf->GetX();
            $posicion_MulticeldaUY= $pdf->GetY();
            $pdf->SetFillColor(224,235,255);
            $pdf->SetTextColor(0);
            $pdf->SetDrawColor(224,235,255);
            $pdf->SetFont( 'Arial', '', 12 );

            $pdf->SetXY($posicion_MulticeldaUX+5,$posicion_MulticeldaUY+20);
            $pdf->MultiCell(162,100,'',1);

            $pdf->SetXY($posicion_MulticeldaUX+5,$posicion_MulticeldaUY+20);
            $pdf->Cell(25,7,'CANTIDAD', 1,1,'C',$fill);
            $pdf->SetXY($posicion_MulticeldaUX+5,$posicion_MulticeldaUY+20);

            $pdf->Cell(25,100,'', 1,1,'C');

            $pdf->SetXY($posicion_MulticeldaUX+30,$posicion_MulticeldaUY+20);
            $pdf->Cell(100,7,'DESCRIPCION', 1,1,'C',$fill);

            $pdf->SetXY($posicion_MulticeldaUX+30,$posicion_MulticeldaUY+20);
            $pdf->Cell(100,100,'', 1,1,'C');

            $pdf->SetXY($posicion_MulticeldaUX+130,$posicion_MulticeldaUY+20);
            $pdf->Cell(37,7,'MONTO', 1,1,'C',$fill);

            $pdf->SetXY($posicion_MulticeldaUX+130,$posicion_MulticeldaUY+20);
            $pdf->Cell(37,100,'', 1,1,'C');


            $d_y1_position = 70;
            foreach($deducciones as $query){ //CANTIDAD DE ASIGNACIONES
                $d_cantidad = $query->cantidad;
                
                $pdf->SetDrawColor(224,235,255); 
                $pdf->SetXY($posicion_MulticeldaUX+2,$d_y1_position);
                $pdf->Cell(30,5,$d_cantidad, 0,1,'C');
                $d_y1_position = $d_y1_position+6;
            }
            
            $pdf->SetTextColor(0,0,0);

            $d_y2_position = 70;
            foreach($deducciones as $query){ //CANTIDAD DE ASIGNACIONES
                $d_concepto = $query->concepto;
                
                $pdf->SetDrawColor(224,235,255); 
                $pdf->SetXY($posicion_MulticeldaUX+35,$d_y2_position);
                $pdf->Cell(30,5,$d_concepto, 0,1,'C');
                $d_y2_position = $d_y2_position+6;
            }

            $d_y3_position = 70;
            $total_deducciones = 0;
            foreach($deducciones as $query){ //CANTIDAD DE ASIGNACIONES
                $d_monto_calculado = $query->monto_calculado;
                $total_deducciones = $total_deducciones + $d_monto_calculado;

                $pdf->SetDrawColor(224,235,255); 
                $pdf->SetXY($posicion_MulticeldaUX+135,$d_y3_position);
                $pdf->Cell(30,5,$d_monto_calculado, 0,1,'R');
                $d_y3_position = $d_y3_position+6;
            }

            $pdf->SetFont( 'Arial', 'B', 14 );
            $pdf->SetDrawColor(16,22,114);
            $pdf->SetTextColor(7,25,83);
            $pdf->SetXY($posicion_MulticeldaDX+200,$posicion_MulticeldaDY+120);
            $pdf->Cell(70,5,utf8_decode('Total Deducciones'),0,1,'R',0);

            $pdf->SetDrawColor(16,22,114);
            $pdf->SetTextColor(0); 
            $pdf->SetXY($posicion_MulticeldaDX+273,$posicion_MulticeldaDY+120);
            $pdf->Cell(37,5,utf8_decode($total_deducciones),1,1,'C',0);
            
    
        $pdf->Output('D','recibo-pago.pdf');
        exit;
    
}
}

/* ==================================FIN OUTPUT RECIBO DE PAGO=============================================== */
/* ==================================FIN OUTPUT RECIBO DE PAGO=============================================== */
/* ==================================FIN OUTPUT RECIBO DE PAGO=============================================== */

/* ================================== OUTPUT VACACIONES=============================================== */
/* ================================== OUTPUT VACACIONES=============================================== */
/* ================================== OUTPUT VACACIONES=============================================== */

if (isset($_POST['generate_vacaciones_pdf'])){
    $current_user = wp_get_current_user();
    $user_login = $current_user->user_login;

    $query_recibo_pago = $wpdb->get_results( "SELECT codigo_empleado, primer_nombre, segundo_nombre,primer_apellido,segundo_apellido,
    cedula,sueldo_diario, fecha_ingreso, cargo, departamento 
    FROM ic_trabajadores WHERE '$user_login' = codigo_empleado;");

foreach($query_recibo_pago as $query){ //ASIGNACIONES Y DEDUCCIONES
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
    //$total_asignaciones = $total_asignaciones + $e_sueldo;
}


    if (!isset($_POST['dia_uno_bono'])){
        $dia_uno_bono = ' ';
    }else{
        $dia_uno_bono = $_POST['dia_uno_bono'];
    }

    if (!isset($_POST['mes_uno_bono'])){
        $mes_uno_bono = ' ';
    }else{
        $mes_uno_bono = $_POST['mes_uno_bono'];
    }

    if (!isset($_POST['ano_uno_bono'])){
        $ano_uno_bono = ' ';
    }else{
        $ano_uno_bono = $_POST['ano_uno_bono'];
    }

    if (!isset($_POST['dia_dos_bono'])){
        $dia_dos_bono = ' ';
    }else{
        $dia_dos_bono = $_POST['dia_dos_bono'];
    }

    if (!isset($_POST['mes_dos_bono'])){
        $mes_dos_bono = ' ';
    }else{
        $mes_dos_bono = $_POST['mes_dos_bono'];
    }

    if (!isset($_POST['ano_dos_bono'])){
        $ano_dos_bono = ' ';
    }else{
        $ano_dos_bono = $_POST['ano_dos_bono'];
    }

    if (!isset($_POST['dias_a_disfrutar'])){
        $dias_a_disfrutar = ' ';
    }else{
        $dias_a_disfrutar = $_POST['dias_a_disfrutar'];
    }

    if (!isset($_POST['dia_uno_fecha_inicio'])){
        $dia_uno_fecha_inicio = ' ';
    }else{
        $dia_uno_fecha_inicio = $_POST['dia_uno_fecha_inicio'];
    }

    if (!isset($_POST['mes_uno_fecha_inicio'])){
        $mes_uno_fecha_inicio = ' ';
    }else{
        $mes_uno_fecha_inicio = $_POST['mes_uno_fecha_inicio'];
    }

    if (!isset($_POST['ano_uno_fecha_inicio'])){
        $ano_uno_fecha_inicio = ' ';
    }else{
        $ano_uno_fecha_inicio = $_POST['ano_uno_fecha_inicio'];
    }

    if (!isset($_POST['dia_uno_fecha_termino'])){
        $dia_uno_fecha_termino = ' ';
    }else{
        $dia_uno_fecha_termino = $_POST['dia_uno_fecha_termino'];
    }

    if (!isset($_POST['mes_uno_fecha_termino'])){
        $mes_uno_fecha_termino = ' ';
    }else{
        $mes_uno_fecha_termino = $_POST['mes_uno_fecha_termino'];
    }

    if (!isset($_POST['ano_uno_fecha_termino'])){
        $ano_uno_fecha_termino = ' ';
    }else{
        $ano_uno_fecha_termino = $_POST['ano_uno_fecha_termino'];
    }

    if (!isset($_POST['dias_a_disfrutar_sin_bono'])){
        $dias_a_disfrutar_sin_bono = ' ';
    }else{
        $dias_a_disfrutar_sin_bono = $_POST['dias_a_disfrutar_sin_bono'];
    }

    if (!isset($_POST['mes_correspondiente_al_periodo_sin_bono'])){
        $mes_correspondiente_al_periodo_sin_bono = ' ';
    }else{
        $mes_correspondiente_al_periodo_sin_bono = $_POST['mes_correspondiente_al_periodo_sin_bono'];
    }
    
    if (!isset($_POST['ano_correspondiente_al_periodo_sin_bono'])){
        $ano_correspondiente_al_periodo_sin_bono = ' ';
    }else{
        $ano_correspondiente_al_periodo_sin_bono = $_POST['ano_correspondiente_al_periodo_sin_bono'];
    }

    if (!isset($_POST['dia_uno_fecha_inicio_sin_bono'])){
        $dia_uno_fecha_inicio_sin_bono = ' ';
    }else{
        $dia_uno_fecha_inicio_sin_bono = $_POST['dia_uno_fecha_inicio_sin_bono'];
    }

    if (!isset($_POST['mes_uno_fecha_inicio_sin_bono'])){
        $mes_uno_fecha_inicio_sin_bono = ' ';
    }else{
        $mes_uno_fecha_inicio_sin_bono = $_POST['mes_uno_fecha_inicio_sin_bono'];
    }

    if (!isset($_POST['ano_uno_fecha_inicio_sin_bono'])){
        $ano_uno_fecha_inicio_sin_bono = ' ';
    }else{
        $ano_uno_fecha_inicio_sin_bono = $_POST['ano_uno_fecha_inicio_sin_bono'];
    }

    if (!isset($_POST['dia_dos_fecha_termino_sin_bono'])){
        $dia_dos_fecha_termino_sin_bono = ' ';
    }else{
        $dia_dos_fecha_termino_sin_bono = $_POST['dia_dos_fecha_termino_sin_bono'];
    }

    if (!isset($_POST['mes_dos_fecha_termino_sin_bono'])){
        $mes_dos_fecha_termino_sin_bono = ' ';
    }else{
        $mes_dos_fecha_termino_sin_bono = $_POST['mes_dos_fecha_termino_sin_bono'];
    }

    if (!isset($_POST['ano_dos_fecha_termino_sin_bono'])){
        $ano_dos_fecha_termino_sin_bono = ' ';
    }else{
        $ano_dos_fecha_termino_sin_bono = $_POST['ano_dos_fecha_termino_sin_bono'];
    }


    if (!isset($_POST['dias_totales_solicitados'])){
        $dias_totales_solicitados = ' ';
    }else{
        $dias_totales_solicitados = $_POST['dias_totales_solicitados'];

    }
    if (!isset($_POST['dia_de_reintegro'])){
        $dia_de_reintegro = ' ';
    }else{
        $dia_de_reintegro = $_POST['dia_de_reintegro'];
    }

    if (!isset($_POST['mes_de_reintegro'])){
        $mes_de_reintegro = ' ';
    }else{
        $mes_de_reintegro = $_POST['mes_de_reintegro'];
    }

    if (!isset($_POST['ano_de_reintegro'])){
        $ano_de_reintegro = ' ';
    }else{
        $ano_de_reintegro = $_POST['ano_de_reintegro'];
    }

    if (!isset($_POST['dia_de_reintegro_sin_bono'])){
        $dia_de_reintegro_sin_bono = ' ';
    }else{
        $dia_de_reintegro_sin_bono = $_POST['dia_de_reintegro_sin_bono'];
    }

    if (!isset($_POST['mes_de_reintegro_sin_bono'])){
        $mes_de_reintegro_sin_bono = ' ';
    }else{
        $mes_de_reintegro_sin_bono = $_POST['mes_de_reintegro_sin_bono'];
    }

    if (!isset($_POST['ano_de_reintegro_sin_bono'])){
        $ano_de_reintegro_sin_bono = ' ';
    }else{
        $ano_de_reintegro_sin_bono = $_POST['ano_de_reintegro_sin_bono'];
    }

    if (!isset($_POST['dias_totales_solicitados_sin_bono'])){
        $dias_totales_solicitados_sin_bono = ' ';
    }else{
        $dias_totales_solicitados_sin_bono = $_POST['dias_totales_solicitados_sin_bono'];
    }


    

    if ($dia_uno_bono and $mes_uno_bono and $ano_uno_bono and $dia_dos_bono and $mes_dos_bono and 
        $ano_dos_bono and $dias_a_disfrutar and $dia_uno_fecha_inicio and $mes_uno_fecha_inicio and 
        $ano_uno_fecha_inicio and $dia_uno_fecha_termino and $mes_uno_fecha_termino and 
        $ano_uno_fecha_termino and $dia_de_reintegro and $mes_de_reintegro and $ano_de_reintegro != ' '
        ){
            $insert = $wpdb->insert(
                'ic_solicitud_vacaciones',
                    array(
                    'codigo_empleado'=>$user_login,
                    'nombres'=>$e_nombre.' '.$e_s_nombre,
                    'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                    'fecha_inicio'=> $dia_uno_fecha_inicio .'/'.$mes_uno_fecha_inicio .'/'.$ano_uno_fecha_inicio,
                    'fecha_termino'=> $dia_uno_fecha_termino .'/'.$mes_uno_fecha_termino .'/'.$ano_uno_fecha_termino,
                    'fecha_reintegro'=> $dia_de_reintegro .'/'. $mes_de_reintegro .'/'. $ano_de_reintegro,
                    'tipo'=> 'CON BONO',
                    'modalidad'=> 'VIRTUAL'
            ));



    }elseif(    $dias_a_disfrutar_sin_bono and 
                $mes_correspondiente_al_periodo_sin_bono and $ano_correspondiente_al_periodo_sin_bono and 
                $dia_uno_fecha_inicio_sin_bono and $mes_uno_fecha_inicio_sin_bono and 
                $ano_uno_fecha_inicio_sin_bono and $dia_dos_fecha_termino_sin_bono and 
                $mes_dos_fecha_termino_sin_bono and $ano_dos_fecha_termino_sin_bono and 
                $dia_de_reintegro_sin_bono and $mes_de_reintegro_sin_bono and $ano_de_reintegro_sin_bono != ' ' and
                $dias_totales_solicitados_sin_bono 
    ){

                $insert = $wpdb->insert(
                    'ic_solicitud_vacaciones',
                    array(
                        'codigo_empleado'=>$user_login,
                        'nombres'=>$e_nombre.' '.$e_s_nombre,
                        'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                        'fecha_inicio'=> $dia_uno_fecha_inicio_sin_bono .'/'.$mes_uno_fecha_inicio_sin_bono .'/'.$ano_uno_fecha_inicio_sin_bono,
                        'fecha_termino'=> $dia_dos_fecha_termino_sin_bono .'/'.$mes_dos_fecha_termino_sin_bono .'/'.$ano_dos_fecha_termino_sin_bono,
                        'fecha_reintegro'=> $dia_de_reintegro_sin_bono .'/'. $mes_de_reintegro_sin_bono .'/'. $ano_de_reintegro_sin_bono,
                        'tipo'=> 'SIN BONO',
                        'modalidad'=> 'VIRTUAL'
                    ));

    }else{        
                $insert = $wpdb->insert(
                    'ic_solicitud_vacaciones',
                    array(
                        'codigo_empleado'=>$user_login,
                        'nombres'=>$e_nombre.' '.$e_s_nombre,
                        'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                        'fecha_inicio'=> 'POR ESCRITO',
                        'fecha_termino'=> 'POR ESCRITO',
                        'fecha_reintegro'=> 'POR ESCRITO',
                        'tipo'=> 'DEFINIDO POR ESCRITO',
                        'modalidad'=> 'MANUAL'
                    ));
                    
        }

    setlocale(LC_TIME, "spanish");
    $month = strftime("%B"); //devuelve: mes actual
    $month_number = strftime("%m");
    $week_day = date("j");
    $week_day_number = strftime("%d");
    $year = date("Y");
    $pdf = new FPDF();
    $pdf->AddPage('portrait', 'letter');
    $pdf->SetFont( 'Arial', '', 11 );
    $pdf->Write(5, ' ');
    $pdf->Ln();
    $ruta_imagen = 'http://localhost/Portal%20ICCA%20RRHH/wp-content/uploads/2021/08/logo-2.png';
    $pdf-> SetX(55);
    $pdf->Image($ruta_imagen);
    $pdf-> SetX(65);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40,10, utf8_decode('RIF.: J-30070620-6'),0,0,'C');
    $pdf-> SetY(15);
    $pdf-> SetX(120);
    $pdf->Cell(55,10, utf8_decode('Fecha de Emisión: '. $month_number. '/'.$year),1,0,'C');
    $pdf-> SetX($pdf->GetX());
    $pdf->Cell(25,10, utf8_decode('Pág: 1'),1,2,'C');
    $pdf-> SetX($pdf->GetX()-55);
    $pdf->Cell(80,10, utf8_decode('Código del Documento: RH-F-004'),1,0,'C');
    $pdf-> SetX(20);
    $pdf-> SetY($pdf->GetY()+10);
    $pdf->Cell(110,10, utf8_decode('Sección: Formato para solicitud de disfrute de vacaciones'),1,0,'C');
    $pdf->Cell(80,10, utf8_decode('Departamento Emisor: Recursos Humanos'),1,2,'C');
    $pdf->SetX(10);
    $pdf->Cell(190,7, utf8_decode('DATOS DEL TRABAJADOR'),1,2,'C');
    $pdf->SetFillColor(157,176,232); // FONDO GRIS
    $pdf->Cell(63,7, utf8_decode('No. DE EMPLEADO'),1,0,'C',1);
    $pdf->Cell(63,7, utf8_decode('FECHA DE INGRESO'),1,0,'C',1);
    $pdf->Cell(64,7, utf8_decode('FECHA DE SOLICITUD'),1,2,'C',1);
    $pdf->SetX(10);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(63,7, utf8_decode($codigo_empleado),1,0,'C');
    $pdf->Cell(63,7, utf8_decode($e_fecha_ingreso),1,0,'C');
    $pdf->Cell(64,7, utf8_decode($week_day_number. '/' . $month_number . '/' . $year),1,2,'C');
    $pdf->SetX(10);
    
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(63,7, utf8_decode('APELLIDOS Y NOMBRES'),1,0,'C',1);
    $pdf->Cell(63,7, utf8_decode('CEDULA DE IDENTIDAD'),1,0,'C',1);
    $pdf->Cell(64,7, utf8_decode('DEPARTAMENTO'),1,2,'C',1);
    $pdf->SetX(10);

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(63,7, utf8_decode($e_p_apellido . ' ' . $e_s_apellido . ' ' . $e_nombre .' '. $e_s_nombre),1,0,'C');
    $pdf->Cell(63,7, utf8_decode($e_cedula),1,0,'C');
    $pdf->Cell(64,7, utf8_decode($departamento),1,2,'C');
    $pdf->SetX(10);

    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(190,7, utf8_decode('SOLICITUD DE PERIODO DE VACACIONES VENCIDAS CON PAGO DE BONO VACACIONAL'),1,2,'C');
    
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(190,10, utf8_decode('BONO VACACIONAL PERIODO:    ' . $dia_uno_bono .'   /   '. $mes_uno_bono. '   /   '. $ano_uno_bono. '   AL   ' . $dia_dos_bono . '   /   ' . $mes_dos_bono . '    /    '. $ano_dos_bono ),1,2,'L');
    $pdf->Cell(190,10, utf8_decode('CANTIDAD DE DÍAS HÁBILES A DISFRUTAR: ' . $dias_a_disfrutar),1,2,'L');
    $pdf->Cell(190,10, utf8_decode('FECHA DE INICIO DEL PERÍODO DE VACACIONES A DISFRUTAR :    ' . $dia_uno_fecha_inicio . '   /   ' . $mes_uno_fecha_inicio . '   /   ' . $ano_uno_fecha_inicio),1,2,'L');
    $pdf->Cell(190,10, utf8_decode('FECHA DE TERMINO DEL PERÍODO DE VACACIONES A DISFRUTAR :  ' . $dia_uno_fecha_termino . '   /   '. $mes_uno_fecha_termino.'   /   '. $ano_uno_fecha_termino),1,2,'L');
     
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(190,7, utf8_decode('SOLICITUD DE DIAS VACACIONES VENCIDAS NO DISFRUTADAS SIN PAGO DE BONO VACACIONAL'),1,2,'C');

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(190,10, utf8_decode('CANTIDAD DE DÍAS A DISFRUTAR:  '. $dias_a_disfrutar_sin_bono  .'CORRESPONDIENTES AL PERIODO: '. $mes_correspondiente_al_periodo_sin_bono .'   /   '. $ano_correspondiente_al_periodo_sin_bono ),1,2,'L');
    $pdf->Cell(190,10, utf8_decode('FECHA DE INICIO DEL PERÍODO DE VACACIONES A DISFRUTAR: '. $dia_uno_fecha_inicio_sin_bono .'   /   '. $mes_uno_fecha_inicio_sin_bono .'   /   '. $ano_uno_fecha_inicio_sin_bono  ),1,2,'L');
    $pdf->Cell(190,10, utf8_decode('FECHA DE TERMINO DEL PERÍODO DE VACACIONES A DISFRUTAR: '.$dia_dos_fecha_termino_sin_bono  .'   /   '. $mes_dos_fecha_termino_sin_bono .'   / '.$ano_dos_fecha_termino_sin_bono  ),1,2,'L');
    
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(85,20, utf8_decode('Días totales solicitados por el trabajador:    ' . $dias_totales_solicitados . $dias_totales_solicitados_sin_bono),1,0,'L');
    $pdf->Cell(105,20, utf8_decode('Días pendientes después del reintegro de sus labores:__' ),1,2,'L');
    $pdf->SetX(10);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(49,12, utf8_decode('FIRMA DEL EMPLEADO'),1,0,'C');
    $pdf->Cell(100,12, utf8_decode('FIRMA DE AUTORIZACIÓN DE GERENTE DEL AREA'),1,0,'C');
    $pdf->Cell(41,12, utf8_decode('DIA DE REINTEGRO'),1,2,'C');
    
    $pdf->SetX(10);
    $pdf->Cell(49,20, utf8_decode(' '),1,0,'C');
    $pdf->Cell(100,20, utf8_decode(' '),1,0,'C');
    $pdf->Cell(41,20, utf8_decode($dia_de_reintegro . $dia_de_reintegro_sin_bono. '  /  '. $mes_de_reintegro .$mes_de_reintegro_sin_bono. '  /  '. $ano_de_reintegro. $ano_de_reintegro_sin_bono ),1,2,'C');
    $pdf->SetX(10);

    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(190,7, utf8_decode('SOLO PARA USO DE RECURSOS HUMANOS'),1,2,'C');
    
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(120,12, utf8_decode('Chequeo Medico Pre Vacacional  /  Chequeo Medico Post Vacacional'),1,0,'C');
    $pdf->Cell(70,12, utf8_decode('Firma y Sello de Recursos Humanos'),1,2,'C');

    $pdf->SetX(10);
    $pdf->Cell(120,20, utf8_decode('Fecha de Pre: ____ / ____ / ____   --   Fecha de Pre: ____ / ____ / ____'),1,0,'C');
    $pdf->Cell(70,20, utf8_decode('Fecha de Recepción: ____ / ____ / ____'),1,2,'C');
    //Cell(ANCHO, ALTO, TEXTO, BORDE (1,0), ln(0,1,2), ALIGN(L,C,R), FONDO(BOOLEAN))
    $pdf->Output('D','solicitud-de-vacaciones.pdf');
    exit;
}

/* ==================================== FIN PDF VACACIONES =======================================*/
/* ==================================== FIN PDF VACACIONES =======================================*/
/* ==================================== FIN PDF VACACIONES =======================================*/



/* ================================= PDF ANTICIPO PRESTACIONES SOCIALES ==============================*/
/* ================================= PDF ANTICIPO PRESTACIONES SOCIALES ==============================*/
/* ================================= PDF ANTICIPO PRESTACIONES SOCIALES ==============================*/


if (isset($_POST['generate_p_sociales_pdf'])){
    $current_user = wp_get_current_user();
    $user_login = $current_user->user_login;

    $query_recibo_pago = $wpdb->get_results( "SELECT codigo_empleado, primer_nombre, segundo_nombre,primer_apellido,segundo_apellido,
    cedula,sueldo_diario, fecha_ingreso, cargo, departamento, edo_civil, rif
    FROM ic_trabajadores WHERE '$user_login' = codigo_empleado;");

foreach($query_recibo_pago as $query){ //ASIGNACIONES Y DEDUCCIONES
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
    $e_estado_civil = $query->edo_civil;
    $e_rif = $query->rif;
    //$total_asignaciones = $total_asignaciones + $e_sueldo;
    }

    if(strtolower($e_estado_civil)=="s"){
        $e_estado_civil= "Soltero";
    }elseif(strtolower($e_estado_civil)=="c"){
        $e_estado_civil= "Casado";
    }elseif(strtolower($e_estado_civil)=="d"){
        $e_estado_civil= "Divorciado";
    }else{
        $e_estado_civil= "Concubino";
    }

    
    if (!isset($_POST['monto_solicitado'])){
        $monto_solicitado = ' ';
    }else{
        $monto_solicitado = $_POST['monto_solicitado'];
    }
    
    if (!isset($_POST['motivo_p_sociales'])){
        $motivo_p_sociales = ' ';
        $a = false;
        $b = false;
        $c = false;
        $d = false;

    }else{

        if($_POST['motivo_p_sociales']==1){
            $a = true;
            $b = false;
            $c = false;
            $d = false;
        }

        elseif($_POST['motivo_p_sociales']==2){
            $a = false;
            $b = true;
            $c = false;
            $d = false;
        }

        elseif($_POST['motivo_p_sociales']==3){
            $a = false;
            $b = false;
            $c = true;
            $d = false;
        }

        else{
            $a = false;
            $b = false;
            $c = false;
            $d = true;
        }
    }


    if($a and $monto_solicitado){
        echo "<script>alert('a es true')</script>";

        $insert_prestaciones = $wpdb->insert(
            'ic_prestaciones_sociales',
            array(
                'codigo_empleado'=>$user_login,
                'nombres'=>$e_nombre.' '.$e_s_nombre,
                'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                'monto_solicitado'=> $monto_solicitado,
                'motivo'=>'CONSTRUCCION, ADQUISICION O MEJORA DE VIVIENDA',
                'status'=> 'PENDIENTE',
                'modalidad'=> 'VIRTUAL'
            ));
            
    }elseif($b and $monto_solicitado){
        $insert_prestaciones = $wpdb->insert(
            'ic_prestaciones_sociales',
            array(
                'codigo_empleado'=>$user_login,
                'nombres'=>$e_nombre.' '.$e_s_nombre,
                'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                'monto_solicitado'=>$monto_solicitado,
                'motivo'=>'LIBERACION DE HIPOTECA U OTRO GRAVAMEN SOBRE VIVIENDA',
                'status'=> 'PENDIENTE',
                'modalidad'=> 'VIRTUAL'
            ));
            
    }elseif($c and $monto_solicitado){
        $insert_prestaciones = $wpdb->insert(
            'ic_prestaciones_sociales',
            array(
                'codigo_empleado'=>$user_login,
                'nombres'=>$e_nombre.' '.$e_s_nombre,
                'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                'monto_solicitado'=>$monto_solicitado,
                'motivo'=>'INVERSION EN EDUCACION',
                'status'=> 'PENDIENTE',
                'modalidad'=> 'VIRTUAL'
            ));
            
    }elseif($d and $monto_solicitado){
        $insert_prestaciones = $wpdb->insert(
            'ic_prestaciones_sociales',
            array(
                'codigo_empleado'=>$user_login,
                'nombres'=>$e_nombre.' '.$e_s_nombre,
                'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                'monto_solicitado'=>$monto_solicitado,
                'motivo'=>'GASTOS POR ATENCION MEDICA Y HOSPITALARIA',
                'status'=> 'PENDIENTE',
                'modalidad'=> 'VIRTUAL'
            ));
            
    }else{
        $insert_prestaciones = $wpdb->insert(
            'ic_prestaciones_sociales',
            array(
                'codigo_empleado'=>$user_login,
                'nombres'=>$e_nombre.' '.$e_s_nombre,
                'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                'monto_solicitado'=> 'POR ESCRITO',
                'motivo'=>'POR ESCRITO',
                'status'=> 'PENDIENTE',
                'modalidad'=> 'MANUAL'
            ));
    }



    setlocale(LC_TIME, "spanish");
    $month = strftime("%B"); //devuelve: mes actual
    $month_number = strftime("%m");
    $week_day = date("j");
    $week_day_number = strftime("%d");
    $year = date("Y");
    $pdf = new FPDF();
    $pdf->AddPage('portrait', 'letter');
    $pdf->SetFont( 'Arial', '', 11 );
    $pdf->Write(5, ' ');
    $pdf->Ln();
    $ruta_imagen = 'http://localhost/Portal%20ICCA%20RRHH/wp-content/uploads/2021/08/logo-2.png';
    $pdf-> SetX(55);
    $pdf->Image($ruta_imagen);
    $pdf-> SetX(65);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40,10, utf8_decode('RIF.: J-30070620-6'),0,0,'C');
    $pdf-> SetY(15);
    $pdf-> SetX(125);
    $pdf->MultiCell(48,7, utf8_decode('Fecha de Actualización: '.$month_number. '/'.$year),1,'C');
    $pdf->SetY(15);
    $pdf->SetX(173);
    $pdf->Cell(32,14, utf8_decode('Pág: 1/1'),1,2,'C');
    $pdf->SetX($pdf->GetX()-48);
    $pdf->Cell(80,10, utf8_decode('Código del Documento: RH-F-003'),1,0,'C');
    $pdf->SetX(20);
    $pdf->SetY($pdf->GetY()+10);
    $pdf->SetX(15);
    $pdf->MultiCell(110,5, utf8_decode('Título: Formato para la Solicitud de Anticipo de Prestaciones Sociales.'),1,0,'C');
    $pdf->SetY(39);
    $pdf->SetX(125);
    $pdf->Cell(80,10, utf8_decode('Departamento Emisor: Recursos Humanos'),1,2,'C');
    $pdf->SetX(15);
    $pdf->Cell(63,7, utf8_decode('Fecha de Solicitud'),1,0,'C',1);
    $pdf->Cell(63,7, utf8_decode('Código Trabajador'),1,0,'C',1);
    $pdf->Cell(64,7, utf8_decode('Fecha de Ingreso'),1,2,'C',1);
    $pdf->SetFont('Arial','',12);
    $pdf->SetX(15);
    $pdf->Cell(63,7, utf8_decode($week_day_number. '/' . $month_number . '/' . $year),1,0,'C');
    $pdf->Cell(63,7, utf8_decode($codigo_empleado),1,0,'C');
    $pdf->Cell(64,7, utf8_decode($e_fecha_ingreso),1,2,'C');
    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',12);
    $pdf->Ln(2);
    $pdf->SetX(15);

    $pdf->Cell(190,7, utf8_decode('DATOS DEL TRABAJADOR'),1,2,'C');
    
    $pdf->SetX(15);
    
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(80,7, utf8_decode('APELLIDOS Y NOMBRES'),1,0,'C',1);
    $pdf->Cell(70,7, utf8_decode('C.I Y RIF'),1,0,'C',1);
    $pdf->Cell(40,7, utf8_decode('ESTADO CIVIL'),1,2,'C',1);
    $pdf->SetX(15);
    
    $pdf->Cell(80,7, utf8_decode($e_p_apellido . ' ' . $e_s_apellido . ' ' . $e_nombre .' '. $e_s_nombre),1,0,'C',1);
    $pdf->Cell(70,7, utf8_decode('C.I: ' . $e_cedula .' -- RIF: ' .$e_rif),1,0,'C');
    $pdf->SetY(79);
    $pdf->SetX($pdf->GetX()+155);   
    $pdf->Cell(40,7, utf8_decode($e_estado_civil),1,2,'C',1);

    $pdf->Ln(1);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,7, utf8_decode('MOTIVOS PARA LA SOLICITUD DEL ANTICIPO DE PRESTACIONES SOCIALES'),1,2,'C');
    if ($a==true){
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[X]  LA CONSTRUCCIÓN, ADQUISICIÓN MEJORA O REPARACIÓN DE VIVIENDA PARA EL TRABAJADOR Y SU FAMILIA. '),'LTR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA LIBERACIÓN DE HIPOTECA O CUALQUIER OTRO GRAVAMEN SOBRE VIVIENDA DE SU PROPIEDAD.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA INVERSION EN EDUCACION PARA EL TRABAJADOR O SU FAMILIA.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LOS GASTOS POR ATENCIÓN MÉDICA Y HOSPITALARIA PARA EL TRABAJADOR O SU FAMILIA.'),'LRB','L');  
    }
    $pdf->SetX(15);
    if($b==true){
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA CONSTRUCCIÓN, ADQUISICIÓN MEJORA O REPARACIÓN DE VIVIENDA PARA EL TRABAJADOR Y SU FAMILIA. '),'LTR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[X]  LA LIBERACIÓN DE HIPOTECA O CUALQUIER OTRO GRAVAMEN SOBRE VIVIENDA DE SU PROPIEDAD.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA INVERSION EN EDUCACION PARA EL TRABAJADOR O SU FAMILIA.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LOS GASTOS POR ATENCIÓN MÉDICA Y HOSPITALARIA PARA EL TRABAJADOR O SU FAMILIA.'),'LRB','L');    }
    $pdf->SetX(15);
    if ($c==true){
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA CONSTRUCCIÓN, ADQUISICIÓN MEJORA O REPARACIÓN DE VIVIENDA PARA EL TRABAJADOR Y SU FAMILIA. '),'LTR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA LIBERACIÓN DE HIPOTECA O CUALQUIER OTRO GRAVAMEN SOBRE VIVIENDA DE SU PROPIEDAD.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[X]  LA INVERSION EN EDUCACION PARA EL TRABAJADOR O SU FAMILIA.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LOS GASTOS POR ATENCIÓN MÉDICA Y HOSPITALARIA PARA EL TRABAJADOR O SU FAMILIA.'),'LRB','L');    }
    $pdf->SetX(15);

    if($d==true){
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA CONSTRUCCIÓN, ADQUISICIÓN MEJORA O REPARACIÓN DE VIVIENDA PARA EL TRABAJADOR Y SU FAMILIA. '),'LTR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA LIBERACIÓN DE HIPOTECA O CUALQUIER OTRO GRAVAMEN SOBRE VIVIENDA DE SU PROPIEDAD.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[ ]  LA INVERSION EN EDUCACION PARA EL TRABAJADOR O SU FAMILIA.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[X]  LOS GASTOS POR ATENCIÓN MÉDICA Y HOSPITALARIA PARA EL TRABAJADOR O SU FAMILIA.'),'LRB','L');        
    }

    if($a == false and $b == false and $c == false and $d == false){
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[  ]  LA CONSTRUCCIÓN, ADQUISICIÓN MEJORA O REPARACIÓN DE VIVIENDA PARA EL TRABAJADOR Y SU FAMILIA. '),'LTR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[  ]  LA LIBERACIÓN DE HIPOTECA O CUALQUIER OTRO GRAVAMEN SOBRE VIVIENDA DE SU PROPIEDAD.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[  ]  LA INVERSION EN EDUCACION PARA EL TRABAJADOR O SU FAMILIA.'),'LR','L');
        $pdf->SetX(15);
        $pdf->MultiCell(190,6, utf8_decode('[  ]  LOS GASTOS POR ATENCIÓN MÉDICA Y HOSPITALARIA PARA EL TRABAJADOR O SU FAMILIA.'),'LRB','L');        
    }
    
    $pdf->SetFont('Arial','B',10);
    $pdf->SetX(15);
    $pdf->MultiCell(100,9, utf8_decode('SALDO ACTUAL DE PRESTACIONES SOCIALES DEL TRABAJADOR:   Bs.'),1,'L',1);
    $pdf->SetX(15);
    $pdf->MultiCell(100,8, utf8_decode('CANTIDAD SOLICITADA POR EL TRABAJADOR: 
    Bs. ' . $monto_solicitado),1,'L',1);
    $pdf->SetX(15);
    $pdf->MultiCell(100,8, utf8_decode('CANTIDAD APROBADA POR RRHH:   
    Bs.'),1,'L',1);
    $pdf->SetY(124);
    $pdf->SetX(115);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(90,3.8, utf8_decode('EL TRABAJADOR TENDRÁ DERECHO AL ANTICIPO DE HASTA UN SETENTA Y CINCO POR CIENTO (75%) DE LO DEPOSITADO COMO GARANTIA DE SUS PRESTACIONES SOCIALES, PARA SATISFACER OBLIGACIONES MENCIONADAS EN CUADRO ANTERIOR, DE ACUERDO AL ARTICULO 144 DE LA LOTTT.
    FRECUENCIA: EL TRABAJADOR TENDRÁ DERECHO A SOLICITAR ANTICIPOS DE LO ACREDITADO O DEPOSITADO O AVAL DE LO ACREDITADO EN LA CONTABILIDAD DE LA EMPRESA UNA VEZ AL AÑO, SALVO EN EL SUPUESTO PREVISTO EN EL LITERAL d) DE AQUELLA NORMA JURÍDICA. ART. 91 DEL REGLAMENTO DE LA LOT.'),1,'L',1);
    
    $pdf->Ln(3);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(66,6, utf8_decode('FIRMA Y HUELLA DEL TRABAJADOR'),1,0,'C');
    $pdf->Cell(56,6, utf8_decode('AUTORIZACIÓN DEL CÓNYUGE'),1,0,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(68,6, utf8_decode('Solo para ser utilizado por la gcia de RRHH'),1,2,'L');
    
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell(66,6, utf8_decode('
________________
FIRMA Y HUELLA DACTILAR
FECHA DE LA SOLICITUD 
'
.$week_day_number.'/'. $month_number.'/'.$year.'/'),'LRB','C');

    
    $pdf->SetY(182.5);
    $pdf->SetX(81);
    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell(56,5, utf8_decode('
APELLIDOS Y NOMBRES
C.I No: 
_______________________
FIRMA Y HUELLA DACTILAR'),1,'C');

    
    $pdf->SetY(182.5);
    $pdf->SetX(137);
    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell(68,5, utf8_decode('
    DECISIÓN DE RRHH: 
    
    __ APROBADO    __REPROBADO
    
    FECHA:   DÍA__  MES__  AÑO__'),1,'C');
    
    
    $pdf->Ln(2);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(190,6, utf8_decode('DOMICILIACION DE PAGO'),1,2,'C');
    $pdf->SetFont('Arial','',11);
    $pdf->SetX(15);
    $pdf->MultiCell(190,5, utf8_decode('Me dirijo a ustedes en la oportunidad de solicitar que la presente solicitud de anticipo de prestaciones sociales sea depositada y/o transferida en mi cuenta nomina (Banco Mercantil) que tengo con Industrias Corpañal C.A.
Número de cuenta (Banco Mercantil): ____________________
FIRMA DEL TRABAJADOR: __________________________     C.I: '. $e_cedula.
'
HUELLA DACTILAR: _______________________________'),1,'L');
    
    $pdf->SetFont('Arial','',8);
    $pdf->Ln(1);
    $pdf->SetX(15);
    $pdf->MultiCell(190,2.6, utf8_decode('Nota 1 : Para poder realizar un nuevo retiro de sus prestaciones sociales, el Trabajador (a) deberá haber firmado y entregado a RRHH el recibo de pago de la última solicitud de anticipo de prestaciones sociales procesada.
Nota 2: Los recaudos que deben acompañar la presente solicitud pueden ser verificados en procedimiento que esta en carpeta Común de RRHH.'));
    
$pdf->Output('D','anticipo-prestaciones-sociales.pdf');
    exit;

}




/* ==================================== PDF ADELANTO SUELDO O QUINCENA =======================================*/
/* ==================================== PDF ADELANTO SUELDO O QUINCENA =======================================*/
/* ==================================== PDF ADELANTO SUELDO O QUINCENA =======================================*/

if (isset($_POST['generate_adelanto_qs_pdf'])){
    $current_user = wp_get_current_user();
    $user_login = $current_user->user_login;

    $query_recibo_pago = $wpdb->get_results( "SELECT codigo_empleado, primer_nombre, segundo_nombre,primer_apellido,segundo_apellido,
    cedula,sueldo_diario, fecha_ingreso, cargo, departamento, edo_civil, rif
    FROM ic_trabajadores WHERE '$user_login' = codigo_empleado;");

foreach($query_recibo_pago as $query){ //ASIGNACIONES Y DEDUCCIONES
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
    $e_estado_civil = $query->edo_civil;
    $e_rif = $query->rif;
    //$total_asignaciones = $total_asignaciones + $e_sueldo;
    }
    if (!isset($_POST['monto_sueldo_quincena'])){
        $monto_sueldo_quincena = ' ';
    }else{
        $monto_sueldo_quincena = $_POST['monto_sueldo_quincena'];
    }



    if (!isset($_POST['sueldo_o_quincena'])){
        $sueldo_o_quincena = ' ';
    }else{
        
        if($_POST['sueldo_o_quincena']==1){
            $sueldo_o_quincena = 'QUINCENA';
        }else{
            $sueldo_o_quincena = 'SUELDO';
        }
    }



    if(strtolower($e_estado_civil)=="s"){
        $e_estado_civil= "Soltero";
    }elseif(strtolower($e_estado_civil)=="c"){
        $e_estado_civil= "Casado";
    }elseif(strtolower($e_estado_civil)=="d"){
        $e_estado_civil= "Divorciado";
    }else{
        $e_estado_civil= "Concubino";
    }

    if($monto_sueldo_quincena != ' ' and $sueldo_o_quincena == 'QUINCENA'){ 
        $insert_sueldo_quincena = $wpdb->insert(
            'ic_adelanto_quincena_sueldo',
                array(
                    'codigo_empleado'=>$user_login,
                    'nombres'=>$e_nombre.' '.$e_s_nombre,
                    'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                    'monto_solicitado'=> $monto_sueldo_quincena,
                    'adelanto'=>$sueldo_o_quincena,
                    'status'=> 'PENDIENTE',
                    'cantidad_aprobada'=>'PENDIENTE',
                    'modalidad'=> 'VIRTUAL'
            ));
    }elseif($monto_sueldo_quincena != ' ' and $sueldo_o_quincena == 'SUELDO'){ 
        $insert_sueldo_quincena = $wpdb->insert(
            'ic_adelanto_quincena_sueldo',
                array(
                    'codigo_empleado'=>$user_login,
                    'nombres'=>$e_nombre.' '.$e_s_nombre,
                    'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                    'monto_solicitado'=> $monto_sueldo_quincena,
                    'adelanto'=>$sueldo_o_quincena,
                    'status'=> 'PENDIENTE',
                    'cantidad_aprobada'=>'PENDIENTE',
                    'modalidad'=> 'VIRTUAL'
                ));
            
    }else{
        $insert_sueldo_quincena = $wpdb->insert(
            'ic_adelanto_quincena_sueldo',
            array(
                'codigo_empleado'=>$user_login,
                'nombres'=>$e_nombre.' '.$e_s_nombre,
                'apellidos'=>$e_p_apellido.' '.$e_s_apellido,
                'monto_solicitado'=>'POR ESCRITO',
                'adelanto'=>'POR ESCRITO',
                'status'=> 'PENDIENTE',
                'cantidad_aprobada'=>'PENDIENTE',
                'modalidad'=> 'MANUAL'
            ));
        }



    setlocale(LC_TIME, "spanish");
    $month = strftime("%B"); //devuelve: mes actual
    $month_number = strftime("%m");
    $week_day = date("j");
    $week_day_number = strftime("%d");
    $year = date("Y");
    $pdf = new FPDF();
    $pdf->AddPage('portrait', 'letter');
    $pdf->SetFont( 'Arial', '', 11 );
    $pdf->Write(5, ' ');
    $pdf->Ln();
    $ruta_imagen = 'http://localhost/Portal%20ICCA%20RRHH/wp-content/uploads/2021/08/logo-2.png';
    $pdf-> SetX(55);
    $pdf->Image($ruta_imagen);
    $pdf-> SetX(65);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40,10, utf8_decode('RIF.: J-30070620-6'),0,0,'C');
    $pdf-> SetY(15);
    $pdf-> SetX(125);
    $pdf->MultiCell(48,7, utf8_decode('Fecha de Actualización: '.$month_number. '/'.$year),1,'C');
    $pdf->SetY(15);
    $pdf->SetX(173);
    $pdf->Cell(32,14, utf8_decode('Pág: 1/1'),1,2,'C');
    $pdf->SetX($pdf->GetX()-48);
    $pdf->Cell(80,10, utf8_decode('Código del Documento: RH-F-003'),1,0,'C');
    $pdf->SetX(20);
    $pdf->SetY($pdf->GetY()+10);
    $pdf->SetX(15);
    $pdf->MultiCell(110,5, utf8_decode('Título: Formato para Solicitud de Adelanto de
Quincena y Sueldo.'),1,0,'C');
    $pdf->SetY(39);
    $pdf->SetX(125);
    $pdf->Cell(80,10, utf8_decode('Departamento Emisor: Recursos Humanos'),1,2,'C');
    $pdf->SetX(15);
    $pdf->Cell(63,7, utf8_decode('Fecha: '),1,0,'C',1);
    $pdf->Cell(63,7, utf8_decode('Código Trabajador'),1,2,'C',1);
    $pdf->SetFont('Arial','',12);
    $pdf->SetX(15);
    $pdf->Cell(63,7, utf8_decode($week_day_number. '/' . $month_number . '/' . $year),1,0,'C');
    $pdf->Cell(63,7, utf8_decode($codigo_empleado),1,2,'C');
    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',12);
    $pdf->Ln(2);
    $pdf->SetX(15);

    $pdf->Cell(190,7, utf8_decode('DATOS DEL TRABAJADOR'),1,2,'C');
    
    $pdf->SetX(15);
    
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(70,7, utf8_decode('APELLIDOS Y NOMBRES'),1,0,'C',1);
    $pdf->Cell(62,7, utf8_decode('C.I Y RIF'),1,0,'C',1);
    $pdf->Cell(30,7, utf8_decode('ESTADO CIVIL'),1,0,'C',1);
    $pdf->Cell(28,7, utf8_decode('Adelanto de: '),1,2,'C',1);
    $pdf->SetX(15);
    
    $pdf->Cell(70,7, utf8_decode($e_p_apellido . ' ' . $e_s_apellido . ' ' . $e_nombre .' '. $e_s_nombre),1,0,'C',1);
    $pdf->Cell(62,7, utf8_decode('C.I: ' . $e_cedula .' -- RIF: ' .$e_rif),1,0,'C');
    $pdf->SetY(79);
    $pdf->SetX($pdf->GetX()+137);   
    $pdf->Cell(30,7, utf8_decode($e_estado_civil),1,0,'C',1);
    $pdf->Cell(28,7, utf8_decode($sueldo_o_quincena),1,2,'C',1);
    $pdf->Ln();

    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(95,8, utf8_decode('CANTIDAD SOLICITADA POR EL TRABAJADOR: 
    Bs. '.$monto_sueldo_quincena ),'LRT','C');
    $pdf->SetX(15);
    $pdf->MultiCell(95,8, utf8_decode('DECISIÓN DE RRHH: 
___ APROBADO   ___RECHAZADO ' ),'LR', 'C');
$pdf->SetX(15);
$pdf->MultiCell(95,8, utf8_decode('CANTIDAD APROBADA POR RRHH: 
Bs. ' ),'LR','C');
$pdf->SetX(15);
$pdf->MultiCell(95,8, utf8_decode('FECHA DE EMISIÓN DE CHEQUE:   
'
.$week_day_number.'/'.$month_number.'/'.$year),'LRB','C');

$pdf->SetY(93);
$pdf->SetX($pdf->GetX()+100);
$pdf->SetFont('Arial','',11);

$pdf->MultiCell(95,10.6, utf8_decode('EL TRABAJADOR TENDRÁ DERECHO A DOS
ADELANTOS DE SUELDO O DE QUINCENA EN EL AÑO LABORAL, LOS CUALES SERÁN 
DESCONTADOS EN SU TOTALIDADA PARTIR DE LA QUINCENA INMEDIATAMENTE SIGUIENTE A LA FECHA DE LIQUIDACIÓN DEL ANTICIPO.'),'LRBT','C');
$pdf->Ln();
$pdf->SetX(15);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(95,7, utf8_decode('FIRMA DEL EMPLEADO'),1,0,'C',1);
$pdf->Cell(95,7, utf8_decode('FIRMA DE RECURSOS HUMANOS'),1,2,'C',1);
$pdf->SetFont('Arial','',11);
$pdf->SetX(15);
$pdf->MultiCell(95,10.6, utf8_decode('
FECHA DE LA SOLICITUD:
'
.$week_day_number .'/'.$month_number.'/'.$year
),'LRBT','C');

$pdf->SetY(174);
$pdf->SetX($pdf->GetX()+100);

$pdf->MultiCell(95,10.6, utf8_decode('
FECHA DE RECEPCIÓN:
'
.$week_day_number .'/'.$month_number.'/'.$year
),'LRBT','C');




    $pdf->Output('D','adelanto_quincena_o_sueldo.pdf');
    exit;


}

add_action( 'admin_post_my_action', 'prefix_admin_my_action' );
add_action( 'admin_post_nopriv_my_action', 'prefix_admin_add_foobar' );

function prefix_admin_my_action() {
    echo "<script>alert('hola')</script>";
}

/* if (isset($_POST['buscar_tipo_solicitud'])){
    if($_POST['tipo_solicitud'] == 1){
        echo "<script>alert('ola')</script>";
        
        echo "<script>document.getElementById('con_bono').style.display = 'block'</script>";
    }
} */

/* if( isset($_POST['search_constancias'])){
    $codigo_trabajador = $_POST['code'];
    global $wpdb;
    $query = $wpdb->get_results( "SELECT * FROM ic_constancias_trabajo 
    WHERE '$codigo_trabajador' = codigo_empleado "); 
    
    foreach ($query as $row) {
        $id = $row->ID; 
        $codigo_empleado = $row-> codigo_empleado;
        $nombre = $row->nombre; 
        $apellido = $row->apellido; 
        $fecha = $row->fecha; 
    }
    if($query == true){
        echo "<script>alert('Resultados encontrados')</script>";
        echo "<div class='table_container'>
        <table>
            <tr>
            <th style='padding-left:10px'>ID</th>
                <th>Codigo del Trabajador2</th>
                <th>Solicitante2</th>
                <th>Fecha2</th>
                </tr>
                
                <tr>
                <td>" . $id . "</td>
                <td>". $codigo_empleado . "</td>
                <td>" . $nombre. ' '. $apellido . "</td>
                <td>" . $fecha . "</td>
                </tr>
                
                
                </table>	
                </div>";
    }else{
        echo "<script>alert('NO Resultados encontrados')</script>";
    }
}
 */
/* ====================================ENVIO DE GMAIL CON PDF ADJUNTO =======================================*/
/* ====================================ENVIO DE GMAIL CON PDF ADJUNTO =======================================*/
/* ====================================ENVIO DE GMAIL CON PDF ADJUNTO =======================================*/

/* $pdf = new FPDF();
$pdf->AddPage('L', 'legal');
$pdf->SetFont( 'Arial', '', 20 );
$pdf->Cell(0,3, utf8_decode('RECIBO DE PAGO'),0,2,'C'); //TITULO
$pdf->Ln();
$pdf->SetFont( 'Arial', '', 12 );
//Cell(ANCHO, ALTO, TEXTO, BORDE (1,0), ln(0,1,2), ALIGN(L,C,R), FONDO(BOOLEAN))
$pdf->SetTextColor(7,25,83); //COLOR AZUL PARA TEXTO DE CODIGO
$pdf->SetFillColor(157,176,232); // FONDO GRIS PARA CODIGO
$pdf->Cell(25,10,utf8_decode('CODIGO'),1,2,'C',true); //TEXTO DE CODIGO
$pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA TEXTO DEL NUMERO DE CODIGO 
$pdf->Cell(25,10,utf8_decode('1234'),1,2,'C'); //TEXTO DEL NUMERO DE CODIGO
$pdf-> Ln(2); //SALTO DE LINEA
$pdf->SetTextColor(7,25,83); //COLOR AZUL PARA FECHA INGRESO
$pdf->SetFillColor(157,176,232); // FONDO GRIS PARA FECHA INGRESO
$pdf->Cell(45,10,utf8_decode('FECHA INGRESO '),1,2,'C',true); //TEXTO DE FECHA INGRESO
$pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA FECHA INGRESO 
$pdf->Cell(45,10,utf8_decode('2021-07-19'),1,2,'C'); //TEXTO DEL FECHA INGRESO
$pdf-> SetY(38);
$pdf-> SetX(70);
$pdf->SetTextColor(7,25,83); //COLOR AZUL PARA SUELDO
$pdf->SetFillColor(157,176,232); // FONDO GRIS PARA SUELDO
$pdf->Cell(45,10,utf8_decode('SUELDO MENSUAL'),1,2,'C',true); //TEXTO DE SUELDO
//$pdf-> SetY(40);
$pdf-> SetX(70);
$pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA SUELDO 
$pdf->Cell(45,10,utf8_decode('20000000'),1,2,'C'); //TEXTO DEL SUELDO
$pdf->SetFont( 'Arial', '', 30 ); //FUENTE SOLO PARA TEXTO DE ABAJO
//$pdf-> SetX(100);
$pdf-> SetY(42);
$pdf->SetTextColor(7,25,83); //COLOR NEGRO PARA SUELDO 
$pdf->Cell(280,10,utf8_decode('INDUSTRIAS CORPANAL, C.A.'),0,1,'R', false); //TEXTO DEL SUELDO
$pdf->SetFont( 'Arial', '', 12 ); //SE RETOMA ARIAL 12
$pdf-> SetY(49);
$pdf-> SetX(180);
$pdf->SetTextColor(7,25,83); //COLOR NEGRO PARA SUELDO 
$pdf->Cell(70,10,utf8_decode('RIF.: J-30070620-6'),0,1,'C', false); //TEXTO DEL SUELDO
$pdf-> SetY(16);
$pdf-> SetX(37);
$pdf->SetTextColor(7,25,83); //COLOR AZUL PARA TEXTO DE NOMBRE
$pdf->SetFillColor(157,176,232); // FONDO GRIS PARA NOMBRE
$pdf->Cell(90,10,utf8_decode('NOMBRE '),1,0,'C',true); //TEXTO DE NOMBRE
$pdf-> SetY(26);
$pdf-> SetX(37);
$pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA NOMBRE 
$pdf->Cell(90,10,utf8_decode('LUIS EDUARDO VARGAS PEREZ'),1,2,'C'); //TEXTO DEL NOMBRE
$pdf-> SetY(16);
$pdf-> SetX(129);
$pdf->SetTextColor(7,25,83); //COLOR AZUL PARA TEXTO DE DPTO
$pdf->SetFillColor(157,176,232); // FONDO GRIS PARA DPTO
$pdf->Cell(90,10,utf8_decode('DEPARTAMENTO '),1,0,'C',true); //TEXTO DE DPTO
$pdf-> SetY(26);
$pdf-> SetX(129 );
$pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA DPTO 
$pdf->Cell(90,10,utf8_decode('INFORMATICA'),1,2,'C'); //TEXTO DEL DPTO
$pdf-> SetY(16);
$pdf-> SetX(222);
$pdf->SetTextColor(7,25,83); //COLOR AZUL PARA PERIODO DE PAGO
$pdf->SetFillColor(157,176,232); // FONDO GRIS PARA PERIODO DE PAGO
$pdf->Cell(50,10,utf8_decode('PERIODO DE PAGO '),1,0,'C',true); //TEXTO DE PERIODO DE PAGO
$pdf-> SetY(26);
$pdf-> SetX(222);
$pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA PERIODO DE PAGO 
$pdf->Cell(50,10,utf8_decode('2021-07-01 - 2021-08-01'),1,2,'C'); //TEXTO DEL PERIODO DE PAGO
$pdf-> SetY(16);
$pdf-> SetX(275);
$pdf->SetTextColor(7,25,83); //COLOR AZUL PARA CEDULA
$pdf->SetFillColor(157,176,232); // FONDO GRIS PARA CEDULA
$pdf->Cell(50,10,utf8_decode('CEDULA'),1,0,'C',true); //TEXTO DE CEDULA
$pdf-> SetY(26);
$pdf-> SetX(275);
$pdf->SetTextColor(28, 27, 23); //COLOR NEGRO PARA CEDULA 
$pdf->Cell(50,10,utf8_decode('26489495'),1,2,'C'); //TEXTO DEL CEDULA
$pdf->Ln(30);
$pdf->SetTextColor(7,25,83);
$pdf->SetFillColor(157,176,232);
$pdf->Cell(30,10, utf8_decode('CANTIDAD_A'),1,0,'C',1);
$pdf->Cell(100,10, utf8_decode('DESCRIPCION_A'),1,0,'C',1);
$pdf->Cell(35,10, utf8_decode('MONTO_A'),1,0,'C',1);
$pdf->SetX($pdf->GetX()+5);
$pdf->Cell(30,10, utf8_decode('CANTIDAD_D'),1,0,'C',1);
$pdf->Cell(100,10, utf8_decode('DESCRIPCION_D'),1,0,'C',1);
$pdf->Cell(35,10, utf8_decode('MONTO_D'),1,2,'C',1);
$pdf->Ln(-10);
foreach($query_recibo_pago as $query){ //ASIGNACIONES
    $e_nombre = $query->primer_nombre; 
    $e_s_nombre = $query->segundo_nombre; 
    $e_p_apellido = $query->primer_apellido; 
    $e_s_apellido = $row->segundo_apellido; 
    $e_cedula = $row->cedula; 
    $e_sueldo = $row->sueldo_diario;
    $e_fecha_ingreso = $row->fecha_ingreso; 
    $e_cargo = $row->cargo;
    $pdf->Ln();
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(30,10, utf8_decode($e_nombre),1,0,'C',1);
    $pdf->Cell(100,10, utf8_decode($e_s_nombre),1,0,'C',1);
    $pdf->Cell(35,10, utf8_decode($e_p_apellido),1,0,'C',1);
    $pdf->SetX($pdf->GetX()+5);
    $pdf->Cell(30,10, utf8_decode($e_nombre),1,0,'C',1);
    $pdf->Cell(100,10, utf8_decode($e_s_nombre),1,0,'C',1);
    $pdf->Cell(35,10, utf8_decode($e_p_apellido),1,0,'C',1);
    } 
// email stuff (change data below)
$to = "luisvar2703@gmail.com"; 
$from = "luisvar2703@gmail.com"; 
$subject = "send email with pdf attachment"; 
$message = "<p>Please see the attachment.</p>";
// a random hash will be necessary to send mixed content
$separator = md5(time());
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
// attachment name
$filename = "test.pdf";
// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));
// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
// no more headers after this, we start the body! //
$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "This is a MIME encoded message.".$eol;
// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;
// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";
// send message
mail($to, $subject, $body, $headers); */

/* ====================================FIN DE GMAIL CON PDF ADJUNTO =======================================*/
/* ====================================FIN DE GMAIL CON PDF ADJUNTO =======================================*/
/* ====================================FIN DE GMAIL CON PDF ADJUNTO =======================================*/