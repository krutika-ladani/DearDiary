function toggleMenu()
{
    var x=document.getElementsByClassName("vMenu");
    if(x[0].style.display==="none")
    {
        x[0].style.display="block";
    }
    else
    {
        x[0].style.display="none";
    }
}
window.addEventListener("mouseup",function(e){
    var x=document.getElementsByClassName("vMenu");
    if(e.target.id!="vMenu" && x[0].style.display==="block")
    {
        x[0].style.display="none";
    }
})
