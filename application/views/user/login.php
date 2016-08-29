<html>
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>派出所信息后台管理</title>
    <base href="<?php echo base_url(); ?>dwz/themes" />
    <link href="style/alogin.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php echo form_open('C=User&F=login'); ?>
<div class="Main">
    <ul>
        <li class="top"></li>
        <li class="top2"></li>
        <li class="topA"></li>
        <li class="topB"><span>
                        <img src="themes/default/images/login/logo1.gif" alt="" style="" />
                    </span></li>
        <li class="topC"></li>
        <li class="topD">
            <ul class="login">
                <li><span class="left">分  组：</span> <span style="left">
                                <select name="ugroupid" >
                                <option value="">请选择</option>
                                    <?php
                                    foreach ($ugrouplist as $group) {
                                        echo "<option value='{$group['id']}'>{$group['name']}</option>";
                                    }
                                    ?>
                    </select>
                            </span>
                </li>
                <li>
                    <span class="left">用户名：</span>
                            <span style="left">
                                <input id="Text1" type="text" name ="username" class="txt" />
                            </span>
                </li>
                <li><span class="left">密  码：</span> <span style="left">
                                <input id="Text2" type="password" name="password" class="txt" />
                            </span>
                </li>
<!--                <li>-->
<!--                    <span class="left">验证码：</span> <span style="left" >-->
<!--                                <input id="Text3" type="text" name="code" class="txtCode" />-->
<!--                                <img width="110" id="cap" height="30"  style="border:0;" src="default/captcha/--><?php //echo isset($captcha) ? $captcha['time'] : '' ?><!--.jpg" title="看不清？点此更换">-->
<!--                            </span>-->
<!--                </li>-->
                <!-- <li style="padding-left: 50px;line-height:15px;">
                            <span  style="color:red;" >
                                <?php
                if (!empty($login_error)) {
                    echo $login_error;
                } elseif (validation_errors()) {
                    echo validation_errors();
                } else {
                    echo '';
                }
                ?>
                            </span>
                        </li> -->
            </ul>
        </li>
        <li class="topE"></li>
        <li class="middle_A"></li>
        <li class="middle_B">
        </li>
        <li class="middle_C">
                    <span class="btn">
                        <input type="image" alt="" src="themes/default/images/login/btnlogin.gif" />
                    </span>
        </li>
        <li class="middle_D"></li>
        <li class="bottom_A"></li>
        <li class="bottom_B">
            北京 海淀区派出所<br />
            后台管理
        </li>
    </ul>
</div>
</form>
</body>
</html>
