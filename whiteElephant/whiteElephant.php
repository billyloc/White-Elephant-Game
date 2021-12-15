

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>White Elephant</title>

    <style>
        input {
            margin-bottom: 10px;
        }
        select {
            margin-bottom: 10px;
            font-size: 22px;
        }
        form {
            margin-bottom: 10px;
        }

        input[type=submit] {
            color: white;
            background-color: blue;
            font-size: 22px;
        }

        .ready button {
            color: red;
            font-weight: bolder;
            background-color: green;
            font-size: 22px;
            margin-top: 25px;
        }

        #cocktail {
            width: 100%;
            text-align: center;
            font-weight: bolder;
        }

        #cocktail img {
            width: 200px;
            margin-top: 25px;
            margin: 0 auto;
        }

        #joke {
            font-weight: bolder;
            font-size: 22px;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <h1>Input your name, number and choose your carrier so we can determine who will bring the gag gift for our White Elephant Game</h1>

    <form action="checkinput.php" method="GET">
        <input type="text" name="fname" required placeholder="Name"> <br>
        <input type="tel" id="phone" name="phone"
       pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
       required
       placeholder="Number XXXXXXXXXX"> <br>
       <select name="carrier" id="carrier">
           <option value="tmobile">T-Mobile</option>
           <option value="verizon">Verizon</option>
       </select> <br>
       <input type="submit" name="submit">
    </form>

    <div class="count">
        <button>Check Count</button>
        <div class="amount"></div>
    </div>



    <div>
        <button class="ready">Ready to Begin</button>
    </div>

    <div id="cocktail">
        <img src="" alt="">
        <div class="name"></div>
        <div class="ingredients">
            <ol></ol>
        </div>
        <div class="instructions"></div>

    </div>
    
</body>
</html>

<script>
    
$(document).ready(function() {

  $.ajax({url: "https://www.thecocktaildb.com/api/json/v1/1/random.php", success: function(result){
    var count = 2;
    var ing = '.strIngredient';    
    console.log(result);
    $.each(result.drinks, function(index, value) {
        $('.name').text(value.strDrink);
        $('#cocktail img').attr('src',value.strDrinkThumb);
        $('.instructions').text(value.strInstructions);  
    })
  }});   

  $('.count button').click(function() {
      var url = 'count.php';
      $.get(url, function(result) {
        $('.amount').text(result);
      })
  })

  $('.ready').click(function() {
    $.ajax({url:'sendText.php', success: function(result) {
        alert(result);
    }})
  })





})


</script>

