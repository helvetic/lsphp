<?php

trait Engine
{
  private $engineHP;
  private $maxSpeed;
  
  public function setEngine($horsepower)
  {
    echo "Setting engine with {$horsepower}hp", '<br>';
    $this->engineHP = $horsepower;
    $this->maxSpeed = $this->engineHP * 1.5;
  }
  
  public function turnEngineOn()
  {
    echo 'Engine started', '<hr>';
  }
  
  public function turnEngineOff()
  {
    echo 'Engine stopped', '<hr>';
  }
  
  public function calculateTempRaise($distance)
  {
    return abs($distance) * 5;
  }
  
  public function checkTemp($temp)
  {
    echo "Check temp: {$temp}C", '<br>';
    if ($temp >= 90) {
      $temp = $this->coolEngine($temp);
    }
    return $temp;
  }
  
  private function coolEngine($temp)
  {
    $startTemp = $temp;
    while ($temp > 40) {
      $temp = $this->startFan($temp);
    }
    echo "Engine cooled from {$startTemp}C to {$temp}C", '<br>';
    return $temp;
  }
  
  private function startFan($temp)
  {
    echo "Fan started with temp {$temp}C", '<br>';
    return $temp - 10;
  }
  
  public function checkSpeed($speed)
  {
    if ($speed > $this->maxSpeed) {
      echo "Speed has been limited to {$this->maxSpeed}km/h", '<br>';
      return $this->maxSpeed;
    } else {
      return $speed;
    }
  }

}
