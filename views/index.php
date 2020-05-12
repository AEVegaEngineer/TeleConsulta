<?php include_once "../htmltemplates/header-top-body.php"?>
<?php
// SDK de Mercado Pago
require __DIR__ .  '/../vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-4262026731806895-042412-7f48c0c26b01aaa20ca7d1d89ce1ba99-554144524');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = "1";
$item->title = "TeleConsulta - CIMYN";
$item->quantity = 1;
$item->currency_id = "ARS";
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();

?>
<div class="page-wrapper">
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sistema para TeleConsultas</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                        </ol>
                    </nav>
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="col col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <b>Haga su reserva para una consulta médica online ahora!</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Reserva una Consulta</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">reserva</li>
                        </ol>
                    </nav>
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">Seleccione una especialidad y una fecha para ver los médicos disponibles</h5>
                    </div>
                    <div class="w-50 p-15">  
                        <label for="datepicker-autoclose">Escoger especialidad</label>                   
                        <select class="form-control">
                            <option>Oftalmología</option>
                            <option>Neurología</option>
                            <option>Cardiología</option>
                        </select>
                    </div>
                    <div class="w-50 p-15">     
                        <label for="datepicker-autoclose">Escoger fecha</label>                   
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepicker-autoclose" placeholder="Click aquí">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">Seleccione un médico para reservar su consulta</h5>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><a href="teleconsulta.php?room=LuisColmenares">Luis Colmenares</a></td>
                            </tr>
                            <tr>
                                <td><a href="teleconsulta.php?room=AriannaIvarra">Arianna Ivarra</a></td>
                            </tr>
                            <tr>
                                <td><a href="teleconsulta.php?room=JulioMaruti">Julio Maruti</a></td> 
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col offset-md-4">
                <form action="/procesar-pago" method="POST">
                    <a href="pasarela_pago.php">
                        <div class="btn btn-primary">
                            <h5>Paga tu consulta aquí</h5>
                            <img src="../assets/images/mercadopago.png">
                        </div>    
                    </a> 

                    <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                   data-preference-id="<?php echo $preference->id; ?>">
                    </script>
                </form>
                <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>           
            </div>
        </div>
    </div>
</div>
<?php include_once "../htmltemplates/low-body-footer-scripts.php"?>