<?php
class PlayerGetActivePlayers {
  public static $player_id;
  public static $player_type;
  public static $type;

  public function __construct($data) {
    self::$player_id = $data->result[0]->playerid;
    self::$player_type = $data->result[0]->playertype;
    self::$type = $data->result[0]->type;
  }
  public static function init($data) {
    return new self($data);
  }

  public static function is_playing(): bool {
    return self::$player_id !== null;
  }
}
