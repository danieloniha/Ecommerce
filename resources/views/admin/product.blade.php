<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_colour {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .image_colour {
            color: white;
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

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/add_product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <h1 class="font_size">Add Product</h1>

                        <div class="div_design">
                            <label for="">Product Title:</label>
                            <input class="input_colour" type="text" name="title" placeholder="Write a title"
                                required>
                        </div>

                        <div class="div_design">
                            <label for="">Product Description:</label>
                            <input class="input_colour" type="text" name="description"
                                placeholder="Write a description" required>
                        </div>

                        <div class="div_design">
                            <label for="">Product Price:</label>
                            <input class="input_colour" type="number" name="price" placeholder="Write a price"
                                required>
                        </div>

                        <div class="div_design">
                            <label for="">Discount Price:</label>
                            <input class="input_colour" type="number" name="dis_price" placeholder="Write a price">
                        </div>

                        <div class="div_design">
                            <label for="">Product Quantity:</label>
                            <input class="input_colour" type="number" name="quantity" min="0"
                                placeholder="Write a quantity" required>
                        </div>

                        <div class="div_design">
                            <label for="">Product Category:</label>
                            <select class="input_colour" name="category" id="" required>
                                <option value="" selected>Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="div_design">
                            <label for="">Product Image Here:</label>
                            <input class="image_colour" type="file" name="image" required>
                        </div>

                        <div class="div_design">
                            <input class="btn btn-primary" type="submit" value="Add Product">
                        </div>
                </form>

            </div>

        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
