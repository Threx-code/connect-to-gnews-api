<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-with");

require_once "../inc/classesholder.php";

/*bbc43357119ef147f62c4fa7cf2cfa61*/
$url = "https://gnews.io/api/v3/search?q=none&token=16d422f0d4bfe835e0c18d5dd580b3e5";

/*initializing the CURL*/
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
	echo "cURL Error #:" . $err;
} 
else{
	if ($response){
	$result = json_decode($response,true);
	$code = http_response_code(200);
	$data = array();

		for($i = 0; $i < count($result['articles']); ++$i){
		 	/*
		 	sanitizing the content
		 	*/
		 	$data['title'] = $validator->sanitizeString($result['articles'][$i]['title']);
		 	$data['description'] = $validator->sanitizeString($result['articles'][$i]['description']);
		 	$data['url'] = $validator->sanitizeString($result['articles'][$i]['url']);
		 	$data['image'] = $validator->sanitizeString($result['articles'][$i]['image']);
		 	$data['publishedAt'] = $validator->sanitizeString($result['articles'][$i]['publishedAt']);
		 	$data['source_name'] = $validator->sanitizeString($result['articles'][$i]['source']['name']);
		 	$data['source_url'] = $validator->sanitizeString($result['articles'][$i]['source']['url']);

		 	/*store the content to database*/
		 	if($FormProcessor->createNews($data)){
		 		echo json_encode(array( 
					"News ".($i+1)=>[
						"title"=>$result['articles'][$i]['title'], 
						"description"=>$result['articles'][$i]['description'],
						"url"=>$result['articles'][$i]['url'],
						"image"=>$result['articles'][$i]['image'],
						"publishedAt"=>$result['articles'][$i]['publishedAt'],
						"source_name"=>$result['articles'][$i]['source']['name'],
						"source_url"=>$result['articles'][$i]['source']['url'],
					]
				), JSON_PRETTY_PRINT);
		 	}
		}
	}
}

?>