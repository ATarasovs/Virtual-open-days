<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Analytics'),
        ),
    )); 
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


<div class="container-fluid">  
    <h2>Analytics</h2>
    <?php foreach ($charts as $chart) { ?>
        <div class="col-md-4 canvas">
            <canvas id="<?php echo $chart->id ?>" width="400" height="400"></canvas>
        </div>
    <?php } ?>
</div>

<script>

$(document).ready(function() {
    $(".analyticsLi").addClass("active");
});
    
    
<?php foreach ($charts as $chart) { ?>
    var dataArray = [];
    
    <?php foreach ($datas as $data) { 
        if ($chart->id == $data->chartId) { ?>
            dataArray.push([<?php echo CJSON::encode($data->title); ?>, <?php echo CJSON::encode($data->number); ?>]);
        <?php } 
    } ?>
        
    var myLineChart = new Chart(document.getElementById("<?php echo $chart->id ?>"), {
        type: '<?php echo $chart->type ?>',
        data: {
            labels: [],
            datasets: [{
                backgroundColor: [],
                data: []
            }]
        },
        options: {
            title: {
                display: true,
                text: '<?php echo $chart->title ?>'
            }
        }
    });
    
    for (var i = 0; i < dataArray.length; i++) {
        myLineChart.data.labels.push(dataArray[i][0]);
        myLineChart.data.datasets[0].data.push(dataArray[i][1]);
        myLineChart.data.datasets[0].backgroundColor.push(getRandomColor());
        myLineChart.update();
    }
<?php } ?>



    
    var ctx = document.getElementById("myChartt");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
            return color;
    }
</script>

