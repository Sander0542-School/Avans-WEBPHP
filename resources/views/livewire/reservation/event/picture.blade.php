<div class="row">
    <div class="col-6">
        <form wire:submit.prevent="upload">
            <div class="form-group">
                <label for="inputPicture">@lang('reservation.event.form.picture.label')</label>
                <input id="inputPicture" type="file" class="form-control-file" wire:model="picture">
                @error('picture')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            @if($picture && !$errors->any())
                <button type="submit" class="btn btn-primary">@lang('reservation.event.button.confirm-reservation')</button>
            @endif
        </form>
    </div>
    @if($picture)
        <div class="col-4 offset-2">
            <img alt="{{ auth()->user()->name }}" src="{{ $picture->temporaryUrl() }}" width="100%" class="img-thumbnail"/>
        </div>
    @endif
</div>
