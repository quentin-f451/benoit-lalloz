import siblings from 'siblings';

const Video = {
    init: () => {
        Video.players = document.querySelectorAll('.js-player');
        Video.players.forEach(player => {
            var videoPlayer = player.previousElementSibling.querySelector('.js-videoPlayer');
            var imageLayer = player.previousElementSibling.previousElementSibling;
            var playButton = player.querySelector('.js-playVideo');
            playButton.addEventListener('click', function(){ Video.play(this, videoPlayer, imageLayer); })
        });
    }, 
    play: (buttons, iframe, thumbs) => {
        var player = new Vimeo.Player(iframe);
        thumbs.classList.toggle('grid__image--hidden');
        thumbs.nextElementSibling.classList.toggle('grid__video--over');
        player.getPaused().then(function(paused) {
            paused ? player.play() : player.pause();
        })
        buttons.classList.toggle('button--top');
        Array.from(siblings(buttons)).forEach(el => {el.classList.toggle('player__element--hidden')})
        Array.from(buttons.children).forEach(button => {button.classList.toggle('button--hidden')})
    }
};

export default Video;