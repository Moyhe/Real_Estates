<div>

    <!-- ============================ Page Title Start================================== -->

<div class="page-title" style="background: #34495e url({{ asset('images/photo-logo.jpg') }}) no-repeat;">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <h2 class="ipt-title">Property creation</h2>

        </div>
    </div>
    </div>
    </div>

    <!-- ============================ Page Title End ================================== -->

    <livewire:create-estate />

    <x-estate-detail  :$estates  />

    <x-back-to-button />

</div>





