<?php

namespace models\transaction;

use Countable;
use Iterator;
use models\user\UserDto;

class TransactionIterator implements Iterator, Countable
{
    private array $collection;

    public function __construct(array $array)
    {
        $this->collection = $array;
    }

    public function current(): TransactionDto
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

    /**
     * Filters the current collection of items using a callback function.
     *
     * @param callable $callback A function that determines whether an item should be included in the result. It should return true for items to include and false for items to exclude.
     *
     * @return TransactionIterator A new instance of TransactionIterator containing the items that match the criteria specified by the callback.
     */
    public function filter(callable $callback): TransactionIterator
    {
        $result = [];
        foreach ($this as $item) {
            if ($callback($item)) {
                $result[] = $item;
            }
        }
        return new TransactionIterator($result);
    }
}
