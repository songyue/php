<?php
/**
 * File Name: a.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Description: Rpc客户端
 * Created Time: Tue Nov 23 21:52:53 2021
 */
class  RpcClient {

    /**
     * 调用的地址
     */
    private $urlInfo = [];

    public function __construct($url)
    {
        $this->urlInfo = parse_url($url);
    }

    /**
     * 返回当前对象
     */
    public static function instance($url)
    {
        return RpcClient($url);
    }

    /**
     * 调用
     */
    public function __call($name, $arguments)
    {
        // todo:sy Implement __call() method
        // 创建一个客户端
        $client = stream_socket_client("tcp://{$this->urlInfo['host']}:{$this->urlInfo['port']}", $errno, $errstr);
        if(!$client){
            exit("{$errno}: {$erstr}\n");
        }

        $data = [
            "class" => basename($this->urlInfo['path']),
            "method" => $name,
            "params" => $arguments
        ];
        
        // 向服务器发送我们自定义的协议数据
        fwrite($client, json_encode($data));
        // 读取服务端传来的数据
        $data = fread($client, 2048);
        // 关闭客户端
        fclose($client);
        return $data;
    }
}

$rpcServerAddr = 'tcp://127.0.0.1:8888/test';
$cli = new RpcClient($rpcServerAddr);
echo $cli->action1()."\n";
echo $cli->action2(['name'=>'sogyue', 'age'=>23])."\n";
