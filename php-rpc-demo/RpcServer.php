<?php
/**
 * File Name: RpcServer.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Description: Rpc服务端
 * Created Time: Tue Nov 23 20:59:40 2021
 */
class RpcServer {

    /**
     * 类的基本配置
     */
    private $params = [
        "host" =>'', // ip 地址 
        "prot" =>'', // 端口
        "path" =>'', // 服务目录
    ];

    /**
     * 类的常用配置
     */
    private $config = [
        "real_path" => '',
        'max_size' => 2048 // 最大接收数据大小
    ];

    private $server = null;

    public function __construct($params)
    {
        $this->check();
        $this->init($params);
    }

    /**
     * 必要的验证
     */
    private function check() 
    {
        $this->serverPaht();
    }

    /**
     * 初始化必要参数
     */
    private function init($params)
    {
        $this->params = $params; // 将传递过来的参数初始化
        $this->createServer(); // 创建tcpsocket服务
    }

    /**
     * 创建tcpsocket服务
     */
    private function createServer()
    {
        $this->server = stream_socket_server("tcp://{$this->params['host']}:{$this->params['port']}", $errno, $errstr);
        if(!$this->server){
            exit([$errno, $errstr]);
        }
    }

    /**
     * rpc 服务目录
     */
    public function serverPaht()
    {
        $path = $this->params['path'];
        $realPath = realpath(__DIR__. $path);
        if($realPath === false || !file_exists($realPath)) {
            exit("{$path} error!");
        }
        $this->config['real_path'] = $realPath;
    }

    /**
     * 返回当前对象
     */
    public static function instance($params)
    {
        return new RpcServer($params);
    }

    /**
     * 运行
     */
    public function run()
    {
        while(true){
            $client = stream_socket_accept($this->server);
            if($client){
                echo "有新连接\n";
                $buf = fread($client, $this->config['max_size']);
                print_r("接收到的原始数据:".$buf."\n"); // 自定义协议目的是拿到类方法和参数（可改成自己定义的）
                $this->parseProtocol($buf, $class, $method, $params);
                $this->execMethod($client, $class, $method, $params);
                fclose($client); // 关闭客户端
                echo "关闭了连接\n";
            }
        }
    }

    /**
     * 执行方法
     */
    private function execMethod($client, $class, $method, $params)
    {
        if($class && $method) {
            // 首字母转成大写
            $class = ucfirst($class);
            $file = $this->params['path']. '/'. $class . '.php';
            // 判断文件是否存在
            if(file_exists($file)){
                include_once $file;
                // 实例化类，并调用客户端指定的方法
                $obj = new $class();
                if(!$params) {
                    $data = $obj->$method();
                } else {
                    $data = $obj->$method($params);
                }
                // 打包数据
                $this->packProtocol($data);
                // 把运行后的结果返回给客户端
                fwrite($client, $data);
            }
        } else {
            fwrite($client, "class or method error");
        }
    }

    /**
     * 解析协议
     */
    private function parseProtocol($buf, &$class, &$method, &$params)
    {
        $buf = json_decode($buf, true);
        $class = $buf['class'];
        $method = $buf['method'];
        $params = $buf['params'];
    }

    /**
     * 打包协议
     */
    private function packProtocol(&$data)
    {
        $data = json_encode($data);
    }

}

$config = ['host'=>'127.0.0.1', 'port'=>8888, 'path'=>'./api'];
RpcServer::instance($config)->run();

