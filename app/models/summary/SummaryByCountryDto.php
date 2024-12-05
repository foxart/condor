<?php

namespace models\summary;

use models\country\CountryDto;

class SummaryByCountryDto
{
    private float $sum;
    private int $count;
    private CountryDto $country;

    public function __construct(array $data = [])
    {
        $this->country = $data['country'];
        $this->sum = $data['sum'];
        $this->count = $data['count'];
    }

    public function getCountry(): CountryDto
    {
        return $this->country;
    }

    public function getSum(): float
    {
        return $this->sum;
    }

    public function incSum(float $sum): void
    {
        $this->sum += $sum;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function incCount(int $count): void
    {
        $this->count += $count;
    }
}
