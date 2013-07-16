function getcontent(li){
    var ID = li.id;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
        
    }
    else {
        //for IE5,IE6
        xmlhttp = new ActiveXObject("MICROSOFT.XMLHTTP");
    }
    xmlhttp.onreadystatechange= function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("right-content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","http://127.0.0.1/oraclenew/getcontent.php?version=2&op="+ID,true);
    xmlhttp.send();
}

function validate_contact_Form(){
     var name=document.forms["contact-form"]["name"].value;
     var email=document.forms["contact-form"]["email"].value;
     var subject=document.forms["contact-form"]["subject"].value;
     var message=document.forms["contact-form"]["message"].value;

if (name==null || name=="")
  {
  alert("Enter Name!!");
  return false;
  }
  else if(email==null || email==""){
    alert("Enter the E-mail ID!!");
    return false;
  }
  else if(subject==null || subject==""){
    alert("Enter the Subject!!");
    return false;
  }
  else if(message==null || message==""){
    alert("Enter the Message!!");
    return false;
  }
  else return true;
}

function validate_payment_Form(){
     var regno=document.forms["payment-form"]["regno"].value;
     var ddno=document.forms["payment-form"]["ddno"].value;
     var bank=document.forms["payment-form"]["bank"].value;
     var date=document.forms["payment-form"]["date"].value;
if (regno==null || regno=="")
  {
  alert("Enter the Registration Number!!");
  return false;
  }
  else if(ddno==null || ddno==""){
    alert("Enter the DD. Number!!");
    return false;
  }
   else if(ddno!=parseInt(ddno)){
      
   alert("Enter a Integer Value for D.D. Number!!");
      return false;
  } 
  else if(bank==null || bank==""){
    alert("Enter the Bank Name!!");
    return false;
  }
  else if(date==null || date==""){
    alert("Enter the Date of Demand Draft!!");
    return false;
  }
  else return true;
}

function validate_reg_Form(){
     var regno=document.forms["reg-form"]["regno"].value;
     var course=document.forms["reg-form"]["course"].value;
     var branch=document.forms["reg-form"]["branch"].value;
     var fname=document.forms["reg-form"]["fname"].value;
     var lname=document.forms["reg-form"]["lname"].value;
     var address=document.forms["reg-form"]["address"].value;
     var city=document.forms["reg-form"]["city"].value;
     var state=document.forms["reg-form"]["state"].value;
     var pin=document.forms["reg-form"]["pin"].value;
     var module=document.forms["reg-form"]["module"].value;
    var phno=document.forms["reg-form"]["phno"].value;
    var email=document.forms["reg-form"]["email"].value;
     var ddno=document.forms["reg-form"]["ddno"].value;
    var bank=document.forms["reg-form"]["bank"].value;
     var doi=document.forms["reg-form"]["doi"].value;
      var amt=document.forms["reg-form"]["amt"].value;
if (regno==null || regno=="")
  {
  alert("Enter the Registration Number!!");
  return false;
  }
  else if(course==null || course==""){
    alert("Enter the Course!!");
    return false;
  }

  else if(branch==null || branch==""){
    alert("Enter the Branch!!");
    return false;
  }
  else if(fname==null || fname==""){
    alert("Enter the First Name!!");
    return false;
  }

  else if(address==null || address==""){
    alert("Enter the Address!!");
    return false;
  }
   else if(city==null || city==""){
    alert("Enter the City!!");
    return false;
  }
   else if(state==null || state==""){
    alert("Select the State!!");
    return false;
  }
   else if(pin==null || pin==""){
    alert("Enter the Pincode!!");
    return false;
  }
  else if(pin!=parseInt(pin)){
      
   alert("Enter a Integer Value for Pincode!!");
      return false;
  } 
   else if(module==null || module=="" || module=="-"){
    alert("Select Module!!");
    return false;
  }
   else if(phno==null || phno==""){
    alert("Enter the Phone Number!!");
    return false;
  }
   else if(email==null || email==""){
    alert("Enter the E-mail!!");
    return false;
  }
   else if(ddno==null || ddno==""){
    alert("Enter the D.D Number!!");
    return false;
  }
  else if(ddno!=parseInt(ddno)){
      
   alert("Enter a Integer Value for D.D. Number!!");
      return false;
  } 
   else if(bank==null || bank==""){
    alert("Enter the Bank Name!!");
    return false;
  }
   else if(doi==null || doi==""){
    alert("Enter the Date of Issue!!");
    return false;
  }
   else if(amt==null || amt==""){
    alert("Enter the Amount!!");
    return false;
  }
   else if(amt!=parseInt(amt)){
      
   alert("Enter a Integer Value for Amount!!");
      return false;
  } 
  else return true;
}