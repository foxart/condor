<?php

namespace models\summary;
class SummaryDto
{
    private int $countyId;
    private string $countyName;
    private string $countyCode;
    private float $sum;
    private int $count;

    public function __construct(array $data = [])
    {
        $this->countyId = $data['countyId'];
        $this->countyName = $data['countyName'];
        $this->countyCode = $data['countyCode'];
        $this->sum = $data['sum'];
        $this->count = $data['count'];
    }

    public function getCountyId(): int
    {
        return $this->countyId;
    }

    public function getCountyName(): string
    {
        return $this->countyName;
    }

    public function getCountyCod(): string
    {
        return $this->countyCode;
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
