<?php 
/**
 * 
 */
// $proxy = 'http://fixie:bBt21X0wwYroR2Z@velodrome.usefixie.com:80'; 
// $proxyauth = 'http://fixie:bBt21X0wwYroR2Z@velodrome.usefixie.com:80';
// $access_token = 'xjGIR1MZNjzmCI9qagfTX7ksvvmLJYmOZZfCaAvY52kld2Hm4SeDJtzRv31ZDyIum31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDtKyONakxR1kk6ADFzu3Ko5WWqxfhMcufHu3ldcWEhREAdB04t89/1O/w1cDnyilFU=';
// // Get POST body content

  
//         $post_data = [ 
//             "to" => 'Ub5fea2ff169cba24b2179fd33e59e454', 
//             "messages" => [ 
//                         "type" => "text", 
//                         "text" => "test ja"
//                     ]
//         ]; 
  
//         $header = array( 
//             'Content-Type: application/json', 
//             'Authorization: Bearer ' . $access_token 
//         ); 
//         $url = 'https://api.line.me/v2/bot/message/push'; 
//         $ch = curl_init($url); 
//         curl_setopt($ch, CURLOPT_POST, true); 
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data)); 
//         curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
//         curl_setopt($ch, CURLOPT_PROXY, $proxy); 
//         curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
  
//         $result = curl_exec($ch); 
//         curl_close($ch); 
 $files = fopen("https://mrtogether.herokuapp.com/linelog.txt", "a+") or die("Unable to open file!");
            fwrite($files, "2222");
            fclose($files);
//echo '<script>window.open("https://mrtogether.herokuapp.com/push.php?mid=Ub5fea2ff169cba24b2179fd33e59e454", "_blank")</script>'
        //header('Location: https://mrtogether.herokuapp.com/push.php?mid=Ub5fea2ff169cba24b2179fd33e59e454');
?>

