<?PHP
function get_coords($DBcoords)
{

$coords_array=explode("-",$DBcoords);
$final_coords_array=array();
foreach ($coords_array as $x)
{
 $coords_couple=explode(",",$x);
 
 $count=count($coords_couple);
 for ($i=0; $i <=($count -1); $i++) { 
 	
 	$coords_couple[$i]=ltrim($coords_couple[$i]);
 //	$coords_couple[$i]=substr($coords_couple[$i],0,6);
 	$coords_couple[$i]=floatval($coords_couple[$i]);
 //	echo $coords_couple[$i];
 									}
array_push($final_coords_array, $coords_couple);
}

return $final_coords_array;
}
//get_coords('12.533390045166,41.8831481933594 - 12.5336799621582,41.8830795288086');
?>