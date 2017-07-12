<?php 
/**
 * 
 */
class SendMessages {
  private $access_token = 'xjGIR1MZNjzmCI9qagfTX7ksvvmLJYmOZZfCaAvY52kld2Hm4SeDJtzRv31ZDyIum31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDtKyONakxR1kk6ADFzu3Ko5WWqxfhMcufHu3ldcWEhREAdB04t89/1O/w1cDnyilFU=';
	public function __construct()
    {
        
    }
    public function check_token(){
        $access_token = $this->access_token;

        $url = 'https://api.line.me/v1/oauth/verify';
        
        $headers = array('Authorization: Bearer ' . $access_token);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
    
    public function replyMessages($access_token = NULL){
        $access_token = $this->access_token;
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
                    if($text == 'hi'){
                        $text = 'สวัสดีค่ะ:'.$events['events'][0]['source']['userId'];
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
        }
    }
    
    // public function getUserid() {
        // try {
            // $array_userid = [];
// 
            // $pdo = new PDO('mysql:dbname=yukarinotification; host=database.cma0jldtuyey.us-west-2.rds.amazonaws.com', 'luis', 'luism8526',
                // array(PDO::ATTR_EMULATE_PREPARES => false));
// 
            // $stmt = $pdo->query("SELECT * FROM line");
// 
            // foreach ($stmt as $row) {
                // $array_userid[] = $row['userid'];
            // }
// 
            // return $array_userid;
// 
        // } catch (PDOException $e) {
            // /** ERROR HANDLING  */
            // die();
        // }
    // }
    
    public function pushMessages($USERID = 0, $msg = ''){
        $access_token = $this->access_token;
        $messages = [
            "type" => "text",
            "text" => $msg
        ];
 
        $post_data = [
            "to" => $USERID,
            "messages" => [$messages]
        ];
 
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token
        );
        $url = 'https://api.line.me/v2/bot/message/push';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
 
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
$obj = new SendMessages();
$obj->replyMessages();
//$user = $obj->getUserid();
$msg = isset($_POST['msg'])? $_POST['msg']: '';
if($msg != ''){
    // get user id before
    
    
    // push msg
    $result = $obj->pushMessages();
    var_dump($result);
}
