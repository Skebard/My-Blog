
/**
 * The idea is to display X posts and have a bottom that when clicked displays X more posts
 * In order to display the respective page of the post there will be a single event listener
 * for the container of all posts overviews that will check if any of the posts has been 
 * clicked 
 */
//todo CONSTANTS
const POSTS_PER_PAGE = 5;
const POSTS_URL = 'posts/';

//todo HTML elemens
//let loadingHTML = document.getElementById("loading-id");
let postsContainer = document.getElementById("posts-container-id");
//let pagination = document.getElementById("pagination-id");
//let postsOverview = document.getElementById("posts-overview-id");

//todo MAIN code
//let myBlog = new Blog();
//myBlog.displayPosts();
let tInfo = {
    url:"posts/0.php",
    id:1,
    title: "new post title",
    body: "this is the body of the new post"
}


class Blog{
    /**
     * Adds an event to the container of the posts that redirects to the respective post when it is clicked
     */
    #addContainerEvent(){
        this.container.addEventListener('click',(e)=>{ //? Remember that it is working cause arrows functions preserve parent 'this' object
            this.clickableElements.forEach((post)=>{
                post.clickable.forEach((el)=>{
                    if(el===e.target){
                        //open post;            //! WAITING BACKEND
                        console.log(post.id);
                        window.open("../about","_self");
                    }
                })
            });
        });
    }
    constructor(container){
        this.container = container;
        this.hello = 0;
        this.offset = 0;
        this.clickableElements = [];    //array of objects with clickable elements and its respective post Id
        this.#addContainerEvent();
    }


    addPost(postInfo){
        let postSummary = document.createElement("li");
        postSummary.classList.add("post-summary");
        let imgPost = document.createElement("img");
        imgPost.src = "https://picsum.photos/650/500?t"+postInfo.id;
        let post = document.createElement("div");
        post.classList.add("post");
        let postTitle = document.createElement("h2");
        postTitle.classList.add("post-title");
        postTitle.textContent = postInfo.title;
        let postBody = document.createElement("div");
        postBody.classList.add("post-body");
        let postBodyText = document.createElement("p");
        postBodyText.classList.add("fade");
        postBodyText.textContent = postInfo.body;
        let postBodyReadMore = document.createElement("a");
        postBodyReadMore.textContent = "Read More >>";
        postBody.append(postBodyText,postBodyReadMore);
        post.append(postTitle,postBody);
        postSummary.append(imgPost,post);
        this.container.appendChild(postSummary);
        this.clickableElements.push( {
            url:postInfo.url,
            id:postInfo.id,
            clickable:[imgPost,postTitle,postBodyReadMore]
        });
    }
    //displays more posts
    loadMore(){
        
    }

}


function getNewPosts(offset){
    let url = POSTS_URL +"?offset="+offset+"&limit="+POSTS_PER_PAGE;
    fetch(url)
    .then(resp=>resp.json())
    .then(data=>console.log(data));

}

let myBlog = new Blog(postsContainer);


function Bloga(){


    function appendFirstPost(postInfor){

    }

    // Returns the clickable elements to display the entire post
    function addPost(postInfo,container){
        //console.log(postInfo);
        let postSummary = document.createElement("li");
        postSummary.classList.add("post-summary");
        let imgPost = document.createElement("img");
        imgPost.src = "https://picsum.photos/650/500?t"+postInfo.id;
        let post = document.createElement("div");
        post.classList.add("post");
        let postTitle = document.createElement("h2");
        postTitle.classList.add("post-title");
        postTitle.textContent = postInfo.title;
        let postBody = document.createElement("div");
        postBody.classList.add("post-body");
        let postBodyText = document.createElement("p");
        postBodyText.classList.add("fade");
        postBodyText.textContent = postInfo.body;
        let postBodyReadMore = document.createElement("a");
        postBodyReadMore.textContent = "Read More >>";
        postBody.append(postBodyText,postBodyReadMore);
        post.append(postTitle,postBody);
        postSummary.append(imgPost,post);
        container.appendChild(postSummary);
        return [imgPost,postTitle,postBodyReadMore];
    }



    this.posts = [];
    /**
     * Displays the title and a part of the posts' body.
     * Also adds an event listener to open the clicked post in another page
     */
    this.displayPosts =  async function(){
        displayLoading();
        let posts = await getPosts();
        hideLoading();
        //check for errors
        if(posts===false){
            console.log("try again");
            return false;
        }
        console.log(posts);
        //check deleted local Storage
        //check edited local Storage

        appendFirstPost(posts.shift());
        let postsPages = [];
        let pages = Math.ceil(posts.length/POSTS_PER_PAGE);
        for(let i=0; i<pages; i++){
            let postPage = document.createElement("ul");
            postPage.classList.add("posts-page");
            if(i!==0){
                postPage.classList.add("hidden");
                addButtonPagination(i+1,postPage);
            }else{
                addButtonPagination(i+1,postPage,true);
            }
            postsPages.push(postPage);
        }
        console.log(postsPages);
        let pageIndex = -1; // stats and -1 because firstly 0%POSTS_PER_PAGE will be 0
        let clickableElements = []; // contains all the clickable elements that can display a post
        let createdPosts =[]; //array with all posts's index (position in the array) ordered as the clickableElements

        //create pages that will contains the posts' overview
        //!Discussion for myself:
        //Wouldn't be better to create the pages when the page is oppend?
        //We are downloading all the pages and maybe the user will only display a few of them
        
        posts.forEach((post,index)=>{
            if(index%POSTS_PER_PAGE === 0){
                pageIndex++;
            }
            clickableElements.push(...addPost(post,postsPages[pageIndex]));
            postsContainer.appendChild(postsPages[pageIndex]);
        });
        console.log(clickableElements);


        postsContainer.addEventListener("click",(event)=>{
            let position = clickableElements.indexOf(event.target);
            if(position!==-1 && !createdPosts.includes(position)){
                console.log(event.target);
                let postIndex = parseInt(position/3); // for every 3 clickableElements (image, title, readMore) there is one ID
                createdPosts.push(postIndex);
                console.log(createdPosts);
                //displayPOST
                console.log("\nDATA\n")
                console.log("\n **********************\n");
                console.log(posts[postIndex]);
                let pressedPost = posts[postIndex];
                let newPost = new Post(pressedPost.userId,pressedPost.id,pressedPost.title,pressedPost.body);
                this.posts.push(newPost);
                newPost.displayPost();

            }
        });
    }
}


//returns a promise with an array of all the available posts
function getPosts(){
    let requestURL = ROOT_URL + "posts";
    return fetch(requestURL)
    .then((response)=>{
        if(!response.ok){
            throw new Error (response.status);
        }
        return response.json()})
    .catch((error)=> {
        console.log("The error "+error+" ocurred");
        return false;
    });
}


//return an array with the indicated posts
/*example
{
    offset: //offset id
    limit:  //max number of posts
    count: //received posts
    results:[
        {
            id:
            title:
            contentPreview:
            image:
        },{

        }
    ]
}
if count < limit , then we have arrived to the end
when requesting posts outside of the API scope then
we will get count:0


*/
function getPosts(offset,limit){

}



//Displays the loading animation
function displayLoading(){
    loadingHTML.classList.remove("hidden");
}
function hideLoading(){
    loadingHTML.classList.add("hidden");
}




