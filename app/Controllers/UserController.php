<?php


namespace App\Controllers;

use baofeng\Demo\Controller\Controller;
use baofeng\Demo\Https\RequestInterface;
use baofeng\Demo\Https\SendSmsInterface;
use baofeng\Demo\Tests\Ts;
use Kafka\ProducerConfig;
use Kafka\Protocol\Produce;

class UserController extends Controller
{
    public function get(RequestInterface $request, SendSmsInterface $sendSms)
    {
        Ts::get();
    }

    public function index(RequestInterface $request)
    {
        foreach ($request as $index => $item) {
            dump("key : " . $index . " value :" . $item);
        }
        dd("this is usercontroller index ");
    }

    public function testKafka(RequestInterface $request)
    {
        date_default_timezone_set('PRC');
        $config = \Kafka\ProducerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('120.78.64.220:9092');
        $config->setBrokerVersion('1.0.0');
        $config->setRequiredAck(1);
        $config->setIsAsyn(false);
        $config->setProduceInterval(500);
        $producer = new \Kafka\Producer();

        for($i = 0; $i < 100; $i++) {
            $producer->send([
                [
                    'topic' => 'my-test',
                    'value' => 'test1....message.'.$i,
                    'key' => '',
                ],
            ]);
            dump($i);

        }

    }

    public function getKafka()
    {
        date_default_timezone_set('PRC');

        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);

        $config->setMetadataBrokerList('120.78.64.220:9092');

        $config->setGroupId('my-test');
        $config->setBrokerVersion('1.0.0');

        $config->setTopics(array('my-test'));

//$config->setOffsetReset('earliest');
        $consumer = new \Kafka\Consumer();
        $consumer->start(function($topic, $part, $message) {
            dump($message);
        });
    }
}

