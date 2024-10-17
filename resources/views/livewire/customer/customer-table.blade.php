<div>
    <div class="table-responsive">
        <div class="mb-2 d-flex justify-content-between">
            <div class="me-2 d-flex align-items-center">
                <label for="" class="form-label">Filter search : </label>
                <input type="text" class="form-control form-control-sm ms-2" style="width: 100px;"
                    wire:model.live="search">
            </div>
            <div class="mb-2 d-flex">
                <div class="me-2 d-flex align-items-center">
                    <label for="" class="form-label">Filter name : </label>
                    <input type="text" class="form-control form-control-sm ms-2" style="width: 100px;"
                        wire:model.live="name">
                </div>
                <div class="d-flex align-items-center">
                    <label for="" class="form-label">Filter Package : </label>
                    <select id="" class="form-select form-control-sm ms-2" style="width:100px; "
                        wire:model.live="package">
                        <option value="">--Pilih--</option>
                        @foreach ($packages as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <table class="table mb-3 table-striped">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Telephone
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Paket Internet
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                    <tr>
                        <td class="py-1">
                            {{ $customers->firstItem() + $key }}
                        </td>
                        <td>
                            <div class="text-wrap font-weight-bold" style="width: 10rem;">
                                <span>{{ $customer->name }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap" style="width: 10rem;">
                                <span>{{ $customer->email }} </span>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap">
                                <span>{{ $customer->phone_number }}</span>

                            </div>
                        </td>
                        <td>
                            <div class="text-wrap">
                                <span>{{ $customer->address }}</span>

                            </div>
                        </td>
                        <td>
                            <div class="text-wrap">
                                <span>{{ $customer->packages->name }}</span>

                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button type="button" class="px-3 py-1 btn btn-success me-2" data-bs-toggle="modal"
                                    data-bs-target="#customerUpdate" wire:click="customerEdit({{ $customer }})">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <button class="px-3 py-1 btn btn-info me-2"
                                    wire:click="customerDetail({{ $customer->id }})" data-bs-toggle="modal"
                                    data-bs-target="#customerDetail"><i
                                        class="mdi mdi-account-card-details"></i></button>
                                <button class="px-3 py-1 btn btn-danger me-2"
                                    wire:click="delete({{ $customer }})"><i class="mdi mdi-eraser"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $customers->links() }}
    </div>
</div>
