<?php
namespace App\Repositories\Interfaces;

use Ramsey\Collection\Collection;

interface EloquentInterface
{
    /**
     * @return mixed
     */
   public function processFile(array $file);

    /**
     * @return mixed
     */
   public function fetchFromPublicAPI();

   public function readFile(array $file);

}
