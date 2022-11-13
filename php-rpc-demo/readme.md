php rpc怎么实现？


1.什么是rpc

RPC全称为Remote Procedure Call，翻译过来为“远程过程调用”。目前，主流的平台中都支持各种远程调用技术，以满足分布式系统架构中不同的系统之间的远程通信和相互调用。远程调用的应用场景极其广泛，实现的方式也各式各样。

2.从通信协议的层面

基于HTTP协议的（例如基于文本的SOAP（XML）、Rest（JSON），基于二进制Hessian（Binary））
基于TCP协议的（通常会借助Mina、Netty等高性能网络框架）

3.从不同的开发语言和平台层面

单种语言或平台特定支持的通信技术(例如Java平台的RMI、.NET平台Remoting)
支持跨平台通信的技术（例如HTTP Rest、Thrift等）

4.从调用过程来看

同步通信调用（同步RPC）
异步通信调用（MQ、异步RPC）

5.常见的几种通信方式

远程数据共享（例如：共享远程文件，共享数据库等实现不同系统通信）
消息队列
RPC（远程过程调用）

6.php实现简单的rpc

目录结构
```
tree
.
├── RpcClient.php
├── RpcServer.php
├── api
│   └── api.test.php

```
rpc服务端 RpcServer.php
rpc 客户端 RpcClient.php
提供服务的文件 api/api.test.php

效果
7.RPC的注意事项

性能:影响RPC性能的主要在几个方面：
1.序列化/反序列化的框架
2.网络协议，网络模型，线程模型等

安全
RPC安全的主要在于服务接口的鉴权和访问控制支持。

跨平台
跨不同的操作系统，不同的编程语言和平台。


php 核心函数
stream_socket_server() // $server = stream_socker_server("tcp://127.0.0.1:8888", $errno, $errstr);
stream_socker_accept()  // $client = stream_socker_accept($server)
fread() //     $buf = fread($client, $this->config['max_size']);
stream_socker_client() //
