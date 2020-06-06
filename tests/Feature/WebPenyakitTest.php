<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Models\User;


class WebPenyakitTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // TEST FUTURE TANPA LOGIN (Url Home)
    public function test_tanpa_login()
    {
        $response = $this->get('/');

        $response->assertRedirect('/home');
    }

    // TEST FUTURE DENGAN LOGIN (MIDDLEWARE PROTECTION)
    public function test_dengan_login()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }



    //  TETS UNIT UNIT CREATE (DASH NOT LOG)
    public function testUnitCreate()
    {
        $response = $this->post('/artikel-without-route', []);

        $response->assertOk();
    }

    protected $admin;
    public function setUp():void
    {
        parent::setUp();
        $this->admin = factory(User::class)->create([
            'name' => 'Kafri Bung',
            'email' => 'kafri@bung.com',
        ]);
    }
    // TEST UNIT CREATE DATA USER
    public function testUnitCreateDataUser()
    {
        $this->assertSame("Kafri Bung", $this->admin->name);
    }

}
