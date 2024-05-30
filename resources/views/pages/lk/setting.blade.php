@extends('layouts.lk')
@section('lk-title', 'TechWhiz')
@section('lk-content')
    <section class="mb-[3rem] overflow-x-hidden">
        <style>
            input:focus, textarea:focus{
                --tw-ring-color: #1BD39E !important;
                border-color: #1BD39E !important;
            }
            body {
                overflow-x: hidden !important;
            }

            .animeFunc {
                right: -100%;
                transition: right .7s ease-in-out;
            }

            .animeFunc.active {
                right: 40px;
            }
        </style>
        <div
            class="fixed bottom-10 bg-[#232323] bg-opacity-70 rounded-[30px] px-[30px] py-[25px] flex flex-col gap-[10px] animeFunc">
            <p class="text-white font-bold text-[20px]">Уведомление</p>
            @if(session('success'))
                <p class="text-white text-[20px]">{{session('success')}}</p>
                @if(session('success-break'))
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <script>
                        setTimeout(() => {
                            document.getElementById('logout-form').submit();
                        }, 1000);
                    </script>
                @endif
            @elseif(session('error'))
                <p class="text-white text-[20px]">{{session('error')}}</p>
            @endif
        </div>
        <div class="max-w-[1400px] mx-auto setting-container">
            <a href="{{route('profile')}}" class="block w-fit btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 17" fill="none">
                    <path d="M18.5 8.5L1 8.5M1 8.5L8.5 16M1 8.5L8.5 1" stroke="white" stroke-opacity="0.5"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="setting flex justify-between mt-4 flex-wrap gap-10">
                <div class="form-container flex flex-col gap-4 items-center">
                    <h1 class="text-white text-4xl mb-4 font-medium">Настройка профиля</h1>
                    <form action="{{ route('settingUpdate', auth()->user()->id) }}" method="post"
                          class="flex flex-col gap-[18px]">
                        @csrf
                        <div class="flex items-center gap-4">
                            <input type="text" name="surname" placeholder="Фамилия"
                                   value="{{ auth()->user()->surname }}"
                                   class="w-[20rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                            <input type="text" name="name" placeholder="Имя" value="{{ auth()->user()->name }}"
                                   class="w-[20rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                        </div>
                        <input type="text" name="login" placeholder="Логин" value="{{ auth()->user()->login }}"
                               class="w-[41rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                        <input type="text" name="email" placeholder="Почта" value="{{ auth()->user()->email }}"
                               class="w-[41rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                        <button type="submit"
                                class="w-[41rem] h-[4.0625rem] rounded-[20px] bg-[#1BD39E] text-black font-medium text-[24px] ">
                            Обновить
                        </button>
                    </form>
                    @if(session('success') || session('error'))
                        <script>
                            document.querySelector('.animeFunc').classList.add('active')
                            setTimeout(() => {
                                document.querySelector('.animeFunc').classList.remove('active')
                            }, 4000)
                        </script>
                    @endif
                </div>
                <div class="flex flex-col gap-4 items-center form-container">
                    <h2 class="text-white text-4xl font-medium mb-4">Смена пароля</h2>
                    <form action="{{ route('settingPasswordUpdate', auth()->user()->id) }}" method="post"
                          class="flex flex-col gap-[18px]">
                        @csrf
                        <input type="password" name="old_password" placeholder="Старый пароль"
                               class="w-[41rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                        <input type="password" name="password" placeholder="Новый пароль"
                               class="w-[41rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                        <input type="password" name="re_new_password" placeholder="Поторите новый пароль"
                               class="w-[41rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                        <button type="submit"
                                class="w-[41rem] h-[4.0625rem] rounded-[20px] bg-[#1BD39E] text-black font-medium text-[24px] ">
                            Обновить
                        </button>
                    </form>
                    <p class="text-white font-medium text-center">После смены пароля, необходимо будет авторизоваться заново.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
