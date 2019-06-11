<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    public  function findWithJoin(int $id , array  $columns );
}

