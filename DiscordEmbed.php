<?php

class DiscordEmbed {

  # DiscordEmbed-PHP
  # github.com/renzbobz
  # 2/8/23

  public $title = null;
  public $url = null;
  public $description = null;
  public $timestamp = null;
  public $color = null;
  public $footer = [];
  public $image = [];
  public $thumbnail = [];
  public $author = [];
  public $fields = [];

  public function __toString() { return $this->toJSON(); }
  public function toArray() { return (array) $this; }
  public function toJSON() { return json_encode($this->toArray()); }

  private function _setEmbedArrayValue($key, $firstArg, $structuredVal) {
    $this->{$key} = is_array($firstArg) ? $firstArg : $structuredVal;
  }

  private function _resolveColor($clr) {
    if (is_string($clr)) {
      if ($clr == 'random') return rand(0x000000, 0xFFFFFF);
      if ($clr[0] == '#') $clr = substr($clr, 1);
      if (preg_match('/,/', $clr)) $clr = sprintf('%02x%02x%02x', ...explode(',', $clr));
      $clr = hexdec($clr);
    }
    return $clr;
  }

  # Embed color
  public function setColor($color) {
    $this->color = $this->_resolveColor($color);
    return $this;
  }
  public function setRandomColor() {
    $this->color = $this->_resolveColor("random");
    return $this;
  }

  # Embed timestamp
  public function setTimestamp($ts=null) {
    if (!$ts) $ts = date('c');
    $this->timestamp = $ts;
    return $this;
  }

  # Embed title
  public function setTitle($title, $url=null) {
    $this->title = $title;
    if ($url) $this->setUrl($url);
    return $this;
  }
  public function prependTitle($title) {
    $this->title = $title . $this->title;
    return $this;
  }
  public function appendTitle($title) {
    $this->title .= $title;
    return $this;
  }

  # Embed url
  public function setUrl($url) {
    $this->url = $url;
    return $this;
  }

  # Embed description
  public function setDescription($desc) {
    $this->description = $desc;
    return $this;
  }
  public function prependDescription($desc) {
    $this->description = $desc . $this->description;
    return $this;
  }
  public function appendDescription($desc) {
    $this->description .= $desc;
    return $this;
  }

  # Embed author
  public function setAuthor($name, $url=null, $iconUrl=null, $proxyIconUrl=null) {
    $this->_setEmbedArrayValue("author", $name, [
      "name" => $name,
      "url" => $url,
      "icon_url" => $iconUrl,
      "proxy_icon_url" => $proxyIconUrl,
    ]);
    return $this;
  } 

  # Embed thumbnail
  public function setThumbnail($url, $proxyUrl=null, $height=null, $width=null) {
    $this->_setEmbedArrayValue("thumbnail", $url, [
      "url" => $url,
      "proxy_url" => $proxyUrl,
      "height" => $height,
      "width" => $width,
    ]);
    return $this;
  }

  # Embed image
  public function setImage($url, $proxyUrl=null, $height=null, $width=null) {
    $this->_setEmbedArrayValue("image", $url, [
      "url" => $url,
      "proxy_url" => $proxyUrl,
      "height" => $height,
      "width" => $width,
    ]);
    return $this;
  }

  # Embed footer
  public function setFooter($text, $iconUrl=null, $proxyIconUrl=null) {
    $this->_setEmbedArrayValue("footer", $text, [
      "text" => $text,
      "icon_url" => $iconUrl,
      "proxy_icon_url" => $proxyIconUrl
    ]);
    return $this;
  }

  # Embed fields
  public function addField($name, $value=null, $inline=false) {
    $this->fields[] = is_array($name) ? $name : [
      "name" => $name,
      "value" => $value,
      "inline" => $inline
    ];
    return $this;
  }

  public function addFields(...$fields) {
    foreach ($fields as $field) {
      if (!$field) continue;
      // indexed array
      if (isset($field[0])) {
        $this->addField(...$field);
      // associative array
      } else {
        $this->addField($field);
      }
    }
    return $this;
  }

}


?>
