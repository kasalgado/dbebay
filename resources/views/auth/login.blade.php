@extends('layouts.app')
@section('title', 'Login - DBEbay')

@section('content')
    <div class="py-8">
        <div class="max-w-lg mx-auto bg-white rounded-2xl border border-gray-200/80 shadow-sm p-6 sm:p-10">
            <div class="text-center mb-8 sm:mb-10">
                <h1 class="text-2xl sm:text-3xl font-bold text-teal-500">Anmelden</h1>
                <p class="text-sm sm:text-base font-bold text-gray-900 mt-2">Finde dein nächste Lieblingsprodukt oder verkaufe einfach & schnell</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="shrink-0 w-6 flex items-center justify-center">
                                <img src="{{ asset('img/mail.svg') }}" alt="" class="w-6 h-6">
                            </div>
                            <div class="flex-1">
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="E-Mail"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    class="w-full bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                >
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center gap-3">
                            <div class="shrink-0 w-6 flex items-center justify-center">
                                <img src="{{ asset('img/lock.svg') }}" alt="" class="w-6 h-6">
                            </div>
                            <div class="flex-1">
                                <input
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    required
                                    autocomplete="current-password"
                                    class="w-full bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 sm:mt-10 flex justify-center">
                    <button
                        type="submit"
                        class="px-12 py-3 bg-teal-500 hover:bg-teal-700 active:bg-red-800 text-white font-bold rounded-full shadow-md hover:shadow-lg transition duration-150 cursor-pointer text-sm sm:text-base"
                    >
                        Anmelden
                    </button>
                </div>

                <div class="mt-6 text-center text-sm text-gray-600">
                    Noch kein Konto?
                    <a href="{{ route('register') }}" class="text-red-600 font-bold hover:underline">
                        Jetzt registrieren!
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
