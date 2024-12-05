<?php

namespace models\status;
class StatusDto
{
    private int $id;
    private string $name;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
