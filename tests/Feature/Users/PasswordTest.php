<?php

namespace Tests\Feature\Users;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_authenticated_user_can_see_the_password_change_form()
    {
        $this->withoutExceptionHandling();

        $authUser = factory(User::class)->create();

        $this->actingAs($authUser);

        $this->get('/password/change')
            ->assertStatus(200)
            ->assertViewIs('auth.passwords.change')
            ->assertSee('Cambiar contraseña');
    }

    /** @test */
    function an_non_authenticated_user_cannot_see_the_password_change_form()
    {
        // $this->withoutExceptionHandling();

        $nonAuthUser = factory(User::class)->create();

        $this->get('/password/change')
            ->assertStatus(302)
            ->assertDontSee('Cambiar contraseña');
    }

    /** @test */
    function an_authenticated_user_can_change_its_password()
    {
        $oldPassword1 = 'CLAVE_ANTERIOR1';
        $newPassword1 = 'NUEVA_CLAVE1';

        $oldPassword2 = 'CLAVE_ANTERIOR2';
        $newPassword2 = 'NUEVA_CLAVE2';


        $authUser = factory(User::class)->create([
            'password' => bcrypt($oldPassword1),
        ]);
        $nonAuthUser = factory(User::class)->create([
            'password' => bcrypt($oldPassword2),
        ]);

        $this->actingAs($authUser);

        $this->put('/password/change', [
            'current_password' => $oldPassword1,
            'password' => $newPassword1,
        ]);

        $this->assertTrue(Hash::check($oldPassword1, $authUser->password));
        $this->assertFalse(Hash::check($newPassword1, $authUser->password));
    }
}
