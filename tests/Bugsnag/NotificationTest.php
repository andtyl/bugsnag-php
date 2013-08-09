<?php

class NotificationTest extends PHPUnit_Framework_TestCase {
    protected $config;

    protected function setUp(){
        $this->config = new Bugsnag\Configuration();
        $this->config->apiKey = "6015a72ff14038114c3d12623dfb018f";
    }

    public function testNotification() {
        // Create a mock notification object
        $notification = $this->getMockBuilder('Bugsnag\Notification')
                             ->setMethods(array("toArray"))
                             ->setConstructorArgs(array($this->config))
                             ->getMock();

        // Expect toArray to be called
        $notification->expects($this->once())
                     ->method("toArray");

        // TODO: Check toArray return value

        // Add an error to the notification and deliver it
        $notification->addError(Bugsnag\Error::fromNamedError($this->config, "Name", "Message"));
        $notification->deliver();
    }
}

?>