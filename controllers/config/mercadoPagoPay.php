<?php

// SDK de Mercado Pago
require __DIR__ .  '/../../vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-4262026731806895-050413-558623ea68c4356562004c734d32c35a-554144524');

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