<?php
session_start();
include_once "../controllers/config/checkAuth.php";
include_once "../controllers/config/mercadoPagoPay.php";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Reserva de TeleConsulta</title>
    <!-- Custom CSS -->
    <link href="../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb m-2">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Sistema de Teleconsultas</h4>  
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8" id="lbl-agendar">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-medical-bag"></i></h1>
                            <h6 class="text-white">Seleccioná un Médico y una Fecha Disponible para tu Consulta</h6>
                        </div>
                    </div>
                                        
                </div>
                <!-- Column -->
                <div class="col-12 col-md-2" id="lbl-pago">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-account-card-details"></i></h1>
                            <h6 class="text-white">Realizá tu pago</h6>
                        </div>
                    </div>
                </div>
                 <!-- Column -->
                <div class="col-12 col-md-2" id="lbl-ingreso">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-camera"></i></h1>
                            <h6 class="text-white">Ingresá a la TeleConsulta!</h6>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row" id="tab-agendar">
                <div class="col-12 offset-md-4 col-md-4">
                    <label for="selEspecialidad">Seleccioná la especialidad en la que deseas ser atendido</label>
                    <select class="form-control" id="selEspecialidad">
                        <option disabled="" selected="" value="">Seleccione...</option>
                        <!--<option>Cardiología</option>
                        <option>Dermatología</option>
                        <option>Neurología</option>-->
                    </select>
                    <hr>
                    <label for="selEspecialista">Seleccioná un Médico </label>
                    <select class="form-control" id="selEspecialista">
                        <option disabled="" selected="" value="">Seleccione...</option>                        
                    </select>
                    <p>Nota: Los médicos no listados no están disponibles para agendar nuevas citas</p>
                    <h5 class="card-title">Disponibilidad del Médico</h5>
                    <input type="text" class="form-control datepicker" id="fechaDisponible" placeholder="Seleccioná la fecha" autocomplete="off">
                    <button class="btn btn-primary btn-lg m-2 btn-block" id="btn-agendar">Siguiente</button>
                </div>                
            </div>
            <div class="row" id="tab-pago">
                <div class="col-12 offset-md-4 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <p>Para ingresar a la consulta deberás hacer click en el siguiente botón para procesar tu pago:</p>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-12">
                            <form action="/procesar-pago" method="POST">                               
                                <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                               data-preference-id="<?php echo $preference->id; ?>">
                                </script>
                            </form>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <img src="../assets/images/mercadopago.png" class="col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-warning btn-lg btn-block" id="btn-pago">Siguiente</button>
                        </div>
                    </div>
                    
                </div>   
            </div>
            <div class="row" id="tab-ingreso">
                <div class="col-12 offset-md-3 col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Usted está en cola para TeleConsulta</p>
                            <p>Su turno es el #</p>
                            <p>Cuando el médico esté disponible para tomar su consulta se habilitará un botón que le permitirá ingresar en la sala. Por favor, espere...</p>
                            <p>Tiempo estimado de espera: **:**</p>
                            <!--melina, mouse-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <button class="btn btn-primary m-2 btn-block" id="btn-back-agendar">Escoger otra fecha para la consulta</button>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <button class="btn btn-success m-2 btn-block" id="btn-ingreso" data-toggle="tooltip" data-placement="top" title="Este botón se habilitará para su ingreso en la sala de TeleConsultas cuando el médico esté listo para recibirlo">Ir a la TeleConsulta</button>
                        </div>                       
                    </div>                    
                </div> 
            </div>
        </div>
    
    </div>
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/libs/moment/min/moment.min.js"></script>
    <script src="../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../dist/js/pages/calendar/cal-init.js"></script>
    <!-- PERSONALIZADO -->
    <script src="../dist/js/pages/reserva/reservar_consulta.js"></script>

    <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../dist/js/pages/mask/mask.init.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- MERCADO PAGO -->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script> 

</body>

</html>