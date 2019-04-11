<?php
    $adminHtml  = '';   
    $adminHtml .='<link rel="stylesheet" href="'.plugins_url('wp-aliyun-sms/asset/css/main.css').'" type="text/css" media="screen" />';
    $adminHtml.= '<script src="'.plugins_url('wp-aliyun-sms/asset/js/main.js').'"></script>';
    $adminHtml .= '<div class=wrap>';
    $adminHtml .= '<div>';
    $adminHtml .= '<h3 class="qq-cus-title">阿里云短信设置</h3>';
    $adminHtml .= '<p class="kefu-update update-nag"></p>';
    $adminHtml .= '</div><div>';
    $adminHtml .= '<form method="post">';   

    $adminHtml .= '
        <div style="clear:both;">
        <ul class="setting-set">
            <li style="background-color: rgb(0, 115, 170); color: rgb(255, 255, 255);" data-id="tab-general">设置</li>
            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" data-id="tab-environment">环境检测</li>
            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" data-id="tab-test">发送测试短信</li>
        </ul>
        </div>
        ';
    echo $adminHtml;
?>


<div class="kefu_section kefu_tab" id="tab-general">
<div class="rm_title">
    <h3>阿里云短信选项设置</h3>
    <div class="clearfix"></div>
</div>
<?php
if(!empty($_POST['Submit'] )) {
    check_admin_referer( 'wp-aliyun_sms_options' );
    $aliyun_sms_options = array(
          'aliyunSms_accessKeyId'                   => trim( aliyun_sms_options_parse('aliyunSms_accessKeyId') )
        , 'aliyunSms_accessKeySecret'            => trim( aliyun_sms_options_parse('aliyunSms_accessKeySecret') )
        , 'aliyunSms_SignName'            => trim( aliyun_sms_options_parse('aliyunSms_SignName') )
        , 'aliyunSms_TemplateCode1'          => trim( aliyun_sms_options_parse('aliyunSms_TemplateCode1') )
        , 'aliyunSms_TemplateCode2'          => trim( aliyun_sms_options_parse('aliyunSms_TemplateCode2') )
        , 'aliyunSms_TemplateCode3'          => trim( aliyun_sms_options_parse('aliyunSms_TemplateCode3') )
        , 'aliyunSms_TemplateCode4'          => trim( aliyun_sms_options_parse('aliyunSms_TemplateCode4') )
    );
    $update_queries = array();
    $update_text = array();
    $update_queries[] = update_option( 'aliyun_sms_options', $aliyun_sms_options );
    $update_text[] = "阿里云短信选项设置";
    $i = 0;

    foreach( $update_queries as $update_query ) {
        if( $update_query ) {
            $text .= '<p style="color: green;">' . $update_text[$i] . ' ' . '已经更新' . '</p>';
        }
        $i++;
    }
    if( empty( $text ) ) {
        $text = '<p style="color: red;">' . '没有更新' . '</p>';
    }
}

$aliyun_sms_options = get_option( 'aliyun_sms_options' );

?>

