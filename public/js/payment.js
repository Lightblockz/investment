function investNow() {
  var token = $('meta[name="csrf-token"]').attr('content');
  var email = $("#user_email").val();
  var user_id = $("#user_id").val();
  var plan = $("#plan_amount :selected").val();
  var plan_duration = $("#plan_duration :selected").val();
  var interest = $("#plan_amount :selected").data("id");
  var amount = Number($("#plan_amount :selected").text());

  var date = (Date.now() / 1000);
  var ran = "LBK" + Math.floor(Math.random() * 10000 + 1);
  var date_string = String(date);
  var res = date_string.substring(4, 7);
  var ref = ran + res;
  var crsf_token = $("#crsf_token").val();
  
  var handler = PaystackPop.setup({
    
    key: crsf_token,
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



function investNowViaTransfer() {
  var token = $('meta[name="csrf-token"]').attr('content');
  var email = $("#user_email").val();
  var user_id = $("#user_id").val();
  var plan = $("#plan_amount :selected").val();
  var plan_duration = $("#plan_duration :selected").val();
  var interest = $("#plan_amount :selected").data("id");
  var amount = Number($("#plan_amount :selected").text());

  var date = (Date.now() / 1000);
  var ran = "LBK" + Math.floor(Math.random() * 10000 + 1);
  var date_string = String(date);
  var res = date_string.substring(4, 7);
  var ref = ran + res;
  var crsf_token = $("#crsf_token").val();

  var formData = {
    investment_plan_id: plan,
    user_id: user_id,
    duration: plan_duration,
    amount: amount,
    interest: interest,
    reference_id: ref
  };

  // console.log(formData);
  
  var url = "/user/invest/via/bank";

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


$('#document').ready(function () {

  $('#plan_duration').on('change' , function () {

    isCapitalWithinInvestmentLimits();

    var plan = $("#plan_amount :selected").text();
    var interest = Number($("#plan_amount :selected").data("id"));
    var interest_in_percentage = interest * 100;
    var plan_duration = $("#plan_duration :selected").val();
    var amount = Number($("#capital_amount").val());
    var monthly_interest = (amount * interest);
    var months = Math.round(plan_duration/30);
    var roi = (monthly_interest * months) + amount;
    
    $('.capital-val').text("");
    $('.capital-interest').text("");
    $('.capital-duration').text("");
    $('.capital-roi').text("");
    
    $('.capital-val').text(`???${amount.toLocaleString('en')}`);
    $('.capital-interest').text(`${interest_in_percentage}%`);
    $('.capital-duration').text(`${plan_duration}days`);
    $('.capital-roi').text(`???${roi.toLocaleString('en')}`);

  });


  
  $('#plan_amount').on('change' , function () {

    isCapitalWithinInvestmentLimits();

    var plan = $("#plan_amount :selected").text();
    var interest = Number($("#plan_amount :selected").data("id"));
    var interest_in_percentage = interest * 100;
    var plan_duration = $("#plan_duration :selected").val();
    var amount = Number($("#capital_amount").val());
    var monthly_interest = (amount * interest);
    var months = Math.round(plan_duration/30);
    var roi = (monthly_interest * months) + amount;
    
    $('.capital-val').text("");
    $('.capital-interest').text("");
    $('.capital-duration').text("");
    $('.capital-roi').text("");
    
    $('.capital-val').text(`???${amount.toLocaleString('en')}`);
    $('.capital-interest').text(`${interest_in_percentage}%`);
    $('.capital-duration').text(`${plan_duration}days`);
    $('.capital-roi').text(`???${roi.toLocaleString('en')}`);

  });

  $('#capital_amount').on('blur', function () {

    isCapitalWithinInvestmentLimits();

  });

  function isCapitalWithinInvestmentLimits() {

    var plan_id = $("#plan_amount :selected").val();
    var amount = Number($("#capital_amount").val());
    
    var url = `/index.php/user/investment/plan/${plan_id}/limit/${amount}`;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        type: "GET",
        url: url,
        success: function (data) {
          
          console.log(data);

          if (!data.success) {
            $('#capital_amount').css('border' , '1px solid #d3d8de');
            $('#append-error').remove();
            var message = `Amount must be above ???${(data.data.min_amount - 1).toLocaleString('en')} and below ???${(data.data.max_amount + 1).toLocaleString('en')}`;
            $('#capital_amount').css('border' , '1px solid red');
            $('.small-note').append(`<small id="append-error"> ${message} </small>`);
          }

          if (data.success) {
            $('#capital_amount').css('border' , '1px solid #d3d8de');
            $('#append-error').remove();
          }

        },
        error: function (err) {

          console.log(err);

        }
    });

  }

});

$('#invest-modal').on('click', function () {
  $('#sidebar').css("display", "none");
})


// $(document).load(function () {
//   $(".check-icon").hide();
//   setTimeout(function () {
//     $(".check-icon").show();
//   }, 10);
// });