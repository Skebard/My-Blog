//*** DATA ***/
let availableContentTypes = ['subtitle', 'text', 'image', 'code'];
let availableModificators = ['link', 'bold', 'cursive'];

let boxes = [];

//*** HTML elements ****/
let postContent = document.getElementById("post-wrapper");
let contentOptionsWrapper = document.getElementById('content-options-id');






//Create selectable tags and add event listeners to add boxes
availableContentTypes.forEach(conType => {
    let li = document.createElement('li');
    li.textContent = conType;
    contentOptionsWrapper.appendChild(li);
    li.addEventListener('click', e => {

        let box = new Box(conType);
    });
});

//Create modificators of selected text and add event listeners to modify innerHTML
// availableModificators.forEach(mod => {
//     let li = document.createElement('li');
//     li.textContent = mod;
//     contentOptionsWrapper.appendChild(li);
//     //we must use the mousedown event that destroys the selected text
//     //after the event is handled. click event will not work
//     li.addEventListener('mousedown', e => {
//         let text = window.getSelection();
//         console.log("DATA text");
//         console.log(text);
//         e.preventDefault();
//         console.log('Styling: ')
//         console.log(mod);
//         setTagToSelectedText2(mod);
//     })
// });








function getSelectedText() {
    t = document.getSelection();

    return t;
}

// document.querySelector('body').addEventListener('mouseup', function () {
//     console.log("hi");
//     var selection = getSelectedText();
//     var selection_text = selection.toString();

//     // How do I add a span around the selected text?

//     var span = document.createElement('SPAN');
//     span.style.color = "red";
//     span.textContent = selection_text;

//     var range = selection.getRangeAt(0);
//     console.log(range);
//     range.deleteContents();
//     range.insertNode(span);
// });


async function setTagToSelectedText2(tag) {
    let selection = document.getSelection();
    let selection_text = selection.toString();
    let span = document.createElement('SPAN');
    span.style.color = "red";
    span.textContent = selection_text;
    if(selection_text.length<1){
        return false;
    }
    let range = selection.getRangeAt(0);
    console.log(range);
    let parentElement = range.commonAncestorContainer.parentElement;
    console.log(parentElement);
    //check if the selected text is 'clean' or already has applied some style
    if (parentElement.classList.contains("box-content")) {
        span = await createElementFromTagName(tag,selection_text);
        console.log(span);
        range.deleteContents();
        range.insertNode(span);
    } else {
        //if it has some style then we have to split the parent
        console.log('not here');
    }
}

async function createElementFromTagName(tag,content) {
    let newElement;
    switch (tag) {
        case 'bold':
            newElement = document.createElement('b');
            break;
        case 'cursive':
            newElement = document.createElement('i');
            break;
        case 'link':
            //let link = getLink();
            newElement = document.createElement('a');
            newElement.href = "#";
            getLink();
            break;
        default:
    }
    newElement.textContent = content;
    return newElement;
}

async function getLink(){
    let linkModal = document.querySelector('#link-modal-id');
    linkModal.classList.remove('hidden');

    linkModal.addEventListener('click',function(e){
        console.log(e.target);
        if(e.target.classList.contains('close') || e.target === linkModal){
            linkModal.classList.add('hidden');
        }else if (e.target.id === "btn-add-link"){
            //validate
        }
        

    });
    //1-get link tag
    //2- create pop up window next link tag
    //3-request fill fields startt

}




//set tags for styles ( italics, bold, link)
function getSelectionText(tag) {
    var text = "";
    if (window.getSelection) {
        text = window.getSelection().toString();
    } else if (document.selection && document.selection.type != "Control") {
        text = document.selection.createRange().text;
    }
    return text;
}

function setTagToSelectedText(tag) {
    let text = window.getSelection();
    console.log(text);
    //check if there is nothing selected
    if (text.toString() == "") {
        return false;
    }

    //check that a the selected text is in a box
    let parentNode = text.anchorNode.parentNode;
    if (!parentNode.classList.contains('box-content')) {
        return false;
    }

    //BE CAREFULL
    //if we select from left to right with the mouse then the start of the selected text will be
    // extentOffset and the end offset

    let offset = text.anchorOffset;
    let extentOffset = text.extentOffset;
    //check if the user has made the selection from right to left
    if (offset > extentOffset) {
        console.log("left");
        offset = text.extentOffset;
        extentOffset = text.anchorOffset;
    }


    let fullText = parentNode.innerHTML;
    console.log('off: ' + offset + ' ex: ' + extentOffset);
    let selectedText = fullText.slice(offset, extentOffset);
    let startText = fullText.slice(0, offset);
    let endText = fullText.slice(extentOffset);

    //we want to keep previous tags of the text

    console.log('TEXT: selected,start,end')
    console.log(selectedText);
    console.log(startText);
    console.log(endText);

    //the previous element in the header-box
    //let tag = parentNode.previousSibling.querySelector(".right-container span.content-type").textContent;
    console.log("****************************");
    let newText = startText;
    switch (tag) {
        case 'bold':
            console.log('HERE bold ');
            newText += '<b>' + selectedText + '</b>';
            break;
        case 'cursive':
            console.log('HERE cursive ');
            newText += '<i>' + selectedText + '</i>';
            break;
        case 'link':
            console.log('HERE link ');
            newText += '<a href="#">' + selectedText + '</a>';
            break;
        default:
    }

    newText += endText;
    parentNode.innerHTML = newText;
}


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
    tag:'c',
    style:''
}];





