<?php

namespace models\summary;
class SummaryDto
{
    private int $countryId;
    private string $countryName;
    private string $countryCode;
    private float $sum;
    private int $count;

    public function __construct(array $data = [])
    {
        $this->countryId = $data['countryId'];
        $this->countryName = $data['countryName'];
        $this->countryCode = $data['countryCode'];
        $this->sum = $data['sum'];
        $this->count = $data['count'];
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getCountryName(): string
    {
        return $this->countryName;
    }

    public function getCountryCod(): string
    {
        return $this->countryCode;
    }

    public function getSum(): float
    {
        return $this->sum;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
