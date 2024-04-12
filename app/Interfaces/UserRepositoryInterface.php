<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Returns user by ID.
     *
     * @param integer|string $id
     * @return User|null
     */
    public function getById(int|string $id): ?User;

    /**
     * Returns user by username.
     *
     * @param string|null $username
     * @return User|null
     */
    public function getByUsername(?string $username): ?User;

    /**
     * Creates user using data.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * Updates user using given data.
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data): bool;

    /**
     * Deletes user by ID.
     *
     * @param integer|string $id
     * @return bool
     */
    public function deleteById(int|string $id): bool;
}
