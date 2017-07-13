<?php 
  $mid = isset($_REQUEST['mid'])? $_REQUEST['mid']: '';
$test = isset($_cookie['test'])? $_cookie['test']: 'no';
echo $mid ;
echo '<br/>';
echo $test;
?><br/>
 Post to : <select>
  <option value="U8c4eb5ebbd3493b74c6d17a77d3e6cd3">Mrtogether</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select><br/>
Message : <textarea rows="4"></textarea> 
