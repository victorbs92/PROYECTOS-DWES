<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            $wsdl_url = 'http://localhost:8080/mavenproject1/dni?WSDL';
            $client = new SOAPClient($wsdl_url);
            $params = array(
                'numDNI' => "71166826",
            );
            $return = $client->obtenerLetraDNI($params);
            print_r($return);
        } catch (Exception $e) {
            echo "Exception occured: " . $e;
        }

        try {
            $wsdl_url = 'http://localhost:8080/mavenproject1/dni?WSDL';
            $client = new SOAPClient($wsdl_url);
            $params = array(
                'numDNI' => "71166826",
                'letraDNI' => "L",
            );
            $return = $client->comprobarDNI($params);
            print_r($return);
        } catch (Exception $e) {
            echo "Exception occured: " . $e;
        }
        ?>
    </body>
</html>
