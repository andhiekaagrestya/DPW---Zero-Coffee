@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('tambah') }}" class="btn btn-primary">tambah</a>
            <div class="card mt-5">
                <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="data">


                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script>
        $(document).on('click', "#hapus", function(e){
            let id = $(this).data('id');
            e.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // console.log(result)
                    if(result){
                        // console.log(id);
                        $.ajax({
                            url: 'http://127.0.0.1:8000/api/product/delete/'+id,
                            type: 'GET',
                            success: function(res){
                                swal({ icon: 'success',
                                    title: 'success...',
                                    text: res.message,
                                }).then(() => {
                                    getdata()
                                });
                            }
                        });
                    }
            })
        })
        let getdata = () => {            
            let data = ""
            $.ajax({
                url: 'http://127.0.0.1:8000/api/product',
                type: 'GET',
                success: function(res){
                    // console.log(res)
                    let no = 1
                    res.data.forEach(element => {
                        data += `                        <tr>
                                <th scope="row">${no++}</th>
                                <td>${element.name}</td>
                                <td>${element.price}</td>
                                <td><img src="${element.image}" class="img-thumbnail" width="100px" alt=""></td>
                                <td>
                                    <a href="/product/edit/${element.id}" class="badge badge-primary">edit</a>
                                    <a href="/product/hapus/" id="hapus" data-id="${element.id}" class="badge badge-danger">hapus</a>
                                </td>
                                </tr>`;
                    });
                    // console.log(data)
                    $("#data").html(data)
                }
            });
        }

        $(document).ready(function(){
            getdata()
        })
</script>

@endsection


