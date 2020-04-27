# kafka
kafka 测试（基于centos 系统）

使用步骤

1. 将该项目克隆到本地。
2. 在命令行模式进入文件夹：`cd kafka`
3. 使用 `source ./supervisor.sh` 命令执行 shell 脚本，等待安装完成。
4. 使用 `supervisorctl status` 命令查看进程启动情况
5. 在 cli 模式打开生产者文件 `php producer.php`,进行消息生产
6. 重新打开一个终端，在 cli 模式打开消费者文件 `php consumer.php`,进行消费
