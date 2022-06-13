@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header">
                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Amount</th>
                            {{-- <th scope="col">Action</th> --}}
                          </tr>
                        </thead>
                        <tbody id="data">
    
    
                        </tbody>
    
                      </table>
    
                      <h3>Total : <span class="fw-bold" id="total"></span></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script>

        let getdata = () => {            
            let data = ""
            let total = 0
            $.ajax({
                url: 'http://127.0.0.1:8000/api/pesanan/detail/{{$id}}',
                type: 'GET',
                success: function(res){
                    let no = 1
                    res.data.forEach(element => {
                        data += `                        <tr>
                                <th scope="row">${no++}</th>
                                <td>${element.name}</td>
                                <td><img src="{{asset('${element.image}')}}" width="100px" class="img-thumbnail"></td>
                                <td>${element.price}</td>
                                <td>${element.amount}</td>
    
                                </tr>`;
                        total += element.price * element.amount
                    });
                    $("#data").html(data)
                    $("#total").html(total)
                }
            });
        }

        $(document).ready(function(){
            getdata()
        })
</script>

@endsection


