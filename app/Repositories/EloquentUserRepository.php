<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

/**
 * Eloquent user repository implementation.
 */
final class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * Stores user
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Updates user using given data.
     *
     * @param User $user
     * @param array $data
     * @return User|bool
     */
    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    /**
     * Delertes user by ID.
     *
     * @param string|integer $id
     * @return boolean
     */
    public function deleteById(int|string $id): bool
    {
        $user = $this->getById($id);

        if (!$user) {
            return false;
        }

        $deleted = (bool) $user->delete();

        return $deleted;
    }

    /**
     * Returns user by ID or null if not found.
     *
     * @param integer|string $id
     * @return User|null
     */
    public function getById(int|string $id): ?User
    {
        return User::find($id);
    }

    /**
     * Returns user by username or null.
     *
     * @param string|null $username
     * @return User|null
     */
    public function getByUsername(string|null $username): ?User
    {
        return User::where("name", $username)->first();
    }
}
