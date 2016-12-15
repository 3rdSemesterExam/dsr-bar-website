<?php
    if (isset($_GET['postUser']))
    {
        // Post to Webservice Authorization Table
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($auth_header, 'Content-Type: application/json')); // Sets header so its capable of posting json
        curl_setopt($curl, CURLOPT_URL, 'http://dsr-webservice.azurewebsites.net/api/userAccount/Register'); // Link to our webservice
        curl_setopt($curl, CURLOPT_POST, true); // Does so its a post request

        // The different data, which will be sent to the webservice
        $data = array(
            'Email' => $_POST['textBox_email'],
            'Password' => $_POST['TextBox_password'],
            'ConfirmPassword' => $_POST['TextBox_ConfirmPassword']
        );
        $jsonData = json_encode($data); // encodes the data as json
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData); // the fields we're posting
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);

        $curl = null;
        $data = null;
        $jsonData = null;

        // Post to Webservice User Table
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($auth_header, 'Content-Type: application/json')); // Sets header so its capable of posting json
        curl_setopt($curl, CURLOPT_URL, 'http://dsr-webservice.azurewebsites.net/api/Users'); // Link to our webservice
        curl_setopt($curl, CURLOPT_POST, true);
        // The different data, which will be sent to the webservice
        $data = array(
            'Username' => $_POST['textBox_email'],
            'Password' => 'empty'
        );

        $jsonData = json_encode($data); // encodes the data as json
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData); // the fields we're posting
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);

        $curl = null;
        $data = null;
        $jsonData = null;

        header("Location: Admin-Panel.php"); // Redirects to Admin-Panel.php site
    }
