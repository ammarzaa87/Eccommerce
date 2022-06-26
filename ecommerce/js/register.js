jQuery.validator.addMethod("noSpace", function(value, element) { 
    return value == '' || value.trim().length != 0;  
}, "No space please");

jQuery.validator.addMethod("customEmail", function(value, element) { 
  return this.optional( element ) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value ); 
}, "Please enter valid email address!");

var $registrationForm = $('#registration');
if($registrationForm.length){
  $registrationForm.validate({
      rules:{
          first_name: {
              required: true,
              noSpace: true
          },
		  last_name: {
              required: true,
              noSpace: true
          },
          email: {
              required: true,
              customEmail: true
          },
          password: {
              required: true
          },
          confirmPassword: {
              required: true,
              equalTo: '#password'
          },
         
          gender: {
              required: true
          },
         
      },
      messages:{
          first_name: {
              required: 'Please enter Firstname!'
          },
		  last_name: {
              required: 'Please enter Lastname!'
          },
          email: {
              required: 'Please enter email!',
              email: 'Please enter valid email!'
          },
          password: {
              required: 'Please enter password!'
          },
          confirmPassword: {
              required: 'Please enter confirm password!',
              equalTo: 'Please enter same password!'
          },
          
      },
     
  });
}