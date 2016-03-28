/**
 * Created by aoktox on 28/03/16.
 */
$(function () {
    "use strict";
    //DONUT CHART
    var donut = new Morris.Donut({
        element: 'jumlah-chart',
        resize: true,
        colors: ["#3c8dbc", "#f56954"],
        data: [0,0],
        hideHover: 'auto'
    });
    $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/getJumlahSiswa",
        })
        .done(function( data ) {
            // When the response to the AJAX request comes back render the chart with new data
            donut.setData(data);
        })
        .fail(function() {
            // If there is no communication between the server, show an error
            alert( "error occured" );
        });

    //BAR CHART
    var bar = new Morris.Bar({
        element: 'kelahiran-chart',
        resize: true,
        data: [0,0],
        barColors: ['#00a65a', '#f56954'],
        xkey: 'tahun',
        ykeys: ['L', 'P'],
        labels: ['Laki laki', 'Perempuan'],
    });
    $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/getTglLahirSiswa", // This is the URL to the API
        })
        .done(function( data ) {
            // When the response to the AJAX request comes back render the chart with new data
            bar.setData(data);
        })
        .fail(function() {
            // If there is no communication between the server, show an error
            alert( "error occured" );
        });
});