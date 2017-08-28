<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            .error p{font-style: italic; color: red; font-size: 90%;}
            span.success {color: green;}
        </style>
         <meta charset="utf-8">
        <title>Title | Đăng ký thành viên</title>
    </head>
    <body>	
             <form action="" method="post" id="form">
                <table width = "500" border = "2" cellpadding = "5" algin = "center">
                    <tr><th colspan = "2">ĐĂNG KÝ THÀNH VIÊN </th></tr>		
                    <tr>
                        <td> Tên đăng nhập :<span class="req">*</span></td>
                        <td ><input type="text"  name="username" size="40" placeholder="Nhập tên đăng nhập" value="<?php echo set_value('username'); ?>">
                            <div class="error" id="username_error"><?php echo form_error('username') ?></div></td>
                    </tr>
                    <tr>
                        <td>  Mật khẩu:<span class="req">*</span></td>
                        <td> <input type="password" name="password" size="40" placeholder="Nhập mật khẩu" value="<?php echo set_value('password'); ?>">
                            <div class="error" id="password_error"><?php echo form_error('password') ?></div>
                    </tr>
                    <tr>
                        <td> Nhập  lại mật khẩu:<span class="req">*</span> </td>
                        <td>
                            <input type="password" name="passconf" size="40" placeholder="Nhập lại mật khẩu" value="<?php echo set_value('passconf'); ?>"/>
                            <div class="error" id="passconf"><?php echo form_error('passconf') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td> Số điện thoại: </td>
                        <td>
                            <input type="text" name="phone" size="40" placeholder="Nhập số điện thoại" value="<?php echo set_value('phone'); ?>"/>
                            <div class="error" id="phone"><?php echo form_error('phone') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td> Địa chỉ Email:<span class="req">*</span>  </td>
                        <td>
                            <input type="text" name="email" size="40" placeholder="Nhập địa chỉ Email" value="<?php echo set_value('email'); ?>">
                            <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align = "center"><input type="submit" class="button" value="Đăng ký thành viên" name='submit'></td>
                    </tr>  
                 </table>
            </form>		
            <div><span class ="success" ><?php if (isset($b_Check) && $b_Check == true) {
                    echo "Bạn đã  đăng ký thành công !";
                        } ?></span></div>		

    </body>
</html>