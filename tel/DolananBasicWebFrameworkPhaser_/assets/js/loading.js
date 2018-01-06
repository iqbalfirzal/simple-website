var loading = function(game){
	//console.log berfungsi untuk mengetahui file sudah tereksekusi atau belum
	console.log("%cLoading","color:black; background:cyan;");
}
loading.prototype = {
	preload:function(){
		var loading = this.add.sprite(this.game.width/2,this.game.height/2,'img_load');
		loading.anchor.setTo(0.5,0.5);
		this.load.setPreloadSprite(loading);
		this.game.stage.backgroundColor="#97c5c7";
		this.game.load.tilemap('mapdinacom','assets/img/mapdinacom.json',null,Phaser.Tilemap.TILED_JSON);
		this.game.load.spritesheet('player','assets/img/dude1.png',43.5,53);
		this.game.load.image('obj1','assets/img/obj1.png');
		this.game.load.image('tanah','assets/img/tanah.png');
		this.game.load.image('virus','assets/img/virus.png');
		this.game.load.image('virus2','assets/img/virus2.png');
		this.game.load.image('tembokchina','assets/img/tbenemies.png');
		this.game.load.image('bgcover','assets/img/background_cover.png');
		this.game.load.image('cover','assets/img/cover.png');
		this.game.load.image('smallcoin','assets/img/koin.png');
		this.game.load.image('boss','assets/img/boss.png');
		this.game.load.image('shot','assets/img/shot.png');
		this.game.load.image('full','assets/img/full.png');
		this.game.load.image('bigcoin','assets/img/koin1.png');
		this.game.load.image('prince','assets/img/prince.png');
		this.game.load.image('background','assets/img/background.png');
		this.game.load.image('img_title','assets/img/title.png');
		this.game.load.image('img_over','assets/img/gameover.png');
		this.game.load.image('img_finish','assets/img/win.png');
		this.game.load.image('img_tombolstart','assets/img/tombolstart.png');
		this.game.load.image('img_tombolmainlagi','assets/img/playagain.png');
		this.game.load.image('img_icon','assets/img/icon.png');
	
		this.game.load.audio('audio_cover',['assets/sounds/aduar.wav']);
		this.game.load.audio('audio_main',['assets/sounds/play.mp3']);
		this.game.load.audio('audio_coin',['assets/sounds/coin2.wav']);
		this.game.load.audio('audio_jump',['assets/sounds/JumpX.wav']);
		this.game.load.audio('audio_gameover',['assets/sounds/gameover.wav']);
		this.game.load.audio('audio_kurang',['assets/sounds/cling.wav']);
		this.game.load.audio('audio_finish',['assets/sounds/win.wav']);
	},
	create:function(){
		this.game.state.start("cover");
	}
}