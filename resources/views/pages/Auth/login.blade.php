@extends('layouts.app')
@section('title', 'Вход - TechWhiz')
@section('content')
    <section class="auth mt-36">
        <div class="decorticationElement"></div>
        <div class="container relative z-50">
            <h1 class="font-bold text-4xl mb-5 text-center">Авторизация</h1>
            <form
                action="{{route('loginPost')}}"
                method="post"
                class="flex flex-col gap-5 items-center"
            >
                @csrf
                <div class="relative">
                    <input
                        type="text"
                        name="login"
                        id="input-log"
                        value="{{old('login')}}"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-log" class="label label-log absolute top-4 left-4 text-xl text-[#999] z-10">Логин</label>
                </div>
                @error('login') <p class="text-red-500">{{ $message }}</p> @enderror
                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        id="input-pass"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-pass" class="label absolute top-4 left-4 text-xl text-[#999] z-10">Пароль</label>
                </div>
                @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
                <input
                    type="submit"
                    value="Войти"
                    class="w-96 h-14 rounded-[1rem] cursor-pointer bg-black text-white duration-500 uppercase font-bold text-xl hover:scale-95"
                >
                @error('Invalid_credential')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </form>
        </div>
    </section>
    <style>
        footer {
            width: 100%;
            position: absolute;
            bottom: 0;
        }
    </style>
@endsection

