<header>
    <div class="container">
        <div class="py-[43px]">
            <div class="header__inner flex justify-between items-center">
                <div class="menu-container--top">
                    <a href="{{route('index')}}" class="relative z-50">
                        <img src="/resources/assets/images/logotype.svg" alt="logotype">
                    </a>
                    <button
                        class="w-[128px] h-[55px] bg-transparent border border-[#c9c9c9] text-[#333333] rounded-3xl font-bold text-[20px] z-50 transition hover:opacity-[.7] items-center justify-center">
                        Menu
                    </button>
                </div>
                <div class="menu-container">
                    <div class="menu flex gap-[25px] items-center">
                        <a href="{{route('login')}}"
                           class="w-[128px] h-[55px] bg-[#FFFFFF] text-[#333333] rounded-3xl font-bold text-[20px] z-50 transition hover:bg-[#f6f6f6] flex items-center justify-center">
                            Войти
                        </a>
                        <a href="{{route('reg')}}"
                           class="w-[297px] h-[55px] text-white bg-black rounded-3xl font-bold text-[20px] transition hover:bg-[#2e2b34] z-50 flex items-center justify-center">
                            Зарегистрироваться
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
