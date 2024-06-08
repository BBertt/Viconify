@extends('components.video-layout')
@section('title', 'Video')
@section('content')
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center space-x-4">
                <div class="flex flex-wrap -mx-4">
                    @php
                    $videoCount = 0;
                    $dbCount = 0;
                    @endphp
                    @for ($i = $videoCount; $i < count($videos); $i++)
                        @if($videos[$i]->VideoType === 'Videos' && $videoCount < 8)
                            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                                <div class="videocontainer bg-white rounded-lg overflow-hidden h-full hover:bg-gray-300 transition duration-300">
                                    <a href="{{ route('videos.show', $videos[$i]->VideoID)}}">
                                        <div class="relative overflow-hidden w-full h-50 sm:h-50 md:h-44 lg:h-32 xl:h-44 rounded-lg">
                                            <img src="{{$videos[$i]->VideoImage}}" alt="{{ $videos[$i]->VideoImage }}" class="w-full h-full object-cover">
                                            <div class="w-full h-full absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition duration-300">
                                                <div class="flex items-center justify-center w-full h-full text-white text-lg font-bold opacity-0 hover:opacity-100">Watch Now</div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row p-2 pt-3">
                                            <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                @if($videos[$i]->user->ProfileImage)
                                                    <img src="{{$videos[$i]->user->ProfileImage}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @else
                                                    <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @endif
                                            </div>
                                            <div class="pl-2 flex-1 max-w-full">
                                                <h2 class="text-base font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($videos[$i]->Title, 32, ' ...') }}</span></h2>
                                                <p class="text-sm text-gray-600">{{ $videos[$i]->user->Name }}</p>
                                                <span class="text-sm text-gray-600">{{ $videos[$i]->Views }} views</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @php $videoCount++; @endphp
                        @php $dbCount = $i; @endphp
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center space-x-4">
                <div class="container max-w-screen-2xl">
                    <div class="flex items-center">
                        <span class="text-black font-bold text-xl">Shorts</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 shorts-container">
                        @php $shortCount = 0; @endphp
                        @foreach ($videos as $video)
                            @if($video->VideoType === 'Shorts' && $shortCount < 6)
                                <a href="{{ route('shorts.showShortsById', $video->VideoID) }}" class="short-item relative bg-gray-200 rounded-lg overflow-hidden h-96 m-2 transform transition-transform duration-300 hover:scale-110 hover:shadow-lg hover:bg-[#f0f0f0]">
                                    <img src="{{ asset($video->VideoImage) }}" alt="{{ $video->Title }}" class="w-full h-full object-cover">
                                    <div class="hover-content absolute inset-0 p-4 flex flex-col justify-end opacity-0 transition-opacity duration-300 hover:opacity-100">
                                        <div class="flex">
                                            <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                @if($video->user->ProfileImage)
                                                    <img src="{{$video->user->ProfileImage}}" alt="{{ $video->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @else
                                                    <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $video->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @endif
                                            </div>
                                            <div class="pl-2 flex-1 max-w-full">
                                                <h2 class="text-base text-gray-100 font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($video->Title, 12, ' ...') }}</span></h2>
                                                <p class="text-sm text-gray-300">{{ $video->user->Name }}</p>
                                                <span class="text-sm text-gray-300">{{ $video->Views }} views</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @php $shortCount++; @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4 flex flex-col">
        <div class="flex justify-center w-full h-full">
            <div class="w-11/12 flex justify-center space-x-4">
                <div class="flex flex-wrap -mx-4">
                    @for ($i = $dbCount; $i < count($videos); $i++)
                        @if($videos[$i]->VideoType === 'Videos')
                            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                                <div class="videocontainer bg-white rounded-lg overflow-hidden h-full hover:bg-gray-300 transition duration-300">
                                    <a href="{{ route('videos.show', $videos[$i]->VideoID)}}">
                                        <div class="relative overflow-hidden w-full h-50 sm:h-50 md:h-44 lg:h-32 xl:h-44 rounded-lg">
                                            <img src="{{$videos[$i]->VideoImage}}" alt="{{ $videos[$i]->VideoImage }}" class="w-full h-full object-cover">
                                            <div class="w-full h-full absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition duration-300">
                                                <div class="flex items-center justify-center w-full h-full text-white text-lg font-bold opacity-0 hover:opacity-100">Watch Now</div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row p-2 pt-3">
                                            <div class="mt-1 overflow-hidden rounded-full h-10 w-10 flex-shrink-0">
                                                @if($videos[$i]->user->ProfileImage)
                                                    <img src="{{$videos[$i]->user->ProfileImage}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @else
                                                    <img src="{{asset('Assets/DefaultProfile.png')}}" alt="{{ $videos[$i]->VideoImage }}" class="h-full object-cover w-full rounded-full">
                                                @endif
                                            </div>
                                            <div class="pl-2 flex-1 max-w-full">
                                                <h2 class="text-base font-bold whitespace-nowrap overflow-hidden text-ellipsis p-0 m-0"><span>{{ Str::limit($videos[$i]->Title, 32, ' ...') }}</span></h2>
                                                <p class="text-sm text-gray-600">{{ $videos[$i]->user->Name }}</p>
                                                <span class="text-sm text-gray-600">{{ $videos[$i]->Views }} views</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
