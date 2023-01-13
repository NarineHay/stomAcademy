<div class="row mt-4">
    <div class="col-12 d-row d-xl-flex mb-4 mb-lg-6">
        <div>
            <div class="bg-white br-12">
                <div>
                    <img src="dist/image/blog1.png" class="w-100" alt="blogPic">
                </div>
                <div class="d-flex flex-column mt-3 ms-2 mt-md-4 ms-md-3">
                    <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                    <h5 class="f-700 m-0 mt-3">Экспертный курс по имплантации</h5>
                    <p class="fs-14 f-500 m-0 mt-3 mb-4"><i class="far fa-calendar me-2"></i>16.06.2021</p>
                </div>
            </div>
        </div>
        <div class="ms-0 ms-xl-5 mt-4 mt-xl-0">
            @foreach($data['blog'] as $blog)
                <div class="br-12 d-flex flex-row align-items-center mb-4">
                    <div>
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->info->image) }}" alt="blogPic" width="150" height="100">
                    </div>
                    <div class="d-flex flex-column ms-4">
                        <p class="text-primary text-uppercase f-700 fs-10 mt-0">{{$blog->directions->title}}</p>
                        <h5 class="f-700 fs-16 m-0"><span>{{$blog->info->title}}</span></h5>
                        <p class="fs-14 f-500 m-0 mt-4 mt-xl-3"><i class="far fa-calendar me-2"></i>
                            {{date('d-m-Y', strtotime($blog->created_at))}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @foreach($data['blogs'] as $blog)
        <div class="col-12 col-md-6 col-lg-3 mt-4 mt-xl-5">
            <div class="bg-white br-12">
                <div>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->info->image) }}" class="w-100" alt="blogPic">
                </div>
                <div class="d-flex flex-column p-3 p-lg-4">
                    <h5 class="f-700 fs-16 m-0"><span>{{$blog->info->title}}</span></h5>
                    <p class="fs-14 f-500 m-0 mt-4"><i class="far fa-calendar me-2"></i>{{date('d-m-Y', strtotime($blog->created_at))}}</p>
                </div>
            </div>
        </div>
    @endforeach

    <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-4 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">Показать еще</button>

    <div class="mt-4 d-flex justify-content-center d-lg-block">
        <nav>
            {{ $data['blogs']->links() }}
        </nav>
    </div>
</div>
