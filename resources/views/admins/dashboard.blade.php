@extends('layouts.app')

@section('content')
    <h1>@lang('words.admin_dashboard')</h1>

    <br/>
    @include('cards.announcements')
    <br/>
    @include('cards.locations', ['showRoute' => 'admins.locations.show'])
    <br/>
    @include('cards.nodes', ['showRoute' => 'admins.nodes.show'])
    <br/>
    @include('cards.games')
    <br/>
    @include('cards.servers')
    <br/>
    @include('cards.transactions')
    <br/>
    @include('cards.coupons')
    <br/>
    @component('cards.users', compact('users'))
        <a class="btn btn-primary btn-sm" href="{{ route('invites.create') }}">
            @lang('users.invite')
        </a>
    @endcomponent
@endsection
