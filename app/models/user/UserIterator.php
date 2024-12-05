<?php

namespace models\user;

use Countable;
use Iterator;

class UserIterator implements Iterator, Countable
{
    private array $collection;

    public function __construct(array $array)
    {
        $this->collection = $array;
    }

    public function current(): UserDto
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
     * Iterates over the items and returns the first item that satisfies the given callback function.
     *
     * @param callable $callback A function that is applied to each item. The function should return true for the desired item.
     * @return UserDto|null Returns the first item for which the callback returns true, or null if no such item is found.
     */
    public function find(callable $callback): UserDto | null
    {
        foreach ($this as $item) {
            if ($callback($item)) {
                return $item;
            }
        }
        return null;
    }
}
