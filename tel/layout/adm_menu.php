<?php
include "FvCkInDaY.php";
?>
<div id=tombol>
<a href='?admin=menu&menu=lihat'><img src='list.png' height='90px' align='center' title='Lihat Menu'/></a></td>
</div>
<div id=opoyo>
<?php
if(ISSET($_GET['menu'])){
if($_GET['menu']=="lihat"){include "menu_lihat.php";}
if($_GET['menu']=="tambah"){include "menu_tambah.php";}
if($_GET['menu']=="edit"){include "menu_edit.php";}
}
?>
</div>