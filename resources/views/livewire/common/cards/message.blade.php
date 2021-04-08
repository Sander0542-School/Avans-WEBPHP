<div class="row">
    <div class="col-4 offset-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                @if(!empty($subtitle))
                    <h6 class="card-subtitle mb-2 text-muted"> {{ $subtitle }}</h6>
                @endif

                @if(!empty($icon))
                    <i class="{{ $icon }}"></i>
                    <br/>
                    <br/>
                @endif

                <button class="btn btn-primary" wire:click="goHome">{{ __('home.button.go') }}</button>
            </div>
        </div>
    </div>
</div>
