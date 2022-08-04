// import L from 'leaflet';

// import 'leaflet/dist/leaflet.css';

//? Leaflet is imported from CDN only on contact page
//? if you want to change it you will find it in index.php

const handleMap = () => {
  const mapContainer = document.querySelector('.js-map-container');
  const mapCenterCoordinates = [53.1436691, 23.1925032];
  const markerCoordinates = mapCenterCoordinates;

  if (mapContainer === null) return;

  // Create map
  const map = L.map(mapContainer, {
    center: mapCenterCoordinates,
    zoom: 16,
  });

  // Load map tile layer
  const CartoDB_Positron = L.tileLayer(
    'https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png',
    {
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
      subdomains: 'abcd',
      maxZoom: 20,
    }
  );

  // Create marker common options
  const markerOptions = {
    radius: 5.5,
    fillColor: '#BC9856',
    stroke: 0,
    fillOpacity: 1,
  };

  // Create marker
  const marker = L.circleMarker(markerCoordinates, {
    ...markerOptions,
    className: 'leaflet-custom-marker',
  });

  // Create marker shadow
  const markerShadow = L.circleMarker(markerCoordinates, {
    ...markerOptions,
    className: 'leaflet-custom-marker-shadow',
    radius: 38,
  });

  // Add layer to map
  CartoDB_Positron.addTo(map);

  // Add marker and marker shadow to map
  markerShadow.addTo(map);
  marker.addTo(map);

  // Add click event to open Google Maps
  marker.on('click', () => {
    window.open('https://g.page/Lipcowy?share');
  });
};

export default handleMap;
