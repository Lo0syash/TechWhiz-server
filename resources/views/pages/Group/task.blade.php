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

            .preview {
                display: flex;
                gap: 15px;
                flex-wrap: wrap;
            }

            .preview .image-container {
                position: relative;
                width: 170px;
                height: 170px;
                z-index: 99;
            }

            .preview img {
                width: 100%;
                height: 100%;
                border-radius: 20px;
                object-fit: cover;
            }

            .preview .remove-icon {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(0, 0, 0, .7);
                border-radius: 50%;
                width: 60px;
                height: 60px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                z-index: 99;
                opacity: 0;
                transition: opacity .5s ease-in-out;
            }

            .preview .image-container:hover .remove-icon {
                opacity: 1;
            }

            .remove-icon svg {
                width: 30px;
                height: 30px;
            }

            .btn-back svg {
                fill: #c9c9c9;
                opacity: 0.5;
            }

            .prew-text {
                display: flex;
            }

            .prew-text.hidden {
                display: none;
            }
        </style>
        <div class="max-w-[1540px] mx-auto flex flex-col gap-[30px]">
            <a href="{{route('tasks', $someGroup->id)}}" class="block w-fit btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 17" fill="none">
                    <path d="M18.5 8.5L1 8.5M1 8.5L8.5 16M1 8.5L8.5 1" stroke="white" stroke-opacity="0.5"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="flex justify-between flex-col gap-10">
                <div class="w-full max-h-[500px] rounded-[1.5rem] bg-[#3A3A3A] p-10 flex flex-col gap-6">
                    <div class="flex justify-between items-center">
                        <h1 class="text-white font-medium text-[30px]">{{$task->name}}</h1>
                        <p class="text-[#1BD39E] font-medium text-[20px]">{{$someGroup->name}}</p>
                    </div>
                    <p class="text-white text-[18px]">{{$task->description}}</p>
                </div>
                <div class="flex flex-col gap-6">
                    <h2 class="text-white text-[30px]">Отправить отчет</h2>
                    <form action="{{route('submitTaskAnswer', ['group'=> $someGroup->id, 'task' => $task->id])}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-10">
                        @csrf
                        <div class="flex items-center gap-10">
                            <div class="w-[810px] h-[250px] rounded-[20px] border-2 border-[#3A3A3A] relative p-10">
                                <input type="file" name="images[]" multiple id="images" class="hidden">
                                <label for="images" class="absolute top-0 left-0 w-full h-full cursor-pointer z-30"></label>
                                <div
                                    class="prew-text absolute z-10 top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] flex-col gap-4 justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" viewBox="0 0 24 24"
                                         fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12ZM12 6.25C12.4142 6.25 12.75 6.58579 12.75 7V12.1893L14.4697 10.4697C14.7626 10.1768 15.2374 10.1768 15.5303 10.4697C15.8232 10.7626 15.8232 11.2374 15.5303 11.5303L12.5303 14.5303C12.3897 14.671 12.1989 14.75 12 14.75C11.8011 14.75 11.6103 14.671 11.4697 14.5303L8.46967 11.5303C8.17678 11.2374 8.17678 10.7626 8.46967 10.4697C8.76256 10.1768 9.23744 10.1768 9.53033 10.4697L11.25 12.1893V7C11.25 6.58579 11.5858 6.25 12 6.25ZM8 16.25C7.58579 16.25 7.25 16.5858 7.25 17C7.25 17.4142 7.58579 17.75 8 17.75H16C16.4142 17.75 16.75 17.4142 16.75 17C16.75 16.5858 16.4142 16.25 16 16.25H8Z"
                                              fill="#999"/>
                                    </svg>
                                    <p class="text-[#999] font-medium text-[18px]">Загрузите до 4х изображений</p>
                                </div>
                                <div class="preview relative" id="preview"></div>
                            </div>
                            <textarea name="description"
                                      class="w-[690px] h-[250px] rounded-[20px] bg-transparent border-2 border-[#3A3A3A] relative p-8 text-[18px] text-white"
                                      placeholder="Описание*" style="resize: none"></textarea>
                        </div>
                        <button type="submit" class="w-full h-[60px] rounded-xl font-medium text-[20px] bg-[#1BD39E] text-black hover:scale-95 duration-700">Отправить на проверку</button>
                    </form>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="text-red-500">{{$error}}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script>
        const maxImages = 4;
        let imagesLoaded = 0;

        document.getElementById('images').addEventListener('change', function () {
            let files = this.files;

            if (imagesLoaded + files.length > maxImages) {
                alert('Максимальное количество изображений достигнуто.');
                return;
            }

            let preview = document.getElementById('preview');
            Array.from(files).forEach(file => {
                if (imagesLoaded < maxImages) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let container = document.createElement('div');
                        container.className = 'image-container';

                        let img = document.createElement('img');
                        img.src = e.target.result;

                        let removeIcon = document.createElement('div');
                        removeIcon.className = 'remove-icon';
                        removeIcon.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M18 6L6 18M6 6l12 12" stroke="#c9c9c9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        `;
                        removeIcon.addEventListener('click', function () {
                            container.remove();
                            imagesLoaded--;
                            if (imagesLoaded > 0) {
                                document.querySelector('.prew-text').classList.add('hidden')
                            } else {
                                document.querySelector('.prew-text').classList.remove('hidden')
                            }
                        });

                        container.appendChild(img);
                        container.appendChild(removeIcon);
                        preview.appendChild(container);
                    };
                    reader.readAsDataURL(file);
                    imagesLoaded++;
                    if (imagesLoaded > 0) {
                        document.querySelector('.prew-text').classList.add('hidden')
                    } else {
                        document.querySelector('.prew-text').classList.remove('hidden')
                    }
                }
            });
        });
    </script>
@endsection
