<div class="container mt-5">

    <div id="map">
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7478738.939105042!2d40.9962868675982!3d23.757077180708183!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2seg!4v1700517511016!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
    </div>

</div>
{{--
<script type="text/javascript">

let map;

async function initMap() {

  const position = { lat: 24.096728514531932,  lng: 45.16397262971608 };

  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");


  map = new Map(document.getElementById("map"), {
    zoom: 4,
    center: position,

  });

  const marker = new AdvancedMarkerElement({
    map: map,
    position: position,
    title: "suadi arbia",
    draggable: true

  });

map.addListener(marker, 'position_changed',  () => {

        let lat = marker.position.lat()
        let lng = marker.position.lng()
        $('#latitude').val(lat)
        $('#longitude').val(lng)
    })

map.addListener(map, 'click',  (event) => {

    pos = event.latLng
    marker.setPosition(pos)

})


}

initMap();

</script>



<script type="text/javascript" defer src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>





 --}}
