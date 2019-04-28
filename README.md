# GoogleDocParser
<a href="https://codeclimate.com/github/WinterUni/GoogleDocParser/maintainability"><img src="https://api.codeclimate.com/v1/badges/3977eb82556234122ee6/maintainability" /></a>
<a href="https://codeclimate.com/github/WinterUni/GoogleDocParser/test_coverage"><img src="https://api.codeclimate.com/v1/badges/3977eb82556234122ee6/test_coverage" /></a>

Provides parsing of google docs documents for easier content management on PHP based web sites

## Basic usage example
```
// If you are using it in custom project with composer autoload, you need to require autoloaded classes
require_once './../vendor/autoload.php';

use WinterUni\GoogleDoc\Document;
use WinterUni\GoogleDoc\Scraper\Html as HtmlScraper;
use WinterUni\GoogleDoc\Validator\Html as HtmlValidator;
use WinterUni\GoogleDoc\Filter\Body as BodyFilter;

// This content can be obtained when saving google docs file
$content = file_get_contents('./docs/1/10.html');

$document = new Document($content, new HtmlScraper(new HtmlValidator(), new BodyFilter()));

$title = $document->getTitle();
$body = $document->getBody();
$customStyle = $document->getCustomStyle();

echo $title;
echo $body;
echo $customStyle;
```