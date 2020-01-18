"use strict";

// var btn1 = document.querySelector("#btn1");
// btn1.addEventListener("click", function() {
//     alert("clicked");
// });

$(document).ready(function() {
    //define class or id for 4 section forms
    const step1 = $("#form1");
    const step2 = $("#form2");
    const step3 = $("#form3");
    const step4 = $("#form4");


    //define class or id for 4 buttons
    const btn1 = $("#btn1");
    const btn2 = $("#btn2");
    const btn3 = $("#btn3");
    const btn4 = $("#btn4");
    const btn5 = $("#btn5");
    const btn6 = $("#btn6");
    const btn7 = $("#btn7");

    // for next page
    $("#btn1").on("click", function() {
         $(step2).show();
         $(step1).hide();
         $(step3).hide();
         $(step4).hide();

    });
    $("#btn2").on("click", function() {
        $(step3).show();
        $(step1).hide();
        $(step2).hide();
    });
    $("#btn3").on("click", function() {
        $(step1).hide();
        $(step2).hide();
        $(step3).hide();
        $(step4).show();

    });
    // for previous page
    $(btn5).on("click",function(){
        $(step1).show();
        $(step2).hide();
        $(step3).hide();
        $(step4).hide();
    });

    $(btn6).on("click", function() {
        $(step2).show();
        $(step1).hide();
        $(step3).hide();
        $(step4).hide();
    });

    $(btn7).on("click", function() {
        $(step2).hide();
        $(step1).hide();
        $(step3).show();
        $(step4).hide();
    });
    
    $("#wizard2").steps({
        headerTag: "h3",
        bodyTag: "section",
        autoFocus: true,
        titleTemplate: "#index# #title#",
        onStepChanging: function(event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                var form = document.getElementById("form1"),
                    form2 = document.getElementById("form2");
                //form3 = document.getElementById("form3");
                //form4 = document.getElementById("form4");
            } else {
                return true;
            }
        }
    });
});
