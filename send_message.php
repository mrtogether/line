<?php 
/**
 * 
 */

$access_token = 'xjGIR1MZNjzmCI9qagfTX7ksvvmLJYmOZZfCaAvY52kld2Hm4SeDJtzRv31ZDyIum31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDtKyONakxR1kk6ADFzu3Ko5WWqxfhMcufHu3ldcWEhREAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
	// Reply only when message sent is in 'text' format
	if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
	    // Get text sent
	    $text = $event['message']['text'];
	    if($text == 'Hi'){
		$text = 'สวัสดีค่ะ';
	    }
	    if($text == '1+1=?'){
		$text = '2 ไง  ต้องให้บอกนะ เดี๋ยะ เดี๊ยะ!! 555++';
	    }
	    // Get replyToken
	    $replyToken = $event['replyToken'];

	    // Build message to reply back
	    $messages = [
		'type' => 'text',
		'text' => $text
	    ];

	    // Make a POST Request to Messaging API to reply to sender
	    $url = 'https://api.line.me/v2/bot/message/reply';
	    $data = [
		'replyToken' => $replyToken,
		'messages' => [$messages],
	    ];
	    $post = json_encode($data);
	    $headers = array(
		'Content-Type: application/json', 
		'Authorization: Bearer ' . $access_token
	    );

	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    echo $result.'\r\n';
	}
    }
}else{
	return 'fail';
}	
?>
