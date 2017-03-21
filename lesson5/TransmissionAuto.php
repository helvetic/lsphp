<?php

require_once 'Transmission.php';

trait TransmissionAuto
{
  use Transmission;
  
  private function forward()
  {
    return 1;
  }
  
}
