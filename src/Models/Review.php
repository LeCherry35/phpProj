<?php

namespace App\Models;

use App\Kernel\Auth\User;

class Review
{
    public function __construct(
        private int $id,
        private int $movieId,
        private User $user,
        private string $review,
        private int $rating,
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

    public function user () :User
    {
        return $this->user;
    }

    public function review () :string
    {
        return $this->review;
    }

    public function rating () :int
    {
        return $this->rating;
    }
}