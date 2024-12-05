<?php

namespace models\summary;

use Countable;
use Iterator;

class SummaryByUserIterator implements Iterator, Countable
{
    private array $collection;

    public function __construct(array $array)
    {
        $this->collection = $array;
    }

    public function current(): SummaryByUserDto
    {
        return current($this->collection);
    }

    public function next(): void
    {
        next($this->collection);
    }

    public function key(): int
    {
        return key($this->collection);
    }

    public function valid(): bool
    {
        $key = key($this->collection);
        return ($key !== null);
    }

    public function rewind(): void
    {
        reset($this->collection);
    }

    public function count(): int
    {
        return count($this->collection);
    }
}
