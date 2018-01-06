var starting = function(game){
	//console.log berfungsi untuk mengetahui file sudah tereksekusi atau belum
	console.log("%cStarting","color:#FFFFFF; background:#FF0000;");
}
starting.prototype = {
	preload:function(){
		//untuk meload gambar
		this.game.load.image("img_load","assets/img/loading.gif");
	},
	create:function() {
		this.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
		this.scale.pageAlignHorizontally = true;
		this.scale.setScreenSize();
		this.game.state.start("loading");
	}
}