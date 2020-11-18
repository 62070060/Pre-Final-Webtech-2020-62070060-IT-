<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>62070060</title>
</head>
<style>
    body{
        font-family: 'Kanit', sans-serif;
    }

</style>
<body>
    <div class="container mt-4">
        <div class="row" id="box"></div>
    </div>

    <script>
        let requestURL = 'ezquiz.json';
        let request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) 
            {
                dataReportStatus(JSON.parse(request.responseText));
            }
        };
        request.open("GET", requestURL, true);
        request.send();

        function dataReportStatus(data) 
        {
            let Box = document.getElementById("box");
            let inner = "";
            for (let i = 0; i < data.ezquiz.items.length; i++) 
            {
                inner +=('<div class="col-md-4 col-lg-3 mb-4 d-flex flex-fill"><div class="card w-100">')
                inner +=('<img class="card-img-top" src="' + data.ezquiz.items[i].images[1] + '">')

                inner +=('<div class="card-body text-center pl-3 pr-3">')
                inner +=('<h6 class="card-title">' + data.ezquiz.items[i].name + '</h6>' 
                + '<p class="card-text"> Artist : ' + data.ezquiz.items[i].artists.name 
                + '<p class="card-text"> Release date : ' + data.ezquiz.items[i].release_date 
                + '<p class="card-text"> Avaliable : ' + data.ezquiz.items[i].available_markets.length
                + '</p>')

                
                inner +=('</div></div></div>')
            }
            
            Box.innerHTML = inner;

        }
    </script>

</body>
</html>