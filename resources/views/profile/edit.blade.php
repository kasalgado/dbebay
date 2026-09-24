@extends('layouts.app')
@section('title', 'Profil bearbeiten – DBEBay')

@section('content')
<div class="py-12 flex justify-center">
    <div class="w-full max-w-2xl space-y-8">
        <div class="bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white rounded-3xl border-2 border-teal-500/80 p-8 sm:p-10 shadow-sm">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
