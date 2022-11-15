onload = function(){
    //Variables
    var request = new XMLHttpRequest();
    var btn = document.querySelector("#lookup");
    var btn2 = document.querySelector("#citylookup");
    var input = document.querySelector("#country");
    var output = document.querySelector("#result");
    var url = "world.php?country=";

    btn.addEventListener("click", e =>{
        e.preventDefault();

        //AJAX request using XMLHttpRequest
        request.onreadystatechange = e =>{
            if(request.readyState == 4){
                if(request.status == 200){
                    var answer = request.responseText;
                    output.innerHTML = answer;
                    console.log(":D");
                }
                else{
                    output.innerHTML = "An error occured X_X";
                    console.log("D:");
                }
            }
        }
        request.open("GET", url +  input.value);
        request.send();
    });

    btn2.addEventListener("click", e =>{
        e.preventDefault();

        //AJAX request using XMLHttpRequest
        request.onreadystatechange = e =>{
            if(request.readyState == 4){
                if(request.status == 200){
                    var answer = request.responseText;
                    output.innerHTML = answer;
                    console.log(":D");
                }
                else{
                    output.innerHTML = "An error occured X_X";
                    console.log("D:");
                }
            }
        }
        request.open("GET", url +  input.value + "&context=cities");
        request.send();
    });
}