<?php

namespace Src\User\Domain\Contracts;
use Src\User\Domain\User;

interface UserContract
{

    public function create(User $user): void;
    public function update(int $id, User $user): void;
    public function delete(int $id): void;
    public function getById(int $id): User;
}
