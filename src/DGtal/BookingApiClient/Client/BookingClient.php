<?php

/*
 *
 * Data Types: https://distribution-xml.booking.com/affiliates/documentation/xml_datatypes.html
 *
 */
namespace DGtal\BookingApiClient\Client;

use GuzzleHttp\Collection;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
//use GuzzleHttp\Subscriber\Log\LogSubscriber;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookingClient extends GuzzleClient
{
    public function __construct(array $config = [])
    {
        $resolver = new OptionsResolver();
        $this->configureOptionResolver($resolver);
 
        // Params validation
        $options = $resolver->resolve($config);
 
        // initialisation du client standard Guzzle
        $client = new Client([
            "defaults" => [
                "auth" => [ $options["username"], $options["password"] ],
            ],
            "base_url" => $options["base_url"],
            "debug"    => $options["debug"]
        ]);

        // $client->getEmitter()->attach(new LogSubscriber());

        $description = new Description(json_decode(file_get_contents(__DIR__ . '/../Resources/config/client.json'), true));

        parent::__construct($client, $description);
    }

    protected function configureOptionResolver(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults([
                'debug'    => false,
                'base_url' => 'https://distribution-xml.booking.com/json/'
            ])
            ->setRequired([
                'username',
                'password'
            ])
        ;
    }
}