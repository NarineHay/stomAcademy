<div class="modal-content">
    <form wire:submit.prevent="submit" method="post">
        <div class="modal-header">
            <h1 class="modal-title fs-5 f-700" id="lectorFollowModalLabel">Оповестить о новых лекциях?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input wire:model="name" type="text" class="form-control mb-4 @if(strlen($name) > 0) focus @endif" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" placeholder="Имя">
            @error('name')
                <span class="text-danger error">{{ $message }}</span>
            @enderror

            <input wire:model="email" type="email" class="form-control mb-4 @if(strlen($email) > 0) focus @endif" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" placeholder="Почта">
            @error('email')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        @if($success)
            <h5 class="text-center text-secondary mb-3">Вы подписаны на эту страницу</h5>
        @endif
        <div class="modal-footer">
            <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12 white-space">Подписаться</button>
        </div>
    </form>
</div>