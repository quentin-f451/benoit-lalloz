const Video = {
    init: () => {
        Video.players = document.querySelectorAll('.js-player');
        Video.players.forEach(player => {
            var videoPlayer = player.previousElementSibling.querySelector('.js-videoPlayer');
            var imageLayer = player.previousElementSibling.querySelector('.js-thumb');
            var playButton = player.querySelector('.js-playVideo');
            playButton.addEventListener('click', function(){ Video.play(this, videoPlayer, imageLayer); })
        });
    }, 
    play: (buttons, player, thumbs) => {
        thumbs.classList.toggle('grid__image--hidden');
        player.paused ? player.play() : player.pause();
        Array.from(buttons.children).forEach(button => {button.classList.toggle('button--hidden')})
    }
};

export default Video;