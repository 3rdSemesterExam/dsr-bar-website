<?php
    // the code does not work!!!!!!
    if (isset($_GET['deleteUser']))
    {
        $data = array(
            'a' => 1,
            'b' => 2
        );

        $curl_delete = curl_init('http://dsr-webservice.azurewebsites.net/api/users');
        curl_setopt($curl_delete, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl_delete, CURLOPT_URL, 'http://dsr-webservice.azurewebsites.net/api/users');
        curl_setopt($curl_delete, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: DELETE', $auth_header));

        $result_delete = curl_exec($curl_delete);
        echo $result_delete;
    }

