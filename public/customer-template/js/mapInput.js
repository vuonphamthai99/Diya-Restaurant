// $(document).ready(function () {
//     $("#latitudeArea").addClass("d-none");
//     $("#longtitudeArea").addClass("d-none");

//     var autocomplete;
//     var input = document.getElementById('autocomplete');
//     autocomplete = new google.maps.places.Autocomplete((input),{
//         type: ['geocode'],
//         componentRestrictions : {
//             country: "VN"
//         }
//     });
//     autocomplete.addListener('place_changed', function () {
//   var place = autocomplete.getPlace();
//   $('#latitude').val(place.geometry['location'].lat());
//   $('#longitude').val(place.geometry['location'].lng());

//   $("#latitudeArea").removeClass("d-none");
//   $("#longtitudeArea").removeClass("d-none");
// });
// });

