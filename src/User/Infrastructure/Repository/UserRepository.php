<?php

namespace Src\User\Infrastructure\Repository;

use Src\User\Domain\User;
use Src\User\Domain\Contracts\UserContract;
use App\Models\SimpleUser as EloquentUser;

final class UserRepository implements UserContract
{

    public function __construct(private EloquentUser $userModel)
    {
    }

    public function create(User $user): void
    {
        $this->userModel->create([
            'name' => $user->getName()->value(),
            'email' => $user->getEmail()->value(),
        ]);
    }

    public function update(int $id, User $user): void
    {
        $userToUpdate = $this->userModel->find($id);

        if (is_null($userToUpdate)) {
            throw new \Exception("User not found");
        }

        $userToUpdate->update([
            'name' => $user->getName()->value(),
            'email' => $user->getEmail()->value(),
        ]);
    }

    public function delete(int $id): void
    {
        $userToDelete = $this->userModel->find($id);

        if (is_null($userToDelete)) {
            throw new \Exception("User not found");
        }

        $userToDelete->delete();
    }

    public function getById(int $id): User
    {
        $user = $this->userModel->find($id);

        if (is_null($user)) {
            throw new \Exception("User not found");
        }

        return User::create($user->name, $user->email);
    }

}
