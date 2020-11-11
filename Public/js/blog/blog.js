
/**
 * The idea is to display X posts and have a bottom that when clicked displays X more posts
 * In order to display the respective page of the post there will be a single event listener
 * for the container of all posts overviews that will check if any of the posts has been 
 * clicked 
 */
//todo CONSTANTS
const POSTS_PER_PAGE = 5;
const POSTS_URL = 'posts/newData.php';

//todo HTML elemens
//let loadingHTML = document.getElementById("loading-id");
let postsContainer = document.querySelector("#posts-container-id .posts-page");
let categoriesContainer = document.querySelector("#posts-overview-id > .categories-tags");
let loadMoreBtn = document.getElementById('load-more-btn-id');
//let pagination = document.getElementById("pagination-id");
//let postsOverview = document.getElementById("posts-overview-id");

//todo MAIN code
//let myBlog = new Blog();
//myBlog.displayPosts();
let tInfo = {
    url:"posts/0.php",
    id:1,
    title: "new post title",
    body: "this is the body of the new post",
    author: "Antonio Jorda",
    authorLink:"url",
    date: "ocasdfadf",
    image:'url'
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
                        console.log(post.url);
                        window.open(post.url,"_self");
                    }
                })
            });
        });
    }
    constructor(container,categoriesContainer){
        this.category = "All";
        this.categoriesContainer = categoriesContainer;
        this.container = container;
        this.hello = 0;
        this.offset = 0;
        this.clickableElements = [];    //array of objects with clickable elements and its respective post Id
        this.#addContainerEvent();
    }


    addPost(postInfo){
        let postSummary = document.createElement("li");
        postSummary.classList.add("post-summary");
        let imageWrapper = document.createElement("div");
        imageWrapper.classList.add("post-image-wrapper");

        let imgPost = document.createElement("img");
        
        imgPost.src = postInfo.mainImage;
        // let mainCategory = document.createElement('div');    //!main category
        // mainCategory.textContent = postInfo

        let authorInfo = document.createElement('div');
        authorInfo.classList.add('author-info');
        let authorPhotoLink = document.createElement("a");
        authorPhotoLink.setAttribute('href','../about/');           //!put correct link
        let authorPhoto = document.createElement('img');
        authorPhoto.classList.add('author-photo');
        console.log(postInfo.authorInfo.profileImage);
        if(postInfo.authorInfo.profileImage){
            authorPhoto.src=postInfo.authorInfo.profileImage;
        }else{
            authorPhoto.src = "../Public/images/defaultProfileImage.png";
        }
        authorPhotoLink.appendChild(authorPhoto);
        let authorName = document.createElement('span');
        authorName.classList.add("author-name");
        authorName.textContent = postInfo.authorInfo.firstName +" "+postInfo.authorInfo.lastName1;
        authorInfo.append(authorPhotoLink,authorName);

        imageWrapper.append(imgPost,authorInfo);

        let post = document.createElement("div");
        post.classList.add("post");

        let postTitle = document.createElement("h2");
        postTitle.classList.add("post-title");
        postTitle.textContent = postInfo.title;
        let postDate = document.createElement('h5');
        postDate.classList.add('post-date');
        postDate.textContent = postInfo.publishingDate; //! ADD SOME FORMA
        let postBody = document.createElement("div");
        postBody.classList.add("post-body");
        let postBodyTextWrapper = document.createElement('div');
        let postBodyText = document.createElement("p");
        postBodyText.classList.add("fade");
        postBodyText.textContent = postInfo.body;
        let postBodyReadMore = document.createElement("a");
        postBodyReadMore.setAttribute('href','#');
        postBodyReadMore.textContent = "Read More >>";
        postBodyTextWrapper.append(postBodyText,postBodyReadMore);

        postBody.appendChild(postBodyTextWrapper);

        post.append(postTitle,postDate,postBody);

        postSummary.append(imageWrapper,post);
        this.container.appendChild(postSummary);
        this.clickableElements.push( {
            url:postInfo.url,
            id:postInfo.id,
            clickable:[imgPost,postTitle,postBodyReadMore]
        });
    }
    //displays more posts
    async loadMore(){
        if(this.loading){
            return false;
        }
        this.loading = true;
        let response = await getPosts(this.offset,this.category);
        console.log(response);
        response.results.forEach((post)=>{
            this.addPost(post);
        });
        this.offset +=response.results.length;
        this.loading = false;
    }
    async printCategories(){
        let categories = await getCategories();
        this.categories = categories;
        this.categoriesContainer.innerHTML = "";
        categories.forEach(category=>{
            let newCategory = document.createElement('li');
            newCategory.textContent = category;
            newCategory.addEventListener('click',e=>{
                this.offset = 0;
                this.category =category;
                this.container.innerHTML = "";
                this.loadMore();
            });
            this.categoriesContainer.appendChild(newCategory);
        });
        return true;
    }
    init(){
        this.container.innerHTML = '';
        let data = window.location.href.split('category=');
        console.log(data[1]);

        if(data.length>1){
            console.log(this.categories);
            console.log()
            if(this.categories.indexOf(data[1])!==-1){
                console.log(data[0]);
                this.category = data[1];
            }
        }
        this.loadMore();
    }
    async textSearch(){
        //! FINISH
    }
}


function getPosts(offset,category="All"){
    let url = POSTS_URL +"?offset="+offset+"&limit="+POSTS_PER_PAGE+"&category="+category;
    return fetch(url)
    .then(resp=>resp.json());
}

function getCategories(){
    let url = POSTS_URL+"?categories";
    return fetch(url)
    .then(resp=>resp.json());
}
(async function(){
    let myBlog = new Blog(postsContainer,categoriesContainer);
    let a = await myBlog.printCategories();
    myBlog.init();
    loadMoreBtn.addEventListener('click',e=>{
        myBlog.loadMore();
    });
})();


//search by main category

//Displays the loading animation
function displayLoading(){
    loadingHTML.classList.remove("hidden");
}
function hideLoading(){
    loadingHTML.classList.add("hidden");
}




