
     function Show_password() {
      console.log("inside function");
     let x = document.getElementById("password");
     if (x.type === "password") {
       x.setAttribute("type", "text");
     } else {
       x.setAttribute ("type", "password");
     }
   }
      
      // Form validation code 
      function validate() {
         if( document.feedbackform.name.value == "" ) {
            alert( "Enter your name!" );
            document.feedbackform.name.focus() ;
            return false;
         }
        if(document.feedbackform.name.value.length>100){
                 alert("Name too long!");
                 return false;
             }

             if (/[^a-zA-Z0-9\-\ /]/.test(document.feedbackform.name.value)) {
            alert('No special characters allowed!');
            return false;
            }
        
         if( document.feedbackform.email.value == "" ) {
            alert( "Please provide your Email!" );
            document.feedbackform.email.focus() ;
            return false;
         }
               var emailID = document.feedbackform.email.value;
            atpos = emailID.indexOf("@");
            dotpos = emailID.lastIndexOf(".");
            
            if (atpos < 1 || ( dotpos - atpos < 2 )) {
               alert("Please enter Valid email ID")
               document.feedbackform.email.focus() ;
               return false;
            }

         if(document.feedbackform.email.value.length>100){
                 alert("Email too long!");
                 return false;
                }

        if( document.feedbackform.subject.value == "" ) {
            alert( "Please mention the Subject!" );
            document.feedbackform.subject.focus() ;
            return false;
         }
        if(document.feedbackform.subject.value.length>300){
                 alert("Subject too long!");
                 return false;
             }
        if( document.feedbackform.message.value == "" ) {
                alert( "Input your message!" );
                document.feedbackform.email.focus() ;
                return false;
         }
         if(document.feedbackform.message.value.length>6000){
            alert("Message is too long!");
            return false;
        }
        return true;
       }
      
    function validate_category(){
      if( document.add_category.category_name.value == "" ) {
         alert( "Enter the category" );
         document.add_category.category_name.focus() ;
         return false;
      }
     if(document.add_category.category_name.value.length>100){
              alert("Category title too long!");
              return false;
          }
      if (/[^a-zA-Z0-9\-\ /]/.test(document.add_category.category_name.value)) {
      alert('No special characters allowed!');
      return false;
      }
     }


     function validate_product(){
            if(document.add_product.product_name.value == ""){
               alert("Enter the product name!!");
               document.add_product.product_name.focus();
               return false;
            }
            if(document.add_product.product_name.value.length>100){
               alert("Product name too long!");
               return false;
            }
            if (/[^a-zA-Z0-9\-\ /]/.test(document.add_product.product_name.value)) {
            alert('No special characters allowed!');
            return false;
            }
            
            if(document.add_product.product_price.value== ""){
               alert("Price is required!");
               document.add_product.product_price.focus();
               return false;
            }
            if(document.add_product.product_price.value <0){
               alert("Price cannot be negative!");
               return false;
            }
            if(document.add_product.product_price.value.length >8){
               alert("Only 8 characters allowed on price!");
               return false;
            }
            if( document.add_product.product_description.value == "" ) {
               alert( "Input your message!" );
               document.feedbackform.email.focus() ;
               return false;
        }
            if(document.add_product.product_description.value.length>10000){
               alert("Message is too long!");
               return false;
            }
      return true;
     }
  
