<?php
/**
 * File Name: inotify.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 2018年11月25日 星期日 19时15分23秒
 */

/**
 * 监听php文件变化,触发执行命令
 * php path/autorun.php 
 */
// 工作方法
function work() {
        $uri = 'index/test/stat';
        $cmd = "/usr/bin/php /home/songyue/work/az/public/index.php {$uri}";
        echo '执行shell命令: ';
        echo $cmd;
        echo PHP_EOL;
        $result = shell_exec($cmd); 
        echo '执行结果: ';
        echo $result;
        echo PHP_EOL;
        return $result;
}

// 监听文件inoitfy
function listen($file ='') {

    $file = $file ? $file : '/home/songyue/work/az/application/';
    // todo fork 子进程 监听

    $fd = inotify_init();
    $watch_descriptor = inotify_add_watch($fd, $file, IN_ALL_EVENTS);

    while (true) {
        $events = inotify_read($fd);

        foreach($events as $event=>$evdetails) {
            if($evdetails['mask'] == IN_MODIFY) {
                if(pathinfo($evdetails['name'], PATHINFO_EXTENSION) == 'php'){
                    echo '========';
                    echo ' starting ...';
                    echo '========';
                    echo ' time: '. date('Y-m-d H:i:s'); 
                    echo ' ========';
                    echo PHP_EOL;
                    $execBeginTime = microtime(true);
                    work();
                    $execEndTime = microtime(true);
                    echo '========';
                    echo ' stop ';
                    echo '========';
                    echo ' 本次执行用时: '. ($execEndTime - $execBeginTime) / 1000 ;
                    echo '========';
                    echo PHP_EOL;
                    echo PHP_EOL;
                }

            } 
        }
    }
}

// 启动监听
listen();
