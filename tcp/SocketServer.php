<?php
/**
 * File Name: SocketServer.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 五 12/20 15:40:06 2019
 */

//确保在连接客户端时不会超时   
set_time_limit(0);   
//设置IP和端口号   
//$address = "127.0.0.1";   
$address = "192.168.20.218";   
$port = 8881;   

/** 
 * 创建一个SOCKET  
 * AF_INET=是ipv4 如果用ipv6，则参数为 AF_INET6 
 * SOCK_STREAM为socket的tcp类型，如果是UDP则使用SOCK_DGRAM 
 */   
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("socket_create() fail:" . socket_strerror(socket_last_error()) . "/n");   
//阻塞模式   
socket_set_block($sock) or die("socket_set_block() fail:" . socket_strerror(socket_last_error()) . "/n");   
//绑定到socket端口  
$result = socket_bind($sock, $address, $port) or die("socket_bind() fail:" . socket_strerror(socket_last_error()) . "/n");   
//开始监听   
$result = socket_listen($sock, 4) or die("socket_listen() fail:" . socket_strerror(socket_last_error()) . "/n");   
echo "OK\nBinding the socket on $address:$port ... ";   
echo "OK\nNow ready to accept connections.\nListening on the socket ... \n";   
do { // never stop the daemon   
    //它接收连接请求并调用一个子连接Socket来处理客户端和服务器间的信息   
    $msgsock = socket_accept($sock) or  die("socket_accept() failed: reason: " . socket_strerror(socket_last_error()) . "/n");   
    while(1){ 
        //读取客户端数据   
        //socket_read函数会一直读取客户端数据,直到遇见\n,\t或者\0字符.PHP脚本把这写字符看做是输入的结束符.   
        $buf = @socket_read($msgsock, 8192);   
        echo "请求的消息: $buf   \n"; 

        if($buf == "bye"){ 
            //接收到结束消息，关闭连接，等待下一个连接 
            socket_close($msgsock); 
            continue; 
        } 

        //数据传送 向客户端写入返回结果   
        //$msg = "welcome \n";   
        echo (int)$msg = getStatus();
        if(!@socket_write($msgsock, $msg, strlen($msg))){
            //todo 重建连接
            echo "本次请求连接已断开\n";
            break;
        }
        //socket_write($msgsock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");           
    }   

} while (true);   
socket_close($sock);   


//获取状态
function getStatus($switch = 'power_status')
{
    // 查询redis数据
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    $s = $redis->get('power_status');
    $redis->close();
    return $s;
}
?> 
