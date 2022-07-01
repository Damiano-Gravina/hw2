//SPOTIFY
const spotifyClientId = '63e1a84694c2446dbdf3b1a8dc01d231';
const spotifyClientSecret = '99dc3f1bf67747ce8c13653829fc6d8a';
//USER
const userProfileRoute =  "usernameProfile";
//POST
const postRoute = "getPost";
const deletePostRoute = "deletePost";
//FAVOURITE
const addFavouriteRoute = "addFavourite";
const removeFavouriteRoute = "removeFavourite";
const favouritePostRoute = 'getFavourite';
//COMMENT
const commentPostRoute = "findComment";
const createCommentRoute = "addComment";
const deleteCommentRoute = "deleteComment";
//PLAYLIST
const createPlaylistRoute = "getPlaylists";
const albumList = ["Pink+Floyd", "Nirvana", "Beatles", "The+Doors", "The+Jimi+Hendrix+Experience", "Led+Zeppelin", "Aerosmith", "Green+Day", "Michael+Jackson", "System+Of+A+Down", "Red+Hot+Chilli+Pepper", "Fall+Out+Boy"];
const SpotifyURL= "https://api.spotify.com/v1/search?type=album&q="


function onFavouriteJson(json){
    let i = 0;

    while(json[i]){
        favouriteJson[i] = json[i].favouritePost;
        i++;
    }
    fetchPosts();
}



function onPostsJson(json){
    let present = false;                   
    let i = 0;
    let j = 0;
    const main = document.querySelector("main")
    const currentId = document.querySelector('#UserId').textContent;      

    while(json[i]){
    const user_id = json[i].userId;
    const name = json[i].userNome;
    const surname = json[i].userCognome;
    const userName = json[i].userUsername;
    const negozio = json[i].userNegozio;                
    const post_id = json[i].postsId;     
    const time = json[i].postsTime;
    const postTitle = json[i].postsTitle;
    const postText = json[i].postsText;
    const post_nComments = json[i].postsNcomments;


    const sectionPost = document.createElement('section');
    sectionPost.classList.add("post");


    const section = document.createElement('section');
    sectionPost.appendChild(section);
    const PostUserImage = document.createElement('div');
    PostUserImage.classList.add("post_user_image");
    section.appendChild(PostUserImage);
    const PostUserInitials = document.createElement('span');
    PostUserInitials.classList.add("post_user_initials");
    PostUserInitials.textContent = name[0]+surname[0];
    PostUserImage.appendChild(PostUserInitials);


    const usernameReference = document.createElement('a');
    usernameReference.href = userProfileRoute + "/" + user_id;
    usernameReference.textContent = userName;
    usernameReference.classList.add('no_decoration');
    if(negozio){
        usernameReference.textContent = "🏬: "+ userName;
        usernameReference.classList.add("shop_name");
    }
    
    section.appendChild(usernameReference);


    if(user_id == currentId){
        const delete_post = document.createElement('a');
        delete_post.classList.add("material-symbols-outlined");
        delete_post.textContent = "cancel";
        delete_post.href = deletePostRoute + "/" + post_id;
        delete_post.classList.add("delete_post");
        delete_post.classList.add("no_decoration");
        section.appendChild(delete_post);
    }

    const divTitle = document.createElement('div');
    divTitle.classList.add('postTitle');
    divTitle.textContent = postTitle;
    sectionPost.appendChild(divTitle);

    const p = document.createElement('p');
    p.textContent = postText;
    sectionPost.appendChild(p);

    const divToolBar = document.createElement('div');
    divToolBar.classList.add('toolbar');


    const comment_section = document.createElement('div');
    const add_comment = document.createElement('a');
    add_comment.href = "";
    add_comment.textContent = "Commenta:";
    add_comment.classList.add("add_comment");
    add_comment.classList.add("no_decoration");
    comment_section.classList.add("comment_section");
    const comment_section_2 = document.createElement("form");   
    comment_section_2.classList.add("comment_section_2");
    const comment_post_id = document.createElement('input');
    comment_post_id.type = "text";
    comment_post_id.value = post_id;
    comment_post_id.name = "post_id";
    comment_post_id.classList.add("hide");
    comment_section_2.appendChild(comment_post_id);
    const comment_text = document.createElement('textarea');
    comment_text.name = "textComment";
    comment_text.classList.add("comment_text");
    comment_section_2.classList.add("hide");
    const comment_button = document.createElement('button');   
    comment_button.textContent = "Pubblica commento";
    comment_section_2.action = createCommentRoute;  
    comment_button.classList.add ("noButtonEsthetic");
    comment_button.classList.add ("comment_button");
    const back_button = document.createElement('a');
    back_button.textContent = "Annulla";
    back_button.href = "";
    back_button.addEventListener("click", avoid);
    back_button.classList.add ("no_decoration");
    comment_section_2.appendChild(comment_text);
    comment_section_2.appendChild(comment_button);
    comment_section_2.appendChild(back_button);
    comment_section.appendChild(add_comment);
    comment_section.appendChild(comment_section_2);


    add_comment.addEventListener("click", prevent);       
    add_comment.addEventListener("click", function(){commentWriter(post_id)});    

    const span0 = document.createElement('a');
    span0.classList.add('material-symbols-outlined');
    span0.classList.add('no_decoration');

    while(favouriteJson[j]){
        if(post_id == favouriteJson[j]){    
            present = true;                
        }
        j = j + 1;
    }

    if(present == false){      
        span0.textContent = 'grade';    
        span0.href = addFavouriteRoute + "/" + post_id;    
    }else{
        span0.textContent = 'star';     
        span0.href = removeFavouriteRoute + "/" + post_id + "/" + "home"     
    }    
    divToolBar.appendChild(span0);

    const span1 = document.createElement('span');
    span1.textContent = time + ".";
    divToolBar.appendChild(span1);

    const span_post_id = document.createElement('span');   
    span_post_id.textContent = post_id;
    span_post_id.classList.add("hide");
    span_post_id.classList.add("span_post_id");
    section.appendChild(span_post_id);

    const comments = document.createElement('div');
    comments.classList.add("comments")
    comments.textContent = "Commenti:";
    comments.classList.add("hide");
    sectionPost.appendChild(comments);

    const nComments_div = document.createElement("a");
    if(post_nComments == 1){
        nComments_div.textContent = "Questo post ha "+post_nComments+" commento.";
    }else{
    nComments_div.textContent = "Questo post ha "+post_nComments+" Commenti.";
    }
    nComments_div.href = "";
    nComments_div.addEventListener("click", prevent);
    nComments_div.addEventListener("click", function(){visualizeComment(comments, nComments_div)});
    nComments_div.classList.add("no_decoration");


    sectionPost.appendChild(nComments_div);

    sectionPost.appendChild(divToolBar);

    sectionPost.appendChild(comment_section);

    main.appendChild(sectionPost);

    present = false;
    i = i + 1;
    j = 0;
    }
    fetchComments();
}


