<?php

abstract class Car
{
  use Engine;
  use Transmission;
  
  protected $carName = 'Unknown';
  protected $horsepower;
  private $distance;
  private $temp;
  
  public function __construct()
  {
    echo "<h2>$this->carName creating</h2>";
    $this->setEngine($this->horsepower);
  }
  
  public function startCar()
  {
    $this->turnEngineOn();
  }
  
  /**
   * @param int $time time in minutes
   * @param int $speed speed km/h
   * @param string $direction gear direction
   */
  public function move($time, $speed, $direction)
  {
    $speed = $this->checkSpeed($speed);
    
    $hours = $time / 60;
    $multiplier = $this->toggleGear($direction, $speed);
    
    $distance = (int) ($hours * $speed * $multiplier);
    $this->distance += $distance;
    $distanceAbs = abs($distance);
    
    $this->temp = $this->temp + $this->calculateTempRaise($distance);
    $this->temp = $this->checkTemp($this->temp);
  
    echo "Moved $direction $distanceAbs km for $time min", '<br>';
    echo "Distance: {$this->distance} km", '<hr>';
  }
  
  
  
  public function stopCar()
  {
    $this->turnEngineOff();
    echo '<hr>' . "Total Distance {$this->distance} km", '<hr><hr>';
  }
  
  
  
}