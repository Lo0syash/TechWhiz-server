@extends('layouts.lk')
@section('lk-title', 'TechWhiz')
@section('lk-content')
    <style>
        input:focus, textarea:focus{
            --tw-ring-color: #1BD39E !important;
            border-color: #1BD39E !important;
        }
        @media (max-width: 1405px) {
            .containerGroup, .containerPeopleApplication {
                margin: 0 4rem;
            }

            .containerPeopleToGroup {
                width: 70vw;
            }

            .containerBlockApplication {
                width: 70vw;
            }

            .containerPeopleToGroup .contentBlockToPeople {
                width: 100%;
            }

            .transactionBlockContainer {
                width: 35vw;
            }

            .settingContainer {
                align-items: end;
            }

            .settingInput, .r-all {
                width: 40vw;
            }

            .r-all .r-group {
                width: 19.2vw;
            }

            .r-all::before {
                width: 19.2vw;
            }
        }

        @media (max-width: 1024px) {
            .mainPersonContainerToGroup, .containerPeopleApplication {
                flex-direction: column !important;
                gap: 3rem;
            }

            .mainPersonContainerToGroup .filterContainerToGroup {
                flex-direction: row;
            }

            .containerPeopleApplication {
                margin: 0 !important;
            }

            .containerPeopleToGroup, .containerBlockApplication {
                width: 100% !important;
            }

            .transactionBlockContainer {
                width: 100%;
            }

            .filterTransactionCont {
                justify-content: flex-start;
            }

            .r-all .r-group {
                width: 19.8vw;
            }

            .r-all::before {
                width: 19.8vw;
            }

            .groupAboutMain {
                height: fit-content;
            }
            
        }

        @media (max-width: 1000px) {
            .groupAboutMain {
                flex-direction: column;
                height: auto;
                gap: 3rem;
            }

            .groupAboutMain .groupImage {
                width: 100%;
                height: 100%;
                max-width: 300px;
                max-height: 300px;
            }

            .groupAboutMain .groupStats {
                justify-content: space-between;
                align-items: center;
                flex-direction: row;
            }

            .groupAboutMain .groupStats .groupPeople {
                width: 12.5rem;
                height: 12.5rem;
            }
        }

        @media (max-width: 900px) {
            .mainPersonContainerToGroup form {
                flex-direction: column;
            }

            .settingInput, .r-all {
                width: 100%;
            }

            .r-all .r-group {
                width: 100%;
            }

            .r-all::before {
                width: 50%;
            }
            
            .createGroupContent--imageBox {
                width: 100%;
            }
            
            .mainPersonContainerToGroup form button {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .groupAboutMain .groupDate div:first-child {
                gap: 2rem;
                flex-direction: column;
                text-align: center;
            }

            .groupAboutMain .groupImage {
                max-width: 100%;
                max-height: 500px;
            }

            .groupAboutMain .groupStats .groupPrice {
                margin-right: 0;
            }

            .mainPersonContainerToGroup div:first-child {
                overflow: auto;
                scrollbar-color: white white;
                scrollbar-width: thin;
            }

            .contentBlockToPeople {
                width: 100%;
                height: 150px;
                flex-direction: column !important;
            }

            .groupStats {
                display: none
            }

            .transactionsContainer {
                display: flex;
                flex-direction: column;
            }

            .transactionBlockContainer-stats {
                flex-direction: column;
                gap: 1rem;
            }

            .r-all .r-group {
                width: 50%;
            }
        }

        @media (max-width: 640px) {
            .containerBlockApplication { 
                flex-direction: column !important;
                height: fit-content;
                gap: 2rem;
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }

            .containerButtonBlock {
                flex-direction: column;
                width: 100%;
            }

            .containerButtonBlock form {
                width: 100%;
            }

            .containerButtonBlock button {
                width: 100%;
                height: 55px;
            }
        }

        @media (max-width: 620px) {
            .groupAboutMain .groupStats {
                flex-direction: column;
                gap: 2rem;
            }
        }

        @media (max-width: 530px) {
            .contentBlockToPeople .containerStatsBlockToPeople {
                gap: 2rem;
                flex-direction: column;
            }
            .containerPeopleToGroup .contentBlockToPeople {
                gap: 3rem;
                height: fit-content;
            }

        }
    </style>
    <section class="mb-14">
        <div class="max-w-[1396px] mx-auto containerGroup">
            <div class="flex flex-col gap-[60px]">
                <div
                    class="w-full h-[422px] rounded-[20px] bg-[#3A3A3A] relative py-[33.5px] px-[40px] flex justify-between groupAboutMain">
                    <img src="/resources/assets/images/lk/group-badge.svg" class="absolute -right-2 -top-2" alt="badge">
                    <div class="flex flex-col gap-7 groupDate">
                        <div class="flex gap-[59px] items-center">
                            <img src="{{@asset('public' . \Illuminate\Support\Facades\Storage::url($group->path))}}"
                                 class="w-[140px] h-[140px] max-w-[140px] max-h-[140px] object-cover rounded-xl groupImage">
                            <div class="flex flex-col">
                                <h1 class="text-[40px] text-white">{{$group->name}}</h1>
                                @foreach($author as $user)
                                    <h2 class="text-[20px] text-white my-[10px]">Руководитель: {{$user->name}}</h2>
                                @endforeach
                                <h3 class="text-[20px] text-white">Деятельность: {{$group->activity}}</h3>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2.5">
                            <p class="text-[24px] fone-medium text-[#1BD39E] max-w-[952px]">{{$group->shortDescription}}</p>
                            <p class="max-w-[952px] text-[20px] text-white" style="text-align: justify;">{{$group->description}}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-[5px] items-end groupStats">
                        <div
                            class="w-[12.5rem] h-[12.5rem] rounded-full ranbowLinearCircle mr-[124px] flex items-center justify-center groupPrice">
                            <div
                                class="bg-[#3A3A3A] w-40 h-40 rounded-full flex flex-col items-center justify-center text-white">
                                <p class="text-[40px] h-[44px]">{{$balance}}</p>
                                <p class="text-[24px]">баллов</p>
                            </div>
                        </div>
                        <div
                            class="w-[9.375rem] h-[9.375rem] flex flex-col text-white items-center justify-center rounded-full bg-[#4A4A4A] groupPeople">
                            <p class="text-[36px] h-[41px]">{{$groupMemberCounts[$group->id]}}</p>
                            <p class="text-[20px]">участников</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mainPersonContainerToGroup">
                    <div class="flex flex-col gap-5 filterContainerToGroup">
                        <a href="{{route('group', $group->id)}}"
                           class="one-group--filter <?=(!isset($_GET['tasks']) && !isset($_GET['applications']) && !isset($_GET['transactions']) && !isset($_GET['settings'])) ? 'active' : ''?>">Пользователи</a>
                        <a href="{{route('tasks', $group->id)}}"
                           class="one-group--filter <?=isset($_GET['tasks']) ? 'active' : ''?>">Задачи</a>
                            @foreach($author as $user)
                                @if(auth()->user()->id === $user->id)
                                    <a href="?applications"
                                    class="one-group--filter <?=isset($_GET['applications']) ? 'active' : ''?>">Заявки</a>
                                    @endif
                            @endforeach
                                    <a href="?transactions"
                                    class="one-group--filter <?=isset($_GET['transactions']) ? 'active' : ''?>">Транзакции</a>
                                    @foreach($author as $user)
                                @if(auth()->user()->id === $user->id)
                                    <a href="?settings" class="one-group--filter <?=isset($_GET['settings']) ? 'active' : ''?>">Настройки</a>
                                @endif
                            @endforeach
                    </div>
                    <? if ((!isset($_GET['tasks']) && !isset($_GET['applications']) && !isset($_GET['transactions']) && !isset($_GET['settings']))):
                        ?>
                    <div class="flex flex-col gap-[30px] containerPeopleToGroup">
                        <div
                            class="w-[1113px] h-20 flex items-center justify-between px-10 py-[18px] bg-[#CDA3EF] rounded-[20px] contentBlockToPeople">
                            <div class="flex items-center gap-5">
                                <div class="w-10 h-10 rounded-[15px] border border-1 border-[#505050]"></div>
                                <p class="font-medium text-[25px] text-black max-w-[700px]">{{auth()->user()->surname}} {{auth()->user()->name}}</p>
                            </div>
                            <div class="flex items-center gap-[30px]">
                                <p class="font-semibold text-white text-[24px] uppercase">№ {{$activeUserPosition}}</p>
                                <div
                                    class="text-balance bg-[#1BD39E] rounded-[10px] font-medium text-[18px] w-[104px] h-[44px] flex items-center justify-center">
                                    {{$userBalance}} б.
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center gap-[15px]">
                            @foreach($sortedUsers as $itemPeople)
                                @php
                                    $checkUser = $users->get($itemPeople->user_id);
                                    $userBalance = $usersBalances->get($itemPeople->user_id, 0);
                                @endphp
                                <div
                                    class="w-[1113px] h-20 flex items-center justify-between px-10 py-[18px] bg-[#3A3A3A] rounded-[20px] contentBlockToPeople">
                                    <div class="flex items-center gap-5">
                                        <div class="w-10 h-10 rounded-[15px] border border-1 border-[#505050]"></div>
                                        <p class="font-medium text-[25px] text-white max-w-[700px]">{{$checkUser->surname}} {{$checkUser->name}}</p>
                                    </div>
                                    <div class="flex items-center gap-[30px] containerStatsBlockToPeople">
                                        <p class="font-semibold text-[24px] text-white uppercase">№ {{ $loop->iteration }}</p>
                                        @foreach($author as $user)
                                            @if(auth()->user()->id === $user->id)
                                                <div class="outline"></div>
                                                <form action="{{route('transactionSend')}}"
                                                      class="modalTransaction flex-col py-[35px] px-[59px]"
                                                      method="post">
                                                    @csrf
                                                    <p class="text-white text-[40px] text-center">Транзакция</p>
                                                    <div class="flex items-center gap-[18px] mt-[56px] mb-[32px]">
                                                        <input type="radio" name="plus" id="plus"
                                                               class="hidden checkbox_plus">
                                                        <input type="radio" name="minus" id="minus"
                                                               class="hidden checkbox_minus">
                                                        <div class="btn-function plus active">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M2 12H22M12 2V22" stroke="white"
                                                                      stroke-width="3" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <div class="btn-function minus">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="4" viewBox="0 0 24 4" fill="none">
                                                                <path d="M2 2H22" stroke="white" stroke-width="3"
                                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="hidden" name="user_id" id="user_id">
                                                        <input type="hidden" name="group_id" id="group_id"
                                                               value="{{$group->id}}">
                                                        <div class="text-[#999999] text-[20px] flex gap-2">
                                                            <p id="user_surname"></p>
                                                            <p id="user_name"></p>
                                                        </div>
                                                        <input type="text" name="sum"
                                                               class="w-[292px] h-[56px] rounded-[20px] bg-transparent outline-none pl-[15px] text-[20px] text-[#999999] border-white border-[1px] mt-[19px] mb-[24px]"
                                                               placeholder="Количество">
                                                        <textarea type="text" name="description"
                                                                  class="w-[442px] h-[176px] rounded-[20px] bg-transparent outline-none pl-[15px] text-[20px] text-[#999999] border-white border-[1px] pt-[15px]"
                                                                  placeholder="Комментарий"></textarea>
                                                    </div>
                                                    <button type="submit"
                                                            class="w-[220px] h-[56px] rounded-[15px] bg-[#CDA3EF] font-medium text-[20px] text-black self-center mt-[33px]">
                                                        Выполнить
                                                    </button>
                                                </form>
                                                <form action="" method="post" class="flex">
                                                    @csrf
                                                    <input type="hidden" name="id">
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                             viewBox="0 0 28 28" fill="none">
                                                            <path
                                                                d="M0 14C0 16.7689 0.821086 19.4757 2.35943 21.778C3.89777 24.0803 6.08427 25.8747 8.64243 26.9343C11.2006 27.9939 14.0155 28.2712 16.7313 27.731C19.447 27.1908 21.9416 25.8574 23.8995 23.8995C25.8574 21.9416 27.1908 19.447 27.731 16.7313C28.2712 14.0155 27.9939 11.2006 26.9343 8.64243C25.8747 6.08427 24.0803 3.89777 21.778 2.35943C19.4757 0.821086 16.7689 0 14 0C10.287 0 6.72601 1.475 4.1005 4.1005C1.475 6.72601 0 10.287 0 14ZM23.15 21.75L6.25 4.85C8.55064 2.935 11.4839 1.94898 14.4742 2.08546C17.4644 2.22195 20.2957 3.47108 22.4123 5.5877C24.5289 7.70432 25.7781 10.5356 25.9145 13.5258C26.051 16.5161 25.065 19.4494 23.15 21.75ZM6.24 23.16C3.81832 21.1035 2.311 18.1706 2.04856 15.0044C1.78612 11.8382 2.78997 8.69715 4.84 6.27L21.73 23.16C19.5642 24.99 16.8204 25.994 13.985 25.994C11.1496 25.994 8.40577 24.99 6.24 23.16Z"
                                                                fill="white"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <div class="openModalTransaction cursor-pointer"
                                                     data-user-id="{{ $checkUser->id }}"
                                                     data-user-name="{{ $checkUser->name }}"
                                                     data-user-surname="{{ $checkUser->surname }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="30"
                                                         viewBox="0 0 32 30" fill="none">
                                                        <path
                                                            d="M11 15L1 22M1 22L11 29M1 22H31M21 1L31 8M31 8L21 15M31 8H1"
                                                            stroke="white" stroke-width="1.6" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div
                                            class='text-balance rounded-[10px] font-medium text-[18px] w-[104px] h-[44px] flex items-center justify-center {{ ($userBalance < 0) ? 'bg-[#CDA3EF]' : 'bg-[#1BD39E]'  }}'>
                                            {{ $userBalance }} б.
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <? endif;
                    if (isset($_GET['applications'])):
                        ?>
                    <div class="flex flex-col gap-[15px]">
                        <div class="flex flex-col items-center gap-[15px] containerPeopleApplication">
                            @if($userApplication->count() <= 0) 
                                <p class="text-white text-2xl font-medium absolute" style="left: 30rem;">В данный момент, заявок нет</p>
                            @endif
                            @foreach($userApplication->all() as $item)
                                <div
                                    class="w-[1113px] h-20 flex items-center justify-between px-10 py-[18px] bg-[#3A3A3A] rounded-[20px] containerBlockApplication">
                                    <div class="flex items-center gap-5">
                                        <div class="w-10 h-10 rounded-[15px] border border-1 border-[#505050]"></div>
                                        <p class="font-medium text-[25px] text-white max-w-[700px]">{{$item->name}}</p>
                                    </div>
                                    <div class="flex items-center gap-[15px] containerButtonBlock">
                                        <form
                                            action="{{route('acceptApplication', ['user' => $item->id, 'group' => $group->id])}}"
                                            method="post">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-[#1BD39E] w-[133px] h-[44px] rounded-[10px] text-black text-[18px] font-medium hover:scale-90 duration-500">
                                                Принять
                                            </button>
                                        </form>
                                        <form
                                            action="{{route('closeApplication', ['user' => $item->id, 'group' => $group->id])}}"
                                            method="post">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-[#CDA3EF] w-[152px] h-[44px] rounded-[10px] text-black text-[18px] font-medium hover:scale-90 duration-500">
                                                Отклонить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <? endif;
                    if (isset($_GET['transactions'])):
                        ?>
                    <div class="flex flex-col gap-[25px]">
                        <div class="flex items-center gap-[20px] justify-end filterTransactionCont">
                            <a href="?transactions"
                               class='transaction-menu <?=(isset($_GET['transactions']) && !isset($_GET['accruals']) && !isset($_GET['writeoffs'])) ? 'active' : ''?>'>Все</a>
                            <a href="?transactions&accruals"
                               class='transaction-menu <?=(isset($_GET['accruals'])) ? 'active' : ''?>'>Начисления</a>
                            <a href="?transactions&writeoffs"
                               class='transaction-menu <?=(isset($_GET['writeoffs'])) ? 'active' : ''?>'>Списания</a>
                        </div>
                        <div class="columns-2 gap-[1.25rem] transactionsContainer">
                                <?
                            if (isset($_GET['accruals'])) {
                                ?>
                            @foreach($transactions->all() as $itemsGroup)
                                @php
                                    $user = \App\Models\User::where('id', $itemsGroup['user_id'])->get();
                                @endphp
                                @if($itemsGroup['sum'] > 0)
                                    <div class="break-inside-avoid mb-[1.25rem]">
                                        <div
                                            class="transactionBlockContainer w-[547px] flex flex-col gap-[30px] px-[40px] py-[30px] bg-[#3A3A3A] rounded-[20px]">
                                            <div class="w-full flex justify-between transactionBlockContainer-stats">
                                                <div class="flex flex-col gap-[10px]">
                                                    <p class="font-bold text-[20px] text-white">{{$user->name}}</p>
                                                    <p class="font-medium text-[18px] text-[#DCDCDC]">{{$group->name}}</p>
                                                </div>
                                                <div
                                                    class="w-[119px] h-[44px] rounded-[10px] bg-[#1BD39E] font-bold text-[18px] flex items-center justify-center">
                                                    {{ ($itemsGroup['sum'] > 0) ? '+'.$itemsGroup['sum'] : $itemsGroup['sum'] }}
                                                    б.
                                                </div>
                                            </div>
                                            <p class="text-[#DCDCDC] text-[16px] leading-[140%]">{{$itemsGroup['description']}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                                <?
                            } else if (isset($_GET['writeoffs'])) {
                                ?>
                            @foreach($transactions->all() as $itemsGroup)
                                @php
                                    $user = \App\Models\User::where('id', $itemsGroup['user_id'])->get();
                                @endphp
                                @if(substr($itemsGroup['sum'], 0, 1) == '-')
                                    <div class="break-inside-avoid mb-[1.25rem]">
                                        <div
                                            class="transactionBlockContainer w-[547px] flex flex-col gap-[30px] px-[40px] py-[30px] bg-[#3A3A3A] rounded-[20px]">
                                            <div class="w-full flex justify-between transactionBlockContainer-stats">
                                                <div class="flex flex-col gap-[10px]">
                                                    <p class="font-bold text-[20px] text-white">{{ $user->name}}</p>
                                                    <p class="font-medium text-[18px] text-[#DCDCDC]">{{$group->name}}</p>
                                                </div>
                                                <div
                                                    class="w-[119px] h-[44px] rounded-[10px] bg-[#CDA3EF] font-bold text-[18px] flex items-center justify-center">
                                                    {{$itemsGroup['sum']}} б.
                                                </div>
                                            </div>
                                            <p class="text-[#DCDCDC] text-[16px] leading-[140%]">{{$itemsGroup['description']}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                                <?
                            } else {
                                ?>
                            @foreach($transactions->all() as $itemsGroup)
                                @php
                                    $user = \App\Models\User::where('id', $itemsGroup['user_id'])->get();
                                @endphp
                                <div class="break-inside-avoid mb-[1.25rem]">
                                    <div
                                        class="transactionBlockContainer w-[547px] flex flex-col gap-[30px] px-[40px] py-[30px] bg-[#3A3A3A] rounded-[20px]">
                                        <div class="w-full flex justify-between transactionBlockContainer-stats">
                                            <div class="flex flex-col gap-[10px]">
                                                @foreach($user->all() as $itemUser) @endforeach
                                                <p class="font-bold text-[20px] text-white">{{ $itemUser->surname }} {{ $itemUser->name }}</p>
                                                <p class="font-medium text-[18px] text-[#DCDCDC]">{{$group->name}}</p>
                                            </div>
                                            <div
                                                class="w-[119px] h-[44px] rounded-[10px] {{ $itemsGroup['sum'] > 0 ? 'bg-[#1BD39E]' : 'bg-[#CDA3EF]' }} font-bold text-[18px] flex items-center justify-center">
                                                {{ ($itemsGroup['sum'] > 0) ? '+'.$itemsGroup['sum'] : $itemsGroup['sum'] }}
                                                б.
                                            </div>
                                        </div>
                                        <p class="text-[#DCDCDC] text-[16px] leading-[140%]">{{$itemsGroup['description']}}</p>
                                    </div>
                                </div>
                            @endforeach
                                <?
                            }
                                ?>
                        </div>
                    </div>
                    <? endif;
                    if (isset($_GET['settings'])):
                        ?>
                    <div class="flex flex-col gap-[15px]">
                        <form action="{{route('updateGroup', $group->id)}}" class="flex gap-4" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col gap-[18px] settingContainer">
                                <input type="text" name="name" placeholder="Название" value="{{@$group->name}}"
                                       class="settingInput w-[44.375rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                                <input type="text" name="shortDescription" placeholder="Краткое описание"
                                       value="{{@$group->shortDescription}}"
                                       class="settingInput w-[44.375rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                                <input type="text" name="activity" placeholder="Деятельность"
                                       value="{{$group->activity}}"
                                       class="settingInput w-[44.375rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                                <textarea name="description" id="" placeholder="Описание"
                                          class="settingInput w-[44.375rem] h-[12.938rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 px-[30px] pt-[25px] text-[#7C7C7C] text-[20px] font-medium outline-none resize-none">{{$group->description}}</textarea>
                                <div class="r-all">
                                    <span class="r-group">
                                        <input class="r-input" type="radio" name="status" id="radio-1" value="private"
                                               {{($group->status == 'private') ? 'checked' : ''}}/>
                                        <label for="radio-1" class="font-medium">Приватная</label>
                                    </span>
                                    <span class="r-group">
                                        <input class="r-input" type="radio" name="status" id="radio-2" value="public" {{($group->status == 'public') ? 'checked' : ''}}/>
                                        <label for="radio-2" class="font-medium">Публичная</label>
                                    </span>
                                </div>
                            </div>
                            <div class="createGroupContent--container flex flex-col mt-[9px]">
                                <div
                                    class="createGroupContent--imageBox relative w-[425px] h-[425px] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 cursor-pointer">
                                    <img src="/resources/assets/images/lk/photo-badge.svg" alt="badge"
                                         class="absolute -right-2 -top-2">
                                    <input type="file" id="fileAddToGorup" class="hidden" name="path">
                                    <img
                                        src="{{@asset('public' . \Illuminate\Support\Facades\Storage::url($group->path))}}"
                                        class="w-[400px] h-[400px] max-w-[400px] max-h-[400px] object-cover rounded-xl ">
                                </div>
                                <input type="text"
                                       value="{{@$group->inviteCode}}" disabled
                                       class="w-[425px] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none mt-[39px] mb-10">
                                <button type="submit"
                                        class="w-[407px] h-[70px] rounded-[20px] bg-[#CDA3EF] text-black text-[24px] font-medium hover:scale-95 duration-500">
                                    Сохранить
                                </button>
                            </div>
                        </form>
                    </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let all = document.querySelectorAll('.r-all');
            for (let a = 0; a < all.length; a++) {
                let radios = all[a].querySelectorAll('.r-input');
                let i = 1;
                all[a].style.setProperty('--options', radios.length);

                radios.forEach((input) => {
                    input.setAttribute('data-pos', i);
                    if (input.checked) {
                        all[a].style.setProperty('--options-active', i);
                    }
                    input.addEventListener('click', (e) => {
                        all[a].style.setProperty('--options-active', e.target.getAttribute('data-pos'));
                    });
                    i++;
                });
            }
        });
    </script>
@endsection
