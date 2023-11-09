
function showUser(let){
    console.log("View button on work");
    if (let == "") {
        document.getElementById("info").innerHTML = "";
        return;
      }
      else{
    var xmlhttp =new XMLHttpRequest();
    xmlhttp.onload=function(){
        document.getElementById("info").innerHTML=this.responseText;
        
    
    }
    xmlhttp.open("GET","user.php?q="+let,true);
    xmlhttp.send();
   
    
}
};

function deleteUser(let){
    console.log("Delete button triggered");
    if (let == "") {
        document.getElementById("showData").innerHTML = "";
        return;
      }
      else{
        var result = confirm("Are you sure you want to delete?");
        if(result){
            
   var xmlhttp =new XMLHttpRequest();
    xmlhttp.onload=function(){
        document.getElementById("showData").innerHTML=this.responseText;
        location.reload();
    
    
    }
    xmlhttp.open("GET","deleteUser.php?q="+let,true);
    xmlhttp.send();
   /* $.ajax({
        type:"GET",
        url:"deleteUser.php",
        async:true,
        data:{q:let},
        success:function(response){
            $("#showData").html(response);
        },
        error: function(xhr,status,error){
            console.log("AJAX Error: "+ error)
        }
    });*/
}
}
};
function deleteImage(){
    var confirmation=confirm("Are you sure you want to delete?");
    if(confirmation){
        window.location.href="deleteImage.php";
    }

}
