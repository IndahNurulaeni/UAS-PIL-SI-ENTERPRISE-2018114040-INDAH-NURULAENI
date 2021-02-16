@extends('layouts.app')

@section('title','Data Kontrak')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Mahasiswa :{{ $kontraks['Mahasiswa'] }} </h3>
<h3>Semester :{{ $kontraks['Semester'] }} </h3>

 </div>
</div>
@endsection

    
