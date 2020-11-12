//the main idea is to handle the event listener
import ActionsHandler from '../editor/modules/ActionsHandler.js';

let body = document.querySelector('body');
let createPostBtn = document.getElementById('create-post-btn-id');
let createPostForm = document.getElementById("create-post-form-id");
let modalCreatePost = document.getElementById("modal-create-post-id");
let cancelBtn = document.getElementById('cancel-id');


body.addEventListener('click',e=>{
console.log(e.target);
    let title;
    //check if the row is clicked
    if(e.target.classList.contains('post') ){
        console.log('yes');
        title = e.target.children[0].textContent;
    //check if one column of the row has been clicked
    }else if(e.target.parentElement.classList.contains('post')){
        title = e.target.parentElement.children[0].textContent;
        console.log(e.target);
    }
    if(title!=undefined){
        while(title.indexOf(' ')!=-1){
            title = title.replace(' ','-');
        }
        window.location.href = 'editor.php?title='+title;
    }
});

createPostBtn.addEventListener('click',e=>{
    console.log('hi');
    modalCreatePost.classList.remove('hidden');
});

createPostForm.addEventListener('submit',e=>{
    e.preventDefault();
    let ah = new ActionsHandler;
    console.log('crreate');
    ah.create(e.currentTarget.elements['post-title'].value);
    setTimeout(function(){window.location.reload();},100);
});

cancelBtn.addEventListener('click',e=>{
    console.log('hi');
    modalCreatePost.classList.add('hidden');
});



