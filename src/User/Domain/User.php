<?php

namespace Src\User\Domain;

use Src\User\Domain\ValueObjects\Email;
use Src\User\Domain\ValueObjects\Name;

class User
{

    public function __construct(
        private Name $name,
        private Email $email,
    )
    {
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }


    public static function create(string $name, string $email): self
    {
        return new self(new Name($name), new Email($email));
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name->value(),
            'email' => $this->email->value(),
        ];
    }

}
