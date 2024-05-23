@extends('layouts.app')
@section('title', 'Регистрация - TechWhiz')
@section('content')
    <section class="auth mb-16">
        <div class="decorticationElement"></div>
        <div class="container relative z-50">
            <h1 class="font-bold text-4xl mb-5 text-center">Регистрация</h1>
            <form
                action="{{route('regPost')}}"
                method="post"
                class="flex flex-col gap-5 items-center"
            >
                @csrf
                <div class="relative">
                    <input
                        type="text"
                        id="input-name"
                        name="name"
                        value="{{old('name')}}"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-name" class="label label-log absolute top-4 left-4 text-xl text-[#999] z-10">Имя</label>
                </div>
                @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
                <div class="relative">
                    <input
                        type="text"
                        id="input-surname"
                        name="surname"
                        value="{{old('surname')}}"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-surname" class="label label-log absolute top-4 left-4 text-xl text-[#999] z-10">Фамилия</label>
                </div>
                @error('surname') <p class="text-red-500">{{ $message }}</p> @enderror
                <div class="relative">
                    <input
                        type="text"
                        id="input-email"
                        name="email"
                        value="{{old('email')}}"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-email" class="label label-log absolute top-4 left-4 text-xl text-[#999] z-10">Почта</label>
                </div>
                @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
                <div class="relative">
                    <input
                        type="text"
                        id="input-log"
                        name="login"
                        value="{{old('login')}}"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-log" class="label label-log absolute top-4 left-4 text-xl text-[#999] z-10">Логин</label>
                </div>
                @error('login') <p class="text-red-500">{{ $message }}</p> @enderror
                <div class="relative">
                    <input
                        type="password"
                        id="input-pass"
                        name="password"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-pass" class="label absolute top-4 left-4 text-xl text-[#999] z-10">Пароль</label>
                </div>
                <div class="relative">
                    <input
                        type="password"
                        id="input-re_password"
                        name="re_password"
                        class="input w-96 h-14 pl-4 border-b-2 bg-transparent border-[#c9c9c9] text-xl text-[#999] focus:outline-none relative z-20"
                    >
                    <label for="input-re_password" class="label absolute top-4 left-4 text-xl text-[#999] z-10">Повторите пароль</label>
                </div>
                @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
                <input
                    type="submit"
                    value="Зарегистрироваться"
                    class="w-96 h-14 rounded-[1rem] cursor-pointer bg-black text-white duration-500 uppercase font-bold text-xl hover:scale-95"
                >
            </form>
        </div>
    </section>
@endsection

