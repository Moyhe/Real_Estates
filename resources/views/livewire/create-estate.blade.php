			<!-- ============================ Login Form Start ================================== -->

            <section class="gray-simple">
				<div  class="container">
					<!-- row Start -->
					<div class="row justify-content-center">

						<!-- Single blog Grid -->
						<div class="col-xl-10 col-lg-8 col-md-12">
							<div class="property-detail">
								<div class="property-detail-body pt-3">

									<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
										<li class="nav-item">
											<button class="nav-link active text-white" id="form-tab" data-bs-toggle="pill" data-bs-target="#form" type="button" role="tab" aria-controls="form" aria-selected="true" ">Supply A Property</button>
										</li>
										<li class="nav-item">
										<button class="nav-link text-white" id="search-tab" data-bs-toggle="pill" data-bs-target="#search" type="button" role="tab" aria-controls="search" aria-selected="false" tabindex="-1">Search A Property</button>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab" tabindex="0">
											<div class="row gx-3 gy-4">
												<div class="modal-form"

                                            x-data
                                            x-init="

                                    FilePond.registerPlugin(FilePondPluginImagePreview);
                                    FilePond.setOptions({
                                        AllowMultiple: 'multiple' ? 'true' : 'false',
                                        server: {
                                        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {

                                        @this.upload('form.photo', file, load, error, progress)
                                        },

                                        revert: (filename, load) => {

                                            @this.removeUpload('form.photo', filename, load)
                                    }

                                    },
                                    });

                                    FilePond.create($refs.input);

                                    ">

													<form wire:submit='save'>
                                                            @csrf
                                                        <div class="mb-3">
                                                            <label for="area" class="form-label">Area</label>
                                                            <input type="number" min="0" max="999999" wire:model='form.area' class="form-control shadow-none" id="area" aria-describedby="area">
                                                            <div class="mt-2">
                                                                @error('form.area') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>

                                                          </div>

                                                          <div class="form-group" style="margin-bottom: 4rem;">

                                                            <label for="orderType" class="form-label text-black">Order Type</label>
                                                            <select wire:model='form.order_type' class="wide form-control shadow-none"  id="orderType" aria-label="Default select example">
                                                                <option value="" disabled selected >Order Type</option>
                                                                   @foreach ($this->orders as $order)
                                                                   <option
                                                                   value="{{ $order->id }}"
                                                                   wire:key="{{ $order->id }}"
                                                                   @selected(old('form.order_type') == $order->id)

                                                                   >{{ $order->name }}</option>
                                                                   @endforeach

                                                            </select>
                                                            <div>
                                                                @error('form.order_type') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>

                                                        </div>


                                                          <div class="form-group" style="margin-top: 4rem !important;">
                                                            <label for="estateType" class="form-label text-black">Estate Type</label>
                                                            <select wire:model='form.estate_type' class="wide form-control shadow-none"  id="estateType" aria-label="Default select example">
                                                                <option value="" disabled selected>choose estate</option>
                                                                   @foreach ($this->categories as $category)
                                                                   <option
                                                                   value="{{ $category->id }}"
                                                                    wire:key="{{ $category->id }}"
                                                                    @selected(old('form.estateType') == $category->id)

                                                                    >{{ $category->name }}</option>
                                                                   @endforeach
                                                            </select>
                                                            <div class="mt-2">
                                                                @error('form.estate_type') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>

                                                            </div>

                                                        <div class="mb-3" style="margin-top: 4rem !important;">
                                                            <label for="city" class="form-label">City</label>
                                                            <input type="text" wire:model='form.city' class="form-control shadow-none" id="city" aria-describedby="city">
                                                            <div class="mt-2">
                                                                @error('form.city') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                          </div>

                                                          <div class="mb-3">
                                                            <label for="street" class="form-label">Street</label>
                                                            <input type="text" wire:model='form.street' class="form-control shadow-none" id="street" aria-describedby="street">
                                                            <div class="mt-2">
                                                                @error('form.street') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                          </div>

                                                          <div class="mb-3">
                                                            <label for="latitude" class="form-label">Latitude</label>
                                                            <input type="text" wire:model='form.latitude' class="form-control shadow-none" id="latitude" aria-describedby="latitude">
                                                            <div class="mt-2">
                                                                @error('form.latitude') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                          </div>

                                                          <div class="mb-3">
                                                            <label for="longitude" class="form-label">Longitude</label>
                                                            <input type="text" wire:model='form.longitude' class="form-control shadow-none" id="longitude" aria-describedby="longitude">
                                                            <div class="mt-2">
                                                                @error('form.longitude') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                          </div>

                                                           <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control shadow-none" wire:model='form.description' id="description" rows="3"></textarea>
                                                            <div class="mt-2">
                                                                @error('form.description') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                          </div>

                                                          <div class="mb-3 mt-5" wire:ignore >
                                                            <input type="file" accept="image/*, video/*" x-ref='input' wire:model="form.photo" multiple>

                                                           <div class="mt-3 mb-3">
                                                            @error('form.photos') <span class="text-danger">{{ $message }}</span> @enderror
                                                           </div>
                                                          </div>

                                                          <hr class="w-75 mt-3 mx-auto">

                                                         <div class="form-group d-flex justify-content-center mt-5">
															<button type="submit" id="btnApply" class="btn btn-dark w-50 font--bold ">Create</button>
														</div>

													</form>

                                                    {{-- <x-google-maps /> --}}
												</div>

											</div>
										</div>
                                        <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab" tabindex="0">
                                            <div class="row gx-2 gy-4">
                                                <div class="modal-form">

                                         <livewire:search-estate  :categories="$this->categories" :orders="$this->orders" />

                                         </div>
                                        </div>
                                    </div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- /row -->
				</div>
			</section>
			<!-- ============================ Login Form End ================================== -->
