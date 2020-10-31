//*** IMPORT MODULES */
import Box from './modules/box.js';
import ModificatorsHandler from './modules/modificatorHandler.js';
import TagsHandler from './modules/tagsHandler.js';

//*** DATA ***/
let availableContentTypes = ['subtitle','subtitle2', 'text', 'image', 'code'];
let availableModificators = ['link', 'bold', 'cursive'];
let availableModificators2 = [{
    name:'link',
    tag:'a',
    style:''
}, {
    name:'bold',
    tag:'b',
    style:''
},{
    name:'cursive',
    tag:'i',
    style:''
}];
let categoryTags = ['CSS','Javascript',"PHP",'JQuery','bootstrap','MySql','HTTP','Random'];
let selectedTagsContainer = document.getElementById("category-tags-id");
let selectTagBtn = document.getElementById('btn-add-tag-id');

let boxes = [];

//*** HTML elements ****/
let postContent = document.getElementById("post-wrapper");
let contentOptionsWrapper = document.getElementById('content-options-id');

Box.initialize(postContent,availableContentTypes);


let tagHandler =new TagsHandler(categoryTags,selectedTagsContainer,selectTagBtn);
//*** EVENT LISTENERS ***//




//Create selectable tags and add event listeners to add boxes
availableContentTypes.forEach(conType => {
    let li = document.createElement('li');
    li.textContent = conType;
    contentOptionsWrapper.appendChild(li);
    li.addEventListener('click', e => {

        let box = new Box(conType);
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


//*** end event listeners ***/


window['createBoxes'] = function (x) {
    for (let i = 0; i < x; i++) {
        let a = new Box('text ' + i);
    }
};