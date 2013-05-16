// JavaScript Document
    $(document).ready(function() {
      $("#form_add_user").validate({
		  errorClass: "validation-error",
    errorElement: "span",
        rules: {
          password: { 
                required: true, minlength: 8
          }, 
          password_retype: { 
                required: true, equalTo: "#password", minlength: 8
          }, 
        email: {
          required: true, email: true
          },
        first_name: {
          required: true
          },
        last_name: {
          required: true
        },
        username: {
             required: true, minlength: 4
          }
        },
        messages: {
         password: "Min length 8.",
         password_retype: "password equal in both fields",
		 email: "Must be a valid email",
		 first_name: "Required",
		 last_name: "Required",
		 username: "Required, min length 4.",

        }
      });
	  
	  
	  $("#form_edit_user").validate({
		  errorClass: "validation-error",
    errorElement: "span",
        rules: {
          password: { 
                minlength: 8
          }, 
          password_retype: { 
                equalTo: "#password", minlength: 8
          }, 
        email: {
          required: true, email: true
          },
        first_name: {
          required: true
          },
        last_name: {
          required: true
        },
        username: {
             required: true, minlength: 4
          }
        },
        messages: {
         password: "Min length 8.",
         password_retype: "password equal in both fields",
		 email: "Must be a valid email",
		 first_name: "Required",
		 last_name: "Required",
		 username: "Required, min length 4.",

        }
      });
	  
    });