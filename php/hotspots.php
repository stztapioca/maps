<?php
//set_time_limit ( 0 );
//ini_set(“memory_limit”,-1);
;
require 'get_coords.php';
require 'json_format.php';
//header('Content-Type: application/json');

$features=array();
$mysqli = new mysqli("localhost", "root", "st3f4n0", "markaspot");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//$conn= new dbconnect('localhost','root','st3f4n0','gim1') or die('errore');
$sql="SELECT  street,lat,lon
FROM
markers
WHERE category_id=30
" ;
//echo $sql.'<br>';
$result = $mysqli->query($sql);
//print_r($result);
//$result=$conn->func_query($sql) or die('errore query') ;
while($row = $result->fetch_array())

        {
        
        $coordinates=array($row['lon'],$row['lat']) ;
        $features1=      array(
                        "type"=> "Feature",
                      //  "id"=> utf8_encode($row['NomeTrattoStradale']),
                        "properties"=>array(
                                   //   "DSSObjectType"=> "TRAJECT_SENSOR",
                                   //   "LOCATION"=> utf8_encode($row['NomeTrattoStradale']),
                                   //   "TIMESTAMP"=> $row['DataOraRilevamento'],
                                     "popupContent"=> $row['street']
                                    
                                      
                                          ),
                        "geometry"=>array(
    
                                      "type"=> "Point",
                                      "coordinates"=> $coordinates
       
                                        )
                                  )             
      ;
      
       
      array_push($features,$features1);   
        }

$feat_coll=array("type"=>"FeatureCollection",
"features"=>$features);
echo indent(json_encode($feat_coll));
   
?>
