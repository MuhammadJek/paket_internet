<div>
    <div wire:ignore.self class="modal fade" id="packageDetail" tabindex="-1" aria-labelledby="packageDetailLabel"
        aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="packageDetailLabel">Detail Supplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <p wire:model.live="address"> --}}
                    <div class="card">
                        <div class="card-body bg-light">
                            @if ($item)
                                <div class="mb-3 d-flex">
                                    <h5>
                                        Name Paket:
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">{{ $item->name }}</span>
                                </div>
                                <div class="mb-3 d-flex">
                                    <h5>
                                        Kecepatan :
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">{{ $item->speed }} Mbps</span>

                                </div>
                                <div class="mb-3 d-flex">
                                    <h5>
                                        Harga :
                                    </h5>
                                    <span class="text-wrap ms-2" style="width:16rem;">Rp
                                        {{ number_format($item->price, 2, ',', '.') }}</span>

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
