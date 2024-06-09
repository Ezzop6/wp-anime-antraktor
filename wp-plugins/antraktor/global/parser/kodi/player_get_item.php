<?php

// TODO: customproperties ??
class PlayerGetItem {
  public $album;
  public $art;
  public $art_banner;
  public $art_clearlogo;
  public $art_fanart;
  public $art_icon;
  public $art_poster;
  public $art_thumb;
  public $artist;
  public $cast;
  public $country;
  public $customproperties;
  public $dateadded;
  public $director;
  public $dynpath;
  public $episode;
  public $episodeguide;
  public $fanart;
  public $file;
  public $firstaired;
  public $genre;
  public $imdbnumber;
  public $label;
  public $lastplayed;
  public $mediapath;
  public $mpaa;
  public $originaltitle;
  public $playcount;
  public $plot;
  public $plotoutline;
  public $premiered;
  public $productioncode;
  public $rating;
  public $resume;
  public $runtime;
  public $season;
  public $set;
  public $setid;
  public $showlink;
  public $showtitle;
  public $sorttitle;
  public $specialsortepisode;
  public $specialsortseason;
  public $streamdetails;
  public $studio;
  public $tag;
  public $tagline;
  public $thumbnail;
  public $title;
  public $top250;
  public $track;
  public $trailer;
  public $tvshowid;
  public $type;
  public $uniqueid;
  public $userrating;
  public $votes;
  public $writer;
  public $year;
  public $movie_name;

  public function __construct($data, $method = 0) {
    if (!$method == 0) {
      $data = array(
        'result' => array(
          'item' => $data
        )
      );
    }
    $this->album = $data->result->item->album;
    $this->art =  $data->result->item->art;
    $this->art_banner = $this->parse_url($data->result->item->art->banner ?? '');
    $this->art_clearlogo = $this->parse_url($data->result->item->art->clearlogo ?? '');
    $this->art_fanart = $this->parse_url($data->result->item->art->fanart ?? '');
    $this->art_icon = $this->parse_url($data->result->item->art->icon ?? '');
    $this->art_poster = $this->parse_url($data->result->item->art->poster ?? '');
    $this->art_thumb = $this->parse_url($data->result->item->art->thumb ?? '');
    $this->artist = $data->result->item->artist;
    $this->cast = $data->result->item->cast;
    $this->country = $data->result->item->country;
    $this->customproperties = $data->result->item->customproperties;
    $this->dateadded = $data->result->item->dateadded;
    $this->director = $data->result->item->director;
    $this->dynpath = $data->result->item->dynpath;
    $this->episode = $this->parse_integer($data->result->item->episode);
    $this->episodeguide = $data->result->item->episodeguide;
    $this->fanart = $this->parse_url($data->result->item->fanart);
    $this->file = $data->result->item->file;
    $this->firstaired = $data->result->item->firstaired;
    $this->genre = $data->result->item->genre;
    $this->imdbnumber = $data->result->item->imdbnumber;
    $this->label = $data->result->item->label;
    $this->lastplayed = $data->result->item->lastplayed;
    $this->mediapath = $data->result->item->mediapath;
    $this->mpaa = $data->result->item->mpaa;
    $this->originaltitle = $data->result->item->originaltitle;
    $this->playcount = (int)$data->result->item->playcount;
    $this->plot = $data->result->item->plot;
    $this->plotoutline = $data->result->item->plotoutline;
    $this->premiered = $data->result->item->premiered;
    $this->productioncode = $data->result->item->productioncode;
    $this->rating = (float)$data->result->item->rating;
    $this->resume = Resume::init($data->result->item->resume);
    $this->runtime = (int)$data->result->item->runtime;
    $this->season = $this->parse_integer($data->result->item->season);
    $this->set = $data->result->item->set;
    $this->setid = $data->result->item->setid;
    $this->showlink = $data->result->item->showlink;
    $this->showtitle = $data->result->item->showtitle;
    $this->sorttitle = $data->result->item->sorttitle;
    $this->specialsortepisode = $data->result->item->specialsortepisode;
    $this->specialsortseason = $data->result->item->specialsortseason;
    $this->streamdetails = $data->result->item->streamdetails;
    $this->studio = $data->result->item->studio;
    $this->tag = $data->result->item->tag;
    $this->tagline = $data->result->item->tagline;
    $this->thumbnail = $this->parse_url($data->result->item->thumbnail);
    $this->title = $data->result->item->title;
    $this->top250 = (bool)$data->result->item->top250;
    $this->track = (int)$data->result->item->track;
    $this->trailer = $data->result->item->trailer;
    $this->tvshowid = (int)$data->result->item->tvshowid;
    $this->type = $this->get_show_type($data->result->item->type);
    $this->uniqueid = isset($data->result->item->uniqueid) ? UniqueId::init($data->result->item->uniqueid) : null;
    $this->userrating = $data->result->item->userrating;
    $this->votes = (int)$data->result->item->votes;
    $this->writer = $data->result->item->writer;
    $this->year = (int)$data->result->item->year;
    $this->movie_name = $this->get_movie_name();
  }

  private function parse_url($url) {
    return urldecode(substr($url, 8, -1));
  }

  public static function init($data) {
    return new self($data);
  }

  private function parse_integer($data) {
    return empty($data) || $data < 0 ? 0 : (int)$data;
  }

  private function get_movie_name() {
    if ($this->showtitle != null) {
      return $this->showtitle;
    }
    if ($this->title != null) {
      return $this->title;
    }
    if ($this->label != null) {
      return $this->label;
    }
    return 'Unknown';
  }

  private function get_show_type($type) {
    if ($type !== 'unknown') {
      return $type;
    }
    $haystack = '';
    $haystack .= $this->customproperties->{"contextmenuaction(0)"} ?? '';
    $haystack .= $this->customproperties->{"contextmenuaction(1)"} ?? '';
    $haystack .= $this->art->{"clearart"} ?? '';
    $haystack .= $this->art->{"poster"} ?? '';

    if (strpos($haystack, 'episode') !== false) {
      return 'episode';
    }
    if (strpos($haystack, 'movie') !== false) {
      return 'movie';
    }
    return 'unknown';
  }
}
class CustomProperties {
  public $contextmenuaction_0;
  public $contextmenuaction_1;

  public function __construct($data) {
    wp_die(HelperScripts::print($data));
    $this->contextmenuaction_0 = $data->{"contextmenuaction(0)"};
    $this->contextmenuaction_1 = $data->{"contextmenuaction(1)"};
  }

  public static function init($data) {
    return new self($data);
  }
}
class UniqueId {
  public $imdb;
  public $tvdb;
  public $tmdb;

  public function __construct($data) {
    $this->imdb = isset($data->imdb) ? $data->imdb : -1;
    $this->tvdb = isset($data->tvdb) ? (int)$data->tvdb : -1;
    $this->tmdb = isset($data->tmdb) ? (int)$data->tmdb : -1;
  }

  public static function init($data) {
    return new self($data);
  }
}

class Resume {
  public $position;
  public $total;

  public function __construct($data) {
    $this->position = (int)$data->position;
    $this->total = (int)$data->total;
  }

  public static function init($data) {
    return new self($data);
  }
}
