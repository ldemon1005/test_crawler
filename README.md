# Package crwaler-
data
## Requirements
- You need PHP version >= 7.1

## Installation
- via composer : 
```
composer require duongnam99/pdf_exif
```

## Usage:
- Crwaler data:
```
$read = new Read_pdf();
print_r($read->get_all());
print_r($read->getInfoByKey('Creator'));
print_r($read->getInfoByKey('Title'));
```