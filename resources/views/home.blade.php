@extends('layouts.app')
<style>
    .select2-container--default .select2-selection--single {
        height: 37px !important;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Conversor de Divisas') }}</div>

                <div class="card-body">
                    <div class="input-group mb-3">
                        <input id="amount1" type="text" class="form-control" aria-label="Text input with dropdown button">
                        <select id="divisas1" class="divisas form-select" aria-label="Default select example">
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input id="amount2" type="text" class="form-control" aria-label="Text input with dropdown button">
                        <select id="divisas2" class="divisas form-select" aria-label="Default select example">
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.map"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        axios
            .get('/Divisas/symbols')
            .then(response => {
                response = response.data
                var html = '';
                $.each(response.symbols, function (index, value) {
                    html += '<option value="'+index+'">'+value+'</option>'
                });
                $('.divisas').html(html);
                $('.divisas').select2();

                $('#divisas1').val('COP').trigger('change.select2');
                $('#divisas2').val('USD').trigger('change.select2');
            })

        axios
            .get('/Divisas/convert/')
            .then(response => {
                response = response.data

                $('#amount1').val(response.query.amount)
                $('#amount2').val(response.result)
            })

        $('#amount1').change(function (e) {
            axios
                .get('/Divisas/convert/'+$('#divisas2').val()+'/'+$('#divisas1').val()+'/'+$('#amount1').val())
                .then(response => {
                    response = response.data

                    $('#amount1').val(response.query.amount)
                    $('#amount2').val(response.result)
                })
        });

        $('#amount2').change(function (e) {
            axios
                .get('/Divisas/convert/'+$('#divisas1').val()+'/'+$('#divisas2').val()+'/'+$('#amount2').val())
                .then(response => {
                    response = response.data

                    $('#amount2').val(response.query.amount)
                    $('#amount1').val(response.result)
                })
        });

        $('#divisas1').change(function (e) {
            axios
                .get('/Divisas/convert/'+$('#divisas2').val()+'/'+$('#divisas1').val()+'/'+$('#amount1').val())
                .then(response => {
                    response = response.data

                    $('#amount1').val(response.query.amount)
                    $('#amount2').val(response.result)
                })
        });

        $('#divisas2').change(function (e) {
            axios
                .get('/Divisas/convert/'+$('#divisas2').val()+'/'+$('#divisas1').val()+'/'+$('#amount1').val())
                .then(response => {
                    response = response.data

                    $('#amount1').val(response.query.amount)
                    $('#amount2').val(response.result)
                })
        });

    </script>
@endsection
