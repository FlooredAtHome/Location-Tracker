<!DOCTYPE html>
<html lang="en">
<head>
<link rel="manifest" href="manifest.json">
<meta charset="utf-8">
<title>Getting Current Position</title>
<script>
    // Set global variable
    var watchID;

    function showPosition() {
        if(navigator.geolocation) {
            watchID = navigator.geolocation.watchPosition(successCallback);
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
    function successCallback(position) {
        toggleWatchBtn.innerHTML = "Stop Watching";
        var t1 = Date.now();
        var lat1 = Math.round(position.coords.latitude * 10000.0) / 10000.0;
        var lon1 = Math.round(position.coords.longitude * 10000.0) / 10000.0;
        // Check position has been changed or not before doing anything
        if(prevLat != position.coords.latitude || prevLong != position.coords.longitude) {
            
            // Set previous location
            var prevLatR = position.coords.latitude;
            var prevLongR = position.coords.longitude;

            var prevLat = Math.round(prevLatR * 10000.0) / 10000.0;
            var prevLong = Math.round(prevLongR * 10000.0) / 10000.0;
            
            var lat2 = prevLat;
            var lon2 = prevLong;
            
            //Speed Calculation
            var t2 = Date.now();
            if (typeof(Number.prototype.toRad) === "undefined") {
                Number.prototype.toRad = function() {
                return this * Math.PI / 180;
                }
            }
            var R = 6371; // km
            var dLat = (lat2-lat1).toRad();
            var dLon = (lon2-lon1).toRad();
            var lat1 = lat1.toRad();
            var lat2 = lat2.toRad();

            var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) *    Math.cos(lat2); 
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            var distance = R * c;
            // From cletus' answer ends
            if(t1 == t2)
            {
                var spd = 0;
            }
            else
            {
                var spd = distance / (t2 - t1);
            }
            
            // Get current position
            var positionInfo = "Your current position is (" + "Latitude: " + Math.round(position.coords.latitude * 10000.0) / 10000.0 + ", " + "Longitude: " + Math.round(position.coords.longitude * 10000.0) / 10000.0 + ", " + "Speed: " + spd + ")";
            document.getElementById("result").innerHTML = positionInfo;
            
        }
        
    }
    function startWatch() {
        var result = document.getElementById("result");
        
        var toggleWatchBtn = document.getElementById("toggleWatchBtn");
        
        toggleWatchBtn.onclick = function() {
            if(watchID) {
                toggleWatchBtn.innerHTML = "Start Watching";
                navigator.geolocation.clearWatch(watchID);
                watchID = false;
            } else {
                toggleWatchBtn.innerHTML = "Aquiring Geo Location...";
                showPosition();
            }
        }
    }
    
    // Initialise the whole system (above)
    window.onload = startWatch;
</script>
</head>
<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 400px;">
        <button type="button" id="toggleWatchBtn" style="height:100px; width:200px; font-size:20px;">Start Watching</button>
    </div>
    <div id="result" style="font-size:20px; text-align: center;">
        <!--Position information will be inserted here-->
    </div>  
</body>
    
<script>
if ('serviceWorker' in navigator) { navigator.serviceWorker.register('/service-worker.js') }
</script>
</html>
