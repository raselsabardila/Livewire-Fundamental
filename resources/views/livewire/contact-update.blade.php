<div>
    <div>
        <form wire:submit.prevent="update">
            <input class="form-control" type="hidden" name="contact_id" wire:model="contact_id">
            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" autocomplete="off">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <input wire:model="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Phone">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-sm" type="submit">Submit</button>
        </form>
    </div>    
</div>
