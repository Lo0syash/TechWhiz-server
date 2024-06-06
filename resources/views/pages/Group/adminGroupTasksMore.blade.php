@extends('layouts.lk')
@section('lk-title', 'TechWhiz')
@section('lk-content')
    <div class="max-w-[1680px] mx-auto">
        <div class="flex justify-between flex-col">
            <a href="{{route('adminGroupTasks', $group->id)}}" class="block w-fit btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 17" fill="none">
                    <path d="M18.5 8.5L1 8.5M1 8.5L8.5 16M1 8.5L8.5 1" stroke="white" stroke-opacity="0.5"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="flex flex-col windowCheck pl-[85px]">
                <h2 class="text-white font-medium text-[40px]">Задача от:</h2>
                <p class="text-white text-[18px] mt-[15px] mb-10">{{$userCheck->surname}} {{$userCheck->name}}</p>
                @if($imagePaths)
                    <div class="flex items-center gap-5 galleryContainer">
                        @foreach($imagePaths as $imagePath)
                            <div data-src="/public/{{ $imagePath }}" data-fancybox="gallery"
                                 class="w-[120px] h-[120px] rounded-[5px]">
                                <img src="/public{{ $imagePath }}" alt="">
                            </div>
                        @endforeach
                    </div>
                @endif
                <textarea name="" id=""
                          class="w-full h-[326px] rounded-[20px] bg-[#101010] border border-[#4D4D4D] text-[16px] text-[#78858B] p-4 mt-[33px] mb-[35px] resize-none text-justify"
                          disabled>{{$taskData->description}}</textarea>
                <div class="flex items-center gap-[25px] buttonContainer">
                    <form action="{{ route('acceptSubmitTask', ['task' => $taskData->id, 'user' => $taskData->user_id ]) }}" method="post">
                        @csrf
                        <button type="submit"
                                class="bg-[#1BD39E] rounded-[10px] w-[222px] h-[44px] font-medium text-[18px] text-black hover:scale-95 duration-500">
                            Принять
                        </button>
                    </form>
                    <form action="{{ route('closeSubmitTask', ['task' => $taskData->id, 'user' => $taskData->user_id ]) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-[#CDA3EF] rounded-[10px] w-[222px] h-[44px] font-medium text-[18px] text-black hover:scale-95 duration-500">
                            Отклонить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
