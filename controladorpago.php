<?php

class controladorpago
{

    public function procesarPago($title, $quantity, $unit_price, $img)
    {

        require __DIR__ .  '/vendor/autoload.php';
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181');
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        $preference->payment_methods = array(
            "excluded_payment_methods" => array(
                array("id" => "amex")
            ),
            "excluded_payment_types" => array(
                array("id" => "atm")
            ),
            "installments" => 6
        );

        $payer = new MercadoPago\Payer();
        $payer->name = "Lalo";
        $payer->surname = "Landa";
        $payer->email = "test_user_58295862@testuser.com";
        $payer->date_created = "2018-06-02T12:58:41.425-04:00";
        $payer->phone = array(
            "area_code" => "52",
            "number" => "5549737300"
        );

        $payer->address = array(
            "street_name" => "Insurgentes Sur",
            "street_number" => 1602,
            "zip_code" => "03940"
        );

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $url = "https://eduardo735-mp-commerce-php.herokuapp.com";
        //$url = "http://eduardo.compracelulares.com";
        $item->title = $title;
        $item->id = "1234";
        $item->quantity = $quantity;
        $item->description = "“Dispositivo móvil de Tienda e-commerce";
        $item->unit_price = $unit_price;
        $item->currency_id = "MXN";
        $preference->notification_url = "https://webhook.site/03ef117d-5477-422e-861a-a4b18a754c35";
        $preference->items = array($item);
        $preference->back_urls = array(
            "success" => $url . "/success.php",
            "failure" => $url . "/failure.php",
            "pending" => $url . "/pending.php"
        );
        $preference->auto_return = "approved";
        $preference->email = "gentlelif3@outlook.com";
        $preference->external_reference = "gentlelif3@outlook.com";
        $preference->save();
        $preference->payer = $payer;


        $checkout = $preference->id;
        // var_dump($preference->back_urls);

        var_dump("Retornameros la respuesta");
        var_dump($preference->email);
        // var_dump($preference);
        return $checkout;
    }
}
