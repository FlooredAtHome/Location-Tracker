<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="master.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.3.1/css/ol.css" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Find Your Location Trail</title>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.3.1/build/ol.js"></script>
</head>
<body>
    <?php
    use DeviceDetector\DeviceDetector;

// Fetch the user agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Create an instance of DeviceDetector
$dd = new DeviceDetector($userAgent);

// Extract any information you want
$osInfo = $dd->getOs();
$device = $dd->getDeviceName();
$brand = $dd->getBrandName();
$model = $dd->getModel();
    echo $model;
    echo $device;
    ?>
    <div id="card">
        <!-- Header Part-->
        <div id="card-header">
            <h3>Generate Your Location Trail</h3>
            <div id="actions">
              <button id="start"><span>Start</span></button>
              <button id="github-repo"><a href="https://github.com/vasusehgal/Location-Tracker" target="_blank" style="display: block;text-decoration:none;color:white;"><span>Github</span></a></button>
            </div>
        </div>
        
        <!-- Body Area-->
        <div id="card-body">
            <div id="map-container" class="map-container"></div>
        </div>

        <!-- Footer Portion-->
        <div id="card-footer">
            <p id="text">Click On Start To Generate Your Location Trail</p>
        </div>
    </div>
    <script src="locTrail.js"></script>
</body>
</html>