<?php
class PlayerGetItem {
  public static $album;
  public static $art;
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
  public static $subtitle;
  public static $video;
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
  public static $show_title;
  public static $movie_name;

  public function __construct($data) {
    self::$album = $data->result->item->album;
    self::$art =  $data->result->item->art;
    self::$artist = $data->result->item->artist;
    self::$cast = $data->result->item->cast;
    self::$country = $data->result->item->country;
    self::$customproperties = $data->result->item->customproperties;
    self::$dateadded = $data->result->item->dateadded;
    self::$director = $data->result->item->director;
    self::$dynpath = $data->result->item->dynpath;
    self::$episode = $data->result->item->episode;
    self::$episodeguide = $data->result->item->episodeguide;
    self::$fanart = $data->result->item->fanart;
    self::$file = $data->result->item->file;
    self::$firstaired = $data->result->item->firstaired;
    self::$genre = $data->result->item->genre;
    self::$imdbnumber = $data->result->item->imdbnumber;
    self::$label = $data->result->item->label;
    self::$lastplayed = $data->result->item->lastplayed;
    self::$mediapath = $data->result->item->mediapath;
    self::$mpaa = $data->result->item->mpaa;
    self::$originaltitle = $data->result->item->originaltitle;
    self::$playcount = $data->result->item->playcount;
    self::$plot = $data->result->item->plot;
    self::$plotoutline = $data->result->item->plotoutline;
    self::$premiered = $data->result->item->premiered;
    self::$productioncode = $data->result->item->productioncode;
    self::$rating = $data->result->item->rating;
    self::$resume = $data->result->item->resume;
    self::$runtime = $data->result->item->runtime;
    self::$season = $data->result->item->season;
    self::$set = $data->result->item->set;
    self::$setid = $data->result->item->setid;
    self::$showlink = $data->result->item->showlink;
    self::$showtitle = $data->result->item->showtitle;
    self::$sorttitle = $data->result->item->sorttitle;
    self::$specialsortepisode = $data->result->item->specialsortepisode;
    self::$specialsortseason = $data->result->item->specialsortseason;
    self::$streamdetails = $data->result->item->streamdetails;
    self::$subtitle = $data->result->item->subtitle;
    self::$video = $data->result->item->video;
    self::$studio = $data->result->item->studio;
    self::$tag = $data->result->item->tag;
    self::$tagline = $data->result->item->tagline;
    self::$thumbnail = $data->result->item->thumbnail;
    self::$title = $data->result->item->title;
    self::$top250 = $data->result->item->top250;
    self::$track = $data->result->item->track;
    self::$trailer = $data->result->item->trailer;
    self::$tvshowid = $data->result->item->tvshowid;
    self::$type = self::get_type($data->result->item->type);
    self::$uniqueid = $data->result->item->uniqueid;
    self::$userrating = $data->result->item->userrating;
    self::$votes = $data->result->item->votes;
    self::$writer = $data->result->item->writer;
    self::$year = $data->result->item->year;
    self::$show_title = $data->result->item->showtitle;

    self::$movie_name = self::get_movie_name();
  }

  public static function init($data) {
    return new self($data);
  }
  public static function get_movie_name() {
    if (self::$show_title != null) {
      return self::$show_title;
    }
    if (self::$title != null) {
      return self::$title;
    }
    if (self::$label != null) {
      return self::$label;
    }
    return 'Unknown';
  }
  private static function get_type($type) {
    if ($type !== 'unknown') {
      return $type;
    }
    $haystack = '';
    $haystack .= self::$customproperties->{"contextmenuaction(0)"};
    $haystack .= self::$customproperties->{"contextmenuaction(1)"};
    $haystack .= self::$art->{"clearart"};
    $haystack .= self::$art->{"poster"};

    if (strpos($haystack, 'episode') !== false) {
      return 'episode';
    }
    if (strpos($haystack, 'movie') !== false) {
      return 'movie';
    }
    return 'unknown';
  }
}
