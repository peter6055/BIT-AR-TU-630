<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

//echo(createLink("https://covid-vaccine.tech/app/followup/index.php?r=survey/index&sid=595476&token=nD32fe4a7CiPKKrDGmD0wuzRz8Dsjflhj51"));

// This function is to get a dynamic link from firebase

// @parsm string $longLink: Original long url
// @return string $shortLink: Shorted uel
function createLink( $longLink ) {
  $url = "https://firebasedynamiclinks.googleapis.com/v1/shortLinks?key=AIzaSyDkyfxNanqoKYHzHlmsXx5y4VK0NDhY1p0";

  $curl = curl_init( $url );
  curl_setopt( $curl, CURLOPT_URL, $url );
  curl_setopt( $curl, CURLOPT_POST, true );
  curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/json",
  );
  curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );

  $data = '{"dynamicLinkInfo": {"domainUriPrefix": "go.covid-vaccine.tech","link":"'.$longLink.'"},"suffix": {"option": "SHORT"}}';
	  
//  echo($data);
//  echo("==========================");

  curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );

//  //for debug only!
//  curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, false );
//  curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );

  $resp = curl_exec( $curl );
  curl_close( $curl );
//  var_dump( $resp );

  $json = json_decode($resp, true);

  $shortLink = $json['shortLink'];
  return $shortLink;
}
?>
