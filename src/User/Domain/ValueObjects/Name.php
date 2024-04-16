<?php

namespace Src\User\Domain\ValueObjects;

class Name
{

    public function __construct(private string $name)
    {
        $this->validate();
    }

    public function value(): string
    {
        return $this->name;
    }

    private function validate(): void
    {
        if (empty($this->name)) {
            throw new \InvalidArgumentException("Name cannot be empty");
        }
    }


}
