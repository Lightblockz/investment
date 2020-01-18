'use strict';
$(document).ready(function () {

    $('#example1').DataTable({
        responsive: false,
        "scrollX": "100%",
        // "order": [[ 10, "asc" ]]
    });

    $('#example2').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "paging": false,
    });

    $('#example3').DataTable({
        "scrollCollapse": true,
        "paging": true,
        responsive:true
    });

});


