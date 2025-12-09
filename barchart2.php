<?php
require "dbconfig.php";
//include "stusession.php";
//$s=$_SESSION['usn'];
//$sql = "SELECT * FROM import_1   ";
//$res=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 20px;
    opacity: 0;
    animation: fadeIn 0.8s ease-in forwards;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.chart-container {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 30px;
    margin: 20px auto;
    max-width: 900px;
    opacity: 0;
    transform: translateY(20px);
    animation: slideUp 0.6s ease-out 0.3s forwards;
}

@keyframes slideUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.chart-title {
    color: #333;
    text-align: center;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 30px;
    opacity: 0;
    animation: fadeIn 0.5s ease-in 0.6s forwards;
}

.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    opacity: 1;
    transition: opacity 0.3s ease;
}

.loading-spinner {
    width: 50px;
    height: 50px;
    border: 5px solid rgba(102, 126, 234, 0.3);
    border-top: 5px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.logo{
	background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
	color: white;
	padding: 12px 30px;
	margin: 8px 10px;
	border: none;
	border-radius: 8px;
	cursor: pointer;
	font-size: 14px;
	font-weight: 600;
	transition: all 0.3s ease;
	box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
	float:right;
}
.logo:hover {
	transform: translateY(-2px);
	box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}
</style>
  </head>
      <title>PIE CHART</title>
    
  
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // Show loading overlay
        var loadingOverlay = document.createElement('div');
        loadingOverlay.className = 'loading-overlay';
        loadingOverlay.innerHTML = '<div class="loading-spinner"></div>';
        document.querySelector('.chart-container').appendChild(loadingOverlay);
        
        // Simulate slight delay for loading effect
        setTimeout(function() {
          // header: X axis label is Fac ID now
          // data rows will be injected from PHP (facid, total)
          <?php
          // build counts per faculty id from faccourse
          $sql = "SELECT id, COUNT(*) AS total FROM faccourse GROUP BY id";
          $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          $rows = [];
          while ($r = mysqli_fetch_assoc($res)) {
              // cast total to int to ensure numeric in JS
              $rows[] = [ (string)$r['id'], (int)$r['total'] ];
          }
          ?>
          var phpData = <?php echo json_encode($rows, JSON_NUMERIC_CHECK); ?>;
          var data = google.visualization.arrayToDataTable(
            [['Fac ID', 'Total MOOC Courses']].concat(phpData)
          );

          var options = {
            title: 'Faculty-wise MOOC Courses Distribution',
            titleTextStyle: {
              fontSize: 18,
              bold: true
            },
            pieHole: 0.4,
            colors: ['#667eea', '#764ba2', '#98d8e8', '#42b382', '#f6b93b', '#e55039'],
            backgroundColor: 'transparent',
            legend: {
              position: 'bottom',
              alignment: 'center',
              textStyle: {
                fontSize: 12
              }
            },
            chartArea: {
              left: 50,
              top: 50,
              width: '90%',
              height: '80%'
            },
            sliceVisibilityThreshold: 0,
            animation: {
              startup: true,
              easing: 'out',
              duration: 2000
            },
            pieSliceText: 'percentage',
            pieStartAngle: 0,
            reverseCategories: false
          };

          var chart = new google.visualization.PieChart(document.getElementById('chart'));
          
          // Hide loading overlay when chart is ready
          google.visualization.events.addListener(chart, 'ready', function() {
            setTimeout(function() {
              loadingOverlay.style.opacity = '0';
              setTimeout(function() {
                if (loadingOverlay.parentNode) {
                  loadingOverlay.parentNode.removeChild(loadingOverlay);
                }
              }, 300);
            }, 500);
          });

          chart.draw(data, options);
        }, 300);
      }
    </script>
  
  <body>
        <a href="adminhomepage2.php"><button class="logo"><b> BACK </b></button></a>
        <div class="chart-container">
            <div class="chart-title">Faculty-wise MOOC Courses Distribution</div>
            <div id="chart" style="width: 100%; height: 500px;"></div>
        </div>

  </body>
</html>