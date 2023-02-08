# DiscordEmbed-PHP

Easily create an object for discord embed.

Major Released: **2/8/23**

## Getting started

### Installation

Download the DiscordEmbed.php file and then require it to your project and you're ready to go!

```php
require "DiscordEmbed.php";
```

### Usage

Create new instance every time you create a new embed.

```php
$embed = (new DiscordEmbed)
  ->setTitle("Cool title")
  ->setDescription("Cool description");
```

## Methods

## Embed Methods

#### Title

```php
setTitle(string $title, ?string $url);
prependTitle(string $title);
appendTitle(string $title);
```

#### Title Url

```php
setUrl(string $url);
```

#### Description

```php
setDescription(string $description);
prependDescription(string $description);
appendDescription(string $description);
```

#### Color

`$color` can be a hex, decimal, or rgb (comma separated).

```php
setColor(int $color);
setColor(string $color);
setRandomColor();
```

#### Timestamp

```php
setTimestamp(?string $ts = date('c'));
```

#### Author

```php
# Associative array
$author = [
  "name" => string,
  "url" => ?string,
  "icon_url" => ?string,
  "proxy_icon_url" => ?string,
];
```

```php
setAuthor(string $name, ?string $url, ?string $iconUrl, ?string $proxyIconUrl);
setAuthor(associative array $author);
```

#### Footer

```php
# Associative array
$footer = [
  "text" => string,
  "icon_url" => string,
  "proxy_icon_url" => ?string,
];
```

```php
setFooter(string $text, ?string $iconUrl, ?string $proxyIconUrl);
setFooter(associative array $footer);
```

#### Image

```php
# Associative array
$image = [
  "url" => string,
  "proxy_url" => ?string,
  "height" => ?int,
  "width" => ?int,
];
```

```php
setImage(string $url, ?string $proxyUrl, ?int $height, ?int $width);
setImage(associative array $image);
```

#### Thumbnail

```php
$thumbnail = [
  # Associative array
  "url" => string,
  "proxy_url" => ?string,
  "height" => ?int,
  "width" => ?int,
];
```

```php
setThumbnail(string $url, ?string $proxyUrl, ?int $height, ?int $width);
setThumbnail(associative array $thumbnail);
```

#### Add Field

```php
# Associative array
$field = [
  "name" => string,
  "value" => ?string,
  "inline" => ?bool,
];
# Indexed array
$field = [
  string $name,
  ?string $value,
  ?bool $inline,
];
```

```php
addField(associative array $field);
addField(string $name, ?string $value, ?bool $inline);
addFields(associative|indexed array ...$fields)
```

#### Formatting

```php
toArray(): array;
toJSON(): string;
```
