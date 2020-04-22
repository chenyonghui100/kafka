<?php
    
    $rk = new RdKafka\Consumer();
//    $rk->setLogLevel(LOG_DEBUG);
    $rk->addBrokers("localhost:9092");
    
    $topic = $rk->newTopic("demo");
    
    $topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);
    
    while (true) {
        $msg = $topic->consume(0, 1000);
	 // 没拉取到消息时，返回NULL
    if (!$msg) {
        usleep(10000);
        continue;
    } 
       if ($msg->err) {
            echo $msg->errstr(), "\n";
            break;
        } else {
            echo $msg->payload, "\n";
        }
    }


