<?php

class Contact
{
    private int $id;
    private string $name;
    private array $phones = [];

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function addPhone(string $number): void
    {
        $this->phones[] = $number;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhones(): array
    {
        return $this->phones;
    }
}
