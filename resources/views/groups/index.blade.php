@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($groups as $group)
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>{{$group->name}}</strong>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach($group->users as $user)
                                    <li class="list-group-item">
                                        <a href="{{route('spy',$user->id)}}">
                                            {{$user->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            {{csrf_field()}}
                            <button data-id="{{$group->id}}" class="btn btn-primary" id="notify_private">Notifier
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection