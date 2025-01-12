<?php 

declare(strict_types=1);

namespace App\Core;

class APIService
{

  public function execute(
    string $apiUrl, 
    array $requestData, 
    array $additionalConfig = []
  ) : string | false
  {

    $ch = curl_init();

    $defaultConfig = array(
        CURLOPT_URL => $apiUrl,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $requestData,
        CURLOPT_SSL_VERIFYPEER => false,
    );

    $curlConfig = $defaultConfig + $additionalConfig; // Merge default and additional configurations

    curl_setopt_array($ch, $curlConfig);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
        return false; // Return false if there is a curl error
    }

    curl_close($ch);

    return $response;

  }
  
}
