</head>
<body onload="load1()">
    <div id="container">
        <header>
            <h1>SHOUT IT</h1>
        </header>
        <main>
            <div id="shouts">
            </div>
            <div id="input">               
                <div class="error" id="error">Enter your Name and Message you want to shout...</div>
               
             <form method="post" action="">
                <input type="text" name="user" id="user" placeholder="Enter your name" />
                <input type="text" name="message" id="message" placeholder="Enter your message" />
                <br>
                <input class="submit-btn" type="submit" onclick="insert()" name="submit" value="Shout It Loud"/>
            </form>      
            </div>

        <main>
    </div>
<script>
    function load1(){
            var xmlhttp = new XMLHttpRequest();
            var url = "pages/process.php";

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    myFunction(xmlhttp.responseText);
                }
            }
            xmlhttp.open("POST", url, true);
            xmlhttp.send();

            function myFunction(response) {
                var arr = JSON.parse(response);
                var i;
                var out = "<ul>";

                for(i = 0; i < arr.length; i++) {
                    out += '<li><span>' +
                    arr[i].time +
                    "</span>-<b>" +
                    arr[i].user +
                    "</b>" +"  "+
                    arr[i].message +
                    "</li>";
                }
                out += "</ul>";
                document.getElementById("shouts").innerHTML = out;
            }
     }
     function insert(){
         var Name = $('#user').val();
         var Message = $('#message').val();
         $.post('includes/inProcess.php',
                {USERNAME:Name,MESSAGE:Message},
                function(output){
                    var status = parseInt(output);
                    if(status == 1){
                          load1();
                    }
                    else{
                    $('#error').text(output);
                    }
                }

         );
     }
</script>
