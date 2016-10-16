<!DOCTYPE html>
<html>
<head><title>Histogram Call File</title></head>
<body>
<h4>Tito's Histogram</h4>
<p>The following Histogram takes in an array of monthly salaries offered for PHP Programmers in Mexico City for the months of September and October 2016.
<br>
All Values are in New Mexican Pesos <em>in Thousands</em>
<?
include 'Histogram.php';

$Salaries=array(13,13,15,9,17,5,11,25,15,17,13,7,13,11,19,11,19,9,17,13,15,30,17,7,15,19,17,9,19,13,13,9,17,11,17,17,15,11,19,15,17,25,19,7,11,17,11,30,13,11,30,17,17,15,15,7,17,9,5,9,17,19,15,22,22,22,19,15,17,5,5,25,15);

$histogram=new histogram();


$chart=$histogram->histogramTitos('Starting Monthly Salaries',$Salaries);
echo $chart['Result'];
echo $chart['Notes'];


?>
</p>
<p>
You may output as many histograms in a single file as needed just be sure to change the title for each!
</p>
</body>
</html>