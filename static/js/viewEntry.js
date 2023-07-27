

function expand(id)
{
    var entry = document.querySelectorAll("#"+id+" td");
    var date = entry[0].innerText;
    var title = entry[1].innerText;
    document.location = "http://localhost/deardiary/templates/editEntry.php?"+"date="+date+"&title="+title ;
}
