# Booking API

## Usage

```php
// Load the class loader
require __DIR__.'/vendor/autoload.php';

use DGtal\BookingApiClient\Client\BookingClient;

$config = array(
    'username' => '<booking-username>',
    'password' => '<booking-password>'
);

$client = new BookingClient($config);

$res = $client->getHotelDescriptionTranslations(['languagecodes' => 'es', 'offset' => 10, 'rows' => 1]);
```
