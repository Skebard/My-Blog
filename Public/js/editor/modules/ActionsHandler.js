export default class ActionsHandler{
    //this class is in charge for saving, publishing and cancel

    //Sent all the data to server and get response
    save(){
        //data should be saved in the database, but without creating any file

    }

    //sent all the data to server and get response
    publish(){
        //when publishing a post, a .php file with the name of the post will be created

    }

    withdaw(){

    }

    //go back to the main page
    cancel(){

    }
    async action(action,title,authorUsername,contents){
        let formData = new FormData;
        formData.append('action',action)
        formData.append('title',title);
        formData.append('author-username',authorUsername);
        formData.append('contents',JSON.stringify(contents));
        let data = await fetch('../Private/posts.php',{
            method: 'post',
            body: formData
        }).then(resp=>resp.text());
        console.log(data);



    }

}