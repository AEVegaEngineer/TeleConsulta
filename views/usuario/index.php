<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>Autenticación de Sistema de Teleconsulta</title>
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link href="../../dist/css/estilos_login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-light margin-login">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-10 p-b-10">
                        <h1  class="font-weight-bold" style="color:white;">Iniciar Sesión - TeleConsulta</h1>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" name="loginform" action="../../controllers/usuario/login.php" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Usuario o Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1" required="" id="username" name="username">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required="" id="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">  
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <button class="btn btn-block btn-lg btn-info" id="to-register" type="button"><i class="fa fa-plus m-r-5"></i> Registráte</button>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <button class="btn btn-block btn-lg btn-success float-right" type="submit" id="btn-login">Ingresá</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        
                        <form class="col-12" action="index.html">
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                -->
                <div id="registerform">
                    <div class="text-center p-t-10 p-b-10">
                        <h1  class="font-weight-bold" style="color:white;">Registro - TeleConsulta</h1>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" action="../../controllers/usuario/registro.php" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Nombre de Usuario" aria-label="Username" aria-describedby="basic-addon1" required id="username" name="username">
                                </div>
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Debe ser Correo Electrónico"  class="form-control form-control-lg" placeholder="Correo Electrónico" aria-label="Email" aria-describedby="basic-addon1" required id="email" name="email">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required id="password" name="password">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder=" Confirme Contraseña" aria-label="Password" aria-describedby="basic-addon1" required id="confirm" name="confirm">
                                </div>
                                <!-- DNI -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-white" id="basic-addon1"><i class="ti-id-badge"></i></span>
                                    </div>
                                    <input type="number" pattern="([0-9]{4-8})" title="Debe tener como máximo 8 cifras" class="form-control form-control-lg" placeholder="DNI o CI" aria-label="DNI" aria-describedby="basic-addon1" required id="dni" name="dni">
                                </div>
                                <!-- Obra Social -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-white" id="basic-addon-obra-social"><i class="ti-pulse"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Obra Social" aria-label="ObraSocial" aria-describedby="basic-addon1" required id="obrasocial" name="obrasocial">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">                                        
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <a class="btn btn-block btn-lg btn-warning" href="#" id="to-login" name="action">Ir Atrás</a>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <button class="btn btn-block btn-lg btn-info" type="submit" id="btn-registro" name="btn-registro">Registráte</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- Custom -->
    <script src="../../dist/js/pages/usuario/login_registro.js"></script>
    <!-- ============================================================== -->
    

</body>

</html>