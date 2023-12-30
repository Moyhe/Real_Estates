@props(['estates'])
<!-- ============================ Related Property ===================================== -->
         <section class="property">

            <div class="container">

                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <div class="sec-heading">
                            <h6>Gallery</h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="similar-slide">

                            <!-- Single Slide -->
                            @foreach ($estates as $estate)
                            <div class="single-slide">
                                <div class="property-list-wraps">
                                    <div class="property-list-thumb">
                                        <div class="property-list-img-slide">
                                            <div class="property-list-click">
                                                @if ($estate->thumbnails)
                                                @foreach ($estate->thumbnails as $thumbnail)
                                                <div><a href="single-property-1.html"><img src="{{ asset('storage/' .  $thumbnail) }}" class="img-fluid mx-auto" alt=""></a></div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </section>

   <!-- ============================ Related Property ===================================== -->
   <section class="property">
       <div class="container">

           <div class="row">
               <div class="col-lg-7 col-md-10">
                   <div class="sec-heading">
                       <h6>Properties</h6>
                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-lg-12 col-md-12">

                   <div class="similar-slide">

                       <!-- Single Slide -->
                   @foreach ($estates as $estate)
                   <div class="single-slide">
                    <div class="property-list-wraps">

                     @if ($estate->order_type_id == $estate->orderType->id)
                     <div class="property-type"><span>{{ $estate->orderType->name }}</span></div>
                     @endif

                        <div class="property-list-thumb">

                            <div class="property-list-img-slide">
                                <div class="property-list-click">
                                  @if ($estate->thumbnails)
                                  @foreach ($estate->thumbnails as $thumbnail)
                                  <div><a href="single-property-1.html"><img src="{{ asset('storage/' .  $thumbnail) }}" class="img-fluid mx-auto" alt=""></a></div>
                                  @endforeach
                                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="property-list-block">
                            <div class="property-list-head"  style="height: 6rem;">
                                <div class="property-list-head-caption">

                                    <div class="listing-short-detail-flex">
                                        <h5 class="title-name verified"><a href="single-property-1.html" class="prt-link-detail text-decoration-none text-dark">{{ $estate->title }}</a></h5>
                                        <div class="location">
                                         <i class="fa-solid fa-location-dot mt-1 me-1"></i>210 Zirak Road, Canada

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-between">
                                 <button class="btn  px-3 text-white " data-bs-toggle="modal" data-bs-target="#exampleModal{{$estate->id}}" type="button" style="background-color: #2c3e50; ">
                                     share
                                 </button>

                              </div>
                            </div>

                            <div class="property-list-footer">
                                <div class="property-list-circls">
                                    <ul>
                                        <li><span class="bed-inf"><i class="fa-solid fa-bed"></i></span>{{ $estate->number_of_rooms }} Bed</li>
                                        <li><span class="bath-inf"><i class="fa-solid fa-bath"></i></span>{{ $estate->number_of_bathroom }} Ba</li>
                                        <li><span class="area-inf"><i class="fa-solid fa-vector-square"></i></span>{{ $estate->area }} Sft</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                   @endforeach

                   </div>
                   <x-modal :$estates />
               </div>
           </div>

       </div>
   </section>
   <!-- ============================= Related Property End ================================= -->

