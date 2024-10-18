<!--Modal-->
<div wire:ignore.self class="modal fade" id="packageUpdate" tabindex="-1" aria-labelledby="packageUpdateLabel"
    aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="packageUpdateLabel">Create new kandang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="update({{ $packageId }})">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name Paketan :</label>
                        <input type="text"
                            class="form-control form-control-sm @error('name')
                  is-invalid
              @enderror"
                            id="name" wire:model="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Kecepatan Mbps :</label>
                        <div class="input-group">
                            <input type="number"
                                class="form-control @error('speed')
                    is-invalid
                @enderror"
                                placeholder="Maukkan Jumlah Mbps" aria-label="Maukkan Jumlah Mbps"
                                aria-describedby="basic-addon2" wire:model="speed">
                            <span class="input-group-text" id="basic-addon2">Mbps</span>
                            @error('speed')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="col-form-label">Harga :</label>
                        <input type="text" wire:model="price"
                            class="rupiah form-control form-control-sm @error('price')
                  is-invalid
              @enderror"
                            id="price" name="price">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