<form method="post" action="<?php echo admin_url( 'admin.php?page=' . plugin_basename( __FILE__ ) ); ?>">
<?php wp_nonce_field( 'wp-aliyun_sms_options' ); ?>
    <table class="form-table">
        <tr>
            <th><label for="aliyunSms_accessKeyId">Access Key ID</label></th>
            <td>
                <input type="text" name="aliyunSms_accessKeyId" id="aliyunSms_accessKeyId" value="<?php echo htmlspecialchars(stripslashes($aliyun_sms_options['aliyunSms_accessKeyId'] )); ?>" class="regular-text" /><br />
                <span>请参阅 <a href="https://ak-console.aliyun.com/" target="_blank">https://ak-console.aliyun.com/ </a>取得您的AK信息</span>
            </td>
            
        </tr>
        <tr>
            <th><label for="aliyunSms_accessKeySecret">Access Key Secret</label></th>
            <td>
                <input type="text" name="aliyunSms_accessKeySecret" id="aliyunSms_accessKeySecret" value="<?php echo htmlspecialchars(stripslashes($aliyun_sms_options['aliyunSms_accessKeySecret'] )); ?>" class="regular-text" /><br />
                <span>请参阅 <a href="https://ak-console.aliyun.com/" target="_blank">https://ak-console.aliyun.com/ </a>取得您的AK信息</span>
            </td>
            
        </tr>
        <tr>
            <th><label for="aliyunSms_SignName">签名名称</label></th>
            <td>
                <input type="text" name="aliyunSms_SignName" id="aliyunSms_SignName" value="<?php echo htmlspecialchars(stripslashes($aliyun_sms_options['aliyunSms_SignName'] )); ?>" class="regular-text" /><br />
                <span>应严格按"签名名称"填写，请参考: <a href="https://dysms.console.aliyun.com/dysms.htm#/develop/sign" target="_blank">https://dysms.console.aliyun.com/dysms.htm#/develop/sign</a></span>
            </td>

        </tr>

        <tr>
            <th><label for="aliyunSms_TemplateCode1">《信息变更》模版CODE1</label></th>
            <td>
                <input type="text" name="aliyunSms_TemplateCode1" id="aliyunSms_TemplateCode1" value="<?php echo htmlspecialchars(stripslashes($aliyun_sms_options['aliyunSms_TemplateCode1'] )); ?>" class="regular-text" /><br />
                <span>应严格按"模板CODE"填写, 请参考: <a href="https://dysms.console.aliyun.com/dysms.htm#/develop/template" target="_blank">https://dysms.console.aliyun.com/dysms.htm#/develop/template</a></span>
            </td>
        </tr>
        <tr>
            <th><label for="aliyunSms_TemplateCode2">《修改密码》模版CODE2</label></th>
            <td>
                <input type="text" name="aliyunSms_TemplateCode2" id="aliyunSms_TemplateCode2" value="<?php echo htmlspecialchars(stripslashes($aliyun_sms_options['aliyunSms_TemplateCode2'] )); ?>" class="regular-text" /><br />
                <span>应严格按"模板CODE"填写, 请参考: <a href="https://dysms.console.aliyun.com/dysms.htm#/develop/template" target="_blank">https://dysms.console.aliyun.com/dysms.htm#/develop/template</a></span>
            </td>
        </tr>
        <tr>
            <th><label for="aliyunSms_TemplateCode3">《登录验证》模版CODE3</label></th>
            <td>
                <input type="text" name="aliyunSms_TemplateCode3" id="aliyunSms_TemplateCode3" value="<?php echo htmlspecialchars(stripslashes($aliyun_sms_options['aliyunSms_TemplateCode3'] )); ?>" class="regular-text" /><br />
                <span>应严格按"模板CODE"填写, 请参考: <a href="https://dysms.console.aliyun.com/dysms.htm#/develop/template" target="_blank">https://dysms.console.aliyun.com/dysms.htm#/develop/template</a></span>
            </td>
        </tr>
        <tr>
            <th><label for="aliyunSms_TemplateCode4">《注册验证》模版CODE4</label></th>
            <td>
                <input type="text" name="aliyunSms_TemplateCode4" id="aliyunSms_TemplateCode4" value="<?php echo htmlspecialchars(stripslashes($aliyun_sms_options['aliyunSms_TemplateCode4'] )); ?>" class="regular-text" /><br />
                <span>应严格按"模板CODE"填写, 请参考: <a href="https://dysms.console.aliyun.com/dysms.htm#/develop/template" target="_blank">https://dysms.console.aliyun.com/dysms.htm#/develop/template</a></span>
            </td>
        </tr>
       
    </table><br/>
    <?php if( !empty( $text ) ) { echo '<div id="message" class="updated fade"><p>' . $text . '</p></div>'; } ?>
    <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="保存" />
    </p>
</form>
</div>

<div class="kefu_section kefu_tab" style="display:none;" id="tab-environment">
<div class="rm_title">
    <h3>执行环境检测</h3>
    <div class="clearfix"></div>
