<?php

namespace models\summary;

use models\user\UserDto;

class SummaryByUserDto
{
    private UserDto $user;
    private SummaryByUserDateIterator $summary;

    public function __construct(array $data = [])
    {
        $this->user = $data['user'];
        $this->summary = $data['summary'];
    }

    public function getUser(): UserDto
    {
        return $this->user;
    }

    public function getSummary(): SummaryByUserDateIterator
    {
        return $this->summary;
    }

    public function getSum(): float
    {
        return array_sum(array_map(function (SummaryByUserDateDto $item) {
            return $item->getSum();
        }, iterator_to_array($this->summary)));
    }

    public function getCount(): int
    {
        return array_sum(array_map(function (SummaryByUserDateDto $item) {
            return $item->getCount();
        }, iterator_to_array($this->summary)));
    }
}
