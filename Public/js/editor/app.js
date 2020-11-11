//*** IMPORT MODULES */
import Box from './modules/box.js';
import ModificatorsHandler from './modules/modificatorHandler.js';
import TagsHandler from './modules/tagsHandler.js';
import ActionsHandler from './modules/ActionsHandler.js';


//** TEST **/
let ah = new ActionsHandler;
let content1 = {
    'type': 'text',
    'content': 'to start with this project you should',
    'position': '1'
};
let content2 = {
    'type': 'subtitle',
    'content': 'Example',
    'position': '2'
};
let content3 = {
    'type': 'code',
    'content': 'some amazing JS',
    'position': '3'
};
let contents = [content1,content2,content3];

ah.action('create', 'hello is the latest published post', 'Skebard', contents);





//*** DATA ***/
let availableContentTypes = ['subtitle', 'subtitle2', 'text', 'image', 'code'];
let availableModificators = ['link', 'bold', 'cursive'];
let availableModificators2 = [{
    name: 'link',
    tag: 'a',
    style: ''
}, {
    name: 'bold',
    tag: 'b',
    style: ''
}, {
    name: 'cursive',
    tag: 'i',
    style: ''
}];
let categoryTags = ['CSS', 'Javascript', "PHP", 'JQuery', 'bootstrap', 'MySql', 'HTTP', 'Random'];
let selectedTagsContainer = document.getElementById("category-tags-id");
let selectTagBtn = document.getElementById('btn-add-tag-id');

let boxes = [];

//*** HTML elements ****/
let postContent = document.getElementById("post-wrapper");
let contentOptionsWrapper = document.getElementById('content-options-id');
let saveBtn = document.getElementById('btn-save-id');
let publishBtn = document.getElementById('btn-publish-id');
let cancelBtn = document.getElementById('btn-cancel-id');
let title = document.getElementById('title-id');
let mainImgUrl = document.getElementById('main-image-id');


//get

//Get category tags






Box.initialize(postContent, availableContentTypes);
let tagHandler;
(async function(){
    categoryTags = await ah.getCategories();
    tagHandler = new TagsHandler(categoryTags, selectedTagsContainer, selectTagBtn);
    getPost();
})();

//*** EVENT LISTENERS ***//




//Create selectable tags and add event listeners to add boxes
availableContentTypes.forEach(conType => {
    let li = document.createElement('li');
    li.textContent = conType;
    contentOptionsWrapper.appendChild(li);
    li.addEventListener('click', e => {

        let box = new Box(conType);
        console.log(Box.getBoxes());
    });
});

let modHandler = new ModificatorsHandler(availableModificators2);

availableModificators2.forEach(mod => {
    let li = document.createElement('li');
    li.textContent = mod.name;
    contentOptionsWrapper.appendChild(li);
    //we must use the mousedown event that destroys the selected text
    //after the event is handled. click event will not work
    li.addEventListener('mousedown', e => {
        let text = window.getSelection();
        console.log("DATA text");
        console.log(text);
        e.preventDefault();
        console.log('Styling: ')
        console.log(mod.name);
        modHandler.setTagToSelectedText(mod.name);
    })
});


saveBtn.addEventListener('click',e=>{
    let mainCategory = tagHandler.mainTag!=undefined?tagHandler.mainTag:false;
    let categories = tagHandler.selectedTags.length>0?tagHandler.selectedTags:false;
    let contents = [];
    // type content
    Box.getBoxes().forEach(box=>{
        contents.push({
            type: box.type,
            content: box.box.querySelector('.box-content').innerHTML,
            pos: box.pos
        });
    });
    console.log(tagHandler.mainTag);
    ah.save(title.textContent,mainCategory,categories,contents)
});



//*** end event listeners ***/


//*** lOAD POST ***/


async function getPost(){
    let postTitle = window.location.href.split('?title=');
    if(postTitle.length===2){
        postTitle = postTitle[1];
    }else{
        window.location.replace('adminPanel.php','_self');
    }
    let resp = await fetch('posts/newData.php?title='+postTitle);
    let data = await resp.json();

    //set title 
    
    title.textContent = data.postInfo.title;
    mainImgUrl.textContent = data.postInfo.mainImage;
    tagHandler.selectedTags.push(data.mainCategory);
    tagHandler.addSelectedHTMLtag(data.mainCategory);
    tagHandler.mainCategory = data.mainCategory;
    tagHandler.selectedTags.push(...data.categories);
    data.categories.forEach(category=>{
        tagHandler.addSelectedHTMLtag(category);
    });
    let postContents = data.postContents.sort((a,b)=>a.position-b.position);
    postContents.forEach(section=>{
        let a = new Box(section.type);
        a.boxContentElement.textContent = section.content;
    })


    console.log(data);
}


window['createBoxes'] = function (x) {
    for (let i = 0; i < x; i++) {
        let a = new Box('text ' + i);
    }
};
window['createBox'] = function (x){
    return new Box('text');
}