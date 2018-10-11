<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Group;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $group = Group::find(1);
        $event = new PostCreatedEvent($group);
        broadcast($event)->toOthers();
        dd();
    }
}
