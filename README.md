# GoogleDocParser
Provides parsing of google docs documents for easier content management on PHP based web sites

## Basic usage example
```
use WinterUni\GoogleDoc\DocData;
use WinterUni\GoogleDoc\Parser\Html as HtmlParser;
use WinterUni\GoogleDoc\Validator\Html as HtmlValidator;
use WinterUni\GoogleDoc\Filter\Body as BodyFilter;

// This content can be obtained when saving google docs file
$content = file_get_contents('./path/to/dowloaded/file.html');
$docData = new DocData($content, new HtmlParser(new HtmlValidator(), new BodyFilter()));

$title = $docData->getTitle();
$body = $docData->getBody();
$customStyle = $docData->getCustomStyle();
  
echo $title;
echo $body;
echo $customStyle;
```