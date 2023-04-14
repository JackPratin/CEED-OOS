var mymap = L.map('map').setView([14.622234, 121.097365], 13);
const lat1 = 14.622234; // latitude of location 1 in decimal degrees
const lon1 = 121.097365; // longitude of location 1 in decimal degrees

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
}).addTo(mymap);

var marker = L.marker([14.622234, 121.097365], { draggable: true }).addTo(mymap)
;


function onLocationFound(e) {
    var radius = e.accuracy / 2;

    marker.setLatLng(e.latlng);
    mymap.setView(e.latlng);
    var pos = e.latlng;

    const dist = distance(lat1, lon1, pos.lat, pos.lng);
    // document.getElementById("location").innerHTML = "The distance between your location and The 1975 old fashioned burgers store is " + dist.toFixed(2) + " km.";

    // L.circle(e.latlng, radius).addTo(mymap);

    let deliveryFee =  Math.trunc(dist)*25;
    let subtotal = parseInt(document.getElementById("subtotalValue").value);
    // let subtotalValue = subtotal.match(/\d+/g);

    document.getElementById('delFee').innerHTML = "₱"+ deliveryFee+".00";
    document.getElementById('deliveryFee').value = deliveryFee;
    document.getElementById('total').value = deliveryFee+subtotal;
    let total = deliveryFee + subtotal;
    document.getElementById('subtotal').innerHTML ="₱"+total+".00";
}

function onLocationError(e) {
    alert(e.message);
}

mymap.on('locationfound', onLocationFound);
mymap.on('locationerror', onLocationError);

mymap.locate({setView: true, maxZoom: 16});

marker.on('dragend', function (e) {
    var position = marker.getLatLng();
    // alert("Marker dragged to new location: " + position);
    var strPos = JSON.stringify(position);

    splitPos = strPos.split(", ");
        // Example usage
    
    const lat2 = position.lat; // latitude of location 2 in decimal degrees
    const lon2 = position.lng; // longitude of location 2 in decimal degrees
    const dist = distance(lat1, lon1, lat2, lon2);
    // console.log("The distance between the two locations is " + dist.toFixed(2) + " km.");
    // document.getElementById("location").innerHTML = "The distance between your location and The 1975 old fashioned burgers store is " + dist.toFixed(2) + " km.";
    let deliveryFee =  Math.trunc(dist)*25;
    let subtotal = parseInt(document.getElementById("subtotalValue").value);
    // let subtotalValue = subtotal.match(/\d+/g);

    document.getElementById('delFee').innerHTML = "₱"+ deliveryFee+".00";
    document.getElementById('deliveryFee').value = deliveryFee;
    document.getElementById('total').value = deliveryFee+subtotal;
    let total = deliveryFee + subtotal;
    document.getElementById('subtotal').innerHTML ="₱"+total+".00";

});

// 14.622234, 121.097365  = 1975 coordinates


function distance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius of the earth in km
    const dLat = deg2rad(lat2-lat1);
    const dLon = deg2rad(lon2-lon1); 
    const a = 
        Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
        Math.sin(dLon/2) * Math.sin(dLon/2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    const distance = R * c; // Distance in km
    return distance;
}

function deg2rad(deg) {
return deg * (Math.PI/180)
}
