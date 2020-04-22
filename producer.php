<?php
/**
 * 消息生产者
 *
 * 实现的例子来源于：
 *
 * https://github.com/arnaud-lb/php-rdkafka#examples
 */

$objRdKafka = new RdKafka\Producer();
//$objRdKafka->setLogLevel(LOG_DEBUG);
$objRdKafka->addBrokers("localhost:9092");

$oObjTopic = $objRdKafka->newTopic("demo");

// 从终端接收输入 
$oInputHandler = fopen('php://stdin', 'r');

while (true) {
    echo "\nEnter  messages:\n";
    $sMsg = trim(fgets($oInputHandler));

   // 空消息意味着退出
    if (empty($sMsg)) {
        break;
    }

    // 发送消息
    $oObjTopic->produce(RD_KAFKA_PARTITION_UA, 0, $sMsg);
}

echo "done\n";

