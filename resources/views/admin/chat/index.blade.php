@extends('layouts.admin')

@section('title', 'Chat')

@section('content')
    <div id="admin_chat">
        <livewire:front.support/>
    </div>
    <style>
        #admin_chat .first_block{
            width: 20px!important;
            max-width: 20px!important;
        }
        #admin_chat .fa-search{
            display: none;
        }
        #admin_chat .fa-paper-plane{
            display: none;
        }
        .row > * {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }
    </style>
@endsection

