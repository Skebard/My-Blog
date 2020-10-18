let postContent = document.getElementById("post-wrapper");

let myPost = new Post(postContent);

function Post(container){
    this.content = [];
    this.title;


    this.newBox = function createBox(contentType){
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
        arrows.append(arrowUp,arrowDown);

        let rightContainer = document.createElement("span");
        rightContainer.classList.add('right-container');
        let type = document.createElement('span');
        type.classList.add('content-type');
        type.textContent = contentType;
        let trash = document.createElement('i');
        trash.className = "fas fa-trash-alt";
        rightContainer.append(type,trash);
        boxHeader.append(arrows,rightContainer);
    
        let boxContent = document.createElement('div');
        boxContent.classList.add('box-content');
        boxContent.setAttribute('contenteditable',true);
        box.append(boxHeader,boxContent);
        container.append(box);

        return box;
    }
    //create a visual square where the user can write his/her subtitle
    this.insertSubtitle = function(){
        
    }
    this.insertText = function(text){

    }

    this.insertLink = function(text){}
    this.insertImage = function(){}
    this.insertCode = function(text){}

}