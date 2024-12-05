<?php

namespace models\summary;

use models\user\UserDto;

class SummaryByUserDateDto
{
    private float $sum;
    private int $count;
    private string $date;
//    private UserDto $user;

    public function __construct(array $data = [])
    {
//        $this->user = $data['user'];
        $this->date = $data['date'];
        $this->sum = $data['sum'];
        $this->count = $data['count'];
    }

//    public function getUser(): UserDto
//    {
//        return $this->user;
//    }

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
