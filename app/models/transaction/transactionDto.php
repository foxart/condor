<?php

namespace models\transaction;
class TransactionDto
{
    private int $id;
    private string $type;
    private int $userId;
    private string $date;
    private float $amount;
    private string $currency;
    private bool $processed;
    private string|null $details;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'];
        $this->type = $data['type'];
        $this->userId = $data['user_id'];
        $this->date = $data['date'];
        $this->amount = $data['amount'];
        $this->currency = $data['currency'];
        $this->processed = $data['processed'];
        $this->details = $data['details'];
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
