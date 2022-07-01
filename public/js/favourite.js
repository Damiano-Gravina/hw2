const postURL = "getPost";
const favouritePostRoute = 'getFavourite';
const userProfileRoute =  "usernameProfile";
const removeFavouriteRoute = "removeFavourite"



function onFavouriteJson(json){
    let i = 0;

    while(json[i]){
        favouriteJson[i] = json[i].favouritePost;
        i++;
    }

    fetchPosts();
}


function onPostsJson(json){
    let i = 0;
    let j = 0;
    const main = document.querySelector("main");

    while(favouriteJson[j]){
        while(json[i]){
            if(json[i].postsId == favouriteJson[j]){
                const user_id = json[i].userId;
                const name = json[i].userNome;
                const surname = json[i].userCognome;
                const userName = json[i].userUsername;
                const post_id = json[i].postsId;                        
                const time = json[i].postsTime;
                const postTitle = json[i].postsTitle;
                const postText = json[i].postsText;


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
                section.appendChild(usernameReference);
                

                const divTitle = document.createElement('div');
                divTitle.classList.add('postTitle');
                divTitle.textContent = postTitle;
                sectionPost.appendChild(divTitle);

                const p = document.createElement('p');
                p.textContent = postText;
                sectionPost.appendChild(p);

                const divToolBar = document.createElement('div');
                divToolBar.classList.add('toolbar');
                const span0 = document.createElement('a');
                span0.classList.add('material-symbols-outlined');
                span0.classList.add('no_decoration');

                span0.textContent = 'star';
                span0.href = removeFavouriteRoute + "/" + post_id + "/" + "favourite";           
                divToolBar.appendChild(span0);
                const span1 = document.createElement('span');
                span1.textContent = time;
                divToolBar.appendChild(span1);

                sectionPost.appendChild(divToolBar);

                main.appendChild(sectionPost);
            }
            i = i + 1;
        }
        i=0;
        j = j + 1;
    }
}

function OnResponse(response){
    return response.json();
}

function fetchPosts(){
    fetch(postURL).then(OnResponse).then(onPostsJson);
}

function fetchFavourite(){
    fetch(favouritePostRoute).then(OnResponse).then(onFavouriteJson);
}


fetchFavourite();

let favouriteJson = Array(); 