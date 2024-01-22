<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;

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
}