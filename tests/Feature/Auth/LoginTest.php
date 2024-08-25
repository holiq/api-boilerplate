<?php

use App\Models\User;

/**
 * @var \Tests\TestCase $this
 */
it('can login', function () {
    $user = User::factory()->create();

    $response = $this->post(route(name: 'login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertOk();
});

it('can not login if credentials are invalid', function () {
    $response = $this->post(route(name: 'login'), [
        'email' => 'invalid@mail.com',
        'password' => 'wrong-password',
    ]);

    $response->assertUnprocessable();

    expect(value: $response->content())->toContain(needles: 'These credentials do not match our records.');
});

it('can not login if request is empty.', function () {
    $response = $this->post(route(name: 'login'));

    $response->assertUnprocessable();

    expect(value: $response->content())->toContain(needles: 'The email field is required. (and 1 more error)');
});
