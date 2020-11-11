export default class ActionsHandler{
    //this class is in charge for saving, publishing and cancel

    //Sent all the data to server and get response
    save(title,mainCategory,categories,contents){
        let data = {
            title:title,
            mainCategory: mainCategory,
            categories: JSON.stringify(categories),
            contents: JSON.stringify(contents)
        }
        this.action('save',data);
    }

    //sent all the data to server and get response
    publish(){

    }

    withdaw(){

    }

  
    cancel(){

    }
    async action(action,data){
        let formData = new FormData;
        Object.entries(data).forEach(entrie=>{
            formData.append(entrie[0],entrie[1]);
        });
        formData.append('action',action)

        let dataServ = await fetch('../Private/editPost.php',{
            method: 'post',
            body: formData
        }).then(resp=>resp.text());
        console.log(dataServ);

    }

    async getCategories(){
        let resp = await fetch("../blog/posts/newData.php?categories");
        let data = await  resp.json();
        return data;
    }

}