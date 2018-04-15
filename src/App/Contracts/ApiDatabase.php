<?php

namespace SpringCms\AdminAuth\App\Contracts;
 
use SpringCms\AdminAuth\App\Contracts\ApiServiceInterface;
 
class ApiDatabase implements ApiServiceInterface
{
  private $connection;
  private $database;
     
  public function __construct()
  {
    // code somting
  }
  
  /**
   * @see \App\Services\Contracts\NosqlServiceInterface::find()
   */
  public function find($collection, Array $criteria)
  {
    //return $this->database->{$collection}->findOne($criteria);
  }
 
  public function create($collection, Array $document) {}
  public function update($collection, $id, Array $document) {}
  public function delete($collection, $id) {}
}