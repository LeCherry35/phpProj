<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Movie;
use App\Models\Review;

class MovieService 
{
    public function __construct(
        private DatabaseInterface $db
    )
    {}

    public function store(string $name, string $description, int $category_id, UploadedFileInterface $image) :int|false
    {

        $filePath = $image->move('movies');

        return $this->db->insert('movies', [
            'name' => $name,
            'description' => $description,
            'category_id' => $category_id,
            'image' => $filePath,
        ]);
    }

    public function getMovies() :array
    {
        $movies = $this->db->get('movies');

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['category_id'],
                $movie['image'],
                $movie['rating'],
                $movie['created_at'],
                $movie['updated_at'],
            );
        }, $movies);
    }

    public function getMovie(int $id) :Movie
    {
        $movie = $this->db->first('movies', ['id' => $id]);

        if(!$movie) {
            return null;
        }

        $reviews = $this->getReviews($id);
        
        $hasUsersReview = array_reduce($reviews, function ($userHasReview, $review) {

            if($review->fromCurrentUser()) return true;
            else return $userHasReview;
        }, false);
        return new Movie(
            $movie['id'],
            $movie['name'],
            $movie['description'],
            $movie['category_id'],
            $movie['image'],          
            $movie['rating'],
            $movie['created_at'],
            $movie['updated_at'],
            $reviews,
            $hasUsersReview,
        );
    }

    public function delete(int $id) :void
    {
        $this->db->delete('movies', ['id'=>$id]);
    }

    public function update(string $name, string $description, int $category_id, ?UploadedFileInterface $file ,int $id) :void
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'category_id' => $category_id,
        ];

        if ($file && !$file->hasErrors()) {
            $data['image'] = $file->move('movies');
        }

        $this->db->update('movies', $data, ['id'=>$id]);
    }

    public function getFreshMovies() :array
    {
        $movies = $this->db->get('movies', [], ['id' => 'DESC'], 4);

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['category_id'],
                $movie['image'],
                $movie['rating'],
                $movie['created_at'],
                $movie['updated_at'],
            );
        }, $movies);
    }

    private function getReviews(int $id)
    {
        return array_map(function ($review) {
            $user = $this->db->first('users', ['id' => $review['user_id']]);
            return new Review(
                $review['id'],
                $review['movie_id'],
                $user['id'],
                $user['name'],
                $review['review'],
                $review['rating'],
                $user['id'] === $_SESSION['user_id'],
            );
        }, $this->db->get('reviews', ['movie_id' => $id], ['id' => 'DESC']))
        ;
    }
}