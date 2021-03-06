<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">
      <a href="#">Admin</a>
    </li>
    <li class="breadcrumb-item active">Dashboard</li>
    <!-- Breadcrumb Menu-->

  </ol>

  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-primary">
            <div class="card-body pb-0">
              <div class="btn-group float-right">
                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
              <div class="text-value">9.823</div>
              <div>Members online</div>
            </div>
            <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart1" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-info">
            <div class="card-body pb-0">
              <button class="btn btn-transparent p-0 float-right" type="button">
                <i class="icon-location-pin"></i>
              </button>
              <div class="text-value">9.823</div>
              <div>Members online</div>
            </div>
            <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart2" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-warning">
            <div class="card-body pb-0">
              <div class="btn-group float-right">
                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
              <div class="text-value">9.823</div>
              <div>Members online</div>
            </div>
            <div class="chart-wrapper mt-3" style="height:70px;">
              <canvas class="chart" id="card-chart3" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-danger">
            <div class="card-body pb-0">
              <div class="btn-group float-right">
                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
              <div class="text-value">9.823</div>
              <div>Members online</div>
            </div>
            <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart4" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-5">
              <h4 class="card-title mb-0">Traffic</h4>
              <div class="small text-muted">November 2017</div>
            </div>
            <!-- /.col-->
            <div class="col-sm-7 d-none d-md-block">
              <button class="btn btn-primary float-right" type="button">
                <i class="icon-cloud-download"></i>
              </button>
              <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                <label class="btn btn-outline-secondary">
                  <input id="option1" type="radio" name="options" autocomplete="off"> Day
                </label>
                <label class="btn btn-outline-secondary active">
                  <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Month
                </label>
                <label class="btn btn-outline-secondary">
                  <input id="option3" type="radio" name="options" autocomplete="off"> Year
                </label>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="chart-wrapper" style="height:300px;margin-top:40px;">
            <canvas class="chart" id="main-chart" height="300"></canvas>
          </div>
        </div>
        <div class="card-footer">
          <div class="row text-center">
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Visits</div>
              <strong>29.703 Users (40%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Unique</div>
              <strong>24.093 Users (20%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Pageviews</div>
              <strong>78.706 Views (60%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">New Users</div>
              <strong>22.123 Users (80%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Bounce Rate</div>
              <strong>40.15%</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-->

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Traffic & Sales</div>
            <div class="card-body">

              <br>
              <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">
                      <i class="icon-people"></i>
                    </th>
                    <th>User</th>
                    <th class="text-center">Country</th>
                    <th>Usage</th>
                    <th class="text-center">Payment Method</th>
                    <th>Activity</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="<?= base_url('assets/'); ?>img/profile/1.jpg" alt="admin@bootstrapmaster.com">
                        <span class="avatar-status badge-success"></span>
                      </div>
                    </td>
                    <td>
                      <div>Yiorgos Avraamu</div>
                      <div class="small text-muted">
                        <span>New</span> | Registered: Jan 1, 2015
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="flag-icon flag-icon-us h4 mb-0" id="us" title="us"></i>
                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left">
                          <strong>50%</strong>
                        </div>
                        <div class="float-right">
                          <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                        </div>
                      </div>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="fa fa-cc-mastercard" style="font-size:24px"></i>
                    </td>
                    <td>
                      <div class="small text-muted">Last login</div>
                      <strong>10 sec ago</strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="<?= base_url('assets/'); ?>img/profile/2.jpg" alt="admin@bootstrapmaster.com">
                        <span class="avatar-status badge-danger"></span>
                      </div>
                    </td>
                    <td>
                      <div>Avram Tarasios</div>
                      <div class="small text-muted">
                        <span>Recurring</span> | Registered: Jan 1, 2015
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="flag-icon flag-icon-br h4 mb-0" id="br" title="br"></i>
                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left">
                          <strong>10%</strong>
                        </div>
                        <div class="float-right">
                          <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                        </div>
                      </div>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="fa fa-cc-visa" style="font-size:24px"></i>
                    </td>
                    <td>
                      <div class="small text-muted">Last login</div>
                      <strong>5 minutes ago</strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="<?= base_url('assets/'); ?>img/profile/3.jpg" alt="admin@bootstrapmaster.com">
                        <span class="avatar-status badge-warning"></span>
                      </div>
                    </td>
                    <td>
                      <div>Quintin Ed</div>
                      <div class="small text-muted">
                        <span>New</span> | Registered: Jan 1, 2015
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="flag-icon flag-icon-in h4 mb-0" id="in" title="in"></i>
                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left">
                          <strong>74%</strong>
                        </div>
                        <div class="float-right">
                          <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                        </div>
                      </div>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="fa fa-cc-stripe" style="font-size:24px"></i>
                    </td>
                    <td>
                      <div class="small text-muted">Last login</div>
                      <strong>1 hour ago</strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="<?= base_url('assets/'); ?>img/profile/4.jpg" alt="admin@bootstrapmaster.com">
                        <span class="avatar-status badge-secondary"></span>
                      </div>
                    </td>
                    <td>
                      <div>En??as Kwadwo</div>
                      <div class="small text-muted">
                        <span>New</span> | Registered: Jan 1, 2015
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="flag-icon flag-icon-fr h4 mb-0" id="fr" title="fr"></i>
                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left">
                          <strong>98%</strong>
                        </div>
                        <div class="float-right">
                          <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                        </div>
                      </div>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="fa fa-paypal" style="font-size:24px"></i>
                    </td>
                    <td>
                      <div class="small text-muted">Last login</div>
                      <strong>Last month</strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="<?= base_url('assets/'); ?>img/profile/5.jpg" alt="admin@bootstrapmaster.com">
                        <span class="avatar-status badge-success"></span>
                      </div>
                    </td>
                    <td>
                      <div>Agapetus Tade????</div>
                      <div class="small text-muted">
                        <span>New</span> | Registered: Jan 1, 2015
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="flag-icon flag-icon-es h4 mb-0" id="es" title="es"></i>
                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left">
                          <strong>22%</strong>
                        </div>
                        <div class="float-right">
                          <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                        </div>
                      </div>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="fa fa-google-wallet" style="font-size:24px"></i>
                    </td>
                    <td>
                      <div class="small text-muted">Last login</div>
                      <strong>Last week</strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img class="img-avatar" src="<?= base_url('assets/'); ?>img/profile/6.jpg" alt="admin@bootstrapmaster.com">
                        <span class="avatar-status badge-danger"></span>
                      </div>
                    </td>
                    <td>
                      <div>Friderik D??vid</div>
                      <div class="small text-muted">
                        <span>New</span> | Registered: Jan 1, 2015
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="flag-icon flag-icon-pl h4 mb-0" id="pl" title="pl"></i>
                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left">
                          <strong>43%</strong>
                        </div>
                        <div class="float-right">
                          <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                        </div>
                      </div>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="fa fa-cc-amex" style="font-size:24px"></i>
                    </td>
                    <td>
                      <div class="small text-muted">Last login</div>
                      <strong>Yesterday</strong>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>