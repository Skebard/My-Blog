let modalComment = document.getElementById('modal-comment-sent-id');
let formComment = document.getElementById('add-comment-form-id');

formComment.addEventListener('submit',e=>{
    e.preventDefault();
    //! sent request

    modalComment.classList.remove('hidden');
});

modalComment.addEventListener('click',()=>{
    modalComment.classList.add('hidden');
});