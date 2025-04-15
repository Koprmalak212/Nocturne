function togglePostMaker() {
    const postContainer = document.getElementsByClassName('post-container')[0];
    const postMaker = document.getElementsByClassName('post_maker')[0];

    if (postContainer && postMaker) {
        postContainer.style.display = 'none';
        postMaker.style.display = 'block';
    }
}

function cancelPostMaker() {
    const postContainer = document.getElementsByClassName('post-container')[0];
    const postMaker = document.getElementsByClassName('post_maker')[0];

    if (postContainer && postMaker) {
        postContainer.style.display = 'block';
        postMaker.style.display = 'none';
    }
}
