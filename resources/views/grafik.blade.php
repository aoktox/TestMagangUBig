@extends('master.layout')
@section('head')
<!-- Morris charts -->
<link rel="stylesheet" href="{{ asset("assets/plugins/morris/morris.css",env('IS_SECURE')) }}">
@stop
@section('footer_after_jquery')
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset("assets/plugins/morris/morris.min.js",env('IS_SECURE')) }}"></script>
<!-- FastClick -->
<script src="{{ asset("assets/plugins/fastclick/fastclick.min.js",env('IS_SECURE')) }}"></script>
<script src="{{ asset("assets/js/custom/grafik.js",env('IS_SECURE')) }}"></script>
{{--<script>--}}
    {{--$(function () {--}}
        {{--"use strict";--}}
        {{--//DONUT CHART--}}
        {{--var donut = new Morris.Donut({--}}
            {{--element: 'jumlah-chart',--}}
            {{--resize: true,--}}
            {{--colors: ["#3c8dbc", "#f56954"],--}}
            {{--data: [0,0],--}}
            {{--hideHover: 'auto'--}}
        {{--});--}}
        {{--// Fire off an AJAX request to load the data--}}
        {{--$.ajax({--}}
                    {{--type: "GET",--}}
                    {{--dataType: 'json',--}}
                    {{--url: "{{ url('getJumlahSiswa','',env('IS_SECURE')) }}", // This is the URL to the API--}}
                {{--})--}}
                {{--.done(function( data ) {--}}
                    {{--// When the response to the AJAX request comes back render the chart with new data--}}
                    {{--donut.setData(data);--}}
                {{--})--}}
                {{--.fail(function() {--}}
                    {{--// If there is no communication between the server, show an error--}}
                    {{--alert( "error occured" );--}}
                {{--});--}}

        {{--//BAR CHART--}}
        {{--var bar = new Morris.Bar({--}}
            {{--element: 'kelahiran-chart',--}}
            {{--resize: true,--}}
            {{--data: [0,0],--}}
            {{--barColors: ['#00a65a', '#f56954'],--}}
            {{--xkey: 'tahun',--}}
            {{--ykeys: ['L', 'P'],--}}
            {{--labels: ['Laki laki', 'Perempuan'],--}}
        {{--});--}}
        {{--$.ajax({--}}
                    {{--type: "GET",--}}
                    {{--dataType: 'json',--}}
                    {{--url: "{{ url('getTglLahirSiswa','',env('IS_SECURE')) }}", // This is the URL to the API--}}
                {{--})--}}
                {{--.done(function( data ) {--}}
                    {{--// When the response to the AJAX request comes back render the chart with new data--}}
                    {{--bar.setData(data);--}}
                {{--})--}}
                {{--.fail(function() {--}}
                    {{--// If there is no communication between the server, show an error--}}
                    {{--alert( "error occured" );--}}
                {{--});--}}
    {{--});--}}
{{--</script>--}}
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Perbandingan jumlah siswa</h3>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="jumlah-chart" style="height: 300px; position: relative;"></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col (LEFT) -->
    <div class="col-md-6">
        <!-- BAR CHART -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Tahun kelahiran siswa</h3>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="kelahiran-chart" style="height: 300px;"></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col (RIGHT) -->
</div><!-- /.row -->
@stop