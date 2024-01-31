<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    private ReviewService $service;
    public function store() :void
    {
        $validation = $this->request()->validate([
            'rating' => ['required'],
            'review' => ['required', 'min:3', 'max:1000'],
        ]);

        $movieId = $this->request()->input('movieId');

        if(!$validation) {
            foreach($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('movie?id=' . $this->request()->input('movieId'));
        }
        $this->service()->store(
            $movieId,
            $this->auth()->userId(),
            $this->request()->input('review'),
            $this->request()->input('rating'),
        );

        $this->service()->updateMovieRating($movieId);

        $this->redirect('movie?id=' . $this->request()->input('movieId'));
    }

    private function service() :ReviewService
    {
        if(!isset($this->service)) {
            $this->service = new ReviewService($this->db());
        }
        return $this->service;
    }
}