<?php
/**
 * File Name: Server.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 五 12/20 18:15:42 2019
 */

class YaobuqiModel implements PowerInterFace
{
    public $reids;

    function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);
    }
    //设置状态
    function setStatus($status, $switch = 'yaobuqi')
    {
        // 查询redis数据
        $s = $this->redis->set('yaobuqi', $status);
        $this->redis->close();
        return $s;
    }

    //获取状态
    function getStatus($switch = 'yaobuqi')
    {
        // 查询redis数据
        $s = $this->redis->get('yaobuqi');
        $this->redis->close();
        return $s;
    }
}

// url参数  c 控制器 a 方法 
$controller = $_GET['c'] ?? 'yaobuqi';
$action = $_GET['a'] ?? 'getStatus';

// 处理controller名称, 首字母大写，拼接Controller后缀
$controllerName = ucfirst($controller).'Controller';
// 处理action名称, 首字母大写，拼接action前缀
$actionName = 'action'.ucfirst($action);

// 如果控制器存在
if(!class_exists($controllerName)){
    echo '404 Page Not Found';
    exit();
}

$class = $controllerName;

if(!method_exists($class, $actionName)){
    echo '404 Page Not Found';
    exit;
}
$method = $actionName;

if ( ! is_callable(array($class, $method))) {
    $reflection = new ReflectionMethod($class, $method);
    if ( ! $reflection->isPublic() OR $reflection->isConstructor()) {
        echo '404 Page Not Found';
        exit;
    }
}

$C = new $class();
$params=array();
call_user_func_array(array(&$C, $method), $params);


/**
 * 电源开关接口
 */
interface PowerInterFace
{
    const POWER_ON =1;
    const POWER_OFF =0;

    // 查询开关状态
    public function getStatus($power_name);
    // 设置开关状态
    public function setStatus($power_name, $status);
}

/**
 * 摇步器 控制器
 * 包含查询和设置接口
 */
class YaobuqiController  extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new YaobuqiModel();
    }

    //获取开关状态
    public function actionGetStatus(){
        $status = $_GET['status'] ?? 0;
        $power_name = $_GET['power_name'] ?? 'yaobuqi';
        $status = $this->model->setStatus($power_name);
        $data = array('power_name'=>$power_name, 'status' => $status);
        echo $this->_pjson($data);
    }

    // 设置开关状态
    public function actionSetStatus(){
        $status = $_GET['status'] ?? 0;
        $power_name = $_GET['power_name'] ?? 'yaobuqi';
        $power_status = $status == 1 ? YaobuqiModel::POWER_ON : YaobuqiModel::POWER_OFF ;
        $this->model->setStatus($power_status);
        $data = array('power_name'=>$power_name, 'status' => $status);
        echo $this->_pjson($data);
    }
}

class BaseController
{
    public $model;
    // 格式化输出
    protected function _pjson($data = [], $msg='ok', $code=200)
    {
        $r = array('data'=>$data, 'msg'=>$msg, 'code'=>$code);
        return json_encode($r);
    }
}
