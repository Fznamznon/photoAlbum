<html>

<form method="POST" action="<?php echo WEB.'albums/add';?>">
Название : <input type="text" name="name">
<br>
Описание : <input type = "text" name = "description">
<br>
Приватный : <input type="checkbox" name="privacy" value=1>
<br>
<input type = "submit">
<input type="button" value="Отмена" onClick="location.href='<?php echo WEB;?>'">
</form>
</html>