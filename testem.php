<?php
echo 4;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, 'http://uat.dxplace.com/dxtms/testem');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER , true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode(array('a'=>'1111', 'b'=>'2222')));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json",
        )
    );
    $result = curl_exec($ch);
var_dump($result);exit();
    $err    = curl_error($ch);
    curl_close($ch);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $result;
    }
?>
