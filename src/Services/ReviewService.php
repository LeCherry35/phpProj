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

    public function getReviewsByMovieId(int $movieId) :array
    {
        return $this->db->get('reviews', ['movie_id' => $movieId]);
    }

    

    public function updateMovieRating(int $movieId) :void
    {
        $reviews = $this->getReviewsByMovieId($movieId);

        //counting average rating
        $average_rating = array_reduce($reviews, function($carry, $review) {
            return $carry + $review['rating'];
        }, 0) / count($reviews);

        $this->db->update('movies', ['rating' => ceil($average_rating)], ['id' => $movieId]);
    }
}