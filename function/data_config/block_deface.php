<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
<style type="text/css">
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    background: #282a42;
    user-select: none;
    -webkit-user-select: none;
}
div,h3,h4,li,ol{margin:0;padding:0}
body {
    font: 14px/1.5 'Microsoft YaHei','Microsoft Yahei', Helvetica, Sans-serif;
}
h3,h4,strong{font-weight:700}
a{color:#fff;text-decoration:none}
a:hover{text-decoration:underline}
.error-page{background:#282a42;padding:80px 0 180px}
.error-page-container{position:relative;z-index:1}
.error-page-main{position:relative;background:#30334e;margin:0 auto;width:617px;-ms-box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:50px 50px 70px}
.error-page-main:before{content:'';display:block;height:7px;position:absolute;top:-7px;width:100%;left:0}
.error-page-main h3{font-size:24px;font-weight:400;border-bottom:1px solid #d0d0d0;color:#fff}
.error-page-main h3 strong{font-size:54px;font-weight:400;margin-right:20px;color:#fff}
b, span {color:#fbff00; text-shadow: 0 0 7px #000;font-weight:400;}
strong {color:#ff1100;text-shadow: 0 0 7px #000;}
.error-page-main h4{font-size:20px;font-weight:400;color:#fff}
.error-page-actions{font-size:0;z-index:100}
.error-page-actions div{font-size:14px;display:inline-block;padding:30px 0 0 10px;width:50%;-ms-box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;color:#fff}
.error-page-actions ol{list-style:decimal;padding-left:20px}
.error-page-actions li{line-height:2.5em}
.error-page-actions:before{content:'';display:block;position:absolute;z-index:-1;bottom:17px;left:50px;width:200px;height:10px;-moz-box-shadow:4px 5px 31px 11px #999;-webkit-box-shadow:4px 5px 31px 11px #999;box-shadow:4px 5px 31px 11px #999;-moz-transform:rotate(-4deg);-webkit-transform:rotate(-4deg);-ms-transform:rotate(-4deg);-o-transform:rotate(-4deg);transform:rotate(-4deg)}
.error-page-actions:after{content:'';display:block;position:absolute;z-index:-1;bottom:17px;right:50px;width:200px;height:10px;-moz-box-shadow:4px 5px 31px 11px #999;-webkit-box-shadow:4px 5px 31px 11px #999;box-shadow:4px 5px 31px 11px #999;-moz-transform:rotate(4deg);-webkit-transform:rotate(4deg);-ms-transform:rotate(4deg);-o-transform:rotate(4deg);transform:rotate(4deg)}
</style>
</head>
<body>
<div class="error-page">
<div class="error-page-container">
<div class="error-page-main" style="box-shadow: 0 0 19px #707070;border-radius: 8px;color:#000">
<h3>
<strong>403</strong>Forbidden
</h3><br/>
<strong>Message:</strong> <span>Phát hiện các cuộc tấn công SQL Injector, XSS, biểu mẫu này sẽ xuất hiện và ngăn chặn các cuộc tấn công này. Vui lòng không sử dụng những câu Truy Vấn để khai thác lỗ hổng của website này.</span><br/>
<strong>Your IP: <span><?=$_SERVER['REMOTE_ADDR'];?></span></strong><br/>
<strong>Locked Time: </strong><span><?php date_default_timezone_set('Asia/Ho_Chi_Minh');echo date('h:i:s - d-m-Y');?></span><br/>
<strong>ID Ray: </strong><span><?=bin2hex(random_bytes(18));?></span><br/>
<strong>Command: </strong><span>[ root@deface ~] # : die() or exit() function alert() { return 'FUCK YOU' }</span>
</div>
<div>
</div>
</div>
</div>
</div>
</div>