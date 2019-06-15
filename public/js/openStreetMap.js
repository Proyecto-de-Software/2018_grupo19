//import {OpenLayers} from "https://www.openlayers.org/api/OpenLayers.js";


map = new OpenLayers.Map("mapdiv");
map.addLayer(new OpenLayers.Layer.OSM());
var markers = new OpenLayers.Layer.Markers( "Markers" );
map.addLayer(markers);
var lonLat = new OpenLayers.LonLat(-60.0071,-34.9002).transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );
markers.addMarker(new OpenLayers.Marker(lonLat));
map.setCenter (lonLat, 12);