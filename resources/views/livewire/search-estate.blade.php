
<form wire:submit='search'>
    @csrf
    <div  class="form-group" style="margin-bottom: 4rem;" >

        <label for="orderType" class="form-label text-black">Order Type</label>
        <select wire:model='form.orderType'  class="wide form-control shadow-none"   id="orderType" aria-label="Default select example">
            <option value="" disabled selected >Choose Order Type</option>
                @foreach ($orders as $order)
                <option
                      value="{{ $order->id }}"
                      wire:key="{{ $order->id }}"
                      @selected(old('form.orderType') == $order->id)

                      >
                      {{ $order->name }}
                </option>
                @endforeach

        </select>
        <div>
            @error('form.orderType') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

    </div>

     <div  class="form-group" style="margin-top: 4rem !important;" >

        <label for="estateType" class="form-label text-black">Estate Type</label>

        <select wire:model='form.estateType' class="wide form-control shadow-none"  id="estateType" aria-label="Default select example">
            <option value="" disabled selected>choose estate</option>
                @foreach ($categories as $category)
                <option

                     value="{{ $category->id }}"
                     wire:key="{{ $category->id }}"
                     @selected(old('form.estateType') == $category->id)

                     >{{ $category->name }}</option>
                @endforeach
        </select>

        <div class="mt-2">
            @error('form.estateType') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

      </div>


          <div class="row g-2" style="margin-top: 4rem !important;">
            <label for="area" class="form-label">Area </label>
            <div class="col">
              <input type="number" min="0" max="999999" wire:model='form.minArea' class="form-control shadow-none" placeholder="from" aria-label="from">
              <div>
                @error('form.minArea') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
              <div class="col-md-1 ms-3 d-flex align-items-center">-</div>
            <div class="col">
              <input type="number" min="0" max="999999" wire:model='form.maxArea' class="form-control shadow-none" placeholder="to" aria-label="to">
              <div>
                @error('form.maxArea') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
          </div>

          <div class="row g-2 mt-4">
            <label for="price" class="form-label">Price</label>
            <div class="col">
              <input type="number" min="0" max="999999" wire:model='form.minPrice' class="form-control shadow-none" placeholder="from" aria-label="from">
              <div>
                @error('form.minPrice') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            </div>
            <div class="col-md-1 ms-3 d-flex align-items-center">-</div>
            <div class="col">
              <input type="number" min="0" max="999999" wire:model='form.maxPrice' class="form-control shadow-none" placeholder="to" aria-label="to">
              <div>
                @error('form.maxPrice') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
          </div>


        <div class="mb-3 mt-3">
            <label for="city" class="form-label">City</label>
            <input type="text" wire:model='form.city' class="form-control shadow-none" id="city" aria-describedby="city">
            <div>
                @error('form.city') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

          </div>

          <div class="form-group d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-dark w-50 font--bold ">Apply</button>
        </div>

    </form>
