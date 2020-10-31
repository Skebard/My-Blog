
export default class Box {
    sayhi(){
        console.log('hi');
    }
    static initialize(container,contentTypes){
        Box.prototype.total =0;
        Box.prototype.container = container;
        Box.prototype.colors = ['greenyellow','lightblue','palevioletred','lightgoldenrodyellow','lightsalmon','lightpink','mediumpurple'];
        Box.prototype.types = contentTypes;
        //add colors to the box type
        var style = document.createElement('style');
        var css = "";
        Box.prototype.types.forEach((type,index)=>{
            css += '   .type-'+type+'{background-color:'+ Box.prototype.colors[index] +';}';
            console.log(Box.prototype.colors[index]);
        })
        style.appendChild(document.createTextNode(css));
        document.getElementsByTagName('head')[0].appendChild(style);
    }
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
        type.classList.add("type-"+this.type);
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
        if(this.pos>0){
            console.log(this.pos);
            this.updatePrevSibling();
        }

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
        if (this.pos === this.getLastSibling() && this.pos!== 0) {
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
