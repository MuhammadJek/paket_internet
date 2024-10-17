  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="customerUpdate" tabindex="-1" aria-labelledby="customerUpdateLabel"
      aria-hidden="false">
      <div class="modal-dialog ">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="customerUpdateLabel">Edit Customer</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form wire:submit.prevent="update({{ $customerId }})">
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <div class="mb-3">
                              <label for="name" class="col-form-label">Name :</label>
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
                              <label for="email" class="col-form-label">Email :</label>
                              <input type="email"
                                  class="form-control @error('email')
                            is-invalid
                        @enderror"
                                  placeholder="asep@gmail.com" wire:model="email">
                              @error('email')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="telephone" class="col-form-label">Telephone :</label>
                              <input type="number" wire:model="phone_number"
                                  class="form-control form-control-sm @error('phone_number')
                          is-invalid
                      @enderror"
                                  placeholder="08214538755" />
                              @error('phone_number')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="Address" class="col-form-label">Address :</label>
                              <textarea wire:model="address"
                                  class="form-control @error('address')
                        is-invalid
                    @enderror"
                                  placeholder="Jl Elang jawa"></textarea>
                              @error('address')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="package_id">Package :</label>
                              <select wire:model="package_id"
                                  class="form-select @error('package_id')
                              is-invalid
                          @enderror">
                                  <option value="">Pilih Package</option>
                                  @foreach ($package as $item)
                                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                              </select>
                              @error('package_id')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
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
