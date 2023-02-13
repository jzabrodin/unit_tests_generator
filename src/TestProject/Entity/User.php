<?php

namespace App\TestProject\Entity;

class User
{
    protected string $name;

    protected Role $role;

    protected int $id;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return User
     */
    public function setRole(Role $role): User
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @param Role $role
     * @param int $id
     */
    public function __construct(string $name, Role $role, int $id)
    {
        $this->name = $name;
        $this->role = $role;
        $this->id = $id;
    }
}