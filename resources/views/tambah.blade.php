@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="post" id="tambah" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label  class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">price</label>
                            <input type="text" name="price" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label  class="form-label">description</label>
                            <textarea type="text" name="description" class="form-control" ></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
  $("#tambah").submit(function(e){
    
    const form = document.getElementById('tambah');
    const formData = new FormData(form);

    e.preventDefault();
    $.ajax({
        url: 'http://127.0.0.1:8000/api/product/tambah',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res){
            swal({ icon: 'success',
                            title: 'success...',
                            text: res.message,
            }).then(() => {
                window.location = '/home';
            });
        }
    })
  });
</script>

@endsection