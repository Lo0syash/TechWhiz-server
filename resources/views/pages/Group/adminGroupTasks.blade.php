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

            .windowCheck {
                border-left: 1px solid #363636;
            }

            @media (max-width: 1680px) {
                .admGrContainer {
                    margin: 0 4rem;
                }

                .someCheckTasks {
                    width: 45vw;
                }
            }

            @media (max-width: 1480px) {
                .admGrContainer {
                    flex-direction: column;
                    gap: 5rem;
                }

                .windowCheck {
                    padding-left: 0;
                    padding-top: 4rem;
                    border-left: 0;
                    border-top: 1px solid #363636;
                }

                .someCheckTasks {
                    width: 100%;
                    max-width: inherit;
                }

                .windowCheck textarea {
                    width: 100%;
                    padding: 20px;
                    font-size: 18px;
                }

                .windowCheck form {
                    width: 50%;
                }

                .windowCheck form button {
                    width: 100%;
                    height: 60px;
                    font-size: 20px;
                }
            }

            @media (max-width: 768px) {
                .admGrContainer h1 {
                    font-size: 35px !important;
                }
            }

            @media (max-width: 570px) {
                .someCheckTasks {
                    flex-direction: column;
                    gap: 2rem;
                    height: auto;
                }

                .someCheckTasks p {
                    font-size: 22px;
                }
            }

            @media (max-width: 500px) {
                .someCheckTasks div:first-child {
                    flex-direction: column;
                }

                .galleryContainer {
                    flex-direction: column;
                    gap: 2rem;
                    margin-bottom: 3rem;
                }

                .galleryContainer div {
                    width: 100%;
                    height: 300px;
                }

                .galleryContainer div img {
                    width: 100%;
                    height: 300px;
                    max-height: 300px;
                    object-fit: contain;
                }
            }

            @media (max-width: 460px) {
                .buttonContainer {
                    flex-direction: column;
                }

                .buttonContainer form {
                    width: 100%;
                }

                .buttonContainer form button {
                    width: 100%;
                }
            }

        </style>
        <div class="max-w-[1680px] mx-auto">
            <div class="flex justify-between admGrContainer">
                <div class="flex flex-col gap-[30px]">
                    <a href="{{route('tasks', $group->id)}}" class="block w-fit btn-back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 17" fill="none">
                            <path d="M18.5 8.5L1 8.5M1 8.5L8.5 16M1 8.5L8.5 1" stroke="white" stroke-opacity="0.5"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <h1 class="text-white font-medium text-[40px]">Отправленные задачи:</h1>
                    <div class="flex flex-col gap-[15px]">
                        @if($tasksUsers->count() <= 0)
                            <p class="text-white text-2xl font-medium absolute">В данный момент, заявок нет</p>
                        @endif
                        @foreach($tasksUsers as $taskUser)
                            @php
                                $user = $users->firstWhere('id', $taskUser->user_id);
                            @endphp
                           <a href="{{ route('adminGroupTasksMore', [$taskUser->tasks_id, $group->id]) }}"
                               class="w-[60vw] max-w-[972px] h-20 flex items-center justify-between px-10 py-[18px] bg-[#3A3A3A] rounded-[20px] someCheckTasks">
                                <div class="flex items-center gap-5">
                                    <div class="w-10 h-10 rounded-[15px] border border-1 border-[#505050]"></div>
                                    <p class="font-medium text-[25px] text-white max-w-[700px]">{{ $user->name }}</p>
                                </div>
                                <div class="flex items-center gap-[30px]">
                                    <div
                                        class="text-balance bg-[#1BD39E] rounded-[10px] font-medium text-[18px] w-[104px] h-[44px] flex items-center justify-center">
                                        {{ $userBalances[$user->id] ?? 0 }} б.
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
