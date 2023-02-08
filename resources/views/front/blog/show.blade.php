@extends("layouts.app")

@section("content")
    <div class="container mb-4 mb-lg-6">
    <div class="py-5 py-lg-6">
        <div class="d-flex mt-4">
            <a href="{{route('home')}}"><span class="fs-12 f-500 text-secondary">Главная</span></a>
            <a><span class="fs-12 f-500 ms-3 main">Состояние</span></a>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12 offset-0">
                <div class="d-flex justify-content-center flex-column">
                    <div class="mb-4 mb-xl-5 mt-2 mt-lg-5">
                        <p class="fs-10 f-700 text-primary m-0 d-none d-lg-block mb-lg-2">{{$blog->directions->title}}</p>
                        <h2 class="f-700 m-0">{{$blog->info->title}}</h2>
                        <p class="mt-3 fs-14 f-500 m-0"><i class="far fa-calendar me-2"></i>{{date('d-m-Y', strtotime($blog->created_at))}}</p>
                    </div>
                    <div>
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->info->image) }}" class="w-100" alt="pic">
                    </div>
                    <div class="mt-4">
                        <p class="fs-20 m-0">{!! $blog->info->text !!}</p>
                    </div>
                    <div class="mt-3 mt-lg-4 d-flex flex-column justify-content-center align-items-center align-items-md-start">
                        <h2 class="f-700 m-0">Еще статьи</h2>
                        <div class="d-flex flex-column flex-md-row mt-4">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="d-flex">
                                        <div class="bg-white br-12">
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($blogs[0]->info->image)}}" alt="addPic" style="width: 390px; height: 200px; object-fit: cover">
                                            <div class="p-3">
                                                <p class="f-700 fs-16 m-0">
                                                    <a href="{{route('blog.show',$blogs[0]->id)}}" class="text-black">{{$blogs[0]->info->title}}</a>
                                                </p>
                                                <div class="mt-4">
                                                    <p class="fs-14 f-500 m-0"><i class="far fa-calendar me-2"></i>{{$blogs[0]->created_at}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="d-flex ms-0 ms-md-3 mt-2 mt-md-0">
                                        <div class="bg-white br-12">
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($blogs[1]->info->image)}}" alt="addPic" style="width: 390px; height: 200px; object-fit: cover">
                                            <div class="p-3">
                                                <p class="f-700 fs-16 m-0">
                                                    <a href="{{route('blog.show',$blogs[1]->id)}}" class="text-black">{{$blogs[1]->info->title}}
                                                </p>
                                                <div class="mt-4">
                                                    <p class="fs-14 f-500 m-0"><i class="far fa-calendar me-2"></i>{{$blogs[1]->created_at}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
