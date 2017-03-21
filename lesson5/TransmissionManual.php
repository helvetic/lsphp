<?php

require_once 'Transmission.php';

trait TransmissionManual
{
  use Transmission;
  
  private function forward($speed)
  {
    if ($speed < 20) {
      echo '1 передача' ,'<br>';
    } elseif ($speed < 40) {
      echo '2 передача' ,'<br>';
    } elseif ($speed < 60) {
      echo '3 передача' ,'<br>';
    } else {
      echo '4 передача' ,'<br>';
    }
    return 1;
  }

}
