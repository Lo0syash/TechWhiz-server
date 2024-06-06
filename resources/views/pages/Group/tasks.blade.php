@extends('layouts.lk')
@section('lk-title', 'TechWhiz')
@section('lk-content')
    <section class="mb-14">
        <style>
            input:focus, textarea:focus {
                --tw-ring-color: #1BD39E !important;
                border-color: #1BD39E !important;
            }

            body {
                overflow-x: hidden !important;
            }

            @media (max-width: 1540px) {
                .tasksContainer {
                    margin: 0 4rem;
                }
            }

            @media (max-width: 768px) {
                .tasksTopBar {
                    flex-direction: column;
                }
                .someTask {
                    width: 100%;
                }
            }

            @media (max-width: 500px) {
                .someTask a {
                    font-size: 18px;
                }
            }
        </style>
        <div class="max-w-[1540px] mx-auto flex flex-col gap-[30px] tasksContainer">
            @foreach($author as $user)
                @if(auth()->user()->id === $user->id)
                    <div class="flex flex-col gap-5 absolute right-[50px] bottom-[50px]">
                        <a href="{{route('adminGroupTasks', $group->id)}}"
                           class="bg-[#1BD39E] w-[50px] h-[50px] rounded-xl flex items-center justify-center hover:scale-95 duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M18.4721 16.7023C17.3398 18.2608 15.6831 19.3584 13.8064 19.7934C11.9297 20.2284 9.95909 19.9716 8.25656 19.0701C6.55404 18.1687 5.23397 16.6832 4.53889 14.8865C3.84381 13.0898 3.82039 11.1027 4.47295 9.29011C5.12551 7.47756 6.41021 5.96135 8.09103 5.02005C9.77184 4.07875 11.7359 3.77558 13.6223 4.16623C15.5087 4.55689 17.1908 5.61514 18.3596 7.14656C19.5283 8.67797 20.1052 10.5797 19.9842 12.5023M19.9842 12.5023L21.4842 11.0023M19.9842 12.5023L18.4842 11.0023"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 8V12L15 15" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="{{route('createTask', $group->id)}}"
                           class="bg-[#1BD39E] w-[50px] h-[50px] rounded-xl flex items-center justify-center hover:scale-95 duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                @endif
            @endforeach
            <a href="{{route('group', $group->id)}}" class="block w-fit btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 17" fill="none">
                    <path d="M18.5 8.5L1 8.5M1 8.5L8.5 16M1 8.5L8.5 1" stroke="white" stroke-opacity="0.5"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="flex flex-col gap-10">
                <div class="flex justify-between tasksTopBar">
                    <h1 class="font-medium text-[40px] text-white">Задачи</h1>
                    <div class="flex items-center gap-[20px] func-content--filter">
                        <a href="{{route('tasks', $group->id)}}"
                           class="filter <?=(isset($_GET['completed']) || isset($_GET['topical']) || isset($_GET['expecting'])) ? '' : 'active'?>">Все</a>
                        <a href="?topical" class="filter <?=(isset($_GET['topical'])) ? 'active' : ''?>">Отклонены</a>
                        <a href="?expecting" class="filter <?=(isset($_GET['expecting'])) ? 'active' : ''?>">Ожидают
                            проверки</a>
                        <a href="?completed"
                           class="filter <?=(isset($_GET['completed'])) ? 'active' : ''?>">Выполненные</a>
                    </div>
                </div>
                <div class="flex gap-5 flex-wrap">
                    @if($groupTasks->count() <= 0)
                        <p class="text-white text-2xl font-medium absolute">В данный момент, заявок нет</p>
                    @endif
                    @foreach($groupTasks->all() as $item)
                        <div class="someTask bg-[#3A3A3A] rounded-[20px] p-7 flex flex-col gap-5 w-[500px] max-h-[500px]">
                            <div class="flex items-center justify-between">
                                <h3 class="text-[#c9c9c9] text-[25px] font-medium">{{$item->name}}</h3>
                                <p class="font-medium text-[#1BD39E] text-[18px]">{{$item->price}} б.</p>
                            </div>
                            <p class="text-white text-[20px] ">{{$item->description}}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{route('task', ['group' => $group->id, 'task' => $item->id])}}"
                                   class="w-full h-[60px] font-medium text-[20px] rounded-[15px] flex items-center justify-center bg-[#1BD39E]">
                                    Отправить на проверку
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
