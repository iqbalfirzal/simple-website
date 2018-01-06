<?php
include "FvCkInDaY.php";
?>
<div id=tombol>
<a href='?admin=user&user=lihat'><img src='user.png' height='90px' align='center' title='Lihat Anggota'/></a></td>
</div>
<?php
if(ISSET($_GET['user'])){
if($_GET['user']=="lihat"){include "user_lihat.php";}
if($_GET['user']=="edit"){include "user_edit.php";}
if($_GET['user']=="tambah"){include "user_tambah.php";}
}
?>