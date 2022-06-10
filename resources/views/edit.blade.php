@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form id="edit"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="mb-3">
                          <label  class="form-label">Name</label>
                          <input type="text" id="name" name="name" value="" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">price</label>
                            <input type="text" id="price" name="price" value="" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label  class="form-label">description</label>
                            <textarea type="text" id="description" name="description" class="form-control" ></textarea>
                          </div>
                          <div class="mb-3" id="img">
                              {{-- <img src="" alt=""> --}}
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

    $.ajax({
        url: 'http://127.0.0.1:8000/api/product/'+{{ $id }},
        type: 'GET',
        success: function(res){
            // console.log(res)
            $("#name").val(res.data.name);
            $("#price").val(res.data.price);
            $("#description").val(res.data.description);
            $("#img").html(`<img src="{{ asset('${res.data.image}') }}" width="200px" class='img-thumbnail'>`)
        }
    })

    $("#edit").submit(function(e){
        console.log("ok")

        const form = document.getElementById('edit');
        const formData = new FormData(form);
        // console.log(formData);
        e.preventDefault();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/product/update',
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
                console.log(res);
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