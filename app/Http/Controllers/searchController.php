<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\address;

class searchController extends Controller
{ function  index(	Request $request){

$curl = curl_init('https://us1.locationiq.com/v1/search.php?key=d0dcdab8034efb&q='.$request->name.'&format=json&limit=4');

curl_setopt_array($curl, array(
  CURLOPT_RETURNTRANSFER    =>  true,
  CURLOPT_FOLLOWLOCATION    =>  true,
  CURLOPT_MAXREDIRS         =>  10,
  CURLOPT_TIMEOUT           =>  30,
  CURLOPT_CUSTOMREQUEST     =>  'GET',
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return 'cURL Error #:' . $err;
} else {
 // put the contents of the file into a variable
$characters = json_decode($response);
 
	
DD($characters);
return $characters;
    //
}
}
function  indexpin(	Request $request){

$curl = curl_init('https://us1.locationiq.com/v1/search.php?key=d0dcdab8034efb&postalcode='.$request->pin.'&format=json');

curl_setopt_array($curl, array(
  CURLOPT_RETURNTRANSFER    =>  true,
  CURLOPT_FOLLOWLOCATION    =>  true,
  CURLOPT_MAXREDIRS         =>  10,
  CURLOPT_TIMEOUT           =>  30,
  CURLOPT_CUSTOMREQUEST     =>  'GET',
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return 'cURL Error #:' . $err;
} else {
 // put the contents of the file into a variable
$characters = json_decode($response);
 
	

return $characters;
    //
}
}


function store(Request $response){
if($add=address::where('user_id',auth()->id())->first()){

	$add=address::where('user_id',auth()->id())->first();
	$add->user_id=auth()->id();
$add->Mainadd=$response->name;
$add->area=$response->area;
$add->colony=$response->colony;
$add->house=$response->house;

}else{								
$add = new address();
$add->user_id=auth()->id();
$add->Mainadd=$response->name;
$add->area=$response->area;
$add->colony=$response->colony;
$add->house=$response->house;}

$add->save();
return   "save";

}
function get(){ 
	$add=address::where('user_id',auth()->id())->get();

 return $add;
	
}
}

