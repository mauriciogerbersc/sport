<?php

namespace App\Repositories;

interface BaseRepositoryContract
{
    public function all();
    public function findById(int $id);
    public function store(array $data);
    public function delete(int $id);
    public function getByAttribute(string $field, string $attribute);
    public function getWithRelation(string $relation);
    public function updateById(array $data, int $id);
}
