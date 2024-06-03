<?php
class PlayerGetItem {
  public static $album;
  public static $art;
  public static $art_banner;
  public static $art_clearlogo;
  public static $art_fanart;
  public static $art_icon;
  public static $art_poster;
  public static $art_thumb;
  public static $artist;
  public static $cast;
  public static $country;
  public static $customproperties;
  public static $dateadded;
  public static $director;
  public static $dynpath;
  public static $episode;
  public static $episodeguide;
  public static $fanart;
  public static $file;
  public static $firstaired;
  public static $genre;
  public static $imdbnumber;
  public static $label;
  public static $lastplayed;
  public static $mediapath;
  public static $mpaa;
  public static $originaltitle;
  public static $playcount;
  public static $plot;
  public static $plotoutline;
  public static $premiered;
  public static $productioncode;
  public static $rating;
  public static $resume;
  public static $runtime;
  public static $season;
  public static $set;
  public static $setid;
  public static $showlink;
  public static $showtitle;
  public static $sorttitle;
  public static $specialsortepisode;
  public static $specialsortseason;
  public static $streamdetails;
  public static $studio;
  public static $tag;
  public static $tagline;
  public static $thumbnail;
  public static $title;
  public static $top250;
  public static $track;
  public static $trailer;
  public static $tvshowid;
  public static $type;
  public static $uniqueid;
  public static $userrating;
  public static $votes;
  public static $writer;
  public static $year;
  public static $movie_name;

  public function __construct($data) {
    self::$album = $data->result->item->album;
    self::$art =  $data->result->item->art; // object
    self::$art_banner = self::parse_url($data->result->item->art->banner); // string
    self::$art_clearlogo = self::parse_url($data->result->item->art->clearlogo); // string
    self::$art_fanart = self::parse_url($data->result->item->art->fanart); // string
    self::$art_icon = self::parse_url($data->result->item->art->icon); // string
    self::$art_poster = self::parse_url($data->result->item->art->poster); // string
    self::$art_thumb = self::parse_url($data->result->item->art->thumb); // string
    self::$artist = $data->result->item->artist; // array
    self::$cast = $data->result->item->cast; // array
    self::$country = $data->result->item->country; // array
    self::$customproperties = $data->result->item->customproperties; // object
    self::$dateadded = $data->result->item->dateadded; // string / date
    self::$director = $data->result->item->director; // array
    self::$dynpath = $data->result->item->dynpath; // string
    self::$episode = self::parse_integer($data->result->item->episode); // int
    self::$episodeguide = $data->result->item->episodeguide; // ??
    self::$fanart = self::parse_url($data->result->item->fanart); // string
    self::$file = $data->result->item->file; // string
    self::$firstaired = $data->result->item->firstaired; // string / date
    self::$genre = $data->result->item->genre; // array
    self::$imdbnumber = $data->result->item->imdbnumber; // ??
    self::$label = $data->result->item->label; // string
    self::$lastplayed = $data->result->item->lastplayed; // ??
    self::$mediapath = $data->result->item->mediapath; // string
    self::$mpaa = $data->result->item->mpaa; // ??
    self::$originaltitle = $data->result->item->originaltitle; // string
    self::$playcount = (int)$data->result->item->playcount; // int
    self::$plot = $data->result->item->plot; // string
    self::$plotoutline = $data->result->item->plotoutline; // ??
    self::$premiered = $data->result->item->premiered; // string / date
    self::$productioncode = $data->result->item->productioncode; // ??
    self::$rating = (float)$data->result->item->rating; // float
    self::$resume = Resume::init($data->result->item->resume); // object
    self::$runtime = (int)$data->result->item->runtime; // int
    self::$season = self::parse_integer($data->result->item->season); // int
    self::$set = $data->result->item->set; // ??
    self::$setid = $data->result->item->setid; // ??
    self::$showlink = $data->result->item->showlink; // array
    self::$showtitle = $data->result->item->showtitle; // string
    self::$sorttitle = $data->result->item->sorttitle; // string
    self::$specialsortepisode = $data->result->item->specialsortepisode; // ??
    self::$specialsortseason = $data->result->item->specialsortseason; // ??
    self::$streamdetails = $data->result->item->streamdetails; // stdClass[audio, video, subtitle]
    self::$studio = $data->result->item->studio; // array
    self::$tag = $data->result->item->tag; // array
    self::$tagline = $data->result->item->tagline; // ??
    self::$thumbnail = self::parse_url($data->result->item->thumbnail); // string
    self::$title = $data->result->item->title; // string
    self::$top250 = (bool)$data->result->item->top250; // bool
    self::$track = (int)$data->result->item->track; // int
    self::$trailer = $data->result->item->trailer; // ??
    self::$tvshowid = (int)$data->result->item->tvshowid; // int
    self::$type = self::get_show_type($data->result->item->type); // string
    self::$uniqueid = new UniqueId($data->result->item->uniqueid ?? ['', '', '']); // object
    self::$userrating = $data->result->item->userrating; // ??
    self::$votes = (int)$data->result->item->votes; // int
    self::$writer = $data->result->item->writer; // array
    self::$year = (int)$data->result->item->year; // int
    self::$movie_name = self::get_movie_name();
  }

  private static function parse_url($url) {
    return urldecode(substr($url, 8, -1));
  }

  public static function init($data) {
    return new self($data);
  }

  public static function parse_integer($data) {
    return empty($data) || $data < 0 ? 0 : (int)$data;
  }

  public static function get_movie_name() {
    if (self::$showtitle != null) {
      return self::$showtitle;
    }
    if (self::$title != null) {
      return self::$title;
    }
    if (self::$label != null) {
      return self::$label;
    }
    return 'Unknown';
  }
  private static function get_show_type($type) {
    if ($type !== 'unknown') {
      return $type;
    }
    $haystack = '';
    $haystack .= self::$customproperties->{"contextmenuaction(0)"} ?? '';
    $haystack .= self::$customproperties->{"contextmenuaction(1)"} ?? '';
    $haystack .= self::$art->{"clearart"} ?? '';
    $haystack .= self::$art->{"poster"} ?? '';

    if (strpos($haystack, 'episode') !== false) {
      return 'episode';
    }
    if (strpos($haystack, 'movie') !== false) {
      return 'movie';
    }
    return 'unknown';
  }
}

class UniqueId {
  public static $imdb;
  public static $tvdb;
  public static $tmdb;

  public function __construct($data) {
    self::$imdb = $data->imdb ?? '';
    self::$tvdb = $data->tvdb ?? '';
    self::$tmdb = $data->tmdb ?? '';
  }
  public static function init($data) {
    return new self($data);
  }
}

class Resume {
  public static $position;
  public static $total;

  public function __construct($data) {
    self::$position = (int)$data->position;
    self::$total = (int)$data->total;
  }
  public static function init($data) {
    return new self($data);
  }
}
