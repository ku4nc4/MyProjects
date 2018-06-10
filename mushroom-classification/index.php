<html>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<head><title>Chat Bot by Jason K</title></head>

<body>
  <h1>Welcome to Chat Bot v2.0</h1>
   <h1>
       <form id="form">
            <div id="resp">hi<br></div>
            <div id="hidinp">
                <input type="hidden" name="prev" id="copyresp" value="hi">
                <input type="hidden" name="prevprev" id="copyrespbef" value="">
            </div>

            <input type="text" name="inp" id="inp">
            <input type="submit">

        </form>
   </h1>


</body>
<script>
    // Variable to hold request
    var request;
    var temtem = "";
    // Bind to the submit event of our form
    $("#form").submit(function(event) {
//        $("#resp").append($("#inp").value()+"<br>");
        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $("input[name='inp']").prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: "testml.php",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function(result,response, textStatus, jqXHR) {
            // Log a message to the console
            var tem = result;
            $("#resp").append("<div style=\"color:blue\">"+$("#inp").val()+"<br></div>");
            $("#resp").append(tem+"<br>");
            if(tem!=$("#inp").val()){

                if(temtem==""){
                    temtem = "hi";
                }

                $("#hidinp").html("<input type='hidden' name='prev' id='copyresp' value='"+tem+"'><input type='hidden' name='prevprev' id='copyresp' value='"+$("#inp").val()+"'>");
                temtem = tem;


            } else {
                $("#hidinp").html("<input type='hidden' name='prev' id='copyresp' value='"+$("#inp").val()+"'><input type='hidden' name='prevprev' id='copyresp' value='"+temtem+"'>");
                alert("I dont know how to answer that, pls tell me by replying to your own chat");
                temtem = $("#inp").val();
            }







        });

        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function() {
            // Reenable the inputs
            $("input[name='inp']").prop("disabled", false);
            $("input[name='inp']").val("");
        });

    });

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67269475-5', 'auto');
  ga('send', 'pageview');

</script>
</html>
