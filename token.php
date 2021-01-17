<?php

/**
 * 无间AR云识别，token生成示例
 * 
 * 开发者中心: https://portal.wujianar.com
 */

// 基本信息, 服务器或客户端密钥
$accessKey = '6e59b44afb904ffa9d628e69b18c14a0';
$accessSecret = 'b60e17e39dca45bf9e2d5b393ee823c45b21218456494cf19cd12fe4fd036e5e';

$arr = [
    // 密钥
    'accessKey' => $accessKey ,
    // 有效期（时间戳）,使用毫秒
    'expires' => (time() + 3600) * 1000
];

// 转换为JSON字符串
$json = json_encode($arr);

// 计算签名，拼接JSON字符串与访问密钥，再使用sha256哈希生成签名
$signature = hash('sha256', $json . $accessSecret);

// 原始token数据
$raw = $signature . $json;

// 转换为base64编码, 此token为最终的认证token, 在有效期内无需重新生成
$token = base64_encode($raw);
echo $token;