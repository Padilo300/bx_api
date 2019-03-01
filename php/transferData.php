<?php 
class  transferData{
    public  $result           = null;

    /* Принимает знаения куда отправить и что отправить */
    public function curlStart($queryUrl, $data){
        
       /*  echo 'давнные в нутри curlStart <br><hr>';
        print_r($data);
        echo '<hr>'; */
        //$this->writeToLog($data, 'давнные в нутри curlStart') ; // Пишем логи
        $data = http_build_query($data);
        $curl = curl_init(); // создаем ресурс 

        // установим несколько параметров в рамках одного сеанса 
        curl_setopt_array($curl, 
            array(  CURLOPT_SSL_VERIFYPEER => 0, 
                    CURLOPT_POST           => 1, 
                    CURLOPT_HEADER         => 0, 
                    CURLOPT_RETURNTRANSFER => 1, 
                    CURLOPT_URL            => $queryUrl, 
                    CURLOPT_POSTFIELDS     => $data, 
                    )
        ); 

        $result = curl_exec($curl)                   ; // Выполняем запрос и записываем ответ        
        curl_close($curl)                            ; // Закрываем соединение
        $result = json_decode($result, 1)            ; // Декодируем ответ

        if( isset($result['error'])){
            $this->writeToLog($result, 'webform result') ; // Пишем логи
        }

/*         echo 'результат запроса curlStart <br><hr>';
        print_r($result);
        echo '<hr>'; */
        return $result;
    }

    // пишем логи
    function writeToLog($data, $title = '') { 
        $date  =  date("m.d.y");
      $log =  getcwd() . '/log_'. $date .'.log';
      $log = file_get_contents($log);
   
      if (strlen($log) > 10000000) {
          $log = substr($log, -500000);
      }
         $log .= "\n------------------------\n"; 
      $log .= date("Y.m.d G:i:s") . "\n"; 
      $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n"; $log .= print_r($data, 1); 
      $log .= "\n------------------------\n"; 
      file_put_contents(getcwd() . '/log_'. $date .'.log', $log);
    }
}
?>