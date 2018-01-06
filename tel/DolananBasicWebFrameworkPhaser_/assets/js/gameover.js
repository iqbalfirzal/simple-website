var gameover = function(game){
	//console.log berfungsi untuk mengetahui file sudah tereksekusi atau belum
	console.log("%cGameover","color:black; background:white;");
}
gameover.prototype = {
	create:function(){
		this.game.stage.backgroundColor="#97c5c7";
		this.icon = this.add.sprite(700,200,"img_over");
		this.icon.anchor.setTo(0.5,0.5);
		var tombol = this.game.add.button(this.game.width/2,400,'img_tombolmainlagi',this.mainlagi,this);
		tombol.anchor.setTo(0.5,0.5);
	},
	mainlagi:function(){
		this.game.state.start("main");
	}
}