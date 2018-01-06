var finish = function(game){
 console.log("%cFinish", "color:white; background:green");
}

finish.prototype = {
 create: function(){
  this.over = this.game.add.audio('audio_finish');
  this.over.play();

  // BACKGROUND
  this.background = this.game.add.tileSprite(0, 0, 1365, 650, "background");
  this.background.autoScroll(-90,0);

  this.icon = this.add.sprite(700,80,"img_finish");
  this.icon.anchor.setTo(0.5,0.5);

  this.over = this.game.add.text(this.game.width/2, 150, 'SELAMAT, ANDA MENYELESAIKAN PERMAINAN INI!!!', { font:'20px Arial',fill: '#000' });
  this.over.anchor.setTo(0.5,0.5);
  this.game.add.tween(this.over).to({y:200}, 1000, Phaser.Easing.Linier, true, 0, 150, true);

  var tombol =
  this.game.add.button(this.game.width/2,400,"img_tombolmainlagi",this.mainlagi,this);
  tombol.anchor.setTo(0.5,0.5);
  if(localStorage.score>localStorage.highScore) { 
         this.ghg = this.game.add.text(this.game.width/2, 250, 'SELAMAT, ANDA MENDAPAT SKOR TERTINGGI', { font:'46px Arial',fill: '#111' });
   		 this.ghg.anchor.setTo(0.5,0.5);
         localStorage.highScore = localStorage.score;
         localStorage.nama = prompt("Masukan Nama Anda : ");
     }
  this.SCOREAkhir = this.game.add.text(this.game.width/2, 350, 'Skor Anda : '+
  localStorage.score, { fill: '#ffffff' });
  this.SCOREAkhir.anchor.setTo(0.5,0.5);
  this.SCOREAkhir = this.game.add.text(this.game.width/2, 475, 'Skor Tertinggi : '+ localStorage.highScore + ' ('+localStorage.nama+')', { fill: '#ffffff' });
  this.SCOREAkhir.anchor.setTo(0.5,0.5);

 },
 mainlagi: function(){
  this.game.state.start("main");
 } 
} 