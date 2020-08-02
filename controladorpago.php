<?php

class controladorpago
{

    public function procesarPago($title, $quantity, $unit_price, $img)
    {        
        var_dump("Cargando el SDK");
        require __DIR__ .  '/vendor/autoload.php';
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181');
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = $title;
        $item->quantity = $quantity;
        $item->unit_price = $unit_price;
        $preference->notification_url="https://webhook.site/03ef117d-5477-422e-861a-a4b18a754c35";
        $preference->items = array($item);
        $preference->save();
        $checkout = $preference->id;
        var_dump($preference->back_urls);
        var_dump($preference->notification_url);
        var_dump("Retornameros la respuesta");
        return $checkout;
    }
}
