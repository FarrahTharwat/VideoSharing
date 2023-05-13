<<<<<<< Updated upstream
var video = document.getElementById("my-video");
var playButton = document.getElementById("play-pause-button");
var progressBar = document.getElementById("progress-bar");
var muteButton = document.getElementById("mute-button");
var volumeBar = document.getElementById("volume-bar");
var currentTime = document.getElementById("current-time");
var duration = document.getElementById("duration");
var fullscreenButton = document.getElementById("fullscreen-button");
var video = document.getElementById("my-video");
var qualitySelect = document.getElementById("quality-select");
console.log("wowowowowowowow ya3m please work ");
function togglePlay() {
    if (video.paused) {
        video.play();
        playButton = "fas fa-play-circle;";
    } else {
        video.pause();
        playButton = "fas fa-pause-circle;";
    }
}

function updateProgressBar() {
    var percent = (video.currentTime / video.duration) * 100;
    progressBar.value = percent;
    currentTime.textContent = formatTime(video.currentTime);
}

function toggleMute() {
    if (video.muted) {
        video.muted = false;
        muteButton.textContent = "Mute";
        volumeBar.value = video.volume * 100;
    } else {
        video.muted = true;
        muteButton.textContent = "Unmute";
        volumeBar.value = 0;
    }
}

function updateVolume() {
    video.volume = volumeBar.value / 100;
    if (video.volume === 0) {
        toggleMute();
    } else if (video.muted) {
        toggleMute();
    }
}

function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time % 60);
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    return minutes + ":" + seconds;
}

function updateFullscreenButton() {
    if (document.fullscreenElement) {
        fullscreenButton.textContent = "Exit Fullscreen";
    } else {
        fullscreenButton.textContent = "Fullscreen";
    }
}

function toggleFullscreen() {
    if (document.fullscreenElement) {
        document.exitFullscreen();
    } else {
        video.requestFullscreen();
    }
}

playButton.addEventListener("click", togglePlay);
video.addEventListener("play", function () {
    playButton.textContent = "Pause";
});
video.addEventListener("pause", function () {
    playButton.textContent = "Play";
});
progressBar.addEventListener("input", function () {
    var time = video.duration * (progressBar.value / 100);
    video.currentTime = time;
});
video.addEventListener("timeupdate", updateProgressBar);
muteButton.addEventListener("click", toggleMute);
volumeBar.addEventListener("input", updateVolume);
video.addEventListener("volumechange", function () {
    if (video.muted) {
        muteButton.textContent = "Unmute";
        volumeBar.value = 0;
    } else {
        muteButton.textContent = "Mute";
        volumeBar.value = video.volume * 100;
    }
});
duration.textContent = formatTime(video.duration);
video.addEventListener("loadedmetadata", function () {
    duration.textContent = formatTime(video.duration);
});
fullscreenButton.addEventListener("click", toggleFullscreen);
document.addEventListener("fullscreenchange", updateFullscreenButton);
console.log("wowwowowo");
qualitySelect.addEventListener("change", function () {
    var quality = this.value;
    var vidSrc = video.src;
    
    switch (quality) {
        case "360p":
            video.src = vidSrc.replace("240","360");
            video.src = vidSrc.replace("144","360");
            console.log(video.src);
            break;
        case "240p":
            video.src = vidSrc.replace("360","240");
            video.src = vidSrc.replace("144","240");
            console.log(video.src);
            break;
        case "144p":
            video.src = vidSrc.replace("240","144");
            video.src = vidSrc.replace("360","144");
            console.log(video.src);
            break;
        default:
            video.src = "video.mp4";
            break;
    }
        

    video.load();
    video.play();
 
=======
var video = document.getElementById("my-video");
var playButton = document.getElementById("play-pause-button");
var progressBar = document.getElementById("progress-bar");
var muteButton = document.getElementById("mute-button");
var volumeBar = document.getElementById("volume-bar");
var currentTime = document.getElementById("current-time");
var duration = document.getElementById("duration");
var fullscreenButton = document.getElementById("fullscreen-button");
var video = document.getElementById("my-video");
var qualitySelect = document.getElementById("quality-select");
console.log(video.src);
function togglePlay() {
    if (video.paused) {
        video.play();
        playButton = "fas fa-play-circle;";
    } else {
        video.pause();
        playButton = "fas fa-pause-circle;";
    }
}

function updateProgressBar() {
    var percent = (video.currentTime / video.duration) * 100;
    progressBar.value = percent;
    currentTime.textContent = formatTime(video.currentTime);
}

function toggleMute() {
    if (video.muted) {
        video.muted = false;
        muteButton.textContent = "Mute";
        volumeBar.value = video.volume * 100;
    } else {
        video.muted = true;
        muteButton.textContent = "Unmute";
        volumeBar.value = 0;
    }
}

function updateVolume() {
    video.volume = volumeBar.value / 100;
    if (video.volume === 0) {
        toggleMute();
    } else if (video.muted) {
        toggleMute();
    }
}

function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time % 60);
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    return minutes + ":" + seconds;
}

function updateFullscreenButton() {
    if (document.fullscreenElement) {
        fullscreenButton.textContent = "Exit Fullscreen";
    } else {
        fullscreenButton.textContent = "Fullscreen";
    }
}

function toggleFullscreen() {
    if (document.fullscreenElement) {
        document.exitFullscreen();
    } else {
        video.requestFullscreen();
    }
}

playButton.addEventListener("click", togglePlay);
video.addEventListener("play", function () {
    playButton.textContent = "Pause";
});
video.addEventListener("pause", function () {
    playButton.textContent = "Play";
});
progressBar.addEventListener("input", function () {
    var time = video.duration * (progressBar.value / 100);
    video.currentTime = time;
});
video.addEventListener("timeupdate", updateProgressBar);
muteButton.addEventListener("click", toggleMute);
volumeBar.addEventListener("input", updateVolume);
video.addEventListener("volumechange", function () {
    if (video.muted) {
        muteButton.textContent = "Unmute";
        volumeBar.value = 0;
    } else {
        muteButton.textContent = "Mute";
        volumeBar.value = video.volume * 100;
    }
});
duration.textContent = formatTime(video.duration);
video.addEventListener("loadedmetadata", function () {
    duration.textContent = formatTime(video.duration);
});
fullscreenButton.addEventListener("click", toggleFullscreen);
document.addEventListener("fullscreenchange", updateFullscreenButton);

qualitySelect.addEventListener("change", function () {
    var quality = this.value;
    var vidSrc = video.src;
    var vidTime = video.currentTime;
    console.log(quality);
    switch (quality) {
        case "360p":
            video.src = vidSrc.replace("240","360");
            video.src = vidSrc.replace("144","360");
            console.log(video.src);
            video.currentTime=vidTime;
            break;
        case "240p":
            video.src = vidSrc.replace("360","240");
            video.src = vidSrc.replace("144","240");
            console.log(video.src);
            video.currentTime=vidTime;
            break;
        case "144p":
            video.src = vidSrc.replace("240","144");
            video.src = vidSrc.replace("360","144");
            console.log(video.src);
            video.currentTime=vidTime;
            break;
        default:
            video.src = "video.mp4";
            break;
    }
    video.currentTime=vidTime;

    video.load();
    video.play();
 
>>>>>>> Stashed changes
});