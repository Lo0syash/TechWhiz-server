@extends('layouts.lk')
@section('lk-title', 'TechWhiz')
@section('lk-content')
    <style>
        input:focus, textarea:focus{
            --tw-ring-color: #1BD39E !important;
            border-color: #1BD39E !important;
        }
        .input-lockStyles {
            border: 0 !important;
            outline: none !important;
        }
        .input-lockStyles:focus {
            box-shadow: none !important;
        }
    </style>
    <section class="mb-14">
        <div class="createGroup__container">
            <h1 class="text-white text-[60px] font-medium mb-[20px]">Создание группы</h1>
            <form action="{{route('createGroupPostRequest')}}" method="post"
                  enctype="multipart/form-data"
                  class="createGroup--form flex items-center justify-between flex-wrap-reverse">
                @csrf
                <div class="createGroupContent--container flex flex-col gap-[18px]">
                    <input type="text" name="name" placeholder="Название" value="{{@old('name')}}"
                           class="w-[44.375rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                    <input type="text" name="shortDescription" placeholder="Краткое описание" value="{{@old('shortDescription')}}"
                           class="w-[44.375rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                    <input type="text" name="activity" placeholder="Деятельность" value="{{@old('activity')}}"
                           class="w-[44.375rem] h-[4.0625rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 pl-[30px] text-[#7C7C7C] text-[20px] font-medium outline-none">
                    <textarea name="description" id="" placeholder="Описание"
                              class="w-[44.375rem] h-[12.938rem] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 px-[30px] pt-[25px] text-[#7C7C7C] text-[20px] font-medium outline-none resize-none">{{@old('description')}}</textarea>
                    <div class="r-all">
                        <span class="r-group">
                            <input class="r-input" type="radio" name="status" id="radio-1" value="private" checked/>
                            <label for="radio-1" class="font-medium">Приватная</label>
                        </span>
                        <span class="r-group">
                            <input class="r-input" type="radio" name="status" id="radio-2" value="public" />
                            <label for="radio-2" class="font-medium">Публичная</label>
                        </span>
                    </div>
                    <button type="submit"
                            class="w-[350px] h-[70px] rounded-[20px] bg-[#CDA3EF] text-black font-medium text-[24px] ">
                        Создать
                    </button>
                </div>
                <div class="createGroupContent--container flex flex-col gap-[49px]">
                    <div
                        class="createGroupContent--imageBox relative w-[425px] h-[425px] border-[#4D4D4D] border-2 rounded-[20px] bg-[#141414] opacity-80 cursor-pointer">
                        <img src="/resources/assets/images/lk/photo-badge.svg" alt="badge"
                             class="absolute -right-2 -top-2">
                        <input type="file" id="fileAddToGorup" class="hidden" name="path">
                        <label for="fileAddToGorup" class="pathIconContent flex flex-col items-center gap-[27px]">
                            <img src="/resources/assets/images/icons/cloud.png" alt="cloud" class="w-[73px] h-[73px]">
                            <span class="text-white text-[18px] font-medium">Аватар группы</span>
                        </label>
                    </div>
                    <div
                        class="inviteCodeInput--container w-[425px] h-[65px] rounded-[20px] border-[#4D4D4D] border flex items-center justify-center pl-[30px] pr-[6px] gap-[41px]">
                        <input type="text" name="inviteCode" placeholder="Код" readonly {{@old('inviteCode')}}
                               class="inviteCode--input max-w-[164px] text-[#7C7C7C] text-[20px] font-medium bg-transparent outline-none input-lockStyles">
                        <div
                            class="btn-generateCode w-[184px] h-[53px] rounded-[20px] bg-[#1BD39E] text-black flex items-center justify-center text-[20px] font-medium cursor-pointer">
                            Обновить
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        function generateRandomString(length) {
            let result = '';
            for (let i = 0; i < length; i++) {
                result += generateRandomChar();
            }
            return result;
        }

        document.querySelector('.btn-generateCode').addEventListener('click', ()=>{
            document.querySelector('.inviteCode--input').value = generateRandomString(10)
        })

        function generateRandomChar() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            return characters[Math.floor(Math.random() * characters.length)];
        }

        document.querySelector('.inviteCode--input').addEventListener('click', ()=>{
            const copyDate = document.querySelector('.inviteCode--input').value;
        })
    </script>
@endsection
