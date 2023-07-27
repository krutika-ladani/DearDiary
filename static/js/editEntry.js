function edit_entry()
{
    if(document.getElementById("edit").value === "edit")
    {
        document.getElementById("edit").value = "save";
        document.getElementById("text").readOnly = false;
        document.getElementById("title").readOnly = false;
        document.getElementById("date").readOnly = false;
    }
    else
    {
        var form = document.getElementById("form");
        form.submit();
    }
}

function delete_entry()
{
    var date = document.getElementById("old_date").value;
    var title = document.getElementById("old_title").value;

    if(confirm("Confirm deletion?"))
    {
        document.location = "http://localhost/deardiary/templates/deleteEntry.php?"+"date="+date+"&title="+title ;
    }
}