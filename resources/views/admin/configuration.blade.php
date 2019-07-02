@extends('master')
@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Configuration</h1>
</div>
<!-- Configuration Row  Start-->
<div class="row">
    <!-- Configuration Country Start-->
    <div class="col-lg-6 mb-4">
        <!-- Country Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Country</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <!-- Country Modal-->
                        <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#CountryModal">
Add Country
</a>
                    </div>
                    <div class="col-lg-6 mb-4"> <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#CountryViewModal">
View Country
</a>
                    </div>
                </div>

                <div class="modal fade" id="CountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-lg-8 mb-4">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Add Country">

                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <button class="btn btn-primary btn-block" type="button" data-dismiss="modal">Add</button>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="CountryViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Country</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="card shadow mb-4">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Country</th>
                                                    <th>Operation</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>01</td>
                                                    <td>Malaysia</td>
                                                    <td>
                                                        <span style="color: blue">Edit</span>/
                                                        <span style="color: red">Delete</span>
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

            </div>
        </div>
        <!-- Country End -->
    </div>
    <!-- Configuration Country End-->

    <!-- Configuration  Property Start-->
    <div class="col-lg-6 mb-4">
        <!-- Country Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Property</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <!-- Country Modal-->
                        <a class="btn btn-success btn-user btn-block" href="#" data-toggle="modal" data-target="#PropertyModal">
Add Property
</a>
                    </div>
                    <div class="col-lg-6 mb-4"> <a class="btn btn-success btn-user btn-block" href="#" data-toggle="modal" data-target="#PropertyViewModal">
View Property
</a>
                    </div>
                </div>

                <div class="modal fade" id="PropertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Property</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <select name="age" class="form-control form-control-user" editable="editable">
                                            <option value="18">Select Country</option>
                                            <option value="<?php ?>">Malaysia</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Add Property">

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-dismiss="modal">Add</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="PropertyViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Property List</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="card shadow mb-4">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Country</th>
                                                    <th>Property</th>
                                                    <th>Operation</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>01</td>
                                                    <td>Malaysia</td>
                                                    <td>Property Name</td>

                                                    <td>
                                                        <span style="color: blue">Edit</span>/
                                                        <span style="color: red">Delete</span>
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

            </div>
        </div>
        <!-- Country End -->
    </div>
    <!-- Configuration Property End-->

    <!-- Configuration  Unit Start-->
    <div class="col-lg-6 mb-4">
        <!-- Country Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Unit</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <!-- Country Modal-->
                        <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#UnitModal">
Add Unit
</a>
                    </div>
                    <div class="col-lg-6 mb-4"> <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#CountryViewModal">
View Unit
</a>
                    </div>
                </div>

                <div class="modal fade" id="UnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <select name="age" class="form-control form-control-user" editable="editable">
                                            <option value="18">Select Country</option>
                                            <option value="<?php ?>">Malaysia</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <select name="age" class="form-control form-control-user" editable="editable">
                                            <option value="18">Select Property</option>
                                            <option value="<?php ?>">Property Name</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Unit">

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary " type="button" data-dismiss="modal">Add</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="CountryViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Country</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="card shadow mb-4">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Country</th>
                                                    <th>Operation</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>01</td>
                                                    <td>Malaysia</td>
                                                    <td>
                                                        <span style="color: blue">Edit</span>/
                                                        <span style="color: red">Delete</span>
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

            </div>
        </div>
        <!-- Country End -->
    </div>
    <!-- Configuration Unit End-->

    <!-- Configuration  Enpense Start-->
    <div class="col-lg-6 mb-4">
        <!-- Country Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Country</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <!-- Country Modal-->
                        <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#CountryModal">
Add Country
</a>
                    </div>
                    <div class="col-lg-6 mb-4"> <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#CountryViewModal">
View Country
</a>
                    </div>
                </div>

                <div class="modal fade" id="CountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-lg-8 mb-4">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Add Country">

                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <button class="btn btn-primary btn-block" type="button" data-dismiss="modal">Add</button>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="CountryViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Country</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <div class="card shadow mb-4">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Country</th>
                                                    <th>Operation</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>01</td>
                                                    <td>Malaysia</td>
                                                    <td>
                                                        <span style="color: blue">Edit</span>/
                                                        <span style="color: red">Delete</span>
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

            </div>
        </div>
        <!-- Country End -->
    </div>
    <!-- Configuration Enpense End-->

</div>
<!-- Configuration Row End -->
@endsection