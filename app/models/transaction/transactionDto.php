<?php

namespace models\transaction;
interface TransactionDtoInterface
{
    public function getId(): int;

    public function getType(): string;

    public function getUserId(): int;

    public function getDate(): string;

    public function getAmount(): float;

    public function getCurrency(): string;

    public function isProcessed(): bool;

    public function getDetails(): string|null;
}

class TransactionDto implements TransactionDtoInterface
{
    private int $id;
    private string $type;
    private int $userId;
    private string $date;
    private float $amount;
    private string $currency;
    private bool $processed;
    private string|null $details;

    public function __construct(int $id, string $type, int $user_id, string $date, float $amount, string $currency, bool $processed, string|null $details)
    {
        $this->id = $id;
        $this->type = $type;
        $this->userId = $user_id;
        $this->date = $date;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->processed = $processed;
        $this->details = $details;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function isProcessed(): bool
    {
        return $this->processed;
    }

    public function getDetails(): string|null
    {
        return $this->details;
    }
}
