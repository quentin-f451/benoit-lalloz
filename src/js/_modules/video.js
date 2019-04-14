import siblings from 'siblings';

const Video = {
    init: () => {
        Video.players = document.querySelectorAll('.js-player');
        Video.players.forEach(player => {
            var videoPlayer = player.previousElementSibling.querySelector('.js-videoPlayer');
            var imageLayer = player.previousElementSibling.previousElementSibling;
            var playButton = player.querySelector('.js-playVideo');
            var soundButton = player.querySelector('.js-soundVideo');
            playButton.addEventListener('click', function(){ Video.play(this, videoPlayer, imageLayer); })
            soundButton.addEventListener('click', function(){ Video.sound(this, videoPlayer); })
        });
    }, 
    play: (buttons, iframe, thumbs, played) => {
        var player = new Vimeo.Player(iframe);
        thumbs.classList.toggle('grid__image--hidden');
        thumbs.nextElementSibling.classList.toggle('grid__video--over');
        player.getPaused().then(function(paused) {
            paused ? player.play() : player.pause();
        })
        Array.from(siblings(buttons)).forEach(el => {el.classList.toggle('player__element--hidden')})
        Array.from(buttons.children).forEach(button => {button.classList.toggle('button--hidden')})
    }, 
    sound: (buttons, iframe) => {
        var player = new Vimeo.Player(iframe);
        player.getVolume().then(function(volume) {
            volume > 0 ? player.setVolume(0) : player.setVolume(1);
        })
        Array.from(buttons.children).forEach(button => {button.classList.toggle('button--hidden')})
    }
};

export default Video;