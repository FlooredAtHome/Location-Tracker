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
        
        // Check position has been changed or not before doing anything
        if(prevLat != position.coords.latitude || prevLong != position.coords.longitude) {
            
            // Set previous location
            var prevLatR = position.coords.latitude;
            var prevLongR = position.coords.longitude;

            var prevLat = Math.round(prevLatR * 10000.0) / 10000.0;
            var prevLong = Math.round(prevLongR * 10000.0) / 10000.0;
            
            // Get current position
            var positionInfo = "Your current position is (" + "Latitude: " + Math.round(position.coords.latitude * 10000.0) / 10000.0 + ", " + "Longitude: " + Math.round(position.coords.longitude * 10000.0) / 10000.0 + ")";
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
    <button type="button" id="toggleWatchBtn">Start Watching</button>
    <div id="result">
        <!--Position information will be inserted here-->
    </div>   
    <?php
        $container = $_SERVER['HTTP_USER_AGENT'];
        var_dump($container);
    ?>
</body>
    
 <script>
 if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('service-worker.js')
      .then(function(reg){
        console.log("Yes, it did.");
     }).catch(function(err) {
        console.log("No it didn't. This happened:", err)
    });
 }
</script>
</html>
