<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\Category;

class CategoryService
{
    public function __construct(
        private DatabaseInterface $db
    )
    {}

    public function addCategory (string $name) :int|false
    {
        return $this->db->insert('categories', [
            'name' => $name,
        ]);
    }

    public function getCategories () :array
    {
        $categories = $this->db->get('categories');
        
        return $categories = array_map(function ($category) {
            return new Category(
                $category['id'],
                $category['name'],
                $category['created_at'],
                $category['updated_at'],
            );
        }, $categories);
    }

    public function delete (int $id) :void
    {
        $this->db->delete('categories', ['id' => $id]);
    }

    public function getCategory (int $id) :Category
    {
        $category = $this->db->first('categories', ['id' => $id]);
        if(!$category) {
            return null;
        }
        return new Category(
            $category['id'],
            $category['name'],
            $category['created_at'],
            $category['updated_at'],
        );
    }

    public function update (int $id, string $name) :void
    {
        $this->db->update('categories', ['name' => $name,], ['id' => $id]);
    }
}