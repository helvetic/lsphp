<?php

trait Transmission
{
  
  private function back()
  {
    return -1;
  }
  
  private function neutral()
  {
    return 0;
  }
  
  public function toggleGear($direction, $speed = 0)
  {
    switch ($direction) {
      case 'forward':
        return $this->forward($speed);
        break;
      case 'back':
        return $this->back();
        break;
      default:
        return $this->neutral();
    }
  }
}
