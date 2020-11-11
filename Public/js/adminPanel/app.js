//the main idea is to handle the event listener

let body = document.querySelector('body');
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