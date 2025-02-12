﻿


//You can calculate directions (using a variety of methods of transportation) by using the DirectionsService object.
var directionsService = new google.maps.DirectionsService();

//Define a variable with all map points.
var _mapPoints = new Array("udaipur","jodhpur","jaipur","Bikaner");

//Define a DirectionsRenderer variable.
var _directionsRenderer = '';






//InitializeMap() function is used to initialize google map on page load.
function InitializeMap() {

    //DirectionsRenderer() is a used to render the direction
    _directionsRenderer = new google.maps.DirectionsRenderer();

    //Set the your own options for map.
    var myOptions = {
        zoom: 6,
        center: new google.maps.LatLng(21.7679, 78.8718),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //Define the map.
    var map = new google.maps.Map(document.getElementById("dvMap"), myOptions);
    
    //Set the map for directionsRenderer
    _directionsRenderer.setMap(map);
    
    //Set different options for DirectionsRenderer mehtods.
    //draggable option will used to drag the route.
    _directionsRenderer.setOptions({
        draggable: true
    });

    //Add the doubel click event to map.
    google.maps.event.addListener(map, "dblclick", function (event) {
        
        //Check if Avg Speed value is enter.
        if ($("#txtAvgSpeed").val() == '') {
            alert("Please enter the Average Speed (km/hr).");
            $("#txtAvgSpeed").focus();
            return false;
        }
        
        var _currentPoints = event.latLng;
        _mapPoints.push(_currentPoints);
        getRoutePointsAndWaypoints();
    });
    
    //Add an event to route direction. This will fire when the direction is changed.
    google.maps.event.addListener(_directionsRenderer, 'directions_changed', function () {
        computeTotalDistanceforRoute(_directionsRenderer.directions);
    });
}


//getRoutePointsAndWaypoints() will help you to pass points and waypoints to drawRoute() function
function getRoutePointsAndWaypoints() {
    //Define a variable for waypoints.
    var _waypoints = new Array();

    if (_mapPoints.length > 2) //Waypoints will be come.
    {
        for (var j = 1; j < _mapPoints.length - 1; j++) {
            var address = _mapPoints[j];
            if (address !== "") {
                _waypoints.push({
                    location: address,
                    stopover: true  //stopover is used to show marker on map for waypoints
                });
            }
        }
        //Call a drawRoute() function
        drawRoute(_mapPoints[0], _mapPoints[_mapPoints.length - 1], _waypoints);
    } else if (_mapPoints.length > 1) {
        //Call a drawRoute() function only for start and end locations
        drawRoute(_mapPoints[_mapPoints.length - 2], _mapPoints[_mapPoints.length - 1], _waypoints);
    } else {
        //Call a drawRoute() function only for one point as start and end locations.
        drawRoute(_mapPoints[_mapPoints.length - 1], _mapPoints[_mapPoints.length - 1], _waypoints);
    }
}






//drawRoute() will help actual draw the route on map.
function drawRoute(originAddress, destinationAddress, _waypoints) {
    //Define a request variable for route .
    var _request = '';

    //This is for more then two locatins
    if (_waypoints.length > 0) {
        _request = {
            origin: originAddress,
            destination: destinationAddress,
            waypoints: _waypoints, //an array of waypoints
            optimizeWaypoints: true, //set to true if you want google to determine the shortest route or false to use the order specified.
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
    } else {
        //This is for one or two locations. Here noway point is used.
        _request = {
            origin: originAddress,
            destination: destinationAddress,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
    }

    //This will take the request and draw the route and return response and status as output
    directionsService.route(_request, function (_response, _status) {
        if (_status == google.maps.DirectionsStatus.OK) {
            _directionsRenderer.setDirections(_response);
        }
    });
}

//Create a html tr count variable
var _htmlTrCount = 0;

//computeTotalDistanceforRoute() will help you to calculate the total distance and render dynamic html.
function computeTotalDistanceforRoute(_result) {
    //Get the route
    var _route = _result.routes[0];

    //This will remove all rows from table with id=HtmlTable
    $("#HtmlTable").find("tr").remove();

    //Create temporary points variables.
    var _temPoint = new Array();

    _htmlTrCount = 0;
    for (var k = 0; k < _route.legs.length; k++) {
        //START Get the max lenth of steps.
        var lenght = 0;
        if ((_route.legs[k].steps.length) - 1 < 0) {
            var lenght = _route.legs[k].steps.length;
        } else {
            var lenght = _route.legs[k].steps.length - 1;
        }


        if (_route.legs[k].distance.value > 0) //This look is for more then one point i,e after B pionts
        {
            if (k == 0) //If there are only one route with two points.
            {
                _temPoint.push(_route.legs[k].steps[0].start_point); //E.g: A
                _htmlTrCount++;
                CreateHTMTable(_route.legs[k].steps[0].start_point, _route.legs[k].distance.value); //Create html table
                _temPoint.push(_route.legs[k].steps[lenght].end_point); //E.g: B
                _htmlTrCount++;
                CreateHTMTable(_route.legs[k].steps[lenght].end_point, _route.legs[k].distance.value); //Create html table
            } else // more routes and more points
            {
                _temPoint.push(_route.legs[k].steps[lenght].end_point); //E.g: C to may
                _htmlTrCount++;
                CreateHTMTable(_route.legs[k].steps[lenght].end_point, _route.legs[k].distance.value); //Create html table
            }
        } else // if distance is zero then it is the first point ie A
        {
            _temPoint.push(_route.legs[k].steps[lenght].start_point); //E.g: A
            _htmlTrCount++;
            CreateHTMTable(_route.legs[k].steps[lenght].start_point, _route.legs[k].distance.value); //Create html table
        }
    }

    //Assigne temporary ponts to _mapPoints array
    _mapPoints = new Array();
    for (var y = 0; y < _temPoint.length; y++) {
        _mapPoints.push(_temPoint[y]);
    }
}


//CreateHTMTable() will help you to create a dynamic html table
function CreateHTMTable(_latlng, _distance) {
    var _Speed = $("#txtAvgSpeed").val();
    var _Time = parseInt(((_distance / 1000) / _Speed) * 60);;
    if (_htmlTrCount - 1 == 0) {
        _Time = 0;
        _distance = 0;
    }

    var html = '';
    var title = new Array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O");
    html = html + "<tr id=\"" + _htmlTrCount + "\">";
    html = html + "<td style=\"width: 80px;\">" + _htmlTrCount + "</td>";
    html = html + "<td style=\"width: 80px;\"><span id=\"Title_" + _htmlTrCount + "\">" + title[_htmlTrCount - 1] + "</span></td>";
    html = html + "<td style=\"width: 100px;\"><span id=\"lat_" + _htmlTrCount + "\">" + parent.String(_latlng).split(",")[0].substring(1, 8) + "</span></td>";
    html = html + "<td style=\"width: 100px;\"><span id=\"lng_" + _htmlTrCount + "\">" + parent.String(_latlng).split(",")[1].substring(1, 8) + "</span></td>";
    html = html + "<td style=\"width: 100px;\"><span id=\"dir_" + _htmlTrCount + "\">" + _distance + "</span></td>";
    html = html + "<td style=\"width: 70px;\"><span id=\"time_" + _htmlTrCount + "\">" + _Time + "</span></td>";
    html = html + "<td style=\"width: 60px;\"><img alt=\"DeleteLocation\" src=\"Images/Delete.jpg\" onclick=\"return deleteLocation(" + _htmlTrCount + ");\" /></td>";
    html = html + "</tr>";
    $("#HtmlTable").append(html);
    draganddrophtmltablerows();
}













//This will useful to delete the location
function deleteLocation(trid) {
    if (confirm("Are you sure want to delete this location?") == true) {
        var _temPoint = new Array();
        for (var w = 0; w < _mapPoints.length; w++) {
            if (trid != w + 1) {
                _temPoint.push(_mapPoints[w]);
            }
        }

        _mapPoints = new Array();
        for (var y = 0; y < _temPoint.length; y++) {
            _mapPoints.push(_temPoint[y]);
        }

        getRoutePointsAndWaypoints();
    } else {
        return false;
    }
}










//This will useful to swap rows the location
function draganddrophtmltablerows() {
    var _tempPoints = new Array();

    // Initialise the first table (as before)
    $("#HtmlTable").tableDnD();

    // Initialise the second table specifying a dragClass and an onDrop function that will display an alert
    $("#HtmlTable").tableDnD({
        onDrop: function (table, row) {
            var rows = table.tBodies[0].rows;

            for (var q = 0; q < rows.length; q++) {
                _tempPoints.push(_mapPoints[rows[q].id - 1]);
            }

            _mapPoints = new Array();
            for (var y = 0; y < _tempPoints.length; y++) {
                _mapPoints.push(_tempPoints[y]);
            }

            getRoutePointsAndWaypoints();
        }
    });
}