<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any domain
header("Content-Type: application/json");

$API_KEY = "AIzaSyDSRvqTsYQXGTJ3gCbaaSXvAIqnnT3MMiM"; // Replace with your API Key
$PLACE_ID = "ChIJd5IeY6tFxokR8QWJk68CUpI";    // Replace with the Place ID

$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$PLACE_ID&fields=user_ratings_total&key=$API_KEY";

$response = file_get_contents($url);
echo $response;
?>
