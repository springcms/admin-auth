<?php

namespace SpringCms\AdminAuth\Models;
 
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Services\Contracts\NosqlServiceInterface;
 
class ApiUser implements AuthenticatableContract
{
  
  private $username;
  private $password;
  protected $rememberTokenName = 'remember_token';
 
  public function __construct()
  {
    //code what is in here
  }
 
  /**
   * Fetch user by Credentials
   *
   * @param array $credentials
   * @return Illuminate\Contracts\Auth\Authenticatable
   */
  public function fetchUserByCredentials(Array $credentials)
  {   
      $this->username = 'hoannet';
      $this->password = '111111';
      dd($this);  
      return $this;
  }
 
  /**
   * {@inheritDoc}
   * @see \Illuminate\Contracts\Auth\Authenticatable::getAuthIdentifierName()
   */
  public function getAuthIdentifierName()
  {
    return "username";
  }
  
  /**
   * {@inheritDoc}
   * @see \Illuminate\Contracts\Auth\Authenticatable::getAuthIdentifier()
   */
  public function getAuthIdentifier()
  {
    return $this->{$this->getAuthIdentifierName()};
  }
 
  /**
   * {@inheritDoc}
   * @see \Illuminate\Contracts\Auth\Authenticatable::getAuthPassword()
   */
  public function getAuthPassword()
  {
    return $this->password;
  }
 
  /**
   * {@inheritDoc}
   * @see \Illuminate\Contracts\Auth\Authenticatable::getRememberToken()
   */
  public function getRememberToken()
  {
    if (! empty($this->getRememberTokenName())) {
      return $this->{$this->getRememberTokenName()};
    }
  }
 
  /**
   * {@inheritDoc}
   * @see \Illuminate\Contracts\Auth\Authenticatable::setRememberToken()
   */
  public function setRememberToken($value)
  {
    if (! empty($this->getRememberTokenName())) {
      $this->{$this->getRememberTokenName()} = $value;
    }
  }
 
  /**
   * {@inheritDoc}
   * @see \Illuminate\Contracts\Auth\Authenticatable::getRememberTokenName()
   */
  public function getRememberTokenName()
  {
    return $this->rememberTokenName;
  }
}