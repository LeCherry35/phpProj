<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;

class ReviewService {
    public function __construct(
        private DatabaseInterface $db
    )
    {}

    public function store (int $movieId, int $userId, string $review, int $rating) :int|false
    {
        return $this->db->insert('reviews', [
            'movie_id' => $movieId,
            'user_id' => $userId,
            'review' => $review,
            'rating' => $rating,
        ]);

    }

}