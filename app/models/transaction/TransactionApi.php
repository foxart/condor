<?php

namespace models\transaction;
class TransactionApi
{
    private string $apiUrl = 'https://pinkman.online/api/';
    private string $apiKey = 'foxart.org';
    private string $cache;

    public function __construct()
    {
        $this->cache = 'models/transaction/transactionApi.json';
    }

    public function getTransactionList()
    {
        return $this->getCache();
        $url = "$this->apiUrl?api-key={$this->apiKey}";
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1,
            CURLOPT_HTTPGET => true
        ]);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if ($error) {
            debug(['data' => 'from cache', 'error' => $error], 'error');
            return $this->getCache();
        }
        $data = json_decode($response, true);
        if ($data['status'] !== 'success' || $data['statusCode'] !== 200) {
            debug(['data' => 'from cache', 'error' => $data], 'error');
            return $this->getCache();
        }
        $this->storeCache($data['data']);
        debug(['data' => 'from api', 'info']);
        return $data['data'];
    }

    private function getCache(): mixed
    {
        $jsonContents = file_get_contents($this->cache);
        return json_decode($jsonContents, true);
    }

    private function storeCache(mixed $data): void
    {
        file_put_contents($this->cache, json_encode($data, JSON_PRETTY_PRINT));
    }
}
