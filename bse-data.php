
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        var map;
        var lat_lng = new Array();
        var latlngbounds;
        var timer;
        var coder = new Array();
        window.onload = function () {
            var mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            var infoWindow = new google.maps.InfoWindow();
            
            latlngbounds = new google.maps.LatLngBounds();
            
            var markers = new Array();
            //markers[0] = ['United Kingdom, WS13','Delapre And Briar Hill, NN4'];
            //markers[1] = ['Middelkerke','Calp'];
            
             markers[0] = ['Udaipur','Jaipur'];
             markers[1] = ['Bikaner','Ajmer'];
             markers[2] = ['Jaisalmer','Jodhpur'];
             
            for (i = 0; i < markers.length; i++) {
                coder[i] = false;
                var job_pair = markers[i];
                var source = job_pair[0];
                var dest = job_pair[1];
                var codes = codeAddress(source,dest,i);
            }
            drawRoutes();
        }

        function coderCheck () {
            var coder_check = true;
            for (i = 0; i < coder.length; i++) {
                coder_check = coder_check && coder[i];
            }
            return coder_check; 
        }
        function drawRoutes () {
            if(coderCheck()) 
            {
                clearTimeout(timer);
                map.setCenter(latlngbounds.getCenter());
                map.fitBounds(latlngbounds);

                //***********ROUTING****************//

                //Intialize the Path Array
                var path = new google.maps.MVCArray();

                //Intialize the Direction Service
                var service = new google.maps.DirectionsService();

                //Set the Path Stroke Color
                var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });

                //Loop and Draw Path Route between the Points on MAP

                for (var i = 0; i < lat_lng.length; i=i+2) 
                {
                    
                    if ((i + 1) < lat_lng.length) 
                    {
                        var src = new google.maps.LatLng(parseFloat(lat_lng[i].lat()), 
                                             parseFloat(lat_lng[i].lng()));
                        var des = new google.maps.LatLng(parseFloat(lat_lng[i+1].lat()), 
                                             parseFloat(lat_lng[i+1].lng()));

                        service.route({
                            origin: src,
                            destination: des,
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                        }, function (result, status) {
                            if (status == google.maps.DirectionsStatus.OK) {
                                console.log(result);
                                for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                    path.push(result.routes[0].overview_path[i]);
                                }
                                poly.setPath(path);
                                map.fitBounds(latlngbounds);
                            }
                        });
                    }
                }
            }
            else {
               // clearTimeout(timer);
                timer = setTimeout(drawRoutes,5000);
            }
        }
        function codeAddress(source,dest,i) 
        {
            geocoder = new google.maps.Geocoder();
            var src_lang_lat = new Array(2);
            var dest_lang_lat = new Array(2);
            geocoder.geocode( { 'address': source}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) 
                {
                    src_lang_lat[0]=results[0].geometry.location.lat();
                    src_lang_lat[1]=results[0].geometry.location.lng();                 
                }
                geocoder.geocode( { 'address': dest}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) 
                    {
                        dest_lang_lat[0]=results[0].geometry.location.lat();
                        dest_lang_lat[1]=results[0].geometry.location.lng(); 
                        var google_src_lang_lat = new google.maps.LatLng(src_lang_lat[0], src_lang_lat[1]);
                        var google_dest_lang_lat = new google.maps.LatLng(dest_lang_lat[0], dest_lang_lat[1]);
                        lat_lng.push(google_src_lang_lat,google_dest_lang_lat);  
                        var src_marker = new google.maps.Marker({
                            position: google_src_lang_lat,
                            map: map
                        });
                        var dest_marker = new google.maps.Marker({
                            position: google_dest_lang_lat,
                            map: map
                        });
                        latlngbounds.extend(src_marker.position);
                        latlngbounds.extend(dest_marker.position);
                        coder[i]=true;                
                    }  
                });
            });
            return;
        }


    </script>
    <div id="dvMap" style="width: 500px; height: 500px">
    </div>
</body>
</html>
