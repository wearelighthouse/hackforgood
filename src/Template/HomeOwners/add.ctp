<?php $this->assign('title', 'Register Home Owner'); ?>

<?php $this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>

<?= $this->Form->create($homeOwner, ['class' => 'ui form']) ?>
    <?= $this->Form->input('name') ?>
    <?= $this->Form->input('email') ?>
    <?= $this->Form->input('street_address',
        ['id' => 'autocomplete', 'placeholder' => '12 Oxford Street', 'onFocus' => 'geolocate()']) ?>
    <?= $this->Form->hidden('geolocation.latitude', ['id' => 'lat']) ?>
    <?= $this->Form->hidden('geolocation.longitude', ['id' => 'lng']) ?>

    <button type="submit" class="ui primary button" disabled>Register</button>
<?= $this->Form->end() ?>

<script>

    var placeSearch, autocomplete;

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['address']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        $("button[type='submit']").addClass("loading");
        var place = autocomplete.getPlace();
        $("#lat").val(place.geometry.location.lat());
        $("#lng").val(place.geometry.location.lng());
        $("button[type='submit']").removeClass("loading");

        $('.button').removeAttr('disabled');
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtsjdDBoq978ylpNVywFtgrZq-ELN2EBA&libraries=places&callback=initAutocomplete"
        async defer></script>
