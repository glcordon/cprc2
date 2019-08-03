@extends('layouts.app')

@section('content1')

     <div class="container">
       <div class="row" style="margin-top:0.5em">
        <form action="/upload_file" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="excel_file"></label>
            <input type="file" name="excel_file" id="excel_file" class="excel_file">
            <button type="submit">upload</button>
        </form>
       </div>
    </div>
@endsection
@push('scripts')
<script>
   
</script>
@endpush

<b></b>
