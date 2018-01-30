<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.views.site.assets.js').'\home.js'), CClientScript::POS_HEAD);
?>

<!--*************************************************************-->
<div class="row">
    <div class="col-xs-12">
        <div id="infoMessage">
            <?php
                foreach (Yii::app()->user->getFlashes() as $key => $message) {
                    if ($key == 'notice') {
                        $key = 'warning';
                    }
                    echo '<div class="alert alert-' . $key . ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    ' . $message . "</div>\n";
                }
            ?>
        </div>
    </div>
</div>
<!--*************************************************************-->

<div class="row">
    <div class="col-xs-8">
        <div id="map"></div>    
    </div>
    <div class="col-xs-4">
        <h2>&nbsp;List of locations</h2>
        <ul class="list-group locations">
            <?php foreach($locations as $location) { ?>
                <a href="#" class="list-group-item location" id="<?php echo $location->locationId ?>"><?php echo $location->locationName; ?> <span class="badge"><?php echo $location->locationNumberOfEvents; ?></span></a>
            <?php } ?>
        </ul>
        
        <h3>&nbsp;List of events <small>(signed up)</small></h3>
        <ul class="list-group events">
            <?php foreach($subscribedEvents as $event) { 
                if ($event->isStarted == "true" && $event->isFinished == "false") {
                    $status = "In progress";
                }
                else if ($event->isStarted == "true" && $event->isFinished == "true") {
                    $status = "Finished";
                }
                else {
                    $status = "Not started";
                }
            ?>
            
                <a href="#" class="list-group-item event" id="<?php echo $event->eventId ?>"><?php echo $event->eventName; ?> (<?php echo $event->eventStartTime; ?>) - <?php echo $status ?></a>
            <?php } ?>
        </ul>
    </div>
</div>


<script>    
    var homeReqUrl = '<?php print Yii::app()->createUrl('site/home') ?>';
    var eventViewReqUrl = '<?php print Yii::app()->createUrl('events/events/view') ?>';
    
    
    
    function initMap() {
        console.log("initMap()");
        
        var myStyle = [
            {
                featureType: "administrative",
                elementType: "labels",
                stylers: [
                    { visibility: "off" }
                ]
            },{
                featureType: "poi",
                elementType: "labels",
                stylers: [
                    { visibility: "off" }
                ]
            },{
                featureType: "transit",
                elementType: "labels",
                stylers: [
                    { visibility: "off" }
                ]
            }
        ];
        
        var locations = [];
        var count = 1;
        
        <?php foreach ($locations as $location) { ?>
            locations.push(['<?php echo CJSON::encode($location->locationName); ?>', <?php echo CJSON::encode($location->locationLatitude); ?>, <?php echo CJSON::encode($location->locationLongitude); ?>, count, <?php echo CJSON::encode($location->locationDescription); ?>]);
            count++;
        <?php } ?>
      
        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControlOptions: {
                mapTypeIds: ['mystyle', google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN]
            },
            zoom: 17,
            center: new google.maps.LatLng(56.458245,-2.982143),
            mapTypeId: 'mystyle'
        });
        map.mapTypes.set('mystyle', new google.maps.StyledMapType(myStyle, { name: 'Campus map' }));

        var infowindow = new google.maps.InfoWindow;

        var marker, i;

        for (i = 0; i < locations.length; i++) {  
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][4]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIZClGjDZR3yNdRxh129WGLqgwW2NRPQs&language=en&region=GB&callback=initMap">
</script>
