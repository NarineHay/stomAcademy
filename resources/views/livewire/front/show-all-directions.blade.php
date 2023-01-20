<div class="container mt-4 mt-lg-5">
    <div class="d-flex justify-content-center flex-wrap gap-2">
        <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3" wire:click="showAll">
            Все направления
        </button>
        @foreach($directions as $direction)
            <a href="{{ route("course.index",['direction_id' => $direction->id]) }}" class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">
                {{$direction->title}}
            </a>
        @endforeach
    </div>
</div>
