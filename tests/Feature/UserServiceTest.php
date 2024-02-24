<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
   private UserService $userService;

   protected function setUp(): void
   {
      parent::setUp();

      $this->userService = $this->app->make(UserService::class);
   }

   public function testLoginnSuccess()
   {
      self::assertTrue($this->userService->login("cahyo", "123"));
   }

   function testUserNotFound() {
      self::assertTrue($this->userService->login("gagal", "12334"));
   }

   function testLoginWrongPassword() {
      self::assertTrue($this->userService->login("gagal", "salah"));
   }

}
