<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('group.{id}', function ($user, $id) {
    //return (int)$user->group_id === (int)$id; // devuelve V/F
    if ((int)$user->group_id === (int)$id) { // devuelve datos sobre el usuario
        return ['id' => $user->id, 'name' => $user->name];
    }
});