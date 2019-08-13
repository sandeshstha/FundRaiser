initial();

function initial() {
    document.getElementById("submit").classList.remove("active");
}

function change() {
    document.getElementById("submit").classList.remove("submit-btn");
    document.getElementById("submit").classList.add("active");
    document.getElementById("submit").disabled=false;
}

document.querySelector("#close-btn").addEventListener('mouseover',function(){
    document.querySelector("#close-btn").style.cursor="pointer";
});


document.querySelector("#close-btn").addEventListener('click',function(){
    document.querySelector(".successMessage").style.display="none";
});
