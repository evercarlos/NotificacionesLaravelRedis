<?php

namespace App\Http\Controllers;

use App\Events\GroupWizzEvent;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        //dd($groups);
        return view('groups.index', compact('groups'));
    }

    public function notify(Request $request)
    {
        // dd(auth()->user()->name);
        $group = Group::find($request->input('id'));
        $event = new GroupWizzEvent($group);
        broadcast($event)->toOthers();
        //dd();
        /* $event = new GroupWizzEvent($group);
         broadcast($event)->toOthers();
         dd();*/
        return response()->json([
            'status' => true
        ]);
    }
}
