<?php

namespace DGtal\BookingApiClient\Tests\Client;

use DGtal\BookingApiClient\Client\BookingClient;

class BookingClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $username
     * @param $password
     *
     * @dataProvider provideConfigValues
     */
    public function testFactoryReturnsClient($username, $password)
    {
        $config = array(
            'username' => $username,
            'password' => $password
        );

        $client = new BookingClient($config);

        $this->assertInstanceOf('\DGtal\BookingApiClient\Client\BookingClient', $client);
        //$this->assertEquals($config['username'], $client->getDefaultOption('query')['username']);
        //$this->assertEquals($config['password'], $client->getDefaultOption('query')['password']);
    }

    /**
     * @expectedException Symfony\Component\OptionsResolver\Exception\MissingOptionsException
     */
    public function testFactoryReturnsExceptionOnNullArguments()
    {
        $config = array();

        $client = new BookingClient($config);
    }

    /**
     * @expectedException Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testFactoryReturnsExceptionOnBlankArguments()
    {
        $config = array(
            'username' => null,
            'password' => null
        );

        $client = new BookingClient($config);
    }

    public function provideConfigValues()
    {
        return array(
            [
                'usuario',
                'clave'
            ]
        );
    }
}