function signupFormValidate() {
   var pass = document.getElementById('password').value ;
   var conpass = document.getElementById('repeat-password').value ;
    if (pass == conpass) 
    {
        console.log("same");
        return true ;
    } 
    else 
    {
        document.getElementById('password').style.borderColor = "#C7001A" ;
        document.getElementById('repeat-password').style.borderColor = "#C7001A" ;
        return false ;
    }
    
}
