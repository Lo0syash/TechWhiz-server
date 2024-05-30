@extends('layouts.app')
@section('title', 'TechWhiz')
@section('content')
    <section class="banner">
        <div class="bannerBackgroundImage"></div>
        <div class="container">
            <div class="banner-inner relative flex items-center mt-[78px] justify-center gap-[184px]" style="z-index: 70">
                <div
                    class="flex flex-col relative" style="z-index: 99;">
                    <p class="text-[#616161] font-medium text-[24px] leading-[64px]">Присоединяйтесь уже сейчас</p>
                    <h1
                        class="font-bold text-[64px] leading-[74px] mt-4 mb-[51px] max-w-[747px] text-[#333333]"
                    >Ориентируйтесь в будущем с помощью нашей системы рейтингов!</h1>
                    <a href="{{route('login')}}"
                       class="text-white font-bold text-[19px] w-[231px] h-[59px] flex items-center justify-center bg-black rounded-3xl cursor-pointer transition hover:bg-[#2e2b34]"
                    >Присоединиться
                    </a>
                </div>
                <img src="/resources/assets/images/bannerLogotype.png" alt="banner logotype"
                     class="bannerLogotypeImage"/>
            </div>
        </div>
    </section>
    <section class="partner">
        <div class="partnerContainer container flex justify-center items-center swiper">
            <ul class="section--container-partner pc-version swiper-wrapper">
                <li class="swiper-slide">
                    <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"
                         viewBox="0 0 440 160" fill="none">
                        <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>
                        <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>
                    </svg>
                    <div class="relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">
                        <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/MckKtits.svg"
                             alt="МЦК-КТИТС">
                        <div class="flex flex-col gap-[7px]">
                            <p class="text-[1.5rem] font-bold">МЦК-КТИТС</p>
                            <a href="https://mck-ktits.ru/" target="_blank"
                               class="flex items-center gap-[6px] text-[1rem] font-bold">
                                Узнать подробнее
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"
                                     fill="none">
                                    <path
                                        d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"
                                        fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"
                         viewBox="0 0 440 160" fill="none">
                        <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>
                        <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>
                    </svg>
                    <div class="relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">
                        <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/Pautina.svg"
                             alt="Паутина">
                        <div class="flex flex-col gap-[7px]">
                            <p class="text-[1.5rem] font-bold">Паутина</p>
                            <a href="https://pautina.top/" target="_blank"
                               class="flex items-center gap-[6px] text-[1rem] font-bold">
                                Узнать подробнее
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"
                                     fill="none">
                                    <path
                                        d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"
                                        fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"
                         viewBox="0 0 440 160" fill="none">
                        <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>
                        <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>
                    </svg>
                    <div class="relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">
                        <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/Codealive.svg"
                             alt="Codealive">
                        <div class="flex flex-col gap-[7px]">
                            <p class="text-[1.5rem] font-bold">Codealive</p>
                            <a href="https://codealive.ru/" target="_blank"
                               class="flex items-center gap-[6px] text-[1rem] font-bold">
                                Узнать подробнее
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"
                                     fill="none">
                                    <path
                                        d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"
                                        fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="section--container-partner mb-version swiper-wrapper">
                <div class="section--container-partner--c">
                    <div class="containerP relative">
                        <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"
                             viewBox="0 0 440 160" fill="none">
                            <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>
                            <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>
                        </svg>
                        <div class="containerP-text relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">
                            <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/MckKtits.svg"
                                 alt="МЦК-КТИТС">
                            <div class="flex flex-col gap-[7px] w-max">
                                <p class="text-[1.5rem] font-bold">МЦК-КТИТС</p>
                                <a href="https://mck-ktits.ru/" target="_blank"
                                   class="flex items-center gap-[6px] text-[1rem] font-bold">
                                    Узнать подробнее
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"
                                         fill="none">
                                        <path
                                            d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"
                                            fill="black"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="containerP relative">
                        <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"
                             viewBox="0 0 440 160" fill="none">
                            <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>
                            <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>
                        </svg>
                        <div class="containerP-text relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">
                            <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/Pautina.svg"
                                 alt="Паутина">
                            <div class="flex flex-col gap-[7px] w-max">
                                <p class="text-[1.5rem] font-bold">Паутина</p>
                                <a href="https://pautina.top/" target="_blank"
                                   class="flex items-center gap-[6px] text-[1rem] font-bold">
                                    Узнать подробнее
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"
                                         fill="none">
                                        <path
                                            d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"
                                            fill="black"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="containerP relative">
                        <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"
                             viewBox="0 0 440 160" fill="none">
                            <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>
                            <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>
                        </svg>
                        <div class="containerP-text relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">
                            <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/Codealive.svg"
                                 alt="Codealive">
                            <div class="flex flex-col gap-[7px] w-max">
                                <p class="text-[1.5rem] font-bold">Codealive</p>
                                <a href="https://codealive.ru/" target="_blank"
                                   class="flex items-center gap-[6px] text-[1rem] font-bold">
                                    Узнать подробнее
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"
                                         fill="none">
                                        <path
                                            d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"
                                            fill="black"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="section--container-partner--c">--}}
{{--                    <div class="relative">--}}
{{--                        <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"--}}
{{--                             viewBox="0 0 440 160" fill="none">--}}
{{--                            <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>--}}
{{--                            <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>--}}
{{--                        </svg>--}}
{{--                        <div class="relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">--}}
{{--                            <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/MckKtits.svg"--}}
{{--                                 alt="МЦК-КТИТС">--}}
{{--                            <div class="flex flex-col gap-[7px] w-max">--}}
{{--                                <p class="text-[1.5rem] font-bold">МЦК-КТИТС</p>--}}
{{--                                <a href="https://mck-ktits.ru/" target="_blank"--}}
{{--                                   class="flex items-center gap-[6px] text-[1rem] font-bold">--}}
{{--                                    Узнать подробнее--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"--}}
{{--                                         fill="none">--}}
{{--                                        <path--}}
{{--                                            d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"--}}
{{--                                            fill="black"/>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="relative">--}}
{{--                        <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"--}}
{{--                             viewBox="0 0 440 160" fill="none">--}}
{{--                            <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>--}}
{{--                            <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>--}}
{{--                        </svg>--}}
{{--                        <div class="relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">--}}
{{--                            <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/Pautina.svg"--}}
{{--                                 alt="Паутина">--}}
{{--                            <div class="flex flex-col gap-[7px] w-max">--}}
{{--                                <p class="text-[1.5rem] font-bold">Паутина</p>--}}
{{--                                <a href="https://pautina.top/" target="_blank"--}}
{{--                                   class="flex items-center gap-[6px] text-[1rem] font-bold">--}}
{{--                                    Узнать подробнее--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"--}}
{{--                                         fill="none">--}}
{{--                                        <path--}}
{{--                                            d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"--}}
{{--                                            fill="black"/>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="relative">--}}
{{--                        <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="440" height="160"--}}
{{--                             viewBox="0 0 440 160" fill="none">--}}
{{--                            <rect x="17" width="423" height="140" rx="14" fill="#DCDCDC" fill-opacity="0.5"/>--}}
{{--                            <rect y="20" width="423" height="140" rx="14" fill="#DCDCDC"/>--}}
{{--                        </svg>--}}
{{--                        <div class="relative z-20 flex items-center gap-[1.6rem] pl-9 pt-[52px]">--}}
{{--                            <img class="max-w-[77px] max-h-[77px]" src="/resources/assets/images/partner/Codealive.svg"--}}
{{--                                 alt="Codealive">--}}
{{--                            <div class="flex flex-col gap-[7px] w-max">--}}
{{--                                <p class="text-[1.5rem] font-bold">Codealive</p>--}}
{{--                                <a href="https://codealive.ru/" target="_blank"--}}
{{--                                   class="flex items-center gap-[6px] text-[1rem] font-bold">--}}
{{--                                    Узнать подробнее--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"--}}
{{--                                         fill="none">--}}
{{--                                        <path--}}
{{--                                            d="M16.6364 7.6364C16.9879 7.28492 16.9879 6.71508 16.6364 6.3636L10.9088 0.636039C10.5574 0.284567 9.98751 0.284567 9.63604 0.636039C9.28457 0.987511 9.28457 1.55736 9.63604 1.90883L14.7272 7L9.63604 12.0912C9.28457 12.4426 9.28457 13.0125 9.63604 13.364C9.98751 13.7154 10.5574 13.7154 10.9088 13.364L16.6364 7.6364ZM0 7.9L16 7.9V6.1L0 6.1L0 7.9Z"--}}
{{--                                            fill="black"/>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <section class="team-TechWhiz bg-[#111111] pt-[206px] h-[917px] relative z-30 mt-[12vh] overflow-hidden">
        <div class="container">
            <div
                class='flex flex-col items-center'>
                <p
                    class='textContainerAfterParthner text-white opacity-30 text-xl md:text-[28px] text-center font-medium leading-[36px] mt-[38px] w-[80vw] md:w-[863px]'>
                    Команда TechWhiz, стремится создать единую систему для активного взаимодействия
                    рабочих
                    процессов.
                </p>
                <h2
                    class='font-bold text-5xl md:text-[64px] max-w-[650px] text-center text-white mt-[40px]'>
                    Лучшие решения для ваших проектов
                </h2>
                <div class="mt-20 flex gap-20 benefit-carousel">
                    <div class='flex gap-20 benefit-list'>
                        <div class="m-slide">
                            <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                 src="/resources/assets/images/icons/simplicity.png"
                                 alt="Простое и удобное получение всей необходимой информации">
                            <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[400px] leading-[123%] text-center font-bold">
                                Простое и удобное получение всей необходимой информации</p>
                        </div>
                        <div class="m-slide">
                            <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                 src="/resources/assets/images/icons/online.png"
                                 alt="Получение доступа к сайту в любое время">
                            <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[385px] leading-[123%] text-center font-bold">
                                Получение доступа к сайту в любое время</p>
                        </div>
                        <div class="m-slide">
                            <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                 src="/resources/assets/images/icons/security.png"
                                 alt="Полная конфиденциальность и безопасность данных">
                            <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[424px] leading-[123%] text-center font-bold">
                                Полная конфиденциальность и безопасность данных</p>
                        </div>
                    </div>
                    <div class='flex gap-20 benefit-list'>
                        <div class="m-slide">
                            <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                 src="/resources/assets/images/icons/simplicity.png"
                                 alt="Простое и удобное получение всей необходимой информации">
                            <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[400px] leading-[123%] text-center font-bold">
                                Простое и удобное получение всей необходимой информации</p>
                        </div>
                        <div class="m-slide">
                            <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                 src="/resources/assets/images/icons/online.png"
                                 alt="Получение доступа к сайту в любое время">
                            <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[385px] leading-[123%] text-center font-bold">
                                Получение доступа к сайту в любое время</p>
                        </div>
                        <div class="m-slide">
                            <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                 src="/resources/assets/images/icons/security.png"
                                 alt="Полная конфиденциальность и безопасность данных">
                            <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[424px] leading-[123%] text-center font-bold">
                                Полная конфиденциальность и безопасность данных</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="invite bg-[#111111] pt-[127px] relative z-20 w-full overflow-hidden">
        <img src="/resources/assets/images/opacityLogotype.png" alt="logotype" class="bckLogotype">
        <div class="max-w-[1600px] mx-auto">
            <div
                class='flex flex-col items-center relative z-30'>
                <p class='text-white opacity-30 text-[28px] text-center font-medium leading-[36px] mt-[38px] max-w-[863px]'>
                    Присоединяйтесь к более 200 пользователям
                </p>
                <h2
                    class='font-bold text-[64px] max-w-[715px] text-center text-white leading-[123%] mt-[40px]'>
                    Откройте для себя новые возможности
                </h2>
                <a href="{{route('login')}}"
                   class="font-bold text-[19px] w-[231px] h-[59px] bg-white text-[#333333] flex items-center justify-center
                            rounded-3xl cursor-pointer transition hover:bg-[#2e2b34] hover:text-white my-[62px]"
                >Присоединиться
                </a>
                <div
                    class='flex gap-[46px] pb-14 flex-wrap justify-center'>
                    <div class="opportunitiesSlides relative flex justify-center items-center">
                        <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                             src="/resources/assets/images/icons/cooperation.png"
                             alt="Улучшение внутренней коммуникации и сотрудничества">
                        <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[400px] leading-[123%] text-center font-bold">
                            Улучшение внутренней коммуникации и сотрудничества</p>
                    </div>
                    <div class="opportunitiesSlides relative flex justify-center items-center">
                        <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                             src="/resources/assets/images/icons/optimization.png"
                             alt="Оптимизация процессов внутри компании">
                        <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[400px] leading-[123%] text-center font-bold">
                            Оптимизация процессов внутри компании</p>
                    </div>
                    <div class="opportunitiesSlides relative flex justify-center items-center">
                        <img class="absolute top-[50%] z-10 left-[50%] translate-x-[-50%] translate-y-[-50%]"
                             src="/resources/assets/images/icons/development.png"
                             alt="Развитие корпоративной культуры и ценностей компании">
                        <p class="text-[rgba(238,238,238,.7)] relative z-20 pt-20 text-2xl max-w-[400px] leading-[123%] text-center font-bold">
                            Развитие корпоративной культуры и ценностей компании</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="completeToPage mb-16">
        <div class="bannerBackgroundImage"></div>
        <div class="container">
            <div class="completeToPage-inner relative z-50 flex items-center mt-[78px] justify-between">
                <div
                    class="flex flex-col">
                    <p class="text-[#616161] font-medium text-[24px] leading-[64p]">Присоединяйтесь уже сейчас</p>
                    <h2
                        class="font-bold text-[64px] leading-[74px] mt-4 mb-[51px] max-w-[747px] text-[#333333]"
                    >Ориентируйтесь в будущем с помощью нашей системы рейтингов!</h2>
                    <a href="{{route('login')}}"
                       class="text-white font-bold text-[19px] w-[231px] h-[59px] flex items-center justify-center bg-black rounded-3xl cursor-pointer transition hover:bg-[#2e2b34]"
                    >Присоединиться
                    </a>
                </div>
                <img class="bannerLogotypeImage" src="/resources/assets/images/bannerLogotype.png" alt="banner logotype"/>
            </div>
        </div>
    </section>
@endsection
