var cover = function(game){
	//console.log berfungsi untuk mengetahui file sudah tereksekusi atau belum
	console.log("%cCover","color:cyan; background:black;");
}
cover.prototype={
	create:function(){
		//menambah background gambar
		this.background = this.game.add.tileSprite(0,0,1348,650,"bgcover");
		//menggerakkan gambar ke kanan 80px
		this.background.autoScroll(80,0);

		//menambah gambar biasa
		this.game.add.sprite(0,0,"cover");
		this.judul = this.game.add.sprite(700,150,"img_title");
		this.icon = this.add.sprite(900,370,"img_icon");

		//menambah icon gerak
		this.game.add.tween(this.icon).to({y:300},1000,Phaser.Easing.Linier,true,0,100,true);
		this.game.add.tween(this.judul).to({y:100},1000,Phaser.Easing.Linier,true,0,100,true);

		//menambah tombol start
		var tombol = this.game.add.button(this.game.width/2,400,"img_tombolstart",this.mainkan,this);
		tombol.anchor.setTo(0.5,0.5);

		//audio cover
		this.audio_cover = this.game.add.audio('audio_cover');
		this.audio_cover.play();
	},
	mainkan:function(){
		this.audio_cover.stop();
		this.game.state.start("main");
	}
}