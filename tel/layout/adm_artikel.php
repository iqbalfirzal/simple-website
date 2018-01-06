<?php
include "FvCkInDaY.php";
?>
<div id=tombol>
<a href='?admin=artikel&menu=lihat'><img src='ic_artikel.png' height='90px' align='center' title='Lihat Artikel'/></a></td>
<a href='?admin=artikel&menu=tambah'><img src='ic_artikel_add.png' height='90px' align='center' title='Tambah Artikel'/></a></td>
</div>
<div id=opoyo>
<?php
if(ISSET($_GET['menu'])){
if($_GET['menu']=="lihat"){include "artikel_lihat.php";}
if($_GET['menu']=="tambah"){include "artikel_tambah.php";}
if($_GET['menu']=="edit"){include "artikel_edit.php";}
}
?>
</div>