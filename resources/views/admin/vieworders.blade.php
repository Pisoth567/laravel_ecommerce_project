@extends('admin.main_design')

@section('view_orders')


    <table style="width:100%; border-collapse: collapse; font-family: san-serif; ">
        <thead>      
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Customer Name</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd; width:250px;">Address</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Phone</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Product</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Price</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Image</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Status</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Invoice</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr style=" border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px; text-align: center;">{{$order ->user-> name}}</td>
                    <td style="padding: 12px; text-align: center;">{{$order -> receiver_address}}</td>
                    <td style="padding: 12px; text-align: center;">{{$order -> receiver_phone}}</td>

                    <td style="padding: 12px; text-align: center;">{{$order ->product -> product_name}}</td>
                    <td style="padding: 12px; text-align: center;">{{$order ->product -> product_price}}</td>
                    <td style="padding: 12px; text-align: center;">
                        <img style="width: 100px;" src="{{ asset('products/'.$order -> product -> product_image) }}" alt="">
                    </td> 
                    <td style="padding: 12px; text-align: center;">
                        <form action="{{ route('admin.change_status', $order->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            <div style="display: flex; gap: 5px;">
                                <select name="status" style="
                                    padding: 6px 10px;
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                    background: white;
                                    min-width: 120px;
                                    font-size: 13px;
                                ">
                                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>⚙️ Processing</option>
                                    <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>🚚 Shipped</option>
                                    <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>✅ Delivered</option>
                                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                                </select>
                                
                                <input type="submit" name="submit" onclick="return confirm('Change status?')" style="
                                    padding: 6px 12px;
                                    background: #4CAF50;
                                    color: white;
                                    border: none;
                                    border-radius: 4px;
                                    cursor: pointer;
                                    font-size: 13px;
                                ">
                            </div>
                        </form>
                    </td>
                    <td style="padding: 12px; text-align: center;">
                        <a href="{{ route('admin.downloadpdf',$order->id) }}" class="btn btn-success">Download PDF</a>
                    </td>
                </tr>
            @endforeach

        </tbody>    
    </table>
@endsection