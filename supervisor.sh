#! /bin/sh
echo 'start script execution...'
cd ~/
echo 'wget downloading ...'
yum install -y wget
yum install -y java
wget https://mirror.bit.edu.cn/apache/kafka/2.5.0/kafka_2.12-2.5.0.tgz
tar -zxvf kafka_2.12-2.5.0.tgz
yum install -y epel-release
yum install -y supervisor
systemctl start supervisord
superconf='/etc/supervisord.d'
echo "[program:kafka]
#directory=/root/kafka_2.12-2.5.0 
command=/root/kafka_2.12-2.5.0/bin/kafka-server-start.sh /root/kafka_2.12-2.5.0/config/server.properties
autostart=true
autorestart=false
stderr_logfile=/tmp/kafka_stderr.log
stdout_logfile=/tmp/kafka_stdout.log
" >> $superconf/kafka.ini
echo "[program:zook]
#directory=/root/kafka_2.12-2.5.0 
command=/root/kafka_2.12-2.5.0/bin/zookeeper-server-start.sh /root/kafka_2.12-2.5.0/config/zookeeper.properties
autostart=true
autorestart=false
stderr_logfile=/tmp/zook_stderr.log
stdout_logfile=/tmp/zook_stdout.log" >> $superconf/zookeeper.ini
supervisorctl reload