function onCommentsJson(json){
    let i = 0;
    let j = 0;
    const currentId = document.querySelector('#UserId').textContent;      
    const posts = document.querySelectorAll(".post");
    const posts_actual_id = Array();
    const post_comment_section = Array();


    while (posts[i]){
        posts_actual_id[i] = posts[i].childNodes[0].querySelector(".span_post_id").textContent;        
        post_comment_section[i] = posts[i].childNodes[3]                                                              
        i++;
    }

    i=0;
    while(json[i]){
        const user_id = json[i].userId;
        const name = json[i].userNome;
        const surname = json[i].userCognome;
        const userName = json[i].userUsername;        
        const post_id = json[i].commentsPost;                    
        const time = json[i].commentsTime;                     
        const comment_id =json[i].commentsId;
        const comment_text = json[i].commentsText;


        while(post_comment_section[j]){
            if (post_id == posts_actual_id[j]){
                
                const sectionComment = document.createElement('section');
                sectionComment.classList.add("sectionComment");
                post_comment_section[j].appendChild(sectionComment);
                const PostUserImage = document.createElement('div');
                PostUserImage.classList.add("post_user_image");
                sectionComment.appendChild(PostUserImage);
                const PostUserInitials = document.createElement('span');
                PostUserInitials.classList.add("post_user_initials");
                PostUserInitials.textContent = name[0]+surname[0];
                const usernameReference = document.createElement('a');
                usernameReference.href = userProfileRoute + "/" + user_id;
                usernameReference.textContent = userName;
                usernameReference.classList.add('no_decoration');
                PostUserImage.appendChild(PostUserInitials);

                sectionComment.appendChild(usernameReference);

                const comment_div = document.createElement('div');
                comment_div.textContent = comment_text;
                sectionComment.appendChild(comment_div);

                const comment_time = document.createElement('span');
                comment_time.classList.add("comment_time");
                comment_time.textContent = time;
                sectionComment.appendChild(comment_time);


                if(user_id == currentId){
                    const delete_comment = document.createElement('a');
                    delete_comment.classList.add("material-symbols-outlined");
                    delete_comment.textContent = "cancel";
                    delete_comment.href = deleteCommentRoute + "/" + comment_id;    
                    delete_comment.classList.add("delete_comment");     
                    delete_comment.classList.add("no_decoration");
                    sectionComment.appendChild(delete_comment);
                }
            }
            j++;
        }
        i++;
        j=0;
    }
}

function tokenRequest(){
    fetch("https://accounts.spotify.com/api/token",
	{
   method: "post",
   body: 'grant_type=client_credentials',
   headers:
   {
    'Content-Type': 'application/x-www-form-urlencoded',
    'Authorization': 'Basic ' + btoa(spotifyClientId + ':' + spotifyClientSecret)
   }
  }
  ).then(onTokenResponse, onFail).then(onTokenJson, onFail);
}


