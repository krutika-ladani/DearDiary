function toggleMenu()
{
    var x=document.getElementById("vMenu");
    if(x.style.display==="none")
    {
        x.style.display="block";
    }
    else
    {
        x.style.display="none";
    }
}
window.addEventListener("mouseup",function(e){
    var x=document.getElementById("vMenu");
    if(e.target.id!="vMenu" && x.style.display==="block")
    {
        x.style.display="none";
    }
})
