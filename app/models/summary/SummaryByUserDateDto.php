<?php

namespace models\summary;

class SummaryByUserDateDto
{
    private float $sum;
    private int $count;
    private string $date;

    public function __construct(array $data = [])
    {
        $this->date = $data['date'];
        $this->sum = $data['sum'];
        $this->count = $data['count'];
    }

    public function getDate(): string
    {
        return $this->date;
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
