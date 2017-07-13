<form method='post'>
<input type="text" value="U8c4eb5ebbd3493b74c6d17a77d3e6cd3" name="mid" />
   <input type="submit" value="Submit">
</form>
<?php
echo 5;

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, 'http://uat.dxplace.com/dxtms/testem?mid=U8c4eb5ebbd3493b74c6d17a77d3e6cd3');
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST , 'GET');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER , true);
    //curl_setopt($ch,CURLOPT_POSTFIELDS, 'http://uat.dxplace.com/dxtms/testem?mid=U8c4eb5ebbd3493b74c6d17a77d3e6cd3');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json",
        )
    );
    $result = curl_exec($ch);
    $err    = curl_error($ch);
    curl_close($ch);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $result;
    }
?>
