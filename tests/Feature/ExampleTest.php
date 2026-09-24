<?php

test('the root redirects guests to login', function () {
    $response = $this->get('/');

    $response->assertRedirectToRoute('login');
});
