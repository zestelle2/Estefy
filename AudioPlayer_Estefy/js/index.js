//like & shuffle button
$('.heart').click(function () {
	$(this).toggleClass('clicked');
});

$('.shuffle').click(function () {
	$(this).toggleClass('clicked');
});

//show info box on hover
$('#player').hover(function () {
	$('.info').toggleClass('up');
});

// mes variables
var mytrack = document.getElementsByTagName("source"); // ma chanson actuelle
var muteButton = document.getElementsByClassName("volume"); // bouton muet


var duration = document.getElementById("time-total");
var currentTime = document.getElementById("time-current");


var progressBar = document.querySelector(".fill"); //barre de progression
var percent = 0;

setTimeout(function () {

	var minutes = parseInt(audio.duration / 60);
	var seconds = parseInt(audio.duration % 60);
	duration.innerHTML = minutes + ':' + seconds;
	
	console.log(audio.duration, duration, minutes, seconds)
	
},200);



progressBar.addEventListener("click", function (event) {
	//change le width du css
	//event.target.style.width=
});

// bar de progression en fonction 
audio.addEventListener('timeupdate', function () {
	percent = Math.floor((100 / this.duration) * this.currentTime);
	progressBar.style.width = percent + '%';
});

// initialize playlist and controls     
var index = 0,
	playing = false,
	tracks = []

$('.pause').hide(); //hide pause button until clicked

//play button
$('.play').click(function () {
	audio.play();
	$('.play').hide();
	$('.pause').show();
});

$('.muted').click(function() {	
	if (audio.muted == false) {
		audio.muted=true;
		var muted = document.querySelector(".volume");
		muted.style.color="rgb(220,20,60)";
		audio.muted();	
	} else {
		audio.muted=false;
		var muted = document.querySelector(".volume");
		muted.style.color="#8BA989";
		audio.muted();	
	}
});


//pause button
$('.pause').click(function () {
	audio.pause();
	$('.play').show();
	$('.pause').hide();
});

//progress bar


// next button
