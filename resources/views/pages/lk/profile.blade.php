@extends('layouts.lk')
@section('lk-title', 'TechWhiz')
@section('lk-content')
    <section class="mb-[3rem]">
        <style>
            @media(max-width: 500px) {
                .profile-content {
                    max-width: 300px !important;
                }
            }
        </style>
        <div class="container" style="max-width: 1680px;">
            <div class="profile__inner flex justify-between flex-wrap">
                <div class="dashboard">
                    <div class="dashboard__inner relative w-[617px] pb-[40px] bg-[#CEA3EF] rounded-[20px]">
                        <img class="absolute -right-2 -top-2" src="/resources/assets/images/lk/profile-badge.svg"
                             alt="badge">
                        <div class="flex flex-col pt-[30px] pl-[40px] profile-content">
                            <p class="font-bold text-[20px] text-black">Ваши данные</p>
                            <h1 class="max-w-[504px] text-[28px] text-black font-medium mt-8 mb-8 leading-[136%]">{{auth()->user()->surname}} {{auth()->user()->name}}</h1>
                            <div class="flex flex-col gap-[14px]">
                                <p class="font-medium text-[20px] text-black">Почта: {{auth()->user()->email}}</p>
                                {{-- <p class="font-medium text-[20px] text-black">Номер
                                    телефона: {{(!empty(auth()->user()->phone)) ? auth()->user()->phone : 'Не установлен'}}</p> --}}
                                @if (!empty(auth()->user()->tg))
                                    <p class="font-medium text-[20px] text-black">Ваш телеграмм: {{auth()->user()->tg}}</p>
                                @endif
                            </div>
                        </div>
                        <a href="{{route('setting')}}" class="absolute right-[40px] bottom-[40px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M19.9839 8.71933L19.4977 9.59321L19.4977 9.59321L19.9839 8.71933ZM20.3501 8.92306L20.8362 8.04918L20.8362 8.04918L20.3501 8.92306ZM21.9946 11.7123L22.9946 11.71V11.71L21.9946 11.7123ZM21.9959 12.2744L20.9959 12.2766V12.2766L21.9959 12.2744ZM20.3469 15.0805L20.8316 15.9552V15.9552L20.3469 15.0805ZM19.9853 15.2809L19.5006 14.4062V14.4062L19.9853 15.2809ZM18.8345 17.2726L19.8343 17.2557L18.8345 17.2726ZM18.8416 17.6972L17.8418 17.714L18.8416 17.6972ZM17.2484 20.5186L17.7504 21.3835H17.7504L17.2484 20.5186ZM16.7607 20.8017L16.2588 19.9368H16.2588L16.7607 20.8017ZM13.5074 20.7776L12.9927 21.6349L12.9927 21.6349L13.5074 20.7776ZM13.1514 20.5638L13.6661 19.7065L13.6661 19.7065L13.1514 20.5638ZM10.8494 20.5625L10.3357 19.7045L10.8494 20.5625ZM10.4956 20.7743L11.0093 21.6323L10.4956 20.7743ZM7.25395 20.8016L6.75467 21.668L7.25395 20.8016ZM6.76025 20.5171L7.25953 19.6506L6.76025 20.5171ZM5.15868 17.6905L6.15854 17.7073L5.15868 17.6905ZM5.16556 17.2829L4.16571 17.2661L5.16556 17.2829ZM4.00824 15.2761L3.52209 16.15H3.52209L4.00824 15.2761ZM3.6499 15.0768L4.13604 14.2029H4.13604L3.6499 15.0768ZM2.00566 12.2877L3.00566 12.2854L2.00566 12.2877ZM2.00439 11.7256L1.00439 11.7278L2.00439 11.7256ZM3.65331 8.91933L3.1686 8.04466L3.65331 8.91933ZM4.01488 8.71897L4.49959 9.59364L4.01488 8.71897ZM5.16534 6.72737L4.16548 6.74419L5.16534 6.72737ZM5.1582 6.30271L6.15806 6.28588V6.28588L5.1582 6.30271ZM6.75146 3.48125L6.24949 2.61636V2.61636L6.75146 3.48125ZM7.23912 3.19821L7.74109 4.0631L7.23912 3.19821ZM10.4927 3.22226L11.0074 2.3649V2.3649L10.4927 3.22226ZM10.8487 3.43603L10.334 4.29339L10.8487 3.43603ZM13.1504 3.43742L12.6367 2.57946V2.57946L13.1504 3.43742ZM13.5042 3.22556L14.0179 4.08351V4.08351L13.5042 3.22556ZM16.7456 3.19834L16.2463 4.06477L16.7456 3.19834ZM17.2394 3.48289L17.7387 2.61646L17.7387 2.61646L17.2394 3.48289ZM18.8415 6.3093L17.8416 6.29247V6.29248L18.8415 6.3093ZM18.8345 6.7263L19.8343 6.74312V6.74312L18.8345 6.7263ZM18.8332 6.85644L19.8331 6.84116L18.8332 6.85644ZM19.134 7.88323L19.9999 7.38303L19.134 7.88323ZM19.0698 7.77011L18.1883 8.24225L19.0698 7.77011ZM18.346 4.23715L19.0921 3.57135V3.57135L18.346 4.23715ZM18.7627 4.97275L19.7172 4.67472L18.7627 4.97275ZM14.6981 2.62778L14.9171 3.6035L14.6981 2.62778ZM15.5415 2.62082L15.3388 3.60007V3.60007L15.5415 2.62082ZM12.1304 3.75424L12.0983 2.75476L12.1304 3.75424ZM13.0381 3.50322L13.524 4.37721L13.0381 3.50322ZM10.9608 3.50215L10.4739 4.37561L10.9608 3.50215ZM11.8706 3.75424L11.9027 2.75476L11.8706 3.75424ZM8.44695 2.6146L8.65141 3.59347L8.44695 2.6146ZM9.29394 2.62082L9.07502 3.59656L9.29394 2.62082ZM5.23677 4.97031L6.1916 5.26745L5.23677 4.97031ZM5.65136 4.23622L4.90379 3.57204L5.65136 4.23622ZM4.8662 7.88238L5.73212 8.38258L4.8662 7.88238ZM4.92941 7.77097L4.04811 7.29841L4.92941 7.77097ZM5.16668 6.85548L6.16657 6.87028L5.16668 6.85548ZM4.12626 8.65598L3.61411 7.79708L4.12626 8.65598ZM4.80126 7.99277L3.95161 7.46543H3.95161L4.80126 7.99277ZM2.10281 10.3872L3.05273 10.6997L2.10281 10.3872ZM2.53222 9.65675L3.26755 10.3345H3.26755L2.53222 9.65675ZM2.53661 14.3426L1.80144 15.0205H1.80144L2.53661 14.3426ZM2.10882 13.6171L1.15975 13.9321L2.10882 13.6171ZM4.86796 16.1257L5.73584 15.6289H5.73584L4.86796 16.1257ZM4.79785 16.0056L3.94753 16.5319L4.79785 16.0056ZM4.12926 15.3447L3.6134 16.2014L4.12926 15.3447ZM5.16669 17.1455L4.16683 17.1625L5.16669 17.1455ZM4.9354 16.2455L5.81964 15.7785L4.9354 16.2455ZM5.65429 19.7627L4.90815 20.4285L5.65429 19.7627ZM5.23726 19.0271L6.19182 18.7291L5.23726 19.0271ZM9.30175 21.372L9.52079 22.3478L9.30175 21.372ZM8.45841 21.3791L8.25573 22.3583L8.45841 21.3791ZM11.8691 20.2456L11.8371 19.2461L11.8371 19.2461L11.8691 20.2456ZM10.9616 20.4967L11.4475 21.3707L10.9616 20.4967ZM13.0391 20.4977L13.5259 19.6242L13.0391 20.4977ZM12.1297 20.2456L12.1619 19.2462H12.1619L12.1297 20.2456ZM15.5527 21.3853L15.7572 22.3642L15.5527 21.3853ZM14.7063 21.3789L14.9252 20.4032L14.7063 21.3789ZM18.7632 19.0296L19.718 19.3267L18.7632 19.0296ZM18.3486 19.7636L19.0961 20.4278L18.3486 19.7636ZM19.1335 16.1175L18.2676 15.6173L19.1335 16.1175ZM19.0703 16.2289L18.189 15.7564L19.0703 16.2289ZM18.8332 17.1445L17.8333 17.1297L18.8332 17.1445ZM19.8735 15.344L20.3857 16.2029L19.8735 15.344ZM19.1988 16.0071L20.0484 16.5344L19.1988 16.0071ZM21.897 13.6127L22.8469 13.9252L21.897 13.6127ZM21.4678 14.3431L20.7325 13.6654L21.4678 14.3431ZM21.4632 9.65722L22.1984 8.97934V8.97934L21.4632 9.65722ZM21.8911 10.3828L20.942 10.6979L21.8911 10.3828ZM19.8711 8.65537L20.385 7.7975L19.8711 8.65537ZM19.2 7.99495L18.3506 8.52261L19.2 7.99495ZM12 15C10.3431 15 8.99999 13.6568 8.99999 12H6.99999C6.99999 14.7614 9.23857 17 12 17V15ZM8.99999 12C8.99999 10.3431 10.3431 8.99997 12 8.99997V6.99997C9.23857 6.99997 6.99999 9.23855 6.99999 12H8.99999ZM12 8.99997C13.6568 8.99997 15 10.3431 15 12H17C17 9.23855 14.7614 6.99997 12 6.99997V8.99997ZM15 12C15 13.6568 13.6568 15 12 15V17C14.7614 17 17 14.7614 17 12H15ZM19.4977 9.59321L19.864 9.79694L20.8362 8.04918L20.47 7.84545L19.4977 9.59321ZM20.9946 11.7145L20.9959 12.2766L22.9959 12.2721L22.9946 11.71L20.9946 11.7145ZM19.8622 14.2059L19.5006 14.4062L20.4701 16.1556L20.8316 15.9552L19.8622 14.2059ZM17.8346 17.2894L17.8418 17.714L19.8415 17.6804L19.8343 17.2557L17.8346 17.2894ZM16.7464 19.6538L16.2588 19.9368L17.2627 21.6666L17.7504 21.3835L16.7464 19.6538ZM14.0222 19.9202L13.6661 19.7065L12.6366 21.4212L12.9927 21.6349L14.0222 19.9202ZM10.3357 19.7045L9.98188 19.9164L11.0093 21.6323L11.3631 21.4204L10.3357 19.7045ZM7.75324 19.9351L7.25953 19.6506L6.26096 21.3835L6.75467 21.668L7.75324 19.9351ZM6.15854 17.7073L6.16542 17.2998L4.16571 17.2661L4.15883 17.6736L6.15854 17.7073ZM4.49438 14.4022L4.13604 14.2029L3.16375 15.9506L3.52209 16.15L4.49438 14.4022ZM3.00566 12.2854L3.00439 11.7233L1.00439 11.7278L1.00567 12.29L3.00566 12.2854ZM4.13803 9.794L4.49959 9.59364L3.53016 7.84429L3.1686 8.04466L4.13803 9.794ZM6.1652 6.71054L6.15806 6.28588L4.15834 6.31953L4.16548 6.74419L6.1652 6.71054ZM7.25343 4.34613L7.74109 4.0631L6.73715 2.33333L6.24949 2.61636L7.25343 4.34613ZM9.97795 4.07962L10.334 4.29339L11.3635 2.57867L11.0074 2.3649L9.97795 4.07962ZM13.6641 4.29537L14.0179 4.08351L12.9905 2.3676L12.6367 2.57946L13.6641 4.29537ZM16.2463 4.06477L16.7401 4.34933L17.7387 2.61646L17.2449 2.3319L16.2463 4.06477ZM17.8416 6.29248L17.8346 6.70948L19.8343 6.74312L19.8413 6.32612L17.8416 6.29248ZM17.8346 6.70947C17.8337 6.76501 17.8325 6.81919 17.8333 6.87173L19.8331 6.84116C19.8329 6.82954 19.8331 6.81791 19.8343 6.74312L17.8346 6.70947ZM19.9999 7.38303C19.9642 7.32121 19.9572 7.30886 19.9513 7.29798L18.1883 8.24225C18.2128 8.28794 18.2385 8.33232 18.2681 8.38342L19.9999 7.38303ZM17.8333 6.87173C17.8406 7.35022 17.9622 7.82014 18.1883 8.24225L19.9513 7.29798C19.8761 7.15744 19.8355 7.00085 19.8331 6.84116L17.8333 6.87173ZM16.7401 4.34933C17.3948 4.72657 17.5182 4.81142 17.5999 4.90295L19.0921 3.57135C18.7448 3.18208 18.273 2.92438 17.7387 2.61646L16.7401 4.34933ZM19.8413 6.32612C19.8517 5.70878 19.8727 5.17257 19.7172 4.67472L17.8081 5.27078C17.8447 5.38804 17.8543 5.53775 17.8416 6.29247L19.8413 6.32612ZM17.5999 4.90295C17.6945 5.00897 17.7655 5.13433 17.8081 5.27078L19.7172 4.67472C19.5899 4.267 19.3771 3.89068 19.0921 3.57135L17.5999 4.90295ZM14.0179 4.08351C14.6645 3.69639 14.7977 3.63029 14.9171 3.6035L14.479 1.65206C13.9712 1.76607 13.518 2.05171 12.9905 2.3676L14.0179 4.08351ZM17.2449 2.3319C16.7113 2.02444 16.2536 1.74702 15.7442 1.64157L15.3388 3.60007C15.4588 3.62491 15.5942 3.68897 16.2463 4.06477L17.2449 2.3319ZM14.9171 3.6035C15.0556 3.57241 15.1994 3.5712 15.3388 3.60007L15.7442 1.64157C15.3267 1.55518 14.8954 1.55858 14.479 1.65206L14.9171 3.6035ZM12.0005 4.75527C12.0595 4.75527 12.1107 4.75539 12.1625 4.75373L12.0983 2.75476C12.086 2.75515 12.0719 2.75527 12.0005 2.75527V4.75527ZM12.6367 2.57946C12.5799 2.61345 12.5644 2.62243 12.5521 2.62922L13.524 4.37721C13.5679 4.35283 13.609 4.32839 13.6641 4.29537L12.6367 2.57946ZM12.1625 4.75373C12.64 4.7384 13.1067 4.60923 13.524 4.37721L12.5521 2.62922C12.4129 2.70664 12.2573 2.74966 12.0983 2.75476L12.1625 4.75373ZM10.334 4.29339C10.3839 4.32333 10.4284 4.35021 10.4739 4.37561L11.4477 2.62868C11.4371 2.62277 11.4257 2.61605 11.3635 2.57867L10.334 4.29339ZM12.0005 2.75527C11.9289 2.75527 11.9151 2.75516 11.9027 2.75476L11.8384 4.75373C11.8904 4.7554 11.9413 4.75527 12.0005 4.75527V2.75527ZM10.4739 4.37561C10.892 4.60868 11.3601 4.73834 11.8384 4.75373L11.9027 2.75476C11.7432 2.74963 11.587 2.70633 11.4477 2.62868L10.4739 4.37561ZM7.74109 4.0631C8.39531 3.6834 8.53101 3.61862 8.65141 3.59347L8.24249 1.63572C7.73108 1.74254 7.27199 2.02292 6.73715 2.33333L7.74109 4.0631ZM11.0074 2.3649C10.4776 2.04682 10.0227 1.75948 9.51286 1.64508L9.07502 3.59656C9.19493 3.62347 9.32906 3.69006 9.97795 4.07962L11.0074 2.3649ZM8.65141 3.59347C8.79124 3.56426 8.93583 3.56533 9.07502 3.59656L9.51286 1.64508C9.0949 1.5513 8.66159 1.54818 8.24249 1.63572L8.65141 3.59347ZM6.15806 6.28588C6.14541 5.53445 6.15515 5.38458 6.1916 5.26745L4.28193 4.67316C4.12747 5.16951 4.14797 5.70349 4.15834 6.31953L6.15806 6.28588ZM6.24949 2.61636C5.71705 2.92539 5.24913 3.18335 4.90379 3.57204L6.39893 4.9004C6.48032 4.80879 6.60299 4.72364 7.25343 4.34613L6.24949 2.61636ZM6.1916 5.26745C6.23378 5.1319 6.30446 5.00674 6.39893 4.9004L4.90379 3.57204C4.62074 3.89063 4.40865 4.26599 4.28193 4.67316L6.1916 5.26745ZM5.73212 8.38258C5.76123 8.33218 5.78657 8.28854 5.81071 8.24353L4.04811 7.29841C4.04235 7.30914 4.03549 7.32125 4.00029 7.38219L5.73212 8.38258ZM4.16548 6.74419C4.16675 6.81957 4.16695 6.82945 4.16679 6.84067L6.16657 6.87028C6.16734 6.81825 6.1661 6.76378 6.1652 6.71054L4.16548 6.74419ZM5.81071 8.24353C6.03729 7.82096 6.15946 7.35008 6.16657 6.87028L4.16679 6.84067C4.16442 7.00036 4.12375 7.15733 4.04811 7.29841L5.81071 8.24353ZM4.49959 9.59364C4.55301 9.56403 4.59519 9.54064 4.6384 9.51487L3.61411 7.79708C3.60296 7.80373 3.58932 7.81151 3.53016 7.84429L4.49959 9.59364ZM4.00029 7.38219C3.96529 7.44278 3.9581 7.45498 3.95161 7.46543L5.65092 8.52011C5.6778 8.47679 5.70275 8.43341 5.73212 8.38258L4.00029 7.38219ZM4.6384 9.51487C5.05074 9.269 5.39791 8.92776 5.65092 8.52011L3.95161 7.46543C3.86717 7.60148 3.75138 7.71522 3.61411 7.79708L4.6384 9.51487ZM3.00439 11.7233C3.00267 10.9661 3.0143 10.8165 3.05273 10.6997L1.1529 10.0747C0.989523 10.5713 1.00299 11.1095 1.00439 11.7278L3.00439 11.7233ZM3.1686 8.04466C2.62748 8.34453 2.15114 8.59468 1.79689 8.97904L3.26755 10.3345C3.35093 10.244 3.47602 10.1609 4.13803 9.794L3.1686 8.04466ZM3.05273 10.6997C3.09722 10.5645 3.17045 10.4398 3.26755 10.3345L1.79689 8.97904C1.50684 9.29375 1.28693 9.66726 1.1529 10.0747L3.05273 10.6997ZM4.13604 14.2029C3.47883 13.8373 3.35467 13.7546 3.27179 13.6647L1.80144 15.0205C2.15371 15.4025 2.62695 15.652 3.16375 15.9506L4.13604 14.2029ZM1.00567 12.29C1.00706 12.9038 0.995983 13.4388 1.15975 13.9321L3.05789 13.302C3.0194 13.1861 3.00737 13.0379 3.00566 12.2854L1.00567 12.29ZM3.27179 13.6647C3.17548 13.5603 3.10259 13.4367 3.05789 13.302L1.15975 13.9321C1.29398 14.3365 1.51277 14.7074 1.80144 15.0205L3.27179 13.6647ZM5.73584 15.6289C5.70443 15.5741 5.67734 15.5265 5.64816 15.4793L3.94753 16.5319C3.95449 16.5431 3.9621 16.5561 4.00008 16.6225L5.73584 15.6289ZM3.52209 16.15C3.5896 16.1875 3.60225 16.1947 3.6134 16.2014L4.64512 14.4881C4.59745 14.4594 4.54884 14.4325 4.49438 14.4022L3.52209 16.15ZM5.64816 15.4793C5.39753 15.0744 5.05409 14.7343 4.64512 14.4881L3.6134 16.2014C3.74906 16.2831 3.86358 16.3962 3.94753 16.5319L5.64816 15.4793ZM6.16542 17.2998C6.16649 17.2363 6.16747 17.1829 6.16654 17.1284L4.16683 17.1625C4.16706 17.1759 4.16696 17.1917 4.16571 17.2661L6.16542 17.2998ZM4.00008 16.6225C4.03981 16.6919 4.04549 16.7018 4.05117 16.7125L5.81964 15.7785C5.79363 15.7292 5.76464 15.6792 5.73584 15.6289L4.00008 16.6225ZM6.16654 17.1284C6.15851 16.6573 6.0396 16.1949 5.81964 15.7785L4.05117 16.7125C4.12455 16.8515 4.16416 17.0056 4.16683 17.1625L6.16654 17.1284ZM7.25953 19.6506C6.6059 19.274 6.48229 19.1886 6.40043 19.0969L4.90815 20.4285C5.25534 20.8175 5.72556 21.075 6.26096 21.3835L7.25953 19.6506ZM4.15883 17.6736C4.14841 18.2906 4.12723 18.8271 4.28269 19.3251L6.19182 18.7291C6.15524 18.6119 6.14579 18.4625 6.15854 17.7073L4.15883 17.6736ZM6.40043 19.0969C6.30527 18.9902 6.23417 18.8648 6.19182 18.7291L4.28269 19.3251C4.41023 19.7336 4.62374 20.1097 4.90815 20.4285L6.40043 19.0969ZM9.98188 19.9164C9.33544 20.3034 9.20212 20.3695 9.08271 20.3963L9.52079 22.3478C10.0286 22.2338 10.4817 21.9482 11.0093 21.6323L9.98188 19.9164ZM6.75467 21.668C7.28858 21.9757 7.74637 22.2529 8.25573 22.3583L8.66108 20.3998C8.54096 20.375 8.40503 20.3107 7.75324 19.9351L6.75467 21.668ZM9.08271 20.3963C8.94408 20.4275 8.80039 20.4287 8.66108 20.3998L8.25573 22.3583C8.67331 22.4447 9.10454 22.4412 9.52079 22.3478L9.08271 20.3963ZM11.9991 19.2446C11.94 19.2446 11.8889 19.2445 11.8371 19.2461L11.9012 21.2451C11.9136 21.2447 11.9277 21.2446 11.9991 21.2446V19.2446ZM11.3631 21.4204C11.4211 21.3857 11.4358 21.3772 11.4475 21.3707L10.4757 19.6227C10.4314 19.6473 10.3897 19.6722 10.3357 19.7045L11.3631 21.4204ZM11.8371 19.2461C11.3595 19.2615 10.8929 19.3907 10.4757 19.6227L11.4475 21.3707C11.5869 21.2932 11.7423 21.2502 11.9012 21.2451L11.8371 19.2461ZM13.6661 19.7065C13.6143 19.6754 13.571 19.6493 13.5259 19.6242L12.5522 21.3711C12.5633 21.3773 12.5763 21.3849 12.6366 21.4212L13.6661 19.7065ZM11.9991 21.2446C12.0707 21.2446 12.0852 21.2447 12.0976 21.2451L12.1619 19.2462C12.11 19.2445 12.0582 19.2446 11.9991 19.2446V21.2446ZM13.5259 19.6242C13.1079 19.3912 12.6403 19.2615 12.1619 19.2462L12.0976 21.2451C12.257 21.2502 12.4128 21.2934 12.5522 21.3711L13.5259 19.6242ZM16.2588 19.9368C15.6047 20.3164 15.4687 20.3813 15.3483 20.4064L15.7572 22.3642C16.2686 22.2574 16.7277 21.9771 17.2627 21.6666L16.2588 19.9368ZM12.9927 21.6349C13.5228 21.9532 13.9775 22.2403 14.4873 22.3547L14.9252 20.4032C14.8052 20.3763 14.6708 20.3096 14.0222 19.9202L12.9927 21.6349ZM15.3483 20.4064C15.2088 20.4356 15.0647 20.4345 14.9252 20.4032L14.4873 22.3547C14.905 22.4484 15.3378 22.4518 15.7572 22.3642L15.3483 20.4064ZM17.8418 17.714C17.8544 18.4658 17.8448 18.6154 17.8083 18.7324L19.718 19.3267C19.8725 18.8303 19.8518 18.2961 19.8415 17.6804L17.8418 17.714ZM17.7504 21.3835C18.2828 21.0745 18.7508 20.8165 19.0961 20.4278L17.601 19.0995C17.5196 19.1911 17.3969 19.2762 16.7464 19.6538L17.7504 21.3835ZM17.8083 18.7324C17.7662 18.8679 17.6955 18.9931 17.601 19.0995L19.0961 20.4278C19.3791 20.1093 19.5913 19.734 19.718 19.3267L17.8083 18.7324ZM18.2676 15.6173C18.2385 15.6677 18.2131 15.7114 18.189 15.7564L19.9516 16.7015C19.9574 16.6908 19.9642 16.6786 19.9994 16.6177L18.2676 15.6173ZM19.8343 17.2557C19.8331 17.1814 19.8329 17.1707 19.8331 17.1593L17.8333 17.1297C17.8325 17.1816 17.8337 17.2351 17.8346 17.2894L19.8343 17.2557ZM18.189 15.7564C17.9623 16.1792 17.8404 16.6502 17.8333 17.1297L19.8331 17.1593C19.8354 16.9993 19.8761 16.8423 19.9516 16.7015L18.189 15.7564ZM19.5006 14.4062C19.4505 14.434 19.4055 14.4588 19.3614 14.4851L20.3857 16.2029C20.396 16.1967 20.4076 16.1902 20.4701 16.1556L19.5006 14.4062ZM19.9994 16.6177C20.0317 16.5619 20.041 16.5464 20.0484 16.5344L18.3491 15.4797C18.3232 15.5215 18.2997 15.5618 18.2676 15.6173L19.9994 16.6177ZM19.3614 14.4851C18.9489 14.731 18.602 15.0722 18.3491 15.4797L20.0484 16.5344C20.1329 16.3982 20.2485 16.2846 20.3857 16.2029L19.3614 14.4851ZM20.9959 12.2766C20.9976 13.0325 20.9856 13.1831 20.9471 13.3002L22.8469 13.9252C23.0102 13.4289 22.9973 12.8917 22.9959 12.2721L20.9959 12.2766ZM20.8316 15.9552C21.373 15.6552 21.849 15.4051 22.2032 15.0208L20.7325 13.6654C20.6491 13.7559 20.524 13.8391 19.8622 14.2059L20.8316 15.9552ZM20.9471 13.3002C20.9024 13.436 20.8292 13.5604 20.7325 13.6654L22.2032 15.0208C22.4936 14.7057 22.713 14.3321 22.8469 13.9252L20.9471 13.3002ZM19.864 9.79694C20.5209 10.1624 20.6451 10.2451 20.728 10.3351L22.1984 8.97934C21.8461 8.59735 21.3733 8.34797 20.8362 8.04918L19.864 9.79694ZM22.9946 11.71C22.9932 11.0953 23.0039 10.5608 22.8402 10.0677L20.942 10.6979C20.9806 10.814 20.9929 10.9629 20.9946 11.7145L22.9946 11.71ZM20.728 10.3351C20.8245 10.4397 20.8974 10.5634 20.942 10.6979L22.8402 10.0677C22.7059 9.66314 22.4869 9.29222 22.1984 8.97934L20.728 10.3351ZM20.47 7.84545C20.4086 7.81131 20.3958 7.80397 20.385 7.7975L19.3572 9.51323C19.4013 9.53967 19.4454 9.56408 19.4977 9.59321L20.47 7.84545ZM18.2681 8.38342C18.3012 8.44085 18.3246 8.48082 18.3506 8.52261L20.0495 7.46728C20.0416 7.45466 20.0319 7.43839 19.9999 7.38303L18.2681 8.38342ZM20.385 7.7975C20.2486 7.71581 20.1336 7.60264 20.0495 7.46728L18.3506 8.52261C18.6024 8.92807 18.9474 9.26776 19.3572 9.51323L20.385 7.7975Z"
                                    fill="black"/>
                            </svg>
                        </a>
                    </div>
                    <div class="flex flex-col gap-[15px] my-[21px]">
                        <div class="dashboard__inner--block w-[617px] h-20 px-[40px] bg-[#3A3A3A] flex justify-between items-center rounded-[20px]">
                            <div class="flex items-center gap-[25px]">
                                <img src="/resources/assets/images/icons/headset-mic.png" alt="Техподдержка">
                                <p class="text-white text-[20px] font-medium">Техподдержка</p>
                            </div>
                            <a href="mailto:offtechwhiz@gmail.com" class="btn flex items-center justify-center w-[184px] h-[44px] rounded-[10px] hover:scale-95 duration-500" style="background-color: #1BD39E;">Связаться</a>
                        </div>
                        <div class="dashboard__inner--block w-[617px] h-20 bg-[#3A3A3A] px-[40px] flex justify-between items-center rounded-[20px]">
                            <div class="flex items-center gap-[25px]">
                                <img src="/resources/assets/images/icons/pepicons-pop_leave-circle-filled.png" alt="Выйти из аккаунта">
                                <p class="text-white text-[20px] font-medium">Выйти из аккаунта</p>
                            </div>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn w-[184px] h-[44px] rounded-[10px] hover:scale-95 duration-500" style="background-color: #1BD39E;">Выйти</button>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="relative dashboard__inner--block w-[617px] pb-[35px] bg-[#CEA3EF] rounded-[20px]">
                        <img class="absolute -right-2 -top-2" src="/resources/assets/images/lk/poitnts-badge.svg"
                             alt="badge">
                        <div class="flex flex-col pt-[30px] pl-[40px]">
                            <p class="font-bold text-[20px] text-black">Ваши баллы</p>
                            <div class="flex flex-col gap-[14px] mt-[35px]">
                                <p class="font-medium text-[20px] text-black">Баллы: 0</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="task-block" style="width: 963px;">
                    <div>
                        <div class="flex flex-col gap-[50px]">
                            <h2 class="dashboard-title font-medium text-4xl leading-3 mb-[20px] text-white">Мои группы</h2>
                            @if($groups->count() > 0)
                                @foreach($groups->all() as $item)
                                    <a href="{{route('group', $item->id)}}" class="flex flex-col gap-4 max-h-[416px] overflow-auto">
                                        <div class="task-block relative w-[963px] gap-[25px] rounded-[20px] bg-[#3A3A3A] py-[30px] px-[55px] flex items-center">
                                            <div class="task-block--image max-w-[120px] w-[120px] max-h-[120px] h-[120px] object-contain rounded-2xl">
                                                <img
                                                    src="{{ asset('public' . \Illuminate\Support\Facades\Storage::url($item->path)) }}"
                                                    alt="{{ $item->name }}"
                                                    class="object-contain">
                                            </div>
                                            <div class="task-block--content flex flex-col gap-[13px]">
                                                <h3 class="task-block--title max-w-[448px] leading-[110%] text-white text-[28px]">{{$item->name}}</h3>
                                                <p class="leading-[136%] max-w-[700px] text-[16px] text-[#DCDCDC]">{{$item->shortDescription}}</p>
                                            </div>
                                            <div class="text-link absolute cursor-pointer top-[30px] right-[50px] text-[#20BE91] font-bold text-[20px] hover:text-[#00F3AD] duration-500">Подробнее</div>
                                        </div>
                                    </a>
                                @endforeach
                                @else
                                <p class="text-white text-2xl font-medium">Вы не состоите в группах</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
