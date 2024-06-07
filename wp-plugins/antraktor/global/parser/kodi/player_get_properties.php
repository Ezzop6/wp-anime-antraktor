<?php
class PlayerGetProperties {
  public $percentage;
  public $time;
  public $totaltime;
  public function __construct($data) {
    $this->percentage = floatval($data->result->percentage);
    $this->time = $this->format_time($data->result->time);
    $this->totaltime = $this->format_time($data->result->totaltime);
  }
  public  function init($data) {
    return new self($data);
  }
  private  function format_time($atts) {
    return sprintf('%02d:%02d:%02d', $atts->hours, $atts->minutes, $atts->seconds);
  }
}
