@extends('layouts.lk')
@section('lk-title', 'TechWhiz')
@section('lk-content')
    <section class="mb-14">
        <div class="container">
            <div class="flex flex-col gap-20">
                <div class="flex items-center justify-between func-content">
                    <div class="func-content--box flex items-center gap-10 md:gap-[53px] lg:flex-row flex-col-reverse">
                        <form action="{{route('groups')}}" method="get"
                              class="func-content--form flex items-center justify-between sm:w-[650px] w-[100%] h-[65px] border border-[#4D4D4D] rounded-[20px] pr-[6px] max-w-[425px] lg:max-w-full">
                            <input type="text" name="search" placeholder="Название группы"
                                   value="{{request()->input('search')}}"
                                   class="sm:w-[400px] w-[50%] font-medium text-[#7C7C7C] bg-transparent text-xl pl-[30px] outline-none">
                            <button type="submit"
                                    class="bg-[#1BD39E] rounded-[16px] w-[184px] h-[53px] text-black text-xl">
                                Найти
                            </button>
                        </form>
                        <div class="flex items-center gap-[20px] func-content--filter">
                            <a href="{{route('groups')}}"
                               class="filter <?=(!isset($_GET['by-name'])) ? 'active' : ''?>">Все</a>
                            <a href="?by-popularity" class="filter">По популярности</a>
                            <a href="?by-name" class="filter <?=(isset($_GET['by-name'])) ? 'active' : ''?>">По
                                названию</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-10 md:gap-[53px] flex-col md:flex-row func-invite">
                        <form action="{{route('inviteCodeGroup')}}" method="post"
                              class="func-invite--content flex items-center justify-between w-[425px] h-[65px] border border-[#4D4D4D] rounded-[20px] pr-[6px]">
                            @csrf
                            <input type="text" name="code" placeholder="Код"
                                   class="w-[200px] font-medium text-[#7C7C7C] bg-transparent text-xl pl-[30px] outline-none">
                            <button type="submit"
                                    class="bg-[#1BD39E] rounded-[16px] w-[184px] h-[53px] text-black text-xl">
                                Вступить
                            </button>
                        </form>
                        <a href="{{route('createGroup')}}"
                           class="md:hidden flex bg-[#1BD39E] rounded-[16px] w-full h-[53px] text-black text-lg items-center justify-center">Создать
                            группу</a>
                        <a href="{{route('createGroup')}}"
                           class="w-10 h-10 rounded-3xl border-2 border-white items-center justify-center hidden md:flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                                 fill="none">
                                <path d="M8.99984 1.85291V17.147M16.6469 9.49996H1.35278" stroke="white"
                                      stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex items-center flex-wrap gap-8 block-content">
                    @if($groups->count() > 0)
                        @foreach($groups as $item)
                            @php
                                $userGroup = $usersGroups->where('group_id', $item->id)->where('user_id', auth()->id())->first();
                                $userApplication = $applicationForMemdership->where('groups_id', $item->id)->first();
                            @endphp

                            @if($item->status == 'public' || ($item->status == 'private' && $userGroup))
                                @if($userGroup)
                                    <a href="{{ route('group', $item->id) }}"
                                @elseif ($userApplication && $userApplication->user_id == auth()->id())
                                    <a href="?" id="completeApplicationTask"
                                       onclick="showAcceptedForm('#'); return false"
                                @else
                                    <a href="#"
                                       onclick="showConfirmationForm('{{ route('claimGroup', $item->id) }}', '{{ $item->name }}'); return false;"
                                       @endif
                                       class="relative w-[396px] h-[450px] bg-roadmap-item-hover overflow-hidden">
                                        <svg class="absolute top-0 left-0" xmlns="http://www.w3.org/2000/svg"
                                             width="396"
                                             height="450"
                                             viewBox="0 0 396 450" fill="none">
                                            <path
                                                d="M1 20C1 9.50659 9.50659 1 20 1H182.714C192.312 1 201.572 4.53876 208.723 10.9391L254.101 51.5512C261.619 58.2798 271.354 62 281.443 62H376C386.493 62 395 70.5066 395 81V430C395 440.493 386.493 449 376 449H20C9.50659 449 1 440.493 1 430V20Z"
                                                stroke="white" stroke-opacity="0.25" stroke-width="2"/>
                                        </svg>
                                        <div class="flex flex-col items-center justify-center content-roadmap-item">
                                            <img
                                                src="{{ asset('public' . \Illuminate\Support\Facades\Storage::url($item->path)) }}"
                                                alt="{{ $item->name }}"
                                                class="pt-[83px] w-[250px] h-[250px] object-contain">
                                            <h2 class="text-white max-w-[300px] font-bold text-[32px] mt-5 mb-20 whitespace-nowrap text-ellipsis overflow-hidden">{{ $item->name }}</h2>
                                        </div>
                                        <div
                                            class="button-roadmap-item-hover absolute right-[30px] bottom-[35px] w-10 h-10 rounded-3xl border-2 border-white flex items-center justify-center cursor-pointer z-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                                 viewBox="0 0 18 19"
                                                 fill="none">
                                                <path d="M8.99984 1.85291V17.147M16.6469 9.49996H1.35278"
                                                      stroke="white"
                                                      stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="2"
                                                 viewBox="0 0 14 2"
                                                 fill="none">
                                                <path d="M12.4166 1.00004H1.58325" stroke="black"
                                                      stroke-width="2"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="text-roadmap-item font-semibold">
                                            <p>{{ $item->shortDescription }}</p>
                                        </div>
                                    </a>
                                @endif
                                @endforeach
                            @else
                                <p class="text-white text-2xl font-medium">В данный момент, группы отсутствуют</p>
                            @endif

                </div>
            </div>
        </div>
    </section>
    <div id="confirmationForm"
         class="hidden fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-md shadow-md">
            <p id="confirmationText"></p>
            <div class="mt-4 flex justify-end">
                <button onclick="hideConfirmationForm()" class="px-4 py-2 bg-gray-200 rounded-md mr-2">Отмена</button>
                <a id="confirmLink" href="#" class="px-4 py-2 bg-[#1BD39E] text-white rounded-md">Подтвердить</a>
            </div>
        </div>
    </div>
    <div id="acceptedForm"
         class="hidden fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-md shadow-md">
            <p id="acceptedText"></p>
            <div class="mt-4 flex justify-end">
                <div onclick="hiddenAcceptedFormLink()" class="px-4 py-2 bg-[#1BD39E] text-white rounded-md cursor-pointer">Подтвердить</div>
            </div>
        </div>
    </div>
    <script>
        function showConfirmationForm(link, itemName) {
            document.getElementById('confirmLink').href = link;
            document.getElementById('confirmationText').innerText = `Вы уверены, что хотите подать заявку на вступление в группу "${itemName}"?`;
            document.getElementById('confirmationForm').classList.remove('hidden');
        }

        function hideConfirmationForm() {
            document.getElementById('confirmationForm').classList.add('hidden');
        }

        function hiddenAcceptedFormLink(){
            document.getElementById('acceptedForm').classList.add('hidden');
        }

        function showAcceptedForm(){
            document.getElementById('acceptedText').innerText = `Ваша заявка уже была отправлена, ожидайте`;
            document.getElementById('acceptedForm').classList.remove('hidden');
        }
    </script>
@endsection