function randAlbumName(){
    let i = Math.floor(Math.random() * (albumList.length));
    return albumList[i];
}


function onSpotifyJson(json){

    const spotifyBox = document.querySelector("#spotifyMusic");
    const musicBox = document.createElement("div");
    const bandName = document.createElement("a");
    bandName.href = json.albums.items[0].artists[0].external_urls.spotify;
    bandName.id = "bandName";
    bandName.textContent = json.albums.items[0].artists[0].name;
    musicBox.appendChild(bandName);
    spotifyBox.appendChild(musicBox);
    musicBox.innerHTML='';
    musicBox.appendChild(bandName);
    const albumVector=json.albums.items;
    let numAlbum=albumVector.length;

    let rand_value=0;

    if(numAlbum>10){
        rand_value = Math.floor(Math.random() * (6));
    }

    if(numAlbum>4){
        numAlbum=4;
    }

    for(let index=0; index < numAlbum; index++){
        const album = document.createElement('a');
        album.href = json.albums.items[rand_value + index].external_urls.spotify;
        const image = document.createElement('img');
        const albumImage = albumVector[rand_value + index].images[0].url;
        const title = document.createElement("span");
        title.textContent = json.albums.items[rand_value + index].name;
        image.src = albumImage;
        const box = document.createElement('div');
        album.appendChild(title);
        album.appendChild(image);
        box.appendChild(album);
        musicBox.appendChild(box);
    }
}

function generaAlbum(apiToken){
    let selectedAlbum=randAlbumName();
    let URL=SpotifyURL+selectedAlbum;
    fetch(URL,
        {
        headers:
        {
          'Authorization': 'Bearer ' + apiToken
        }
      }).then(OnResponse, onFail).then(onSpotifyJson, onFail);
    }
    
    function sleep(milliseconds) {
        const date = Date.now();
        let currentDate = null;
        do {
          currentDate = Date.now();
        } while (currentDate - date < milliseconds);
      }
    



function onPlaylistJson(json){
    let i = 0;
    const playlist_box = document.querySelector("#musicPlaylists");

    while(json[i]){
        const playlist_name =  json[i].playlistName;
        const playlist_url = json[i].playlistURL;

        const playlist = document.createElement("a");
        playlist.href = playlist_url;
        const span_playlist = document.createElement("span");
        span_playlist.classList.add("material-symbols-outlined");
        span_playlist.textContent = "play_circle";
        playlist.textContent = playlist_name;
        playlist.appendChild(span_playlist);
        playlist_box.appendChild(playlist);

        i++;
    }
}


function OnResponse(response){
    return response.json();
}

function onTokenResponse(response)
{
  return response.json();
}

function onFail(error){
    console.log("Error: " + error);
}

function onTokenJson(json)
{
  const apiToken = json.access_token;
  generaAlbum(apiToken);
}

function fetchPosts(){
    fetch(postRoute).then(OnResponse, onFail).then(onPostsJson, onFail);
}

function fetchPlaylist(){
    fetch(createPlaylistRoute).then(OnResponse, onFail).then(onPlaylistJson, onFail);
}

function fetchFavourite(){
    fetch(favouritePostRoute).then(OnResponse, onFail).then(onFavouriteJson, onFail);
}

function fetchComments(){
    fetch(commentPostRoute).then(OnResponse, onFail).then(onCommentsJson, onFail);
}

function prevent(event){      
    event.preventDefault();
}

function commentWriter(post_id){
    posts = document.querySelectorAll('.span_post_id');
    comment_section = document.querySelectorAll(".comment_section_2");
    let i = 0;
    let j = 0;

    if(text_opened){                               
        while(comment_section[j]){
        comment_section[j].classList.add("hide");
        j++;
        }
    }

    while(posts[i]){
        if(post_id == posts[i].textContent){
        comment_section[i].classList.remove("hide");
        text_opened = true;
        }
        i++;
    }
}

function avoid(event){          
    event.preventDefault();
    comment_section = document.querySelectorAll(".comment_section_2");
    let j = 0;

    while(comment_section[j]){
        comment_section[j].classList.add("hide");
        comment_section[j].childNodes[1].value="";
        j++;
    }
}

function visualizeComment(comments, nComments){
    comments.classList.remove("hide");
    nComments.removeEventListener("click", visualizeComment);
    nComments.addEventListener("click", function(){unvisualizeComment(comments, nComments)});
}

function unvisualizeComment(comments, nComments){
    comments.classList.add("hide");
    nComments.addEventListener("click", function(){visualizeComment(comments, nComments)});
    nComments.removeEventListener("click", unvisualizeComment);
}


fetchPlaylist();
fetchFavourite();
tokenRequest();

const button=document.querySelector("#spotifyButton");
button.addEventListener("click", generaAlbum);

let favouriteJson = Array(); 
let text_opened = false;                 