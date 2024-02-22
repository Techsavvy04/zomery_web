<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>IP HAS BEEN BANNED</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Audiowide|Sriracha|Bungee');

      * {
        user-select: none;
      }

      body {
        background: url(https://a-static.besthdwallpaper.com/one-piece-monkey-d-luffy-in-killer-eyes-wallpaper-3840x2160-98040_54.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      strong {
        text-shadow: 0 0 10px #000;
        color: #fff;
      }

      h2 {
        white-space: nowrap;
        text-shadow: 5px 2px #222324, 2px 4px #828282, 3px 5px #828282;
        color: #ff000d;
        font: 700 normal 2.5em 'tahoma';
      }
      a {
        font-family: Sriracha;
      }
      #notify {
        margin: auto;
        color: white;
        font: 700 normal 1em 'tahoma';
        text-shadow: 0 0 10px #000;
      }

      .widget_text .aplayer {
        margin: -12px -16px
      }

      .widget_text .aplayer .aplayer-info {
        padding: 7px 7px 7px 10px
      }

      .widget_text .aplayer .aplayer-info .aplayer-music {
        margin: 0 0 13px 0
      }

      /* .giligili-item {
        position: relative;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 2px;
        padding: 20px 16px;
        -webkit-box-shadow: 0 1px 3px rgba(26, 26, 26, .1);
        box-shadow: 0 5px 10px #3b3b3b
      }*/
      .giligili-item {
        margin-top: 100px;
      }

      .banned {
        object-fit: cover;
        width: 150px;
        height: 150px;
        vertical-align: -20px;
        border-radius: 50%;
        margin-right: 5px;
        margin-bottom: 5px;
        box-shadow: 0 0 20px white;
        border: 3px solid yellow;
      }

      .article-categories a {
        padding: 4px 10px;
        background-color: #19b5fe;
        color: white;
        font-size: 15px;
        line-height: 16px;
        font-weight: 400;
        margin: 0 5px 5px 0;
        border-radius: 2px;
        display: inline-block
      }

      .article-categories a:nth-child(5n) {
        background-color: #4a4a4a;
        color: #FFF
      }

      .article-categories a:nth-child(5n+1) {
        background-color: #ff5e5c;
        color: #FFF
      }

      .article-categories a:nth-child(5n+2) {
        background-color: #ffbb50;
        color: #FFF
      }

      .article-categories a:nth-child(5n+3) {
        background-color: #1ac756;
        color: #FFF
      }

      .article-categories a:nth-child(5n+4) {
        background-color: #19b5fe;
        color: #FFF
      }

      .article-categories a:hover {
        background-color: #1b1b1b;
        color: #FFF
      }
    </style>
  </head>
  <body bgcolor="#FFFFFF">
    <div class="widget_text giligili-item">
      <div class="textwidget custom-html-widget">
        <div style="text-align: center;">
          <img class="banned" src="https://i.pinimg.com/564x/59/c2/54/59c2543fc66bd389c20ffa0bcd3e0b0c.jpg" />
          <h2>403 Forbidden</h2>
          <strong id="notify"></strong>
          <div class="article-categories"><br/>
            <a style="display:none;">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Your IP: <?=$_SERVER['REMOTE_ADDR'];?></font>
              </font>
            </a>
            <a>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Your IP: <?=$_SERVER['REMOTE_ADDR'];?></font>
              </font>
            </a>
          </div>
        </div>
      </div>
      <script>
        var words = ['Bạn đã bị cấm truy cập vào trang này!', 'Để biết thêm thông tin và chi tiết.', 'Hãy liên hệ cho chủ sở hữu website này.'],
          part,
          i = 0,
          offset = 0,
          len = words.length,
          forwards = true,
          skip_count = 0,
          skip_delay = 15,
          speed = 50;
        var wordflick = function() {
          setInterval(function() {
            if (forwards) {
              if (offset >= words[i].length) {
                ++skip_count;
                if (skip_count == skip_delay) {
                  forwards = false;
                  skip_count = 0;
                }
              }
            } else {
              if (offset == 0) {
                forwards = true;
                i++;
                offset = 0;
                if (i >= len) {
                  i = 0;
                }
              }
            }
            part = words[i].substr(0, offset);
            if (skip_count == 0) {
              if (forwards) {
                offset++;
              } else {
                offset--;
              }
            }
            $('#notify').text(part);
          }, speed);
        };
        $(document).ready(function() {
          wordflick();
        });
      </script>
  </body>
</html>