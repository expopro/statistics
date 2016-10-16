<?
/*
 *Class File Created by Jorge Guerrero Sanchez; Sep 25, 2016; Cuauhtemoc, Chihuahua, Mexico
 *v1.0
 *Free for Educational Use
 *Comments welcome at expopro@yahoo.com please use Subject: Histogram Titos
 *Include the function in your own classes.
 *Enjoy!
 *
 **Please Note:  Function outputs an array, for which you need to output $variable['Result'] or $variable['Notes'] depending on what you'd like :)
 */
class histogram {
	
		public function histogramTitos($title,$array,$start=null,$bins=null,$increment=null,$hide=null){
$notes=<<<notas
<p>Function outputs a histogram on one-dimensional array of values (x1,x2,x3...).  Created to control starting value, number of bins, and intervals.</p>
<p>Display includes relative frequency per bin to determine normal distribution of the set (array) of values input.</p>
<p>Normal Distribution is the relative percentage to the whole set per bin, that is all values add up to 1 or 100% and you can add the frequencies from left to right or right to left to determine the chances of getting in the set something of less or greater value from a particular bin.</p>
<p>Measures <em>Frequency</em></p>
<dl>
<dt>title</dt>
<dd>String for title of chart</dd>
<dd>Required</dd>
<dd>Make sure to change the title for every new scatter chart you create.</dd>
<dd>title is the dynamic suffix for the javscript code to work for google charts.</dd>
<dd>Spaces are allowed in this case because of the <code>str_replace</code> function stripping spaces from the name.</dd>

<dt>array</dt>
<dd>Array of values in the format of <code>\$array=array(1,2,3,34,85,900,...);</code></dd>
<dd>Double or Integer accepted</dd>
<dd>Required</dd>

<dt>start</dt>
<dd>Sets the starting value for the bins.</dd>
<dd>Default is null and will input the minimum value in the array if not set; otherwise takes input value.</dd>
<dd>Optional</dd>

<dt>bins</dt>
<dd>Default is null and will take the square root of the count of values if not set; otherwise takes input value.<dd>
<dd>Optional</dd>

<dt>increment</dt>
<dd>interval gap from min-max value on the interval</dd>
<dd>Default is null and will take the difference between the max and minimum value divided by the number of bins; otherwise, takes input value.</dd>
<dd>Optional</dd>

<dt>hide</dt>
<dd>If this value is set to true or 1, it will hide the stacked individual values dataset.</dd>
<dd>Useful for large amounts of data</dd>
<dd>Default is null for stacked values</dd>
<dd>Optional</dd>

</dl>
Programmer's Note:  All optional arguments take in integers, hide takes 1 for true.

<small>
<ol>
Sources:
<li>Coded Sep 25, 2016 by Jorge Guerrero Sanchez using only PHP and CSS.
<li>For relative distribution watch video from <a href="//www.youtube.com/watch?v=vzRguejpzCc&list=PL3mgQkf_Z3RnBQPgP074-xkrgRi7k2jm2&index=11" target="_blank">Quantitative Analysis Institute</a>
</ol>
</small>
notas;

$title1=str_replace(' ','',$title);
$n=count($array);
	
isset($start)?$start:$start=min($array);
isset($bins)?$bins:$bins=floor(pow($n,.5));
isset($increment)?$increment:$increment=(max($array)-min($array))/$bins;


for($i=0;$i<=$bins;$i++){
  $count=$start+($increment*$i);
  ${binint.$i}=$count;
}

for($i=0;$i<$bins;$i++){
  ${bin.$i}=array();
  ${mainArray.$i}=array();
  foreach($array as $stat){
      if($stat>=${binint.$i} && $stat<=${binint.($i+1)}){
              ${bin.$i}[]=$stat;
			  $minTab=floor(${binint.$i}); $maxTab=floor(${binint.($i+1)});
			  ${tab.$i}="$minTab-$maxTab";
              //${tab.$i}="${binint.$i}-${binint.($i+1)}";
              ${mainArray.$i}=array("Values"=>${bin.$i},"Count"=>count(${bin.$i}));
            }
			${relativeFrequency.$i}=round((${mainArray.$i}['Count']/$n)*100,2);
       }
rsort(${mainArray.$i}['Values']);
}


$cssCol=''; $htmlCol='';

for($i=0;$i<$bins;$i++){

$center=80*$i+(500-50*$i);
${leftCol.$i}=80*$i;

$cssCol.=<<<col
<style>
block#$title1-content ul#$title1-content{$i} {display: table-cell; position: absolute; bottom: 0; left: ${leftCol.$i}px; width:0%;}
</style>
col;

${counter.$i}=${mainArray.$i}['Count'];

$htmlCol.=<<<column
<ul id="$title1-content{$i}">
<li>${counter.$i}
column;

  foreach(${mainArray.$i}['Values'] as $vals){
  if(!isset($hide)){
  $htmlCol.="<li>$vals";
  }
  else{$htmlCol.='';}
  }

$htmlCol.=<<<column
<li>${tab.$i}
<li>${relativeFrequency.$i} %
</ul>
column;

}


$css=<<<css
<style>
  section#$title1 {display: block; width: 900px; height: 500px; margin: 100px auto;
position: relative;}

block#$title1-content {display: block; width: 0%; height: 100%; margin-right: {$center}px;
position: relative;}

  block#$title1-content ul li {display: block; margin: 2px 10px; width: 75px; height: 15px; line-height: 15px; vertical-align: middle; background:red; text-align: center; color: white;}

  block#$title1-content ul li:first-of-type {background: transparent; color: black;}
  block#$title1-content ul li:nth-last-of-type(2) {background: transparent; color: black; border-top: 1px dashed black;}
  block#$title1-content ul li:last-of-type {background: transparent; color: black; font-size:small;}

  h3 {text-align: left; margin-top: 50px;}
  h5.Tito {text-align: left; margin-top: -15px;}

</style>
css;

$html=<<<html
<section id="$title1">
<h3>$title</h3>
<h5 class='Tito'>Tito's Histogram</h5>
<block id="$title1-content">
$htmlCol
</block>

</section>
html;

$res= $css;
$res.= $cssCol;
$res.= $html;

	$output=array('Notes'=>$notes,'Result'=>$res);
	
	return $output;

	}
	
	
}
?>