@extends('layout.parent')

@section('title', 'Hiper')

@section('info')

<!-- Content -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                         <h1>Dashboard</h1>
                    </div>
                </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="active">Detail truk</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Table -->
        <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header float-left">
                                    <div>
                                        <h4>Info Kendaraan</h4>
                                        <div class="float-right">
                                                <div>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticModal">
                                                    Perbaiki Sekarang </button>
                                                    </div>
                                                    <div>
                                                        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                     <div class="modal-header">
                                                                         <h5 class="modal-title" id="staticModalLabel">Peringatan</h5>
                                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                             <span aria-hidden="true">&times;</span>
                                                                           </button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                        <p>
                                                                                   Apakah anda yakin akan melakukan perbaikan?
                                                                       </p>
                                                                    </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <a href="form.html"><button type="button" class="btn btn-primary">Confirm</button></a>
                                                                        </div>
                                                                    </div>
                                                         </div>
                                                    </div>
                                        </div>
                                    </div></div>
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Informasi Umum</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Onderdil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Riwayat Perbaikan</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="col-md-8">
                                                <div class="card">
                                                    <img class="card-img-top" src="https://i.imgur.com/ue0AB6J.png" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h2 class="card-title mb-3">L 1234 A</h2>
                                                        <p class="card-text">Nama Supir :</p>
                                                        <p class="card-text">Nomor Mesin :</p>
                                                        <p class="card-text">Nomor Togel :</p>
                                                        <p class="card-text">Nomor Resi :</p>
                                                        <p class="card-text">Dan lain lain</p>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Nama Onderdil</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Detail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Ban</td>
                                                                    <td>
                                                                        <div class="progress mb-2">
                                                                            <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                    <div>
                                                                      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#mediumModal">
                                                                          Detail
                                                                      </button>
                                                                    </div>
                                                                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>Ban Merk :</p>
                                                                                    <p>Tahun :</p>
                                                                                    <p>Foto :</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Position</th>
                                                                        <th>Office</th>
                                                                        <th>Salary</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Tiger Nixon</td>
                                                                        <td>System Architect</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$320,800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Garrett Winters</td>
                                                                        <td>Accountant</td>
                                                                        <td>Tokyo</td>
                                                                        <td>$170,750</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Ashton Cox</td>
                                                                        <td>Junior Technical Author</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$86,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Cedric Kelly</td>
                                                                        <td>Senior Javascript Developer</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$433,060</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Airi Satou</td>
                                                                        <td>Accountant</td>
                                                                        <td>Tokyo</td>
                                                                        <td>$162,700</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Brielle Williamson</td>
                                                                        <td>Integration Specialist</td>
                                                                        <td>New York</td>
                                                                        <td>$372,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Herrod Chandler</td>
                                                                        <td>Sales Assistant</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$137,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Rhona Davidson</td>
                                                                        <td>Integration Specialist</td>
                                                                        <td>Tokyo</td>
                                                                        <td>$327,900</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Colleen Hurst</td>
                                                                        <td>Javascript Developer</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$205,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Sonya Frost</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$103,600</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jena Gaines</td>
                                                                        <td>Office Manager</td>
                                                                        <td>London</td>
                                                                        <td>$90,560</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Quinn Flynn</td>
                                                                        <td>Support Lead</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$342,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Charde Marshall</td>
                                                                        <td>Regional Director</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$470,600</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Haley Kennedy</td>
                                                                        <td>Senior Marketing Designer</td>
                                                                        <td>London</td>
                                                                        <td>$313,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tatyana Fitzpatrick</td>
                                                                        <td>Regional Director</td>
                                                                        <td>London</td>
                                                                        <td>$385,750</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Michael Silva</td>
                                                                        <td>Marketing Designer</td>
                                                                        <td>London</td>
                                                                        <td>$198,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Paul Byrd</td>
                                                                        <td>Chief Financial Officer (CFO)</td>
                                                                        <td>New York</td>
                                                                        <td>$725,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gloria Little</td>
                                                                        <td>Systems Administrator</td>
                                                                        <td>New York</td>
                                                                        <td>$237,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Bradley Greer</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>London</td>
                                                                        <td>$132,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dai Rios</td>
                                                                        <td>Personnel Lead</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$217,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jenette Caldwell</td>
                                                                        <td>Development Lead</td>
                                                                        <td>New York</td>
                                                                        <td>$345,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Yuri Berry</td>
                                                                        <td>Chief Marketing Officer (CMO)</td>
                                                                        <td>New York</td>
                                                                        <td>$675,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Caesar Vance</td>
                                                                        <td>Pre-Sales Support</td>
                                                                        <td>New York</td>
                                                                        <td>$106,450</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Doris Wilder</td>
                                                                        <td>Sales Assistant</td>
                                                                        <td>Sidney</td>
                                                                        <td>$85,600</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Angelica Ramos</td>
                                                                        <td>Chief Executive Officer (CEO)</td>
                                                                        <td>London</td>
                                                                        <td>$1,200,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gavin Joyce</td>
                                                                        <td>Developer</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$92,575</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jennifer Chang</td>
                                                                        <td>Regional Director</td>
                                                                        <td>Singapore</td>
                                                                        <td>$357,650</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Brenden Wagner</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$206,850</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Fiona Green</td>
                                                                        <td>Chief Operating Officer (COO)</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$850,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Shou Itou</td>
                                                                        <td>Regional Marketing</td>
                                                                        <td>Tokyo</td>
                                                                        <td>$163,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Michelle House</td>
                                                                        <td>Integration Specialist</td>
                                                                        <td>Sidney</td>
                                                                        <td>$95,400</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Suki Burks</td>
                                                                        <td>Developer</td>
                                                                        <td>London</td>
                                                                        <td>$114,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Prescott Bartlett</td>
                                                                        <td>Technical Author</td>
                                                                        <td>London</td>
                                                                        <td>$145,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gavin Cortez</td>
                                                                        <td>Team Leader</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$235,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Martena Mccray</td>
                                                                        <td>Post-Sales support</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$324,050</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Unity Butler</td>
                                                                        <td>Marketing Designer</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$85,675</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Howard Hatfield</td>
                                                                        <td>Office Manager</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$164,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hope Fuentes</td>
                                                                        <td>Secretary</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$109,850</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Vivian Harrell</td>
                                                                        <td>Financial Controller</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$452,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Timothy Mooney</td>
                                                                        <td>Office Manager</td>
                                                                        <td>London</td>
                                                                        <td>$136,200</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jackson Bradshaw</td>
                                                                        <td>Director</td>
                                                                        <td>New York</td>
                                                                        <td>$645,750</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Olivia Liang</td>
                                                                        <td>Support Engineer</td>
                                                                        <td>Singapore</td>
                                                                        <td>$234,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Bruno Nash</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>London</td>
                                                                        <td>$163,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Sakura Yamamoto</td>
                                                                        <td>Support Engineer</td>
                                                                        <td>Tokyo</td>
                                                                        <td>$139,575</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Thor Walton</td>
                                                                        <td>Developer</td>
                                                                        <td>New York</td>
                                                                        <td>$98,540</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Finn Camacho</td>
                                                                        <td>Support Engineer</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$87,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Serge Baldwin</td>
                                                                        <td>Data Coordinator</td>
                                                                        <td>Singapore</td>
                                                                        <td>$138,575</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Zenaida Frank</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>New York</td>
                                                                        <td>$125,250</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Zorita Serrano</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$115,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jennifer Acosta</td>
                                                                        <td>Junior Javascript Developer</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$75,650</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Cara Stevens</td>
                                                                        <td>Sales Assistant</td>
                                                                        <td>New York</td>
                                                                        <td>$145,600</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hermione Butler</td>
                                                                        <td>Regional Director</td>
                                                                        <td>London</td>
                                                                        <td>$356,250</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Lael Greer</td>
                                                                        <td>Systems Administrator</td>
                                                                        <td>London</td>
                                                                        <td>$103,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jonas Alexander</td>
                                                                        <td>Developer</td>
                                                                        <td>San Francisco</td>
                                                                        <td>$86,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Shad Decker</td>
                                                                        <td>Regional Director</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>$183,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Michael Bruce</td>
                                                                        <td>Javascript Developer</td>
                                                                        <td>Singapore</td>
                                                                        <td>$183,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Donna Snider</td>
                                                                        <td>Customer Support</td>
                                                                        <td>New York</td>
                                                                        <td>$112,000</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>      
        <!-- /Table -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
    
@endsection