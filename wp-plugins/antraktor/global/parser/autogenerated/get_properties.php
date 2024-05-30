<?php

class RootObject {
  public Result $result;

  public function __construct(
    Result $result
  ) {
    $this->result = $result;
  }

  public static function fromJson(array $data): self {
    return new self(
      $data['id'],
      $data['jsonrpc'],
      Result::fromJson($data['result'])
    );
  }
}

class Result {
  public float $percentage;
  public Time $time;

  public function __construct(float $percentage, Time $time) {
    $this->percentage = $percentage;
    $this->time = $time;
  }

  public static function fromJson(array $data): self {
    return new self(
      $data['percentage'],
      Time::fromJson($data['time'])
    );
  }
}

class Time {
  public int $hours;
  public int $milliseconds;
  public int $minutes;
  public int $seconds;

  public function __construct(
    int $hours,
    int $milliseconds,
    int $minutes,
    int $seconds
  ) {
    $this->hours = $hours;
    $this->milliseconds = $milliseconds;
    $this->minutes = $minutes;
    $this->seconds = $seconds;
  }

  public static function fromJson(array $data): self {
    return new self(
      $data['hours'],
      $data['milliseconds'],
      $data['minutes'],
      $data['seconds']
    );
  }
}
