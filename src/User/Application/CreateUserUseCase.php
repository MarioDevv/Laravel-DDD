<?php


namespace Src\User\Application;

use Src\User\Domain\User;
use Src\User\Domain\Contracts\UserContract;

final class CreateUserUseCase
{
    public function __construct(private UserContract $contract)
    {
    }

    public function __invoke(User $user): void
    {
        $this->contract->create($user);
    }
}