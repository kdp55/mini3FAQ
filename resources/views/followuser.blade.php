@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    Follow Users
                </div>


<div class="card-body">

                        @foreach ($users as $user)

                                <div>{{ $user->email }}</div>

                                @if (Auth::User()->following($user->id))

                                        <form action="{{url('unfollow/' . $user->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-follow-{{ $user->follow_id }}" class="btn btn-info">
                                                <i class="fa fa-btn fa-trash"></i>Unfollow
                                           </button>
                                  </form>

                         @else

                                 <form action="{{url('follow/' . $user->id)}}" method="POST">
                                     {{ csrf_field() }}

                                            <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-primary">
                                                <i class="fa fa-btn fa-user"></i>Follow
                                            </button>
                                        </form>

                                @endif

                        @endforeach


            </div>
        </div>
    </div>
        </div>
    </div>
@endsection

