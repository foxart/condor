<?php

class PinkManApi
{
    private string $apiUrl = 'https://pinkman.online/api/';
    private string $apiKey = 'any';

    public function __construct()
    {
    }

    public function fetchTransactions()
    {
//        $url = $this->apiUrl . "?api-key=" . $this->apiKey;
//        $curl = curl_init();
//        curl_setopt_array($curl, [
//            CURLOPT_URL => $url,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_TIMEOUT => 30,
//            CURLOPT_HTTPGET => true
//        ]);
//        $response = curl_exec($curl);
//        $error = curl_error($curl);
//        curl_close($curl);
//        if ($error) {
//            echo "Curl error";
//            var_dump($error);
//            return $this->fetchMocked();
//        }
//        $data = json_decode($response, true);
//        if ($data['status'] !== 'success' || $data['statusCode'] !== 200) {
//            echo "Api error";
//            var_dump($data);
//            return $this->fetchMocked();
//        }
//        return $data['data'];
        return $this->fetchMocked();
    }

    public function fetchMocked()
    {
        $jsonContents = file_get_contents('system/pinkManApi.json');
        return json_decode($jsonContents, true);
    }
}
