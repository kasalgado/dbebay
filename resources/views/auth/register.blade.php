@extends('layouts.app')
@section('title', 'Erstelle ein Konto - DBEbay')

@section('content')
    <div class="py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-200/80 p-6 sm:p-10 md:p-14">
            <div class="text-center mb-8 sm:mb-10">
                <h1 class="text-2xl sm:text-3xl font-bold text-red-600">Erstelle ein Konto</h1>
                <p class="text-sm sm:text-base font-bold text-gray-900 mt-2">Jetzt kostenlos Registrieren und direkt loslegen!</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-x-8">
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="shrink-0 w-6 flex items-center justify-center">
                                    <img src="{{ asset('img/user.svg') }}" alt="" class="w-6 h-6">
                                </div>
                                <div class="flex-1">
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="MusterBenutzer"
                                        required
                                        autofocus
                                        class="w-full bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                    >
                                </div>
                            </div>
                        </div>
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
                                        minlength="8"
                                        required
                                        autocomplete="new-password"
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
                                        name="password_confirmation"
                                        placeholder="Passwort bestätigen"
                                        minlength="8"
                                        required
                                        autocomplete="new-password"
                                        class="w-full bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="shrink-0 w-6 flex items-center justify-center">
                                    <img src="{{ asset('img/home.svg') }}" alt="" class="w-6 h-6">
                                </div>
                                <div class="flex-1 flex gap-2 sm:gap-3">
                                    <input
                                        type="text"
                                        name="strasse"
                                        value="{{ old('strasse') }}"
                                        placeholder="Strasse"
                                        class="w-3/5 bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                    >
                                    <input
                                        type="text"
                                        name="hausnummer"
                                        value="{{ old('hausnummer') }}"
                                        placeholder="Hausnummer"
                                        class="w-2/5 bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                    >
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="shrink-0 w-6 flex items-center justify-center">
                                    <img src="{{ asset('img/home.svg') }}" alt="" class="w-6 h-6">
                                </div>
                                <div class="flex-1 flex gap-2 sm:gap-3">
                                    <input
                                        type="text"
                                        name="plz"
                                        value="{{ old('plz') }}"
                                        placeholder="PLZ"
                                        class="w-2/5 bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                    >
                                    <input
                                        type="text"
                                        name="ort"
                                        value="{{ old('ort') }}"
                                        placeholder="Ort"
                                        class="w-3/5 bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                    >
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="shrink-0 w-6 flex items-center justify-center">
                                    <img src="{{ asset('img/phone.svg') }}" alt="" class="w-6 h-6">
                                </div>
                                <div class="flex-1">
                                    <input
                                        type="tel"
                                        name="telefonnummer"
                                        value="{{ old('telefonnummer') }}"
                                        placeholder="Telefonnummer"
                                        class="w-full bg-white border border-gray-300 rounded-full px-5 py-2.5 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-xs"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 sm:mt-10 flex justify-center">
                    <button
                        type="submit"
                        class="px-12 py-3 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-bold rounded-full shadow-md hover:shadow-lg transition duration-150 cursor-pointer text-sm sm:text-base"
                    >
                        Jetzt registrieren!
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
