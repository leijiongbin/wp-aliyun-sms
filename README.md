# 安装

1. 下载wp-aliyun-sms插件并通过您喜欢的FTP应用程序将其上传到您的服务器，路径：项目根目录\wp-content\plugins
2. 登录wordpress后台，点击插件，启动《阿里云短信认证》
3. 点击左侧菜单：设置-阿里云短信设置
4. 登录阿里云官方网站(https://www.aliyun.com/),搜索短信服务(https://www.aliyun.com/product/sms?spm=5176.10695662.1128094.1.2a6b4beeCO3Qct)，开通服务
5. 回到wordpress后台，根据提示地址，填入插件配置信息
6. 配置好后，在插件标签栏选择《发送测试短信》，尝试发送一条短信至手机，成功会有相应信息提示，失败也是

# 使用
1. 在需要发送的文件位置调用： sendSms($phone,$code,$template)
