<div>
    <div>
 
        <h1>Laravel 8 Livewire Select2 Example - Tutsmake.com</h1>
     
        <strong>Select2 Dropdown: {{ $selCity }}</strong>
     
        <div wire:ignore>
     
            <select class="mt-20 form-control" id="select2" >
     
                <option value="">-- Select City --</option>
     
                @foreach($cities as $city)
     
                    <option value="{{ $city }}">{{ $city }}</option>
     
                @endforeach
     
            </select>
     
        </div>
     
    </div>
     
       
     
    @push('scripts')
     
    <script>
     
        $(document).ready(function() {
     
            $('#select2').select2();
     
            $('#select2').on('change', function (e) {
     
                var data = $('#select2').select2("val");
     
                @this.set('selCity', data);
     
            });
     
        });
     
    </script>
     
    @endpush
</div>
