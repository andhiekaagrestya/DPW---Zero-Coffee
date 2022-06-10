@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Shipment</th>
                        <th scope="col">Order Status</th>
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

        let getdata = () => {            
            let data = ""
            $.ajax({
                url: 'http://127.0.0.1:8000/api/pesanan',
                type: 'GET',
                success: function(res){
                    // console.log(res)
                    let no = 1
                    res.data.forEach(element => {
                        data += `                        <tr>
                                <th scope="row">${no++}</th>
                                <td>${element.name}</td>
                                <td>${element.shipment}</td>
                                <td>${element.order_status}</td>
                                <td>
                                    <a href="/pesanan/detail/${element.customer_id}" class="badge badge-primary">detail</a>
                                   
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