</div>
<form method="POST" action="<?php echo admin_url( 'admin.php?page=' . plugin_basename( __FILE__ ) ); ?>">
<!-- <h3>执行环境检测</h3> -->
    <table class="optiontable form-table">
        <tr valign="top">
            <th scope="row"><label for="to">回调</label></th>
            <td>
                <?php
                    // if(!empty($_POST['test_environment'] )) {
                        echo '<style>li {font-size: 16px;} li.fail {color:red} li.success {color: green} li label{ display:inline-block; width: 15em}</style>';
                        echo '<h1>执行环境检测</h1>';

                        function success($title) {
                            print_r("<li class=\"success\"><label>{$title}</label>[成功]</li>");
                        }
                        function fail($title, $description) {
                            print_r("<li class=\"fail\"><label>{$title}</label>[失败] {$description}</li>");
                        }

                        if(preg_match("/^\d+\.\d+/", PHP_VERSION, $matches)) {
                            $version = $matches[0];
                            if($version >= 5.3) {
                                success("PHP $version");
                            } else {
                                fail("PHP $version", "需要PHP>=5.3版本");
                                exit(1);
                            }
                        }
                        // date_default_timezone_set("Asia/Shanghai");
                        try {
                            
                            set_error_handler(function () { throw new Exception(); });
                            date_default_timezone_get();
                            restore_error_handler();
                        } catch(Exception $e) {
                            fail('默认时区设置', '请设置默认时区，如：date_default_timezone_set("Asia/Shanghai")');
                        }

                        echo '<h2>依赖扩展检测，如失败请安装相应扩展</h2>';

                        $dependencies = array (
                            'json_encode' => null,
                            'curl_init' => null,
                            'hash_hmac' => null,
                            'simplexml_load_string' => '如果是php7.x + ubuntu环境，请确认php7.x-libxml是否安装，x为子版本号',
                        );

                        foreach($dependencies as $funcName => $description) {
                            if(!function_exists($funcName)) {
                                fail($funcName, $description || '');
                            } else {
                                success($funcName);
                            }
                        }
                    // }
                ?>
            </td>
        </tr>
    </table>  
    <!-- <p class="submit"><input type="submit" name="test_environment" class="button-primary" value="测试环境" /></p> -->
</form>
</div>

<div class="kefu_section kefu_tab" style="display:none;" id="tab-test">
<div class="rm_title">
    <h3>发送测试短信</h3>
    <div class="clearfix"></div>
</div>
<form method="POST" action="<?php echo admin_url( 'admin.php?page=' . plugin_basename( __FILE__ ) ); ?>">
<?php wp_nonce_field( 'wp-aliyun_sms_test' ); ?>
    <table class="optiontable form-table">
        <tr valign="top">
            <th scope="row"><label for="to">发送给</label></th>
            <td>
                <input name="test_phone" type="text" id="test_phone" value="" size="40" class="code" />
                <span class="description">在这里填入一个手机号码</span><br>       
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="to">验证码</label></th>
            <td>
                <input name="test_code" type="text" id="test_code" value="" size="40" class="code" />
                <span class="description">在这里填入一个数字验证码（四位数字），然后点击发送短信来发送一条短信</span>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="to">回调</label></th>
            <td>
                <?php
                    if(!empty($_POST['test_SMS'] )) {
                        check_admin_referer( 'wp-aliyun_sms_test' );

                        $phone = trim( aliyun_sms_options_parse('test_phone'));
                        $code = trim( aliyun_sms_options_parse('test_code'));

                        $aliyun_sms_options = get_option( 'aliyun_sms_options' );
                        if($aliyun_sms_options['aliyunSms_accessKeyId'] && $aliyun_sms_options['aliyunSms_accessKeySecret'] && $aliyun_sms_options['aliyunSms_SignName'] && $aliyun_sms_options['aliyunSms_TemplateCode1']){
                            $content = sendSms($phone,$code);
                            var_dump($content);
                            echo "Message: <p style='color: green;'>".$content->Message."</p><br>";
                            echo "RequestId: <p style='color: green;'>".$content->RequestId."</p><br>";
                            echo "Code: <p style='color: green;'>".$content->Code."</p>";
                        }else{
                            echo "<span style='color: red;'>未完善《阿里云短信选项设置》</span>";
                        }
                    }
                ?>
            </td>
        </tr>
    </table>
    
    <p class="submit"><input type="submit" name="test_SMS" class="button-primary" value="发送短信" /></p>
</form>
</div>

</div>
</div>

