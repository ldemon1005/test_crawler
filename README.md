# Package crwaler-
data
## Requirements
- You need PHP version >= 7.1

## Installation
- via composer : 
```
composer require vnp/test-crawler
```

## Usage:
- Crwaler data:
```
$crawler = new CrwalerData();
print_r($crawler->getImages($link));
print_r($crawler->gettables($link));
```