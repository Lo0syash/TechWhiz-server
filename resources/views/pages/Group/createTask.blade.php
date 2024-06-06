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

            .container {
                max-width: 1540px;
                margin: 0 auto;
                padding: 0 15px;
                display: flex;
                flex-direction: column;
                gap: 30px;
            }

            .btn-back {
                width: fit-content;
            }

            .form-container {
                display: flex;
                flex-direction: column;
                gap: 30px;
                align-items: center;
            }

            .form-container h1 {
                color: white;
                font-weight: 500;
                font-size: 40px;
                text-align: center;
            }

            .form-container form {
                display: flex;
                flex-direction: column;
                gap: 20px;
                width: 100%;
                max-width: 710px;
            }

            .form-container input,
            .form-container button {
                height: 4.0625rem;
            }

            .form-container textarea {
                height: 12.938rem;
            }

            .form-container input,
            .form-container textarea {
                width: 100%;
                border: 2px solid #4D4D4D;
                border-radius: 20px;
                background-color: #141414;
                opacity: 0.8;
                padding: 30px;
                color: #7C7C7C;
                font-size: 20px;
                font-weight: 500;
                outline: none;
            }

            .form-container textarea {
                resize: none;
                padding-top: 25px;
            }

            .form-container button {
                width: 100%;
                height: 70px;
                border-radius: 20px;
                background-color: #CDA3EF;
                color: black;
                font-weight: 500;
                font-size: 24px;
                text-align: center;
            }

            @media (max-width: 1540px) {
                .btn-back {
                    margin-left: 2rem;
                }
            }

            @media (max-width: 768px) {
                .form-container h1 {
                    font-size: 32px;
                }

                .form-container input,
                .form-container textarea {
                    font-size: 18px;
                }

                .form-container button {
                    font-size: 20px;
                }
            }

            @media (max-width: 480px) {
                .form-container h1 {
                    font-size: 28px;
                }

                .form-container input,
                .form-container textarea {
                    font-size: 16px;
                    padding: 20px;
                }

                .form-container button {
                    font-size: 18px;
                }
            }
        </style>

        <div class="container">
            <a href="{{route('tasks', $group->id)}}" class="btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 17" fill="none">
                    <path d="M18.5 8.5L1 8.5M1 8.5L8.5 16M1 8.5L8.5 1" stroke="white" stroke-opacity="0.5"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="form-container">
                <h1>Создать задачу</h1>
                <form action="{{ route('createSomeTask', $group->id) }}" method="post" class="gap-5">
                    @csrf
                    <input type="text" name="name" placeholder="Наименование" required>
                    <textarea name="description" placeholder="Описание" required></textarea>
                    <input type="text" name="price" placeholder="Баллы" required>
                    <button type="submit">Создать</button>
                </form>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="text-red-500">{{$error}}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
