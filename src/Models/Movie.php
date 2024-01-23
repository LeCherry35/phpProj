<?php

namespace App\Models;

class Movie 
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private string $categoryId,
        private string $image,
        private string $createdAt,
        private string $updatedAt
    )
    {}

    public function id () :int
    {
        return $this->id;
    }

    public function name () :string
    {
        return $this->name;
    }

    public function description () :string
    {
        return $this->description;
    }

    public function categoryId () :string
    {
        return $this->categoryId;
    }

    public function image () :string
    {
        return $this->image;
    }

    public function createdAt () :string
    {
        return $this->createdAt;
    }

    public function updatedAt () :string
    {
        return $this->updatedAt;
    }
}