<!doctype html>
<html>
<head>
    <?php 
        try {
            include 'php/reusables/head.php';
        } catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
</head>
<body>
    <?php 
        try {
            include 'php/reusables/hero.php';
        } catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
    <div class="contactPage">
        <?php include 'php/reusables/contact.php' ?>
        <div class="contactPage__mapBlock">
            <div class="contactPage__mapBlock--mapInstance">
                <div id="mapCanvas1" class="contactPage__mapBlock--mapInstance-mapItem">
                </div>
                <span class="contactPage__mapBlock--mapInstance-cityName">Calgary Campus</span> 
            </div>
            <div class="contactPage__mapBlock--mapInstance">
                <div id="mapCanvas2" class="contactPage__mapBlock--mapInstance-mapItem"> 
                </div>
                <span class="contactPage__mapBlock--mapInstance-cityName">Edmonton Campus</span> 
            </div>
        </div>
        <script type="text/javascript">
            var map1, map2, marker;
            function drawMap() {
                
                var mapOptions = {
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    fullscreenControl: false,
                }

                myLatLng = {lat: 51.0486, lng:-114.0708 };
                mapOptions.center = new google.maps.LatLng(myLatLng); // Calgary
                map1 = new google.maps.Map(document.getElementById("mapCanvas1"), mapOptions);
                
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map1
                });
                marker.setMap(map1);

                myLatLng = {lat:53.5444, lng:-113.4909 };
                mapOptions.center = new google.maps.LatLng(myLatLng); // Edmonton
                map2 = new google.maps.Map(document.getElementById("mapCanvas2"), mapOptions);
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map2
                });
                marker.setMap(map2);
            }
        </script> 
        <script async defer src="https://maps.google.com/maps/api/js?key=AIzaSyDMH56XYTfv4tKScOSIFm6GUv1nHwO74Hk&callback=drawMap"></script>
        <br>
        <br>   
    </div>
    <!-- FOOTER -->

    <section>
    <?php 
        try {
            include 'php/reusables/footer.php';
        } catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
    </section>
</body>
</html>