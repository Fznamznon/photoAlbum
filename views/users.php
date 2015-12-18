<html>
<?php if ($errorString !== NULL) echo $errorString?>
<form method="POST" action="<?php echo WEB.'register'; ?>">
Имя: <input type = "text" name = "name">
<br> 
Логин: <input type = "text" name = "login"> 
<br>
Пароль: <input type = "password" name = "password"> 
<br>
<input type = "submit">

</form>

</html>