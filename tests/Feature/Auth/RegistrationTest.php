<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
    $response->assertSee('Erstelle ein Konto');
    $response->assertSee('Jetzt kostenlos Registrieren und direkt loslegen!');
    $response->assertSee('MusterBenutzer');
    $response->assertSee('Jetzt registrieren!');
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'plz' => '12345',
        'ort' => 'Musterstadt',
        'strasse' => 'Musterstrasse',
        'hausnummer' => '10',
        'telefonnummer' => '0123456789',
    ]);

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
        'plz' => '12345',
        'ort' => 'Musterstadt',
        'strasse' => 'Musterstrasse',
        'hausnummer' => '10',
        'telefonnummer' => '0123456789',
    ]);
    $response->assertRedirect(route('dashboard', absolute: false));
});
