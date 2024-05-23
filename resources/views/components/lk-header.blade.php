<? $currentRoute = \Illuminate\Support\Facades\Route::getCurrentRoute()->uri(); ?>

<header class="border-b border-1 border-[#363636] mb-12">
    <div class="container">
        <div class="header__inner flex justify-between items-center py-[18px]">
            <a href="{{route('index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="43" viewBox="0 0 34 43" fill="none">
                    <path d="M31.3846 0.141113H0V8.42316H31.3846V0.141113Z" fill="#A9A9A9"/>
                    <path d="M20.9231 12.3462H10.4615V41.1154H20.9231V12.3462Z" fill="#A9A9A9"/>
                    <path d="M34 1.88464H2.61536V10.1667H34V1.88464Z" fill="#DCDCDC"/>
                    <path d="M23.5384 14.0897H13.0769V42.859H23.5384V14.0897Z" fill="#D9D9D9"/>
                </svg>
            </a>
            <div class="header__burger"><span></span><span></span><span></span></div>
            <div class="nav flex gap-8 items-center">
                <a href="{{route('groups')}}" class="font-medium text-[20px] text-[#A9A9A9] <?=($currentRoute == 'groups' || $currentRoute == 'groups/create' || $currentRoute == 'group') ? 'activePage' : ''?>">Группы</a>
                <a href="{{route('profile')}}" class="font-medium text-[20px] text-[#A9A9A9] <?=($currentRoute == 'profile') ? 'activePage' : ''?>">Профиль</a>
                @if(auth()->user()->role_id == 1)
                    <a href="{{route('admin')}}" class="font-medium text-[20px] text-[#A9A9A9]">Админ панель</a>
                @endif
            </div>
        </div>
    </div>
</header>
