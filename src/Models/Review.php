<?php

namespace App\Models;

use App\Kernel\Auth\User;

class Review
{
    public function __construct(
        private int $id,
        private int $movieId,
        private int $userId,
        private string $userName,
        private string $review,
        private int $rating,
        private bool $fromCurrentUser = false,
    )
    {}

    public function id () :int
    {
        return $this->id;
    }

    public function movieId () :int
    {
        return $this->movieId;
    }

    public function userId () :int
    {
        return $this->userId;
    }

    public function userName () :string
    {
        return $this->userName;
    }

    public function review () :string
    {
        return $this->review;
    }

    public function rating () :int
    {
        return $this->rating;
    }

    public function fromCurrentUser () :bool
    {
        return $this->fromCurrentUser;
    }
}