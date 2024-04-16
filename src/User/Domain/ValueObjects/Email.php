<?php

namespace Src\User\Domain\ValueObjects;

class Email
{
    public function __construct(private string $email)
    {
        $this->validate();
    }

    public function value(): string
    {
        return $this->email;
    }

    private function validate(): void
    {
        if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Wrong email format");
        }
    }
}
