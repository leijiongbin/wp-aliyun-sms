<?php
/*
Plugin Name: 阿里云短信认证
Plugin URI: 
Description: 阿里云短信认证
Author: Ryan
Author URI: 
Version: 1.0.0
*/



add_action('admin_menu', 'aliyun_sms_menu');
function aliyun_sms_menu() {
    if (function_exists('add_options_page')) {
        add_options_page('阿里云短信设置', '阿里云短信设置', 'manage_options', 'wp-aliyun-sms/aliyun-sms-options.php') ;
    }
}

/**
 * 解析POST
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
function aliyun_sms_options_parse($key) {
    return !empty($_POST[$key]) ? $_POST[$key] : null;
}


require_once "code/SignatureHelper.php";
use Aliyun\DySDKLite\SignatureHelper;
/**
 * 发送短信
 */
function sendSms($phone=0,$code=0,$template=1) {
    $aliyun_sms_options = get_option( 'aliyun_sms_options' );

    $params = array ();

    // *** 需用户填写部分 ***
    // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
    $accessKeyId = $aliyun_sms_options['aliyunSms_accessKeyId'];
    $accessKeySecret = $aliyun_sms_options['aliyunSms_accessKeySecret'];

    // fixme 必填: 短信接收号码
    $params["PhoneNumbers"] = $phone;//接收的手机号码

    // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
    $params["SignName"] = $aliyun_sms_options['aliyunSms_SignName'];

    // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
    if($template==2){
        $params["TemplateCode"] = $aliyun_sms_options['aliyunSms_TemplateCode2'];
    }elseif($template==3){
        $params["TemplateCode"] = $aliyun_sms_options['aliyunSms_TemplateCode3'];
    }elseif($template==4){
        $params["TemplateCode"] = $aliyun_sms_options['aliyunSms_TemplateCode4'];
    }else{
        $params["TemplateCode"] = $aliyun_sms_options['aliyunSms_TemplateCode1'];
    }
    // $params["TemplateCode"] = $aliyun_sms_options['aliyunSms_TemplateCode'];

    // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
    $params['TemplateParam'] = Array (
        "code" => $code,//发送的验证码
        // "product" => "test"
    );

    // fixme 可选: 设置发送短信流水号
    // $params['OutId'] = "12345";

    // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
    // $params['SmsUpExtendCode'] = "1234567";


    // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
    if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
        $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
    }

    // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
    $helper = new SignatureHelper();

    // 此处可能会抛出异常，注意catch
    $content = $helper->request(
        $accessKeyId,
        $accessKeySecret,
        "dysmsapi.aliyuncs.com",
        array_merge($params, array(
            "RegionId" => "cn-hangzhou",
            "Action" => "SendSms",
            "Version" => "2017-05-25",
        ))
    );

    return $content;
}




