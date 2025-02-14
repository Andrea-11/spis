<?php
	$csrf = array(
	'name' => $this->security->get_csrf_token_name(),
	'hash' => $this->security->get_csrf_hash()
	);
?>

<style>
  /* .item1 { grid-area: header; }
  .item2 { grid-area: menu; }
  .item3 { grid-area: main; }
  .item4 { grid-area: right; }
  .item5 { grid-area: footer; }

  .grid-container {
    display: grid;
    grid-template-areas:
      'header header header header header header'
      'menu main main main right right'
      'menu footer footer footer footer footer';
    gap: 5px;
    background-color: #2196F3;
    padding: 5px;
    margin-top: 100px;
  }

  .grid-container > div {
    background-color: rgba(255, 255, 255, 0.8);
    text-align: center;
    padding: 100px 0;
    font-size: 30px;
  } */
</style>

    <div class="container-fluid">
      <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
      </div>
      <div class="row">
          <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-start-primary py-2">
                  <div class="card-body">
                      <div class="row align-items-center no-gutters">
                          <div class="col me-2">
                              <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Validated client</span></div>
                              <div class="text-dark fw-bold h5 mb-0"><span>40,000</span></div>
                          </div>
                          <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-start-success py-2">
                  <div class="card-body">
                      <div class="row align-items-center no-gutters">
                          <div class="col me-2">
                              <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Wait listed</span></div>
                              <div class="text-dark fw-bold h5 mb-0"><span>215,000</span></div>
                          </div>
                          <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-start-info py-2">
                  <div class="card-body">
                      <div class="row align-items-center no-gutters">
                          <div class="col me-2">
                              <div class="text-uppercase text-info fw-bold text-xs mb-1"><span style="padding-right: 0px;">target beneficiaries</span></div>
                              <div class="row g-0 align-items-center">
                                  <div class="col-auto">
                                      <div class="text-dark fw-bold h5 mb-0 me-3"><span>50%</span></div>
                                  </div>
                                  <div class="col">
                                      <div class="progress progress-sm">
                                          <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="visually-hidden">50%</span></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-start-warning py-2">
                  <div class="card-body">
                      <div class="row align-items-center no-gutters">
                          <div class="col me-2">
                              <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>potencial beneficiaries</span></div>
                              <div class="text-dark fw-bold h5 mb-0"><span>18</span></div>
                          </div>
                          <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-7 col-xl-8">
              <div class="card shadow mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <h6 class="text-primary fw-bold m-0">PAID BENEFICIARIES</h6>
                      <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                          <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                              <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-5 col-xl-4">
              <div class="card shadow mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <h6 class="text-primary fw-bold m-0">Revenue Sources</h6>
                      <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                          <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                              <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>
                      <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Direct</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Social</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Refferal</span></div>
                  </div>
              </div>
          </div>
      </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary fw-bold m-0">Projects</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small fw-bold">Server migration<span class="float-end">20%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="visually-hidden">20%</span></div>
                        </div>
                        <h4 class="small fw-bold">Sales tracking<span class="float-end">40%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="visually-hidden">40%</span></div>
                        </div>
                        <h4 class="small fw-bold">Customer Database<span class="float-end">60%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="visually-hidden">60%</span></div>
                        </div>
                        <h4 class="small fw-bold">Payout Details<span class="float-end">80%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="visually-hidden">80%</span></div>
                        </div>
                        <h4 class="small fw-bold">Account setup<span class="float-end">Complete!</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              
          <div class="col">
              <div class="row">
                  <div class="col-lg-6 mb-4">
                      <div class="card text-white bg-primary shadow">
                          <div class="card-body">
                              <p class="m-0">Primary</p>
                              <p class="text-white-50 small m-0">#4e73df</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                      <div class="card text-white bg-success shadow">
                          <div class="card-body">
                              <p class="m-0">Success</p>
                              <p class="text-white-50 small m-0">#1cc88a</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                      <div class="card text-white bg-info shadow">
                          <div class="card-body">
                              <p class="m-0">Info</p>
                              <p class="text-white-50 small m-0">#36b9cc</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                      <div class="card text-white bg-warning shadow">
                          <div class="card-body">
                              <p class="m-0">Warning</p>
                              <p class="text-white-50 small m-0">#f6c23e</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                      <div class="card text-white bg-danger shadow">
                          <div class="card-body">
                              <p class="m-0">Danger</p>
                              <p class="text-white-50 small m-0">#e74a3b</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                      <div class="card text-white bg-secondary shadow">
                          <div class="card-body">
                              <p class="m-0">Secondary</p>
                              <p class="text-white-50 small m-0">#858796</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Copyright © Brand 2024</span></div>
    </div>
</footer>

  </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
</body>

