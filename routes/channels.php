<?php

use Illuminate\Support\Facades\Broadcast;

/*
Some changes
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
