function investNow() {
    var token = $('meta[name="csrf-token"]').attr('content');
    var email = $("#user_email").val();
    var user_id = $("#user_id").val();
    var plan = $("#plan_amount :selected").val();
    var plan_duration = $("#plan_duration :selected").val();
    var interest = $("#plan_amount :selected").data("id");
    var amount = 0;

    

    if (plan == "1") {
      amount = 300000;
    } else if (plan == "2") {
      amount = 1000000;
    } else if (plan == "3") {
      amount = 5000000;
    }

    var date = (Date.now() / 1000);
    var ran = "LBK" + Math.floor(Math.random() * 10000 + 1);
    var date_string = String(date);
    var res = date_string.substring(4, 7);
    var ref = ran + res;
    
    var handler = PaystackPop.setup({
      
      key: "pk_test_8d18f652ec39f7839f86277eda11281d04238e78",
      email: email,
      amount: amount + "00",
      ref: ref,
      metadata: {
        custom_fields: [
          {
            display_name: "New Investment",
            variable_name: "New Investment",
            value: "2"
          }
        ]
      },
      callback: function(response) {

          console.log(response);

          // verifyTransaction(response.reference);

          if (response.status == "success" && response.message == "Approved") {
           
              var formData = {
                investment_plan_id: plan,
                user_id: user_id,
                duration: plan_duration,
                amount: amount,
                interest: interest,
                reference_id: response.reference
              };
      
              // console.log(formData);
              
              var url = "/user/invest/now";
      
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
      
              $.ajax({
      
                  type: "POST",
                  url: url,
                  data: formData,
                  success: function (data) {
                    
                    location.reload();
      
                  },
                  error: function (data) {
                    console.log(data);
                    
                    // swal("Oops!", "Sorry item could not be added, Please try again!", "error");
                  }
              });

          }  
        
      }
    });
    handler.openIframe();
  }

  