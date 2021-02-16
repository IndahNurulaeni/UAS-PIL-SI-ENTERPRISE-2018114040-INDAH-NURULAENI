@extends('layouts.app')

@section('title','Kontraks')

@section('content')

<!-- Button trigger modal -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Data
            </button> 
          </div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Mahasiswa</th>
      <th scope="col">Semester</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($kontraks as $kontrak)
  <tr>
    <td>{{$kontrak->Mahasiswa_id}}</td>
    <td>{{$kontrak->Semester_id}}</td>
    @csrf
    @method('DELETE')
    </form>
    </tr>
    @endforeach
  </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/kontraks" method="POST">

          @csrf

      <div class="modal-body">
           <div class="row mb-3">
            <label for="inputtext3" class="col-sm-3 col-form-label">Mahasiswa</label>
            <div class="col-sm-9">
              <select class="form-control" id="mahasiswa_id" name="mahasiswa_id">
              <option value="Indah Nurulaeni">Indah Nurulaeni</option>
              <option value="Hany Dwi Agustanti">Hany Dwi Agustanti</option>
              <option value="Melinda Aurellia H">Melinda Aurellia H"</option>
              <option value="Sandra Fahrina">Sandra Fahrina</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Semester</label>
            <div class="col-sm-9">
                <select class="form-control" id="semester_id" name="semester_id">
              <option value="Semester 1">Semester 1</option>
              <option value="Semester 2">Semester 2</option>
              <option value="Semester 3">Semester 3</option>
              <option value="Semester 4">Semester 4</option>
              <option value="Semester 5">Semester 5</option>
              <option value="Semester 6">Semester 6</option>
              <option value="Semester 7">Semester 7</option>
              <option value="Semester 8">Semester 8</option>
            </select>
            </div>
          </div>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Input</button>
      </div>
    </form>
    </div>
  </div>
</div>
    {{ $kontraks -> links() }}
    </div>
@endsection