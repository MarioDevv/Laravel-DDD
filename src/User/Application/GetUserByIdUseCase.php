<?php

namespace Src\User\Application;

use Src\User\Domain\User;

use Src\User\Domain\Contracts\UserContract;
final class GetUserByIdUseCase
{
    public function __construct(private UserContract $contract)
    {
    }

    public function __invoke(int $id): User
    {
        return $this->contract->getById($id);
    }
}