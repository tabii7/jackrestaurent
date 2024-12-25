@extends('admin.adminLayout')
@section('content')  


         <!-- Container-fluid starts-->
         <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Orders </h4>
                  </div>
                  <div class="card-body">
                    <div class="order-history table-responsive custom-scrollbar">
                      <table class="table table-bordernone display" id="basic-1">
                        <thead>
                          <tr>
                            
                            <th scope="col">Order Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Units</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            
                            <td>38543</td>
                            <td>Fatima@gmail.com</td>
                            <td>+1123465468</td>

                            <td>1</td>
                            <td>$21</td>
                            <td>Paid</td>
                            <td>Completed</td>

                            <td>
                                <a href="{{ route('admin.order_detail') }}" title="View">
                                  <i class="fas fa-eye"></i> <!-- View icon -->
                                </a>
                                <a href="#" title="Delete" style="margin-left: 10px;">
                                  <i class="fas fa-trash"></i> <!-- Delete icon -->
                                </a>
                              </td>
                              
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          @endsection