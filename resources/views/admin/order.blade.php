<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>

        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .th_deg{
            background-color: blue;
        }

        .img_size{
            width: 100px;
            height: 100px;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        
        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class="title_deg">All Orders</h1>

                <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Print PDF</th>
                    </tr>

                    @foreach ($order as $order)

                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td><img class="img_size" src="/product/{{ $order->image }}" alt=""></td>
                        @if ($order->delivery_status == 'processing')
                            <td><a href="{{ url('delivered, $order->id') }}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary">Delivered</a></td>
                            
                        @else
                            <p style="color: green;">Delivered</p>
                        @endif

                        <td><a href="{{ url('print_pdf, $order->id') }}" class="btn btn-secondary">Print</a></td>
                        
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>