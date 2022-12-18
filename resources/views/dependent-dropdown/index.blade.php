<x-app-layout>
{{-- @extends('layouts.app') --}}
<div class="container">
    <h3>Laravel 8 Dynamic Dependent Dropdown using jQuery Ajax</h3>
    <div class="panel panel-primary">
        <div class="panel-heading">Laravel 8 Dynamic Dependent Dropdown using jQuery Ajax</div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kecamatan">kecamatan:</label>
                <select id="kecamatan" name="kecamatan" class="form-control">
                    <option value="" selected disabled>Select Country</option>
                    @foreach ($kecamatan as $key => $kecam)
                        <option value="{{ $key }}"> {{ $kecam }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kelurahan">kelurahan:</label>
                <select name="kelurahan" id="kelurahan" class="form-control"></select>
            </div>
        </div>
    </div>
</div>
<script>
    // when country dropdown changes
    $('#kecamatan').change(function() {

        var countryID = $(this).val();

        if (countryID) {

            $.ajax({
                type: "GET",
                url: "{{ url('getKelurahan') }}?id_kecamatan=" + countryID,
                success: function(res) {

                    if (res) {

                        $("#kelurahan").empty();
                        $("#kelurahan").append('<option>Select State</option>');
                        $.each(res, function(key, value) {
                            $("#kelurahan").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {

                        $("#kelurahan").empty();
                    }
                }
            });
        } else {

            $("#kelurahan").empty();
        }
    });

</script>
</x-app-layout>