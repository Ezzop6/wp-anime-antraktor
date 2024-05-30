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
  public Item $item;

  public function __construct(Item $item) {
    $this->item = $item;
  }

  public static function fromJson(array $data): self {
    return new self(
      Item::fromJson($data['item'])
    );
  }
}

class Item {
  public string $album;
  public array $artist;
  public int $episode;
  public string $fanart;
  public string $file;
  public string $label;
  public int $season;
  public string $showtitle;
  public Streamdetails $streamdetails;
  public string $thumbnail;
  public string $title;
  public int $tvshowid;
  public string $type;

  public function __construct(
    string $album,
    array $artist,
    int $episode,
    string $fanart,
    string $file,
    string $label,
    int $season,
    string $showtitle,
    Streamdetails $streamdetails,
    string $thumbnail,
    string $title,
    int $tvshowid,
    string $type
  ) {
    $this->album = $album;
    $this->artist = $artist;
    $this->episode = $episode;
    $this->fanart = $fanart;
    $this->file = $file;
    $this->label = $label;
    $this->season = $season;
    $this->showtitle = $showtitle;
    $this->streamdetails = $streamdetails;
    $this->thumbnail = $thumbnail;
    $this->title = $title;
    $this->tvshowid = $tvshowid;
    $this->type = $type;
  }

  public static function fromJson(array $data): self {
    return new self(
      $data['album'],
      $data['artist'],
      $data['episode'],
      $data['fanart'],
      $data['file'],
      $data['label'],
      $data['season'],
      $data['showtitle'],
      Streamdetails::fromJson($data['streamdetails']),
      $data['thumbnail'],
      $data['title'],
      $data['tvshowid'],
      $data['type']
    );
  }
}

class Streamdetails {
  /** @var Audio[] */
  public array $audio;
  public array $subtitle;
  /** @var Video[] */
  public array $video;

  /**
   * @param Audio[] $audio
   * @param Video[] $video
   */
  public function __construct(
    array $audio,
    array $subtitle,
    array $video
  ) {
    $this->audio = $audio;
    $this->subtitle = $subtitle;
    $this->video = $video;
  }

  public static function fromJson(array $data): self {
    return new self(
      array_map(static function ($data) {
        return Audio::fromJson($data);
      }, $data['audio']),
      $data['subtitle'],
      array_map(static function ($data) {
        return Video::fromJson($data);
      }, $data['video'])
    );
  }
}
class Audio {
  public int $channels;
  public string $codec;
  public string $language;

  public function __construct(
    int $channels,
    string $codec,
    string $language
  ) {
    $this->channels = $channels;
    $this->codec = $codec;
    $this->language = $language;
  }

  public static function fromJson(array $data): self {
    return new self(
      $data['channels'],
      $data['codec'],
      $data['language']
    );
  }
}

class Video {
  public float $aspect;
  public string $codec;
  public int $duration;
  public int $height;
  public string $language;
  public string $stereomode;
  public int $width;

  public function __construct(
    float $aspect,
    string $codec,
    int $duration,
    int $height,
    string $language,
    string $stereomode,
    int $width
  ) {
    $this->aspect = $aspect;
    $this->codec = $codec;
    $this->duration = $duration;
    $this->height = $height;
    $this->language = $language;
    $this->stereomode = $stereomode;
    $this->width = $width;
  }

  public static function fromJson(array $data): self {
    return new self(
      $data['aspect'],
      $data['codec'],
      $data['duration'],
      $data['height'],
      $data['language'],
      $data['stereomode'],
      $data['width']
    );
  }
}
