<?php

namespace App\Services;

use App\Repositories\ProfileRepo;

class ProfileService
{
  protected $profileRepo;

  public function __construct(ProfileRepo $profileRepo)
  {
    $this->profileRepo = $profileRepo;
  }

  public function saveProfile(array $data, $photo = null){

   return $this->profileRepo->createOrUpdateProfile($data, $photo);

  }

}