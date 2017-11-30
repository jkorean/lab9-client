<!-- 10.4 -->
<h1>Task # {id}</h1>
<form role="form" action="/mtce/submit" method="post">
    {ftask}
    {fpriority}
    <!--job 11 -->
    {size}
    {group}
    {status}
    <!--done -->
    {zsubmit}

</form>
{error}
<!-- 10.6 -->
<a href="/mtce/cancel"><input type="button" value="Cancel the current edit"/></a>

<!-- 10.7 -->
<a href="/mtce/delete"><input type="button" value="Delete this todo item"/></a>