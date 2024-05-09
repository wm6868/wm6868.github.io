<?php
// url.php

// 获取请求中的"url"参数
$url =$_GET['url'];

// 检查$url是否有效
if (filter_var($url, FILTER_VALIDATE_URL)) {
    // 设置User-Agent头部，模仿浏览器访问
    $options = array(
        'http' => array(
            'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3\r\n"
        )
    );

    // 创建一个上下文流，使用我们的User-Agent头部
    $context = stream_context_create($options);

    // 使用file_get_contents获取远程网页内容
    $content = file_get_contents($url, false, $context);

    // 输出获取到的内容
    echo $content;
} else {
    // 如果$url不是有效的URL，可以输出错误信息
    echo "Invalid URL provided.";
}
?>