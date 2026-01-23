<?php

it('renders public pages', function () {
    $this->get('/')->assertSuccessful();
    $this->get('/all-event')->assertSuccessful();
});
