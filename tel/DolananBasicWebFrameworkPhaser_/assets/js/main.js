var main = function(game){
	//console.log berfungsi untuk mengetahui file sudah tereksekusi atau belum
	console.log("%cMain","color:red; background:white;");
}
main.prototype = {
	create:function(){
		//menambah background
		this.bg = this.game.add.tileSprite(0,0,1348,650,'background');
		this.bg.autoScroll(0,0);
		//setting agar backgound mengikuti kamera
		this.bg.fixedToCamera = true;
		//mengaktifkan fungsi game
		this.game.physics.startSystem(Phaser.Physics.ARCADE);
		//menamnbah audio kedalam game
		this.audio_main=this.game.add.audio('audio_main');
		this.audio_main.play();//memainkan audio

		//menambah map game
		this.map = this.game.add.tilemap('mapdinacom');
		//source map game
		this.map.addTilesetImage('obj1');
		this.map.addTilesetImage('tanah');
		this.map.setCollisionByExclusion([]);
		//menambah layer map
		this.layer = this.map.createLayer('Adventure Dinacom');
		//tambah layer agar sesuai canvas
		this.layer.resizeWorld();
		//menambahkan layer dan atributnya
		this.player = this.game.add.sprite(32,1800,'player');
		this.game.physics.enable(this.player,Phaser.Physics.ARCADE);
		this.player.body.bounce.y = 0.2; //pantulan player
		this.player.checkWorldBounds = true; //mengecek player keluar dar canvas atau tidak
		this.player.events.onOutOfBounds.add(this.gameover,this);
		this.player.body.setSize(25,35,5,10);
		this.player.body.gravity.y=350;
		this.player.animations.add('left',[0,1,2,3],10,true);
		this.player.animations.add('turn',[4],20,true);
		this.player.animations.add('right',[5,6,7,8],10,true);
		this.game.camera.follow(this.player);

		//deklarasi variable
		this.score = 0;
		this.facing = 'right';
		this.jumpTimer = 0;
		this.bosshot = 0;
    	this.bosjump = 0;

		//membuat control game
		this.cursor = this.game.input.keyboard.createCursorKeys();
		this.jump = this.game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);
		this.jump_second_button = this.game.input.keyboard.addKey(Phaser.Keyboard.UP);
		this.audio_loncat = this.game.add.audio('audio_jump');

		//mendevinisi karakter selain player
		this.prince = this.game.add.sprite(2075, 1836, 'prince');
		this.bos    = this.game.add.sprite(2130,1741,'boss');
		this.enemies = this.game.add.sprite(809,1685,'virus');
		this.enemiess = this.game.add.sprite(1453,1770,'virus2');		
		this.game.physics.enable(this.bos, Phaser.Physics.ARCADE);
    	this.game.physics.enable(this.prince, Phaser.Physics.ARCADE);
		this.physics.enable(this.enemies,Phaser.ARCADE);
		this.physics.enable(this.enemiess,Phaser.ARCADE);
		//koin plus atribut
    	this.star1 = this.game.add.sprite(495.50,1773,'smallcoin');
    	this.star1.enableBody = true;
    	this.game.physics.arcade.enable(this.star1,Phaser.Physics.ARCADE);
    	this.star1.body. gravity. y=0;
    	this.star2 = this.game.add.sprite(809,1685,'smallcoin');
    	this.star2.enableBody = true;
  	 	this.game.physics.arcade.enable(this.star2,Phaser.Physics.ARCADE);
  	 	this.star2.body. gravity. y=0;
	    this.star3 = this.game.add.sprite(1150,1780,'smallcoin');
	    this.star3.enableBody = true;
	    this.game.physics.arcade.enable(this.star3,Phaser.Physics.ARCADE);
	    this.star3.body. gravity. y=0;
	    this.star4 = this.game.add.sprite(1453,1770,'smallcoin');
	    this.star4.enableBody = true;
	    this.game.physics.arcade.enable(this.star4,Phaser.Physics.ARCADE); 
    	this.star4.body. gravity. y=0;
    	this.bigstar1 = this.game.add.sprite(1695,1549,'bigcoin');
    	this.bigstar1.enableBody = true;
    	this.game.physics.arcade.enable(this.bigstar1,Phaser.Physics.ARCADE);
    	this.bigstar1.body.gravity. y=0;
    	
		//atribut bosshot
    	this.bos.body.gravity. y=300; 
    	this.shots = this.game.add.group();
    	this.shots.enableBody = true;
    	this.shots.physicsBodyType = Phaser.Physics.ARCADE;

    	//tembok
    	this.tbenemies = this.game.add.tileSprite(0,0,348,650,'tembokchina');
    	this.physics.enable(this.tbenemies,Phaser.ARCADE);

    	//skor plus atribut
    	this.tulisanscore = this.game.add.text(16, 16, 'Skor : '+ this.score, { fill: '#ffffff' });
    	this.tulisanscore.fixedToCamera = true;
    	this.tulisanscore.cameraOffset.x = 10;
    	this.tulisanscore.cameraOffset.y = 20;

		//atribut musuh1
		this.enemiess.body.collideWorldBounds = true;
		this.enemiess.body.moves = true;
		this.enemiess.body.gravity.y=250;
		this.enemiess.body.gravity.x=100;
		//atribut musuh2
		this.enemies.body.collideWorldBounds = true;
		this.enemiess.body.moves = true;
		this.enemies.body.gravity.y=500;
		this.enemies.body.gravity.x=100;
		//atribut tembok musuh
		this.tbenemies.body.collideWorldBounds = true;
		this.tbenemies.body.moves = true;
		this.tbenemies.body.gravity.y=80;
		this.tbenemies.body.gravity.x=3;
		this.tbenemies.body.bounce.y = 0.2;

		this.over = this.game.add.audio('audio_gameover');
		this.kurangi = this.game.add.audio('audio_kurang');
		this.coin = this.game.add.audio('audio_coin');
	},
	update:function(){
		this.game.physics.arcade.collide(this.player,this.layer);
		this.player.body.velocity.x=0;
		//kondisi kontrol
		if (this.cursor.left.isDown){
			this.player.body.velocity.x = -150;
			if (this.facing !='left'){
				this.player.animations.play('left');
				this.facing = 'left';
				}
			}else if (this.cursor.right.isDown){
				this.player.body.velocity.x = 150;
				if (this.facing !='right'){
					this.player.animations.play('right');
					this.facing = 'right';
				}
			}else{
				if (this.facing !='iddle'){
					this.player.animations.stop();
					if (this.facing=='left'){
						this.player.frame = 0;
					}else{
						this.player.frame = 5;
					}
					this.facing = 'iddle';
				}
			}
	//kondisi lompat
	if (this.jump.isDown && this.player.body.onFloor()&&this.game.time.now > this.jumpTimer){
		this.player.body.velocity.y = -250;
		this.jumpTimer = this.game.time.now + 750;
		this.audio_loncat.play();
		}
	if (this.jump_second_button.isDown && this.player.body.onFloor()&&this.game.time.now > this.jumpTimer){
		this.player.body.velocity.y = -250;
		this.jumpTimer = this.game.time.now + 750;
		this.audio_loncat.play();
		}
		//efek player saat mengenai karakter lain
		this.game.physics.arcade.collide(this.player, this.prince,this.finish,null,this);
		this.game.physics.arcade.collide(this.player, this.shots,this.gameover,null,this);
		this.game.physics.arcade.collide(this.player, this.bos,this.gameover,null,this);
        this.game.physics.arcade.overlap(this.player, this.star1, this.tambah, null, this); 
        this.game.physics.arcade.overlap(this.player, this.star2, this.tambah, null, this); 
        this.game.physics.arcade.overlap(this.player, this.star3, this.tambah, null, this); 
        this.game.physics.arcade.overlap(this.player, this.star4, this.tambahbanyaksekali, null, this); 
        this.game.physics.arcade.overlap(this.player, this.bigstar1, this.tambah, null, this); 
		this.game.physics.arcade.collide(this.player, this.enemies,this.kurang,null,this);
		this.game.physics.arcade.collide(this.player, this.enemiess,this.gameover,null,this);
		this.game.physics.arcade.collide(this.player, this.tbenemies,this.gameover,null,this);
		this.game.physics.arcade.collide(this.enemiess,this.layer,this.mondarmandir2,null,this);
		this.game.physics.arcade.collide(this.enemies,this.layer,this.mondarmandir,null,this);

		//skor
		this.tulisanscore.text = 'Skor : ' + this.score;

		//perintah tembak
		if(this.game.time.now > this.bosshot){
            this.shot    = this.shots.create(this.bos.x,this.bos.y,'shot');
            this.shot.body.velocity.x = -100;
            this.bosshot = this.game.time.now + 2000;
        }

	},
	mondarmandir:function(a,b){
		if(a.body.blocked.right){
			a.body.velocity.x=-200;
		}else if(a.body.blocked.left){
			a.body.velocity.x=200;
		}else if(a.body.touching.right){
			a.body.velocity.x=-400;
		}else if(a.body.touching.left){
			a.body.velocity.x=400;
		}
	},
	mondarmandir2:function(a,b){
		if(a.body.blocked.right){
			a.body.velocity.x=-95;
		}else if(a.body.blocked.left){
			a.body.velocity.x=95;
		}else if(a.body.touching.right){
			a.body.velocity.x=-295;
		}else if(a.body.touching.left){
			a.body.velocity.x=295;
		}
	},
    finish:function(){
        this.score+=100;
        if (this.game.device.localStorage) {
            localStorage.score = this.score;
        }
        this.game.state.start('finish');
    },
    tambah:function(obj1,obj2){ 
        this.coin.play();
        if(obj2 == this.bigstar1){
            this.score+=33;    
        } else {
            this.score+=21;
        }
        obj2.kill();
    },
    tambahbanyaksekali:function(obj1,obj2){ 
        this.coin.play();
        if(obj2 == this.bigstar1){
            this.score+=167;    
        } else {
            this.score+=145;
        }
        obj2.kill();
    },
    kurang:function(){
        this.score-=6;
        if (this.game.device.localStorage) {
            localStorage.score = this.score;
        }
        this.kurangi.play();
	},
	gameover:function(){
		this.audio_main.stop();
		this.over.play();
		this.game.state.start('gameover');
	}
}