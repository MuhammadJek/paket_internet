<div>
    <div wire:ignore.self class="modal fade" id="customerDetail" tabindex="-1" aria-labelledby="customerDetailLabel"
        aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="customerDetailLabel">Detail Supplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <p wire:model.live="address"> --}}
                    <div class="card">
                        <div class="card-body bg-light">
                            @if ($item)
                                <div class="mb-3 d-flex">
                                    <h5>
                                        Name :
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">{{ $item->name }}</span>
                                </div>
                                <div class="mb-3 d-flex">
                                    <h5>
                                        Telephone :
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">{{ $item->phone_number }}</span>

                                </div>
                                <div class="mb-3 d-flex">
                                    <h5>
                                        email :
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">{{ $item->email }}</span>

                                </div>
                                <div class="mb-3 d-flex">
                                    <h5>
                                        Paket Internet yang dipilih :
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">{{ $item->packages->name }}</span>

                                </div>
                                <div class="mb-3 d-flex">
                                    <h5 class="">
                                        Address :
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">{{ $item->address }}</span>

                                </div>
                            @endif

                        </div>

                    </div>

                    {{-- </p> --}}

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>
