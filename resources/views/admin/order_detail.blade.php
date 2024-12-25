@extends('admin.adminLayout')
@section('content')  


                <!-- Container-fluid starts-->
                <div class="container invoice-2">
                    <div class="card">
                        <div class="card-body">
                            <table style="width:100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td><img class="for-light" src="../assets/images/logo/logo.png"
                                                                alt="logo"><img class="for-dark"
                                                                src="../assets/images/logo/logo_dark.png" alt="logo">
                                                           
                                                        </td>
                                                     
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table style="width:100%;">
                                                <tbody>
                                                    <tr
                                                        style="display:flex;justify-content:space-between;border-top: 1px solid rgba(82, 82, 108, 0.3);border-bottom: 1px solid rgba(82, 82, 108, 0.3);padding: 25px 0;">
                                                        <td style="display:flex;align-items:center; gap: 6px;"> <span
                                                                style="opacity: 0.8; font-size: 18px; font-weight: 500;">Order
                                                                No.</span>
                                                            <h4 style="margin:0;font-weight:400; font-size: 18px;">
                                                                #VL25000365</h4>
                                                        </td>
                                                        <td style="display:flex;align-items:center; gap: 6px;"> <span
                                                                style="opacity: 0.8; font-size: 18px; font-weight: 500;">Date
                                                                : </span>
                                                            <h4 style="margin:0;font-weight:400; font-size: 18px;">
                                                                09/03/2024</h4>
                                                        </td>
                                                        <td style="display:flex;align-items:center; gap: 6px;"> <span
                                                                style="opacity: 0.8; font-size: 18px; font-weight: 500;">Payment
                                                                Status :</span>
                                                            <h4
                                                                style="margin:0;font-weight:400; font-size: 18px;padding:6px 18px; background-color:rgba(84, 186, 74, 0.1);color:#54BA4A; border-radius: 5px;">
                                                                Paid</h4>
                                                        </td>
                                                        <td style="display:flex;align-items:center; gap: 6px;"> <span
                                                                style="opacity: 0.8; font-size: 18px; font-weight: 500;">Total
                                                                Amount :</span>
                                                            <h4 style="margin:0;font-weight:500; font-size: 18px;">
                                                                $26,410.00</h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr style="padding: 28px 0; display:block;">
                                                        <td Style="width:63%;"><span
                                                                style="opacity: 0.8; font-size: 16px; font-weight: 500;">BILLING
                                                                ADDRESS</span>
                                                            <h4
                                                                style="font-weight:400; margin: 12px 0 6px 0; font-size: 18px;">
                                                                Brooklyn Simmons</h4><span
                                                                style="width: 54%; display:block; line-height: 1.5; opacity: 0.8; font-size: 18px; font-weight: 400;">2118
                                                                Thornridge Cir. Syracuse, Connecticut 35624, United
                                                                State</span><span
                                                                style="line-height:2.6; opacity: 0.8; font-size: 18px; font-weight: 400;">Phone
                                                                : (239) 555-0108</span>
                                                        </td>
                                                        <td><span
                                                                style="opacity: 0.8;font-size: 16px; font-weight: 500;">SHIPPING
                                                                ADDRESS</span>
                                                            <h4
                                                                style="font-weight:400; margin: 12px 0 6px 0; font-size: 18px;">
                                                                Cameron Williamson</h4><span
                                                                style="width: 95%; display:block; line-height: 1.5; opacity: 0.8; font-size: 18px; font-weight: 400;">2972
                                                                Westheimer Rd. Santa Ana, Illinois 85486 </span><span
                                                                style="line-height:2.6; opacity: 0.8; font-size: 18px; font-weight: 400;">Email
                                                                : email@gmail.com </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table
                                                style="width: 100%;border-collapse: separate;border-spacing: 0;border: 1px solid rgba(82, 82, 108, 0.1)">
                                                <thead>
                                                    <tr
                                                        style="background: var(--theme-default);border-radius: 8px;overflow: hidden;box-shadow: 0px 10.9412px 10.9412px rgba(43, 95, 96, 0.04), 0px 9.51387px 7.6111px rgba(43, 95, 96, 0.06), 0px 5.05275px 4.0422px rgba(43, 95, 96, 0.0484671);border-radius: 5.47059px;">
                                                        <th style="padding: 18px 15px;text-align: left"><span
                                                                style="color: #fff; font-size: 18px;">Products</span>
                                                        </th>
                                                        <th style="padding: 18px 15px;text-align: left"><span
                                                                style="color: #fff; font-size: 18px;">Quantity</span>
                                                        </th>
                                                        <th style="padding: 18px 15px;text-align: left"><span
                                                                style="color: #fff; font-size: 18px;">Size</span>
                                                        </th>
                                                        <th style="padding: 18px 15px;text-align: left"><span
                                                                style="color: #fff; font-size: 18px;">Price</span></th>
                                                        <th style="padding: 18px 15px;text-align: left"><span
                                                                style="color: #fff; font-size: 18px;">Total</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="back"
                                                        style="background-color: rgba(245, 246, 249, 1);box-shadow: 0px 1px 0px 0px rgba(82, 82, 108, 0.15);">
                                                        <td
                                                            style="padding: 18px 15px;display:flex;align-items: center;gap: 10px;">
                                                            <span
                                                                style="width: 54px; height: 51px; light-box-product display: flex; justify-content: center;align-items: center; border-radius: 5px;"><img
                                                                    src="../assets/images/dashboard-8/product-categories/laptop.png"
                                                                    alt="laptop" style="height:29px;"></span>
                                                            <ul style="padding: 0;margin: 0;list-style: none;">
                                                                <li>
                                                                    <h4
                                                                        style="font-weight:400; margin:4px 0px; font-size: 18px;">
                                                                        Apple Desktop</h4><span
                                                                        style="opacity: 0.8; font-size: 14px;">#XDG-6437</span>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td style="padding: 18px 15px;"><span
                                                                style="font-size: 18px;">2</span></td>
                                                                <td style="padding: 18px 15px;"><span
                                                                style="font-size: 18px;">M</span></td>
                                                        <td style="padding: 18px 15px; width: 12%;"> <span
                                                                style="font-size: 18px;">$100</span></td>
                                                        <td style="padding: 18px 15px;"><span
                                                                style="font-size: 18px;">$200</span></td>



                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table style="float: right;">
                                                <tfoot>
                                                    <tr>
                                                        <td
                                                            style="padding: 5px 24px 5px 0; padding-top: 15px; text-align: end;">
                                                            <span style=" font-size: 18px; font-weight: 400;">Subtotal
                                                            </span><span
                                                                style="margin-left: 8px; font-size: 18px;">:</span>
                                                        </td>
                                                        <td style="padding: 5px 0;text-align: left;padding-top: 15px;">
                                                            <span style="font-size: 18px;">$26,400.00</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="padding: 5px 24px 5px 0; text-align: end;"> <span
                                                                style=" font-size: 18px; font-weight: 400;">Shipping
                                                                Rate</span><span
                                                                style="margin-left: 8px; font-size: 18px;">:</span></td>
                                                        <td style="padding: 5px 0;text-align: left;padding-top: 0;">
                                                            <span style="font-size: 18px;">$10.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 12px 24px 22px 0;"> <span
                                                                style="font-weight: 600; font-size: 20px;">Total
                                                                Amount</span><span style="margin-left: 8px;">:</span>
                                                        </td>
                                                        <td style="padding: 12px 24px 22px 0;;text-align: right"><span
                                                                style="font-weight: 500; font-size: 20px; color: var(--theme-default);">$26,410.00</span>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span
                                                style="display:block;background: rgba(82, 82, 108, 0.3);height: 1px;width: 100%;margin-bottom:24px;"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span
                                                style="display: flex; justify-content: end; gap: 15px;margin-bottom:15px;"><a
                                                    style="background: var(--theme-default); color:rgba(255, 255, 255, 1);border-radius: 10px;padding: 18px 27px;font-size: 16px;font-weight: 600;outline: 0;border: 0; text-decoration: none;"
                                                    href="#!" onclick="window.print();">Print Invoice<i
                                                        class="icon-arrow-right"
                                                        style="font-size:13px;font-weight:bold; margin-left: 10px;"></i></a><a
                                                    style="background: rgba(48, 126, 243, 0.1);color: var(--theme-default);border-radius: 10px;padding: 18px 27px;font-size: 16px;font-weight: 600;outline: 0;border: 0; text-decoration: none;"
                                                    href="{{ route('admin.all_orders') }}" >Back to All Orders<i
                                                        class="icon-arrow-right"
                                                        style="font-size:13px;font-weight:bold; margin-left: 10px;">
                                                    </i></a></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
                @endsection