class ModificatorsHandler{
    // modificators is an arry of objects that indicates the named assigned to that modificator
    //and the tag to assign
    constructor(modificators){
        this.modificators = modificators;
        this.modificatorsNames = modificators.map(mod=>mod.name);
        this.modificatorsTags = modificators.map(mod=>mod.tag);
        this.modificatorsSyles = modificators.map(mod=>mod.style);

    }
    setTagToSelectedText(tag){
        console.log('method');
        let selection = document.getSelection();
        let selection_text = selection.toString();
        //check if there is some text selected
        if(selection_text.length<1){
            return false;
        }
        let range = selection.getRangeAt(0);
        let parentElement = range.commonAncestorContainer.parentElement;
        //check if the selected text is 'clean' or already has applied some style
        console.log(parentElement);
        if (parentElement.classList.contains("box-content")) {
            let span = this.createElementFromTagName(tag,selection_text);
            console.log(span);
            range.deleteContents();
            range.insertNode(span);
        } else {
            //if it has some style then we have to split the parent
            console.log('not here');
        }
    }
    createElementFromTagName(name,content){
        let tag;
        for (let index = 0; index < this.modificators.length; index++) {
            if(this.modificatorsNames[index]==name){
                tag = this.modificatorsTags[index];
                break;
            }
        }
        //check if the name exists
        if(tag===undefined){
            return false;
        }

        let newElement = document.createElement(tag);
        newElement.textContent = content;
        return newElement;
    }

}


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




class Box {
    createHTMLbox() {
        let box = document.createElement('div');
        box.classList.add("box");
        let boxHeader = document.createElement('div');
        boxHeader.classList.add("box-header");

        let arrows = document.createElement('span');
        arrows.classList.add("arrows");
        let arrowUp = document.createElement('i');
        arrowUp.className = " fas fa-sort-up";
        let arrowDown = document.createElement('i');
        arrowDown.className = " fas fa-sort-down";
        arrowDown.classList.add("hidden");
        arrows.append(arrowUp, arrowDown);
        arrowUp.addEventListener('click', () => {

            this.moveUp();
            if ((this.pos) <= 0) {
                console.log("add");
                arrowUp.classList.add('hidden');
            }
            arrowDown.classList.remove('hidden');
        });
        arrowDown.addEventListener('click', () => {

            this.moveDown();
            if ((this.pos) >= this.getLastSibling()) {
                console.log(this.pos);
                console.log("add");
                arrowDown.classList.add('hidden');
            }
            arrowUp.classList.remove('hidden');
        });

        let rightContainer = document.createElement("span");
        rightContainer.classList.add('right-container');
        let type = document.createElement('span');
        type.classList.add('content-type');
        type.textContent = this.type;
        let trash = document.createElement('i');
        trash.className = "fas fa-trash-alt";
        trash.addEventListener('click', () => this.delete());
        rightContainer.append(type, trash);
        boxHeader.append(arrows, rightContainer);
        let boxContent = document.createElement('div');
        boxContent.classList.add('box-content');
        boxContent.setAttribute('contenteditable', true);
        box.append(boxHeader, boxContent);
        return box;
    }
    constructor(contentType) {
        this.type = contentType;
        Box.prototype.total++;
        this.box = this.createHTMLbox();
        Box.prototype.container.append(this.box);
        this.updatePos();
        this.updatePrevSibling();

    }

    updatePos() {
        let pos = Array.from(Box.prototype.container.children).indexOf(this.box);
        this.pos = pos;
        return pos;
    }
    getSibling(pos) {
        return Box.prototype.container.children[pos];
    }
    getLastSibling() {
        return Box.prototype.container.children.length - 1;
    }
    updatePrevSibling() {
        if ((this.pos - 1) > 0) {
            this.getSibling(this.pos - 1).querySelector('.fa-sort-up').classList.remove('hidden');
        } else {
            this.getSibling(this.pos - 1).querySelector('.fa-sort-up').classList.add('hidden');
        }
        this.getSibling(this.pos - 1).querySelector('.fa-sort-down').classList.remove('hidden');
    }
    updateNextSibling() {
        if (this.pos + 1 > this.getLastSibling()) {
            return false;
        }
        if ((this.pos + 1) < this.getLastSibling()) {
            this.getSibling(this.pos + 1).querySelector('.fa-sort-down').classList.remove('hidden');
        } else {
            this.getSibling(this.pos + 1).querySelector('.fa-sort-down').classList.add('hidden');
        }
        console.log('show up arrow');
        console.log(this.getSibling(this.pos + 1));
        this.getSibling(this.pos + 1).querySelector('.fa-sort-up').classList.remove('hidden');

    }
    moveDown() {
        this.updatePos();

        let nextPos = this.pos + 1;
        if (nextPos > this.getLastSibling()) {
            return false;
        }
        let nextSibling = this.getSibling(nextPos);
        this.box.remove();
        nextSibling.insertAdjacentElement('afterEnd', this.box);

        this.updatePos();
        this.updatePrevSibling();
    }

    moveUp() {
        this.updatePos();

        let previousPos = this.pos - 1;
        if (previousPos < 0) {
            return false;
        }
        let previousSibling = this.getSibling(previousPos);
        this.box.remove();
        previousSibling.insertAdjacentElement('beforeBegin', this.box);

        this.updatePos();
        this.updateNextSibling();
    }

    delete() {
        this.updatePos();
        if (this.pos === this.getLastSibling()) {
            this.getSibling(this.pos - 1).querySelector('.fa-sort-down').classList.add('hidden');
        }
        if (this.pos === 0) {
            console.log(this.pos);
            console.log('first');
            this.getSibling(0).querySelector('.fa-sort-up').classList.add('hidden');
        }
        this.box.remove();
    }
}

Box.prototype.total = 0;
Box.prototype.container = postContent;


function createBoxes(x) {
    for (let i = 0; i < x; i++) {
        let a = new Box('text ' + i);
    }
}