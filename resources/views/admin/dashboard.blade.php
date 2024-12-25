@extends('admin.adminLayout')
@section('content')  


<!-- Container-fluid starts-->
<div class="container-fluid default-dashboard">
  <div class="row">
    <div class="col-xl-6 box-col-7 proorder-md-1">
      <div class="card">
        <div class="card-body premium-card">
          <div class="row premium-courses-card">
            <div class="col-md-5 premium-course">
              <h1 class="f-w-700">Wekcome Back Admin.</h1><span class="f-light f-w-400 f-14">Theres Alot of Work
                To Do. </span><a class="btn btn-square btn-primary f-w-700"
                href="#">Check Inbox</a>
            </div>
            <div class="col-md-7 premium-course-img">
              <div class="premium-message">
                <img class="img-fluid" src="{{ asset('admin/assets/images/dashboard/massage.gif') }}" alt="massage">
              </div>
              <div class="premium-books">
                <img class="img-fluid" src="{{ asset('admin/assets/images/dashboard/books.gif') }}" alt="books">
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-md-12 box-col-12 proorder-md-4">
      <div class="card">
        <div class="card-header card-no-border">
          <div class="header-top">
            <h4>Recent Orders </h4>

          </div>
        </div>
        <div class="card-body pt-0">
          <div class="table-responsive custom-scrollbar">
            <table class="last-orders-table table" id="last-orders">
              <thead>
                <tr>
                  <th>Order No. </th>
                  <th>Name </th>

                  <th>Amount</th>

                  <th>Date</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#780841</td>
                  <td>
                    <div class="user-data">
                      <div> <a href="#">
                          <h4>Dmitriy Groshev</h4>
                        </a></div>
                    </div>
                  </td>

                  <td>$2.499</td>

                  <td style="float: left;">1 Oct, 14:43</td>

                </tr>
                <tr>
                  <td>#790841</td>
                  <td>
                    <div class="user-data">
                      <div> <a href="#">
                          <h4>Dmitriy Groshev</h4>
                        </a></div>
                    </div>
                  </td>

                  <td>$2.499</td>

                  <td style="float: left;">1 Oct, 14:43</td>

                </tr>
                <tr>
                  <td>#790841</td>
                  <td>
                    <div class="user-data">
                      <div> <a href="#">
                          <h4>Dmitriy Groshev</h4>
                        </a></div>
                    </div>
                  </td>

                  <td>$2.499</td>

                  <td style="float: left;">1 Oct, 14:43</td>

                </tr>
                <tr>
                  <td>#790841</td>
                  <td>
                    <div class="user-data">
                      <div> <a href="#">
                          <h4>Dmitriy Groshev</h4>
                        </a></div>
                    </div>
                  </td>

                  <td>$2.499</td>

                  <td style="float: left;">1 Oct, 14:43</td>

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