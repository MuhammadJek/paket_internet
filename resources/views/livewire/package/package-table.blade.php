<div>
    <div class="table-responsive">
        <div class="mb-2 d-flex justify-content-between">
            <div class="me-2 d-flex align-items-center">
                <label for="" class="form-label">Search : </label>
                <input type="text" class="form-control form-control-sm ms-2" style="width: 100px;"
                    wire:model.live="search">
            </div>
            <div class="me-2 d-flex align-items-center">
                <label for="" class="form-label">Speed : </label>
                <input type="number" class="form-control form-control-sm ms-2" style="width: 100px;"
                    wire:model.live="speed">
            </div>
        </div>
        <table class="table mb-3 table-striped " id="myTable">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Name Paket
                    </th>
                    <th>
                        Kecepatan Mbps
                    </th>
                    <th>
                        Harga
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $key => $package)
                    <tr>
                        <td class="py-1">
                            {{ $packages->firstItem() + $key }}
                        </td>
                        <td>
                            <div class="text-wrap font-weight-bold" style="width: 10rem;">
                                <span>{{ $package->name }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap" style="width: 10rem;">
                                <span>{{ $package->speed }} Mbps</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap">
                                <span>Rp {{ number_format($package->price, 2, ',', '.') }}</span>

                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button type="button" class="px-3 py-1 btn btn-success me-2" data-bs-toggle="modal"
                                    data-bs-target="#packageUpdate" wire:click="packageEdit({{ $package }})">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <button class="px-3 py-1 btn btn-info me-2"
                                    wire:click="packageDetail({{ $package->id }})" data-bs-toggle="modal"
                                    data-bs-target="#packageDetail"><i
                                        class="mdi mdi-account-card-details"></i></button>
                                <button class="px-3 py-1 btn btn-danger me-2"
                                    wire:click="delete({{ $package }})"><i class="mdi mdi-eraser"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $packages->links() }}
    </div>
</div>
