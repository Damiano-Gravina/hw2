function modifyShopDetails(event){
    event.preventDefault();
    console.log("click");

    const shop_details_box = document.querySelector("#compiler");
    shop_details_box.classList.remove("hide");
    shop_details_box.classList.add("compiler_flex");
}

function denyShopDetailsModification(event){
    event.preventDefault();

    const shop_details_box = document.querySelector("#compiler");
    shop_details_box.classList.remove("compiler_flex");
    shop_details_box.classList.add("hide");

}

document.querySelector("#shop_details_button").addEventListener("click", modifyShopDetails);
document.querySelector("#cancel_modification_button").addEventListener("click", denyShopDetailsModification)